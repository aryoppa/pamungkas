<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class QuestionBank extends Model
{
    protected $table = 'question_banks';
    protected $primaryKey = 'id';
    protected $fillable = ['question', 'answer', 'passage_id', 'option1', 'option2', 'option3', 'option4', 'category', 'created_at'];
    use HasFactory;

    public function getQuestions()
    {
        $questions = QuestionBank::all();
        return $questions;
    }

    public function passages(): BelongsTo
    {
        return $this->belongsTo(TestPassages::class, 'passage_id', 'id');
    }
}
