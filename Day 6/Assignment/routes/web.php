<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\ClassController;


Route::get('class', [ClassController::class, 'index'])->name('class.index');
Route::get('class/create', [ClassController::class, 'create'])->name('class.create');
Route::post('class', [ClassController::class, 'store'])->name('class.store');
Route::get('class/{id}', [ClassController::class, 'edit'])->name('class.edit');
Route::put('class/{id}', [ClassController::class, 'update'])->name('class.update');
Route::delete('class/{id}', [ClassController::class, 'destroy'])->name('class.destroy');

Route::get('test/{id}', function($id) {

});