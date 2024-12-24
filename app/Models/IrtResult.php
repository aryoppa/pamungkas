<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IrtResult extends Model
{
    use HasFactory;
    protected $fillable = [
        'test_id',
        'user_id',
        'question_id',
        'question_text',
        'key_answer',
        'answer',
        'a_value',
        'b_value',
        'c_value',
        'is_correct',
        'theta'
    ];
}
