<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        "name",
        "image",
        "user_id",
        "product_id",
        "category_id",
        "order_qty",
        "product_qty",
        "product_price",
        "order_price",
    ];
}
