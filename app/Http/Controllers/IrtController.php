<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\TestResult;
use Inertia\Inertia;
use App\Models\IrtResult;
use App\Models\IrtRules;
use App\Models\Recommendation;
use Str;

class IrtController extends Controller
{
    
    public function getQuestions()
    {
        // Prepare the request body
        $requestData = [
            'asked_questions' => [], // Start with an empty list for the first request
            'target_competencies' => [], // Default competencies
        ];

        // Make a POST request to the Python API
        $response = Http::post('http://127.0.0.1:5000/get-question', $requestData);

        if ($response->successful()) {
            // Return the response data
            return $response->json();
        } else {
            // Handle the error
            return ['error' => 'Failed to fetch data from Python engine'];
        }
    }
    
    public function startTest()
    {
        
        $questions = $this->getQuestions();
        $flag = 0;
        // echo '<pre>' . print_r($questions, true) . '</pre>';
        return view('pages/CBT/preview_irt', ['questions' => $questions, 'flag' => $flag]);
    }

    public function storeAnswers(Request $request)
    {
        // Get data from the request
        $questionId = $request->input('questions_id');
        $question_text = $request->input('questions');
        $key_answer = $request->input('key_answer');
        $a_value = $request->input('a_value');
        $b_value = $request->input('b_value');
        $c_value = $request->input('c_value'); 
        $answer = $request->input('answer');
        $theta = $request->input('theta');
        $flag = $request->input('flag', 0); // Default flag to 0 if not provided

        // Compare the selected answer with the key answer (case-insensitive, trimmed)
        $isCorrect = strcasecmp(trim($key_answer), trim($answer)) === 0;

        // Prepare the payload for the current question
        $payload = [
            'question_id' => $questionId,
            'question_text' => $question_text,
            'key_answer' => $key_answer,
            'answer' => $answer,
            'a_value' => $a_value,
            'b_value' => $b_value,
            'c_value' => $c_value,
            'flag' => $flag,
            'theta' => $theta,
            'is_correct' => $isCorrect ? 1 : 0, // Boolean indicating correctness
        ];
        
        // Retrieve the stored payloads from the session or initialize an empty array
        $storedPayloads = session()->get('stored_payloads', []);
        
        // Check for duplicates
        $existingPayload = collect($storedPayloads)->first(function ($item) use ($questionId) {
            return $item['question_id'] == $questionId;
        });
        
        // If no duplicate found, add the current payload
        if (!$existingPayload) {
            $storedPayloads[] = $payload;
        }

        // Save the updated payloads back to the session
        session(['stored_payloads' => $storedPayloads]);

        // Send data to the Flask API
        $response = Http::post('http://127.0.0.1:5000/submit-answer', $payload);
        // echo '<pre>' . print_r($response->json(), true) . '</pre>';
        if ($response->ok()) {
            // Fetch the next question
            $nextQuestion = Http::post('http://127.0.0.1:5000/get-question', $response->json());

            // Increment the flag
            $flag++;

            if ($flag < 10) {
                // Render the view with the next question
                // echo '<pre>' . print_r($nextQuestion->json(), true) . '</pre>';
                return view('pages/CBT/preview_irt', ['questions' => $nextQuestion->json(), 'flag' => $flag]);
            } else {

                // Generate a unique identifier for the answer
                $uuid = (string) Str::uuid();
                // The loop has ended, retrieve all stored payloads
                $finalPayloads = session()->get('stored_payloads');

                // Save to the database
                foreach ($finalPayloads as $result) {
                    IrtResult::create([
                        'test_id' => $uuid,
                        'user_id' => Auth::id(), // If the user is logged in
                        'question_id' => $result['question_id'],
                        'question_text' => $result['question_text'],
                        'key_answer' => $result['key_answer'],
                        'answer' => $result['answer'],
                        'a_value' => $result['a_value'],
                        'b_value' => $result['b_value'],
                        'c_value' => $result['c_value'],
                        'is_correct' => $result['is_correct'],
                        'theta' => $result['theta']
                    ]);
                }

                // Clear the stored payloads from the session
                $result = Http::timeout(1000)->post('http://127.0.0.1:5000/analyze-incorrect-answers', $finalPayloads);
                session()->forget('stored_payloads');
                
                foreach ($result->json()['triggered_rules'] as $rules) {
                    IrtRules::create([
                        'test_id' => $uuid,
                        'user_id' => Auth::id(), // If the user is logged in
                        'antecedents' => $rules['antecedents'],
                        'consequents' => $rules['consequents'],
                        'combined' => $rules['combined'],
                        'rule_id' => $rules['rule_id']
                    ]);
                }

                Recommendation::create([
                    'test_id' => $uuid,
                    'user_id' => Auth::id(),
                    'recommendation' => $result['recommendations']
                ]);

                // echo '<pre>' . print_r($finalPayloads, true) . '</pre>';
                // echo '<pre>' . print_r($result->json(), true) . '</pre>';
                // Display or process the final payloads
                return view('irt/result');
            }
        } else {
            // Handle API error
            return response()->json(['error' => 'Failed to submit answer or fetch next question'], 500);
        }
    }
    
    public function result()
    {
        // Fetch records from recommendations table where user_id matches
        $data = Recommendation::where('user_id', Auth::id())->latest()->first();;

        // Return the data as JSON or pass it to a view
        return view('pages/CBT/result_irt', ['rekomendasi' => $data]);

    }
    
}