<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningCollection extends Model
{
    protected $table = 'learning_collections';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'description', 'content', 'created_at', 'updated_at'];
    use HasFactory;
}
