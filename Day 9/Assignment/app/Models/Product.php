<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'ProductTitle',
        'description',
        'price',
        'published',
        'image'
    ];

    protected $casts = [
        'published' => 'boolean',
        'price' => 'float',
    ];
}