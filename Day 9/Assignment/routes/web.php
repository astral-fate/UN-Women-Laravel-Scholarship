<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductsController::class);
Route::get('/index', [ProductsController::class, 'index']);

Route::get('/add_product', [ProductsController::class, 'create'])->name('products.add');
Route::post('/add_product', [ProductsController::class, 'store']);

Route::get('/products/add_product', [ProductsController::class, 'create'])->name('products.add_product');
Route::post('/products/add_product', [ProductsController::class, 'store']);


Route::get('/', [ProductsController::class, 'index']);
