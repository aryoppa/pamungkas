<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestPassages extends Model
{
    public $timestamps = false;
    protected $table = 'passages';
    use HasFactory;
}
