<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Basket\BasketController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Products\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminProductController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//User
Route::get('/', [IndexController::class, 'index']);

Route::get('/products', [ProductController::class, 'store']);
Route::get('/product/{id}', [ProductController::class, 'show']);

Route::post('/register', [RegisterController::class, 'register']);
Route::get('/register', [RegisterController::class, 'register']);

Route::post('/login', [LoginController::class, 'login']);
Route::get('/login', [LoginController::class, 'login']);

Route::get('/basket', [BasketController::class, 'store']);

//Admin
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/admin', [AdminHomeController::class, 'index']);
    Route::get('/admin/products', [AdminProductController::class, 'store']);

});







