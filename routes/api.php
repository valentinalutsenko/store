<?php

use App\Http\Controllers\Admin\Order\AdminOrderShowController;
use App\Http\Controllers\Products\ProductAllController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\Product\AdminAddProductController;
use App\Http\Controllers\Admin\Product\AdminDeleteProductController;
use App\Http\Controllers\Admin\Product\AdminProductController;
use App\Http\Controllers\Admin\Product\AdminUpdateProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Basket\OrderSaveController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Basket\BasketAddController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//User
Route::get('/', [IndexController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
//Товары
Route::get('/products', [ProductAllController::class, 'store']);
Route::get('/product/{id}', [ProductController::class, 'store']);
//Корзина
Route::post('/basket/add', [BasketAddController::class, 'store']);
Route::post('/basket/saveOrder', [OrderSaveController::class, 'store'] );
//Admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminHomeController::class, 'index']);
    Route::get('/products', [AdminProductController::class, 'show']);
    Route::post('/product/add', [AdminAddProductController::class, 'store']);
    Route::post('/product/update', [AdminUpdateProductController::class, 'store']);
    Route::post('/product/delete', [AdminDeleteProductController::class, 'store']);
    Route::get('/order/orderItems', [AdminOrderShowController::class, 'show']);
});







