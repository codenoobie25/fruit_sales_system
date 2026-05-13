<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fruit extends Model
{
    protected $fillable =
    [
        'fruit_name',
        'category',
        'price_per_kg',
        'stock',
        'description',
        'availability'
    ];
}
