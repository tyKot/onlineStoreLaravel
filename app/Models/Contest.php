<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'contest_name',
        'contest_type',
        'points',
        'link_detailed',
    ];
}
