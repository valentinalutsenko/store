<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\DashboardController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [IndexController::class, 'index']);

Route::get('/products', [ProductController::class, 'store']);
Route::get('/product/{id}', [ProductController::class, 'showOneProduct']);

Route::post('/register', [RegisterController::class, 'register']);

Route::post('/login', [LoginController::class, 'login']);
Route::get('/dashboard', [DashboardController::class, 'dashboard']);







