<?php

namespace App\Http\Controllers;

use App\Models\PrintCollection;
use App\Models\QuestionBank;
use App\Models\TestPassages;
use App\Models\TestQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class QuestionController extends Controller
{
    public function index()
    {
        return view('pages/Generate/generate');
    }

    public function collection_dashboard()
    {
        if (Auth::check()) {
            $questions = QuestionBank::select(['code', 'created_at', 'category', 'passage_id'])
                ->where('user_id', Auth::id())
                ->get();
        } else {
            $questions = QuestionBank::select(['code', 'created_at', 'category', 'passage_id'])
                ->where('user_id', 0)
                ->where('uuid', Cookie::get('uuid'))
                ->get();
        }

        $questions = $questions->unique('code');
        $passage_id = $questions->pluck('passage_id');
        $passage = TestPassages::whereIn('id', $passage_id)->get();
        $title = $passage->pluck('title');

        $i = 0;
        foreach ($questions as $question) {
            $question->title = $title[$i];
            $i++;
        }

        return view('pages/Generate/question_collection', [
            'questions' => $questions,
        ]);
    }

    public function detail_collection($question_code)
    {
        if (Auth::check()) {
            $questions = QuestionBank::where('user_id', Auth::id())
                ->where('code', $question_code)
                ->get();
        } else {
            $questions = QuestionBank::where('user_id', 0)
                ->where('uuid', Cookie::get('uuid'))
                ->where('code', $question_code)
                ->get();
        }

        $passageid = $questions->pluck('passage_id');

        if (count($questions) != 0) {
            $passages = TestPassages::where('id', $passageid[0])->get();
            return view('pages/Generate/detail_collection', [
                'questions' => $questions,
                'passage' => $passages,
            ]);
        } else {
            if (Auth::check()) {
                return redirect("/question-collection");
            } else {
                return redirect("/demo/collections/dashboard");
            }
        }
    }

    public function add_question_manual()
    {
        return view('pages/Generate/add_question_manual');
    }

    public function add_question_test()
    {
        return view('pages/Generate/add_question_test');
    }

    public function removeQuestion($id)
    {
        $questionModel = new QuestionBank();
        $testQuestionModel = new TestQuestion();
        $user = $questionModel::where('id', $id)->first();
        if ($user["user_id"] != 0) {
            if (strcmp($user["id"], Auth::id())) {
                $testQuestionModel::where('question_id', $id)->delete();
                $questionModel::where('id', $id)->delete();
            }
        } elseif ($user["uuid"] == Cookie::get('uuid')) {
            $testQuestionModel::where('question_id', $id)->delete();
            $questionModel::where('id', $id)->delete();
        }
        return redirect()->back();
    }

    public function addQuestiontoTest($testId, $id)
    {
        $testQuestionModel = new TestQuestion();
        $testQuestionModel::insert([
            'question_id' => $id,
            'test_id' => $testId,
        ]);
        return redirect('/cbt/select-question/' . $testId);
    }

    public function save_edit_question(Request $request)
    {
        $question = QuestionBank::findOrFail($request->id);
        $question->question = $request->question;
        $question->option1 = $request->option1;
        $question->option2 = $request->option2;
        $question->option3 = $request->option3;
        $question->option4 = $request->option4;
        $question->answer = $request->answer;
        $question->save();
        return redirect()->back();
    }

    public function store_question(Request $request)
    {
        $document = new PrintCollection();
        $document->user_id = $request->user_id;
        $document->passage_id = $request->passage_id;
        $document->question_id = $request->question_id;
        $document->save();
        return redirect()->back();
    }

    public function print_question()
    {
        $document = new PrintCollection();
        $code = $document::select('*')->where('user_id', Auth::id())->get();
        $passageid = $code->pluck('passage_id');
        for ($i = 0; $i < count($passageid); $i++) {
            $passages = TestPassages::where('id', $passageid[$i])->get();
        }
        $questionid = $code->pluck('question_id');
        for ($i = 0; $i < count($questionid); $i++) {
            $questions = QuestionBank::where('id', $questionid[$i])->get();
        }
        return view('pages/Generate/print_question', [
            'code' => $code, 'passage' => $passages, 'question' => $questions
        ]);
    }

    public function print_pdf()
    {
        $pegawai = Pegawai::all();

        $pdf = PDF::loadview('pegawai_pdf', ['pegawai' => $pegawai]);
        return $pdf->download('laporan-pegawai-pdf');
    }
}
