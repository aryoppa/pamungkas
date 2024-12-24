<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempGenResult extends Model
{
    public $fillable = [
        'question',
        'option1',
        'option2',
        'option3',
        'option4',
        'answeropt',
        'answer',
        'category',
        'passageId',
    ];
    use HasFactory;
}
