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




Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
Route::get('/products/{product}/edit', [ProductsController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductsController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');

Route::get('/', [ProductsController::class, 'index']);
