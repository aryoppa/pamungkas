<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;


class TestQuestion extends Model
{
    protected $fillable = ['question_id', 'test_id'];
    public $timestamps = false;
    use HasFactory;

    public function questions(): BelongsTo
    {
        return $this->belongsTo(QuestionBank::class, 'question_id', 'id');
    }

    public function getNewQuestions($testID)
    {
        $questionsIds = DB::table('test_questions')->where('test_id', '=', $testID)->pluck('question_id');
        $question = DB::table('question_banks')->whereNotIn('id', $questionsIds)->get();
        return $question;
    }


}
