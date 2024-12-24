<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IrtRules extends Model
{
    use HasFactory;
    protected $fillable = [
        'test_id',
        'antecedents',
        'consequents',
        'combined',
        'user_id',
        'rule_id'
    ];
}
