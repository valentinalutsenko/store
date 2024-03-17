<?php

use App\Http\Controllers\Admin\Order\AdminOrderShowController;
use App\Http\Controllers\Admin\Product\AdminProductController;
use App\Http\Controllers\Auth\Login\LoginUserController;
use App\Http\Controllers\Auth\Logout\LogoutController;
use App\Http\Controllers\Auth\Register\RegisterController;
use App\Http\Controllers\Basket\BasketAddController;
use App\Http\Controllers\Basket\OrderSaveController;
use App\Http\Controllers\Products\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//User
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginUserController::class, 'login']);
Route::post('/logout', [LogoutController::class, 'logout']);
//Товары
Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'store']);
//Корзина
Route::post('/basket/add', [BasketAddController::class, 'store']);
Route::post('/basket/saveOrder', [OrderSaveController::class, 'store']);
//Admin
Route::group(['prefix' => 'admin'], function () {
    Route::post('/login', [LoginUserController::class, 'login']);
    Route::get('/products', [AdminProductController::class, 'show']);
    Route::post('/product/add', [AdminProductController::class, 'add']);
    Route::post('/product/update', [AdminProductController::class, 'update']);
    Route::post('/product/delete', [AdminProductController::class, 'delete']);
    Route::get('/order/orderItems', [AdminOrderShowController::class, 'show']);
});
