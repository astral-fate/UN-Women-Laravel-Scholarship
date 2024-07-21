<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassesController;

Route::get('/add_car', [ClassesController::class, 'create'])->name('cars.create');
Route::post('/cars', [ClassesController::class, 'store'])->name('cars.store');
?>
