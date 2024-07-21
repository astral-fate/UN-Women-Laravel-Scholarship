<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clas extends Model
{
    use HasFactory;

    protected $table = 'classes'; // Add this line to specify the correct table name

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
?>
