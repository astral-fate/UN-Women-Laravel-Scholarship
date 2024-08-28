<?php

use App\Http\Controllers\ExampleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('', function () {
    return view('welcome');
});

Route::get('contact-us', [ExampleController::class, 'login']);
Route::post('contact-us', [ExampleController::class, 'receive'])->name('data');

Route::group(['namespace' => 'App\\Http\\Controllers'], function () {
    //  CarController routes
    Route::resource('cars', 'CarController');
    Route::group([
        'prefix' => 'cars',
        'as' => 'cars.',
        'controller' => 'CarController',
    ], function () {
        Route::get('trashed/get', 'showDeleted')->name('showDeleted');
        Route::patch('{car}', 'restore')->name('restore');
        Route::put('{car}', 'update')->name('update');
        Route::delete('{car}/delete', 'forceDelete')->name('forceDelete');
    });

    // ExampleController routes
    Route::group([
        'controller' => 'ExampleController',
    ], function () {
        Route::get('uploadForm', 'uploadForm');
        Route::post('upload', 'upload')->name('upload');
        Route::get('index', 'index');
        Route::get('about', 'about');
    });
});

Auth::routes(['verify' => true]);
Route::get('testOneToOne', [ExampleController::class, 'test']);

Route::get('contact-us', [ContactController::class, 'show'])->name('contact.show');
Route::post('contact-us', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');