<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [IndexController::class, 'index']);
Route::get('/products', [ProductController::class, 'store']);
Route::get('/product/{id}', [ProductController::class, 'showOneProduct']);

Route::get('/login', [ProductController::class, 'login']);
Route::post('/register', [RegisterController::class, 'store']);




