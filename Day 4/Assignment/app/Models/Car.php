<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'carTitle',
        'description',
        'price',
        'published',
        'capacity',
        'is_filled',
        'date_from',
        'date_to',
    ];
}