<?php

use Illuminate\Support\Facades\Route;

Route::get('welcome', function () {
    return "welcome to laravel";
})->name('w');

Route::get('goodbye', function () {
    return "goodbye to laravel";
})->name('g');

Route::get('contact', function () {
    return view('contact');
});

Route::post('/logindone', function(){
    return 'data sumbited correctly';
    return view('logincheck');
}) ->name('logindone');
