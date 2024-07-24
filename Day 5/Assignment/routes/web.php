<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\ClasController;


Route::get('class', [ClasController::class, 'index']);
Route::get('class/create', [ClasController::class, 'create']);
Route::post('class', [ClasController::class, 'store'])->name('class.store');
Route::get('cars/{id}', [ClasController::class, 'edit'])->name('class.edit');


Route::get('test/{id}', function($id) {

});