<?php

namespace App\Http\Controllers;

use App\Models\QuestionBank;
use App\Models\TempGenResult;
use App\Models\TestPassages;
use App\Models\UserBalance;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class GenerateController extends Controller
{
    public function index()
    {
        return view('pages/Generate/generate');
    }

    // method untuk menampilkan saldo user
    public function getUserBalance()
    {
        $user = Auth::user();
        if ($user) {
            $userBalance = UserBalance::where('user_id', $user->id)->first();
            $isPremium = $userBalance->is_premium;
            $expiredAt = $userBalance->expired_at;
            return [
                'balance' => $userBalance ? $userBalance->balance : 0,
                'is_premium' => $isPremium,
                'expired_at' => $expiredAt,
            ];
        }
    }

    public function scrape(Request $request)
    {
        $validated = $request->validate([
            'link' => 'required',
        ]);
        $client = new Client();
        $url = "https://scraper-cejcwhihsq-et.a.run.app/scrape";
        try {
            $response = $client->request('POST', $url, [
                'form_params' => [
                    'newsLink'  => $request->link,
                ],
            ]);
        } catch (ClientException $e) {
            return Redirect::back()->withErrors(['msg' => $e->getMessage()]);
        }

        $responseBody = json_decode($response->getBody());
        $responseBody->qtype = $request->qtype;
        Cookie::queue(cookie()->forever('originalText', $responseBody->originalText));
        Cookie::queue(cookie()->forever('title', $responseBody->title));

        if (Auth::check()) {
            return redirect('generate/preview-passage')->with(['response' => $responseBody]);
        } else {
            return redirect('demo/generate/preview-passage')->with(['response' => $responseBody]);
        }
    }

    public function process_file(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:txt',
        ]);
        $qtype = $request->qtype;
        $filename = $request->file->getClientOriginalName();
        $content = $request->file('file')->get();

        return redirect()->route('file_content', ['title' => $filename, 'content' => $content, 'qtype' => $qtype]);
    }

    public function file_content(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        $qtype = $request->input('qtype');
        return view('pages/Generate/file_content', compact('title', 'content', 'qtype'));
    }

    public function input_passage($qtype)
    {
        if ($qtype != null) {
            Cookie::queue(cookie()->forever('qtype', $qtype));
        }
        return view('pages/Generate/input_passage')->with(['qtype' => $qtype]);
    }

    public function store_passage(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'passage' => 'required',
        ]);
        $passageId = TestPassages::insertGetId([
            'title' => $request->title,
            'passage' => $request->passage,
        ]);
        Cookie::queue(cookie()->forever('passageId', $passageId));
        return $this->generate($passageId, $request->qtype, $request->demo);
    }

    public function regenerate()
    {
        $passageId = Cookie::get('passageId');
        $qtype = Cookie::get('qtype');
        return $this->generate($passageId, $qtype, "FALSE");
    }

    public function generate($passageId, $qtype, $demo)
    {
        $response = null;
        switch ($qtype) {
            case 'Vocabulary':
                $response = $this->generateVocabulary($passageId);
                break;
            case 'Error Identification':
                $response = $this->generateErrorIdentification($passageId);
                break;
            case 'Sentence Completion':
                $response = $this->generateSentenceCompletion($passageId);
                break;
            case '5W+1H':
                $response = $this->generate5w1h($passageId, $qtype, $demo);
                break;
        }
        // dd($response);
        if (Auth::check() && $demo == "FALSE") {
            UserBalanceController::reduceUserBalance(1000, "Generate Fixed Cost");
        }

        $user_id = Auth::check() ? Auth::id() : 0;
        $uuid = Cookie::get('uuid');
        TempGenResult::truncate();
        foreach ($response->questionList as $question) {
            TempGenResult::insert([
                'user_id' => $user_id,
                'uuid' => $uuid,
                'question' => $question->question,
                'option1' => $question->option1,
                'option2' => $question->option2,
                'option3' => $question->option3,
                'option4' => $question->option4,
                'answeropt' => $question->answeropt,
                'answer' => $question->answer,
                'category' => $qtype,
                'passageId' => $passageId,
            ]);
        }

        if (Auth::check()) {
            return redirect('/generate/result');
        } else {
            return redirect('demo/generate/result')->withCookie(cookie()->forever('uuid', $uuid));
        }
    }

    public function generateVocabulary($passageId)
    {
        $client = new Client();
        $passage = TestPassages::find($passageId);
        $passage = $passage->passage;
        try {
            $response = $client->request('POST', 'https://set-vcb-prod-cejcwhihsq-et.a.run.app/generate/vocabulary', [
                'form_params' => [
                    'max' => '3',
                    'fileText' => $passage,
                ],
            ]);
        } catch (ClientException $e) {
            return Redirect::back()->withErrors(['msg' => $e->getMessage()]);
        }

        $response = json_decode($response->getBody()->getContents());
        foreach ($response->questionList as $question) {
            $question->option1 = $question->options[0][1];
            $question->option2 = $question->options[1][1];
            $question->option3 = $question->options[2][1];
            $question->option4 = $question->options[3][1];
            $question->answeropt = $question->answer[0];
            $question->answer = $question->answer[1];
        }
        return $response;
    }

    public function generateErrorIdentification($passageId)
    {
        $client = new Client();
        $passage = TestPassages::find($passageId);
        $passage = $passage->passage;
        try {
            $response = $client->request('POST', 'https://set-err-prod-cejcwhihsq-et.a.run.app/generate/error-identification', [
                'form_params' => [
                    'max' => '3',
                    'fileText' => $passage,
                ],
            ]);
        } catch (ClientException $e){
            return Redirect::back()->withErrors(['msg' => $e->getMessage()]);
        }

        
        $response = json_decode($response->getBody()->getContents());
        foreach ($response->questionList as $question) {
            $explodedQuestion = explode(' ', $question->question);
            $explodedQuestion[$question->answer[2]] = $question->answer[3];

            $index = $question->options[0][2];
            $question->options[0][2] = $explodedQuestion[$index];
            $explodedQuestion[$index] = '<b><u>' . $explodedQuestion[$index] . '</u></b>';

            $index = $question->options[1][2];
            $question->options[1][2] = $explodedQuestion[$index];
            $explodedQuestion[$index] = '<b><u>' . $explodedQuestion[$index] . '</u></b>';

            $index = $question->options[2][2];
            $question->options[2][2] = $explodedQuestion[$index];
            $explodedQuestion[$index] = '<b><u>' . $explodedQuestion[$index] . '</u></b>';

            $index = $question->options[3][2];
            $question->options[3][2] = $explodedQuestion[$index];
            $explodedQuestion[$index] = '<b><u>' . $explodedQuestion[$index] . '</u></b>';

            $question->question = implode(' ', $explodedQuestion);
            $question->option1 = $question->options[0][1];
            $question->option2 = $question->options[1][1];
            $question->option3 = $question->options[2][1];
            $question->option4 = $question->options[3][1];
            $question->answeropt = $question->answer[0];
            $question->answer = $question->answer[1];
        }
        return $response;
    }

    public function generateSentenceCompletion($passageId)
    {
        $client = new Client();
        $passage = TestPassages::find($passageId);
        $passage = $passage->passage;
        try {
            $response = $client->request('POST', 'https://set-snc-prod-cejcwhihsq-et.a.run.app/generate/sentence-completion', [
                'form_params' => [
                    'max' => '3',
                    'fileText' => $passage,
                ],
            ]);
        } catch (ClientException $e) {
            return Redirect::back()->withErrors(['msg' => $e->getMessage()]);
        }

        $response = json_decode($response->getBody()->getContents());
        foreach ($response->questionList as $question) {
            $question->option1 = $question->options[0][1];
            $question->option2 = $question->options[1][1];
            $question->option3 = $question->options[2][1];
            $question->option4 = $question->options[3][1];
            $question->answeropt = $question->answer[0];
            $question->answer = $question->answer[1];
        }
        return $response;
    }

    public function generate5w1h($passageId)
    {
        $client = new Client();
        $passage = TestPassages::find($passageId);
        $passage = $passage->passage;
        try {
            $response = $client->request('POST', 'https://set-saq-prod-cejcwhihsq-et.a.run.app/generate/short-answer-question', [
                'form_params' => [
                    'max' => '3',
                    'fileText' => $passage,
                ],
            ]);
        } catch (ClientException $e) {
            return Redirect::back()->withErrors(['msg' => $e->getMessage()]);
        }

        $response = json_decode($response->getBody()->getContents());

        foreach ($response->questionList as $question) {
            $question->option1 = null;
            $question->option2 = null;
            $question->option3 = null;
            $question->option4 = null;
            $question->answeropt = $question->answer;
            $question->answer = null;
        }
        return $response;

    }

    public function edit_generated_question()
    {
        if (request('qtype') == "Error Identification") {
            $explodedQuestion = explode(' ', request('question'));
            $optIndex = request('optIndex');
            for ($i = 1; $i < 5; $i++) {
                $index = $optIndex[$i - 1];
                $explodedQuestion[$index] = request('option' . $i);
            };
            $question = implode(' ', $explodedQuestion);
            TempGenResult::find(request('id'))
                ->update([
                    'question' => $question,
                    'answeropt' => request('answeropt'),
                ]);
        } else {
            TempGenResult::find(request('id'))
                ->update([
                    'question' => request('question'),
                    'option1' => request('option1'),
                    'option2' => request('option2'),
                    'option3' => request('option3'),
                    'option4' => request('option4'),
                    'answeropt' => request('answeropt'),
                ]);
        }
        if (Auth::check()) {
            return redirect('/generate/result');
        } else {
            return redirect('/demo/generate/result')->withCookie(cookie()->forever('uuid', Cookie::get('uuid')));
        }
    }


    public function preview_passage(Request $request)
    {
        return view('pages/Generate/preview_passage');
    }


    public function generate_result()
    {
        if(Auth::check()) {
            $questions = TempGenResult::where('user_id', Auth::id())->get();
            $passage = TestPassages::find($questions->first()->passageId);
            return view('pages/Generate/generate_result')->with(['passage' => $passage, 'questions' => $questions]);
        } else {
            $questions = TempGenResult::where('user_id', 0)->where('uuid', Cookie::get('uuid'))->get();
            $passage = TestPassages::find($questions[0]->passageId);
            return view('pages/Generate/generate_result')->with(['passage' => $passage, 'questions' => $questions]);
        }
    }
    public function save_generate_result(Request $request)
    {
        $validated = $request->validate(
            [
                'checked' => 'required',
            ],
            [
                'checked' => 'Pilih setidaknya 1 soal!',
            ]
        );
        $code = $this->KodefikasiTipe($request->qtype);
        $code .= "f";
        $code .= Carbon::now($request->timezone)->format('dmY');
        $code .= uniqid();
        $uuid = is_null(Cookie::get('uuid')) ? null : Cookie::get('uuid');
        $user_id = Auth::check() ?  Auth::id() : 0;
        for ($x = 0; $x < count($request->checked); $x++) {
            QuestionBank::insert([
                'user_id' => $user_id,
                'uuid' => $uuid,
                'question' => $request->question[$x],
                'answer' => $request->answer[$x],
                'passage_id' => $request->passageId,
                'option1' => isset($request->option0[$x]) ? $request->option0[$x] : null,
                'option2' => isset($request->option1[$x]) ? $request->option1[$x] : null,
                'option3' => isset($request->option2[$x]) ? $request->option2[$x] : null,
                'option4' => isset($request->option3[$x]) ? $request->option3[$x] : null,
                'category' => $request->qtype,
                'code' => $code,
                'created_at' => Carbon::now($request->timezone)->toDateTimeString()
            ]);
        }
        if (Auth::check()) {
            // Jalankan reduksi saldo user
            UserBalanceController::reduceUserBalance((500 * count($request->checked)), "Generate Soal Sebanyak " . count($request->checked) . " Soal");
        }
        TempGenResult::truncate();
        if (Auth::check()) {
            return redirect('/question-collection');
        } else {
            return redirect('/demo/question-collection');
        }
    }

    public function KodefikasiTipe(String $var = null)
    {
        switch ($var) {
            case "Vocabulary":
                return "1";
                break;
            case "Error Indentification":
                return "2";
                break;
            case "Sentence Completion":
                return "3";
                break;
            case "Pronoun Reference":
                return "4";
                break;
            case "5W+1H":
                return "5";
                break;
            case "Summary":
                return "6";
                break;
            default:
                return "0";
        };
    }
}
