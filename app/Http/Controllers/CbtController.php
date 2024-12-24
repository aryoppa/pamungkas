<?php

namespace App\Http\Controllers;

use App\Models\TestCollection;
use Illuminate\Http\Request;
use App\Models\QuestionBank;
use App\Models\TestPassages;
use App\Models\TestQuestion;
use App\Models\TestResult;
use App\Models\testResultDetail;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Illuminate\Contracts\Session\Session;
use PDF;


class CbtController extends Controller
{
    public function index()
    {
        session()->forget('stored_payloads');
        return view('pages/CBT/cbt');
    }

    public function createTest()
    {
        return view('pages/CBT/cbt_createtest');
    }

    public function startTest($testCode)
    {
        $test = TestCollection::where('code', $testCode)->first();
        $questions = TestQuestion::where('test_id', $test->id)->with('questions.passages')->get()->sortByDesc('questions.category');
        $userResultID = TestResult::where([
            ['test_code', $testCode],
            ['user_id', Auth::id()]
        ])->pluck('id')->first();
        return Inertia::render('CBT/Test', [
            'questions' => $questions,
            'test' => $test,
            'userResultID' => $userResultID,
        ]);
    }

    public function testLandingPage()
    {
        return view('pages/CBT/test_landingpage');
    }

    public function verifyTest(Request $request)
    {
        $testCollection = new TestCollection;
        $testCode = request('testcode');
        $username = request('name');
        $testId = $testCollection->where('code', $testCode)->first();
        if ($testId === null) {
            dd('test code not found');
        } else {
            if(Auth::check()) {
                return redirect('cbt/test-detail/' . $testId->code . '/' . $username);
            } else {
                return redirect('demo/cbt/test-detail/' . $testId->code . '/' . $username);
            }
        }
    }

    public function addQuestion()
    {
        return view('pages/CBT/add_question');
    }

    public function cbtDashboard()
    {
        $tests = TestCollection::all()->where('user_id', Auth::id());
        return view('pages/CBT/cbt_dashboard', ['tests' => $tests]);
    }

    public function cbtLandingPage()
    {
        $tests = TestCollection::all();
        return view('pages/CBT/test_landingpage', ['tests' => $tests]);
    }

    public function cbtDetail($testCode, $username)
    {
        $tests = TestCollection::where('code', $testCode)->get();
        return view('pages/CBT/detail_test', ['tests' => $tests, 'username' => $username]);
    }

    public function storeNewTest(Request $request)
    {
        if (Auth::check()) {
            $id = Auth::id();
            $uuid = null;
        }
        else {
            $id = 0;
            $uuid = Cookie::get('uuid');
        }
        $testCollection = new TestCollection;
        $testCollection->user_id = $id;
        $testCollection->uuid = $uuid;
        $testCollection->title = $request->title;
        $testCollection->description = $request->description;
        $testCollection->date = $request->date;
        $testCollection->start_time = $request->start_time;
        $testCollection->end_time = $request->end_time;
        $testCollection->code = $this->generateUniqueCode();
        $testCollection->password = $request->password;
        $testCollection->save();
        if (Auth::check()) {
            return redirect('cbt/cbt-dashboard');
        } else {
            return redirect('demo/cbt/cbt-dashboard');
        }
    }

    public function cbtAdminDetailTest($code)
    {
        $testDetail = TestCollection::where('code', $code)->first();
        return view('pages/CBT/cbt_admin_detail_test', ["test" => $testDetail]);
    }

    public function selectQuestionTest($testCode)
    {
        $testId = TestCollection::where('code', $testCode)->first()->id;
        if (TestCollection::where('code', $testCode)->first()->user_id == 0) {
            $questions = QuestionBank::select('*')->where('user_id', 0)->where('uuid', Cookie::get('uuid'))->get();
        } else {
            $questions = QuestionBank::select('*')->where('user_id', Auth::id())->get();
        }

        $insertedQuestion = testQuestion::where('test_id', $testId)->pluck('question_id');
        $questions = $questions->whereNotIn('id', $insertedQuestion)->unique('code');
        $passageTitle = TestPassages::whereIn('id', $questions->pluck('passage_id'))->pluck('title');
        $i = 0;
        foreach ($questions as $question) {
            $question->title = $passageTitle[$i];
            $i++;
        }
        return view('pages/CBT/select_question', [
            'testCollections' => $questions,
            'testCode' => $testCode,
        ]);
    }

    public function detailSelectQuestionTest($testCode, $collectionCode)
    {
        $testId = TestCollection::where('code', $testCode)->first()->user_id;
        if ($testId == 0) {
            $questions = QuestionBank::select('*')->where('user_id', 0)->where('uuid', Cookie::get('uuid'))->where('code', $collectionCode)->get();
        } else {
            $questions = QuestionBank::select('*')->where('user_id', Auth::id())->where('code', $collectionCode)->get();
        }
        $testId = TestCollection::where('code', $testCode)->pluck('id')->first();
        $insertedQuestion = TestQuestion::where('test_id', $testId)->pluck('question_id');
        $questions = $questions->whereNotIn('id', $insertedQuestion);
        $passage = TestPassages::find($questions->pluck('passage_id')->first());
        return view('pages/CBT/detail_select_question', [
            'testCode' => $testCode,
            'questions' => $questions,
            'passage' => $passage,
        ]);
    }

    public function preview($testCode)
    {
        $testId = TestCollection::select('id')->where('code', $testCode)->first();
        $data = TestQuestion::where('test_id', $testId->id)->with('questions.passages')->get();
        return Inertia::render('CBT/Preview', [
            'data' => $data,
            'testCode' => $testCode
        ]);
    }

    public function generateUniqueCode()
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersNumber = strlen($characters);
        $codeLength = 6;
        $code = '';
        while (strlen($code) < $codeLength) {
            $position = rand(0, $charactersNumber - 1);
            $character = $characters[$position];
            $code = $code . $character;
        }

        if (TestCollection::where('code', $code)->exists()) {
            $this->generateUniqueCode();
        }
        return $code;
    }

    public function testResult($resultId)
    {
        $data = TestResult::find($resultId);
        return view('pages/CBT/test_result')->with('data', $data);
    }

    public function scoreDetail($resultId)
    {
        $testResults = testResult::where('id', $resultId)->first();
        $test = TestCollection::where('code', $testResults->test_code)->first();
        $questions = TestQuestion::where('test_id', $test->id)->with('questions.passages')->get();

        $answers = testResultDetail::where('result_id', $resultId)->get();
        return Inertia::render('CBT/TestResultDetail', [
            'answers' => $answers,
            'questions' => $questions
        ]);
    }

    public function listResult($testCode)
    {
        $testResults = TestResult::where('test_code', $testCode)->get();

        return view('pages/CBT/list_result', ['testResults' => $testResults]);
    }

    public function PrintQuestion($code)
    {
        $testDetail = TestCollection::where('code', $code)->first();
        $testid = TestQuestion::where('test_id', $testDetail->id)->pluck('question_id');
        $test = QuestionBank::select('*')->whereIn('question_banks.id', $testid)->get();
        $passageid = TestPassages::find($test->pluck('passage_id')->first());
        $passage = TestPassages::select('*')->where('id', $passageid->id)->get();
        return view('pages/CBT/print_question', ["questions" => $test, "passages" => $passage]);
    }

    public function generatePDF()
    {
        $testDetail = TestCollection::where('code', "FAF0XU")->first();
        $testid = TestQuestion::where('test_id', $testDetail->id)->pluck('question_id');
        $test = QuestionBank::select('*')->whereIn('question_banks.id', $testid)->get();
        $passageid = TestPassages::find($test->pluck('passage_id')->first());
        $passage = TestPassages::select('*')->where('id', $passageid->id)->get();
        $pdf = PDF::loadview('pages/CBT/print_question', ["questions" => $test, "passages" => $passage]);
        return $pdf->download('ekspor-ujian.pdf');
    }

    public function saveSelectedQuestion(Request $request)
    {
        $testId = TestCollection::where('code', $request->testCode)->pluck('id')->first();
        foreach ($request->checked as $questionId) {
            TestQuestion::insert([
                'test_id' => $testId,
                'question_id' => $questionId,
            ]);
        }
        if (Auth::check()) {
            return redirect('cbt/select-question/' . $request->testCode);
        } else {
            return redirect('demo/cbt/select-question/' . $request->testCode);
        }
    }

    public function submitTest($testCode, Request $request)
    {
        $json = json_decode($request->getContent());
        $datas = $json->data;
        $test = TestCollection::where('code', $testCode)->first();
        $questionId = TestQuestion::where('test_id', $test->id)->pluck('question_id');
        $questions = QuestionBank::select('*')->whereIn('question_banks.id', $questionId)->get();
        $user_answer = [];
        $real_answer = [];
        $questionsArray = [];
        $score = 0;
        $timeSpent = $json->timeSpent;
        foreach ($datas as $data) {
            $answers = $data->value;
            $user_answer[] = $answers;
        }
        foreach ($questions as $question) {
            $answer = $question->answer;
            $real_answer[] = $answer;
            $questionID = $question->id;
            $questionsArray[] = $questionID;
        }
        for ($i = 0; $i < count($user_answer); $i++) {
            if (strtolower($user_answer[$i]) == strtolower($real_answer[$i])) {
                $score++;
            }
        }
        $result = round(($score / $questions->count() * 100), 2);
        $id = TestResult::insertGetId([
            'user_id' => isset(Auth::user()->id) ? Auth::user()->id : '0',
            'name' => isset(Auth::user()->name) ? Auth::user()->name : "Demo Pengguna",
            'test_code' => $testCode,
            'score' => $result,
            'time_spent' => $timeSpent,
        ]);
        foreach ($user_answer as $index => $answer) {
            testResultDetail::insert([
                'result_id' => $id,
                'question_id' => $questionsArray[$index],
                'status' => (strtolower($answer) == strtolower($real_answer[$index])) ? true : false,
                'user_answer' => $answer,
            ]);
        }      
        return Inertia::location('/cbt/test-result/' . $id);
    }

    public function delete_test($id)
    {
        $test = TestCollection::findOrfail($id);
        $test->delete();
        return redirect('/cbt/cbt-dashboard');
    }

    public function update_test(Request $request, $id)
    {
        $test = TestCollection::findOrfail($id);
        $test->title = $request->title;
        $test->description = $request->description;
        $test->date = $request->date;
        $test->start_time = $request->start;
        $test->end_time = $request->end;
        $test->password = $request->password;
        $test->save();
        return redirect('/cbt/admin-test-detail/' . $test->code);
    }

    public function timer(Request $request, $id)
    {
        $test = TestCollection::findOrfail($id);
    }
}
