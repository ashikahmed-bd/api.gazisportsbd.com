<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;


Route::get('/categories', [CategoryController::class, 'getCategories']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/search', [HomeController::class, 'search']);
Route::get('/shop', [HomeController::class, 'getShop']);
Route::get('/products/{product:slug}', [ProductController::class, 'getProductBySlug']);
Route::get('/pages/{page:slug}', [PageController::class, 'getPage']);

Route::get('settings', [SettingsController::class, 'index']);

Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index']);
    Route::post('/', [CartController::class, 'store']);
    Route::put('/items/{item}', [CartController::class, 'update']);
    Route::delete('/items/{item}', [CartController::class, 'destroy']);
    Route::delete('/clear', [CartController::class, 'clear']);
    Route::post('coupon/apply', [CartController::class, 'couponApply']);
    Route::put('/shipping', [CartController::class, 'shipping']);
});

Route::post('checkout', [CheckoutController::class, 'store']);

// Public authentication routes
Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('forgot', [AuthController::class, 'forgot']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});


Route::prefix('v1')->middleware('auth:sanctum')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index']);

    // Categories
    Route::get('categories', [CategoryController::class, 'index']);
    Route::post('categories', [CategoryController::class, 'store']);
    Route::get('categories/{category}', [CategoryController::class, 'show']);
    Route::put('categories/{category}', [CategoryController::class, 'update']);
    Route::delete('categories/{category}', [CategoryController::class, 'destroy']);
    Route::post('categories/{category}/media', [CategoryController::class, 'media']);
    Route::get('search/categories', [CategoryController::class, 'search']);

    // Brands
    Route::get('brands', [BrandController::class, 'index']);
    Route::post('brands', [BrandController::class, 'store']);
    Route::get('brands/{brand}', [BrandController::class, 'show']);
    Route::put('brands/{brand}', [BrandController::class, 'update']);
    Route::delete('brands/{brand}', [BrandController::class, 'destroy']);
    Route::post('brands/{brand}/logo', [BrandController::class, 'logo']);
    Route::get('search/brands', [BrandController::class, 'search']);

    // Leagues
    Route::get('leagues', [LeagueController::class, 'index']);
    Route::post('leagues', [LeagueController::class, 'store']);
    Route::get('leagues/{league}', [LeagueController::class, 'show']);
    Route::put('leagues/{league}', [LeagueController::class, 'update']);
    Route::delete('leagues/{league}', [LeagueController::class, 'destroy']);
    Route::post('leagues/{league}/logo', [LeagueController::class, 'logo']);
    Route::get('search/leagues', [LeagueController::class, 'search']);

    // Clubs
    Route::get('clubs', [ClubController::class, 'index']);
    Route::post('clubs', [ClubController::class, 'store']);
    Route::get('clubs/{club}', [ClubController::class, 'show']);
    Route::put('clubs/{club}', [ClubController::class, 'update']);
    Route::delete('clubs/{club}', [ClubController::class, 'destroy']);
    Route::post('clubs/{club}/logo', [ClubController::class, 'logo']);
    Route::get('search/clubs', [ClubController::class, 'search']);

    // Products
    Route::get('products', [ProductController::class, 'index']);
    Route::post('products', [ProductController::class, 'store']);
    Route::get('products/{product}', [ProductController::class, 'show']);
    Route::put('products/{product}', [ProductController::class, 'update']);
    Route::delete('products/{product}', [ProductController::class, 'destroy']);
    Route::get('search/products', [ProductController::class, 'search']);
    Route::post('products/{product}/media', [ProductController::class, 'media']);
    Route::post('products/{product}/variants', [ProductController::class, 'variants']);

    // Banners
    Route::get('banners', [BannerController::class, 'index']);
    Route::post('banners', [BannerController::class, 'store']);
    Route::get('banners/{banner}', [BannerController::class, 'show']);
    Route::put('banners/{banner}', [BannerController::class, 'update']);
    Route::delete('banners/{banner}', [BannerController::class, 'destroy']);
    Route::post('banners/{banner}/image', [BannerController::class, 'image']);


    // Coupons
    Route::get('coupons', [CouponController::class, 'index']);
    Route::post('coupons', [CouponController::class, 'store']);
    Route::get('coupons/{coupon}', [CouponController::class, 'show']);
    Route::put('coupons/{coupon}', [CouponController::class, 'update']);
    Route::delete('coupons/{coupon}', [CouponController::class, 'destroy']);

    // Pages
    Route::get('pages', [PageController::class, 'index']);
    Route::get('pages/{page:slug}', [PageController::class, 'show']);
    Route::put('pages/{page:slug}', [PageController::class, 'update']);


    // Orders
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('orders/{order:order_no}', [OrderController::class, 'show']);
    Route::put('orders/{order:order_no}', [OrderController::class, 'update']);
    Route::delete('orders/{order:order_no}', [OrderController::class, 'destroy']);

    Route::prefix('settings')->group(function () {

        Route::get('/', [SettingsController::class, 'index']);
        Route::post('general', [SettingsController::class, 'general']);
        Route::post('contact', [SettingsController::class, 'contact']);
        Route::post('popup', [SettingsController::class, 'popup']);

        Route::post('seed', [SettingsController::class, 'seed']);
        Route::post('reboot', [SettingsController::class, 'reboot']);
        Route::post('storage-link', [SettingsController::class, 'storageLink']);
    });
});
