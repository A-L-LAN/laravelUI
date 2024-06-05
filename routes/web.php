<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/products/create', [ProductController::class, 'create'])->name('create.product');
Route::post('/products', [ProductController::class, 'store'])->name('store.product');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('show.product');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/products/create', [ProductController::class, 'create'])->name('create.product');
    Route::post('/products', [ProductController::class, 'store'])->name('store.product');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('destroy.product');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
