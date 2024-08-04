<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\ClassController;


Route::get('classes', [ClassController::class, 'index'])->name('classes.index');
Route::get('classes/create', [ClassController::class, 'create'])->name('classes.create');
Route::post('classes', [ClassController::class, 'store'])->name('classes.store');
Route::get('classes/{id}', [ClassController::class, 'edit'])->name('classes.edit');
Route::put('classes/{id}', [ClassController::class, 'update'])->name('classes.update');
Route::delete('classes/{id}', [ClassController::class, 'destroy'])->name('classes.destroy');


Route::patch('classes/{id}/restore', [ClassController::class, 'restore'])->name('classes.restore');
Route::delete('classes/{id}/force-delete', [ClassController::class, 'forceDelete'])->name('classes.forceDelete');

Route::get('classes/trashed', [ClassController::class, 'showDeleted'])->name('classes.trashed');



Route::get('uploadForm', [ExampleController::class, 'uploadForm'])->name('uploadForm');
Route::post('upload', [ExampleController::class, 'upload'])->name('upload');

;