<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
use App\Models\User;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'image',
        'motor',
        'potencia',
        'aceleracion',
        'category',
    ];

    public function reviews()
    {
        return $this->hasMany(
            Review::class
        );
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}