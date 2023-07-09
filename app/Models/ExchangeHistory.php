<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'points',
        'mili',
        'created_at',
    ];
}
