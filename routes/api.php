<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\Product\AdminAddProductController;
use App\Http\Controllers\Admin\Product\AdminDeleteProductController;
use App\Http\Controllers\Admin\Product\AdminProductController;
use App\Http\Controllers\Admin\Product\AdminUpdateProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Basket\BasketController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Basket\BasketAddController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//User
Route::get('/', [IndexController::class, 'index']);

Route::post('/register', [RegisterController::class, 'register']);
Route::get('/register', [RegisterController::class, 'register']);

Route::post('/login', [LoginController::class, 'login']);
Route::get('/login', [LoginController::class, 'login']);
//Товары
Route::get('/products', [ProductController::class, 'store']);
Route::get('/product/{id}', [ProductController::class, 'show']);
//Корзина
Route::get('/basket', [BasketController::class, 'store']);
Route::post('/basket/add', [BasketAddController::class, 'store']);

//Admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminHomeController::class, 'index']);
    Route::get('/products', [AdminProductController::class, 'store']);
    Route::get('/product/add', [AdminAddProductController::class, 'store']);
    Route::get('/product/update', [AdminUpdateProductController::class, 'store']);
    Route::get('/product/delete', [AdminDeleteProductController::class, 'store']);
});







