<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'number_order',
        'products',
        'user_id',
        'sum',
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id')->first();
    }
    public function status()
    {
        return $this->hasOne('App\Models\Order_status', 'id', 'status_id')->first();
    }
}
