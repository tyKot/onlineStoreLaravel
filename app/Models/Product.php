<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'price',
        'category_id',
        'image',
        'qty',
    ];
    public function category()
    {
        return $this->hasMany('App\Models\Category', 'id', 'category_id')->first()->name_category;
    }
}
