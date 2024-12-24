<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpgradeRequest extends Model
{
    protected $table = 'premium_requests';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'upgrade_request', 'upgrade_receipt', 'duration', 'expired_at', 'created_at', 'updated_at'];
    use HasFactory;
}
