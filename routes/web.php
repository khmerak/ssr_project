<?php

use App\Http\Controllers\API\CategoryController as APICategoryController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\dashboardController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\backend\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

Route::get('/addproduct', [ProductController::class, 'index'])->name('addProduct');
Route::get('/product', [ProductController::class, 'product'])->name('product');
Route::get('/addcategory', [APICategoryController::class, 'index'])->name('addCategory');
