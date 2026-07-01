<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/categories', [CategoryController::class, 'getCategories']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/search', [HomeController::class, 'search']);
Route::get('/shop', [HomeController::class, 'getShop']);
Route::get('/products/{product:slug}', [ProductController::class, 'getProductBySlug']);


Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index']);
    Route::post('/', [CartController::class, 'store']);
    Route::put('/items/{item}', [CartController::class, 'update']);
    Route::delete('/items/{item}', [CartController::class, 'destroy']);
    Route::delete('/clear', [CartController::class, 'clear']);
});

Route::post('checkout', [CheckoutController::class, 'store']);


// Public authentication routes
Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('forgot', [AuthController::class, 'forgot']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});
