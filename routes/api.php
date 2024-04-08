<?php

use App\Http\Controllers\Admin\Order\AdminOrderController;
use App\Http\Controllers\Admin\Product\AdminProductController;
use App\Http\Controllers\Auth\Login\LoginUserController;
use App\Http\Controllers\Auth\Logout\LogoutController;
use App\Http\Controllers\Auth\Register\RegisterController;
use App\Http\Controllers\Basket\BasketController;
use App\Http\Controllers\Order\OrderController;
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
Route::get('/product/{id}', [ProductController::class, 'show']);
//Корзина
Route::post('/basket/add', [BasketController::class, 'store']);
Route::delete('/basket/remove', [BasketController::class, 'destroy']);
Route::post('/order/createOrder', [OrderController::class, 'store']);
//Admin
Route::group(['prefix' => 'admin'], function () {
    Route::post('/login', [LoginUserController::class, 'login']);
    Route::get('/products', [AdminProductController::class, 'show']);
    Route::post('/product/create', [AdminProductController::class, 'store']);
    Route::put('/product/edit', [AdminProductController::class, 'edit']);
    Route::delete('/product/delete', [AdminProductController::class, 'destroy']);
    Route::post('/order/orderItems', [AdminOrderController::class, 'show']);
});
