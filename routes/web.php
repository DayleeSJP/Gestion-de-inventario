<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pos.index');
});

Route::get('/pos', function () {
    return view('pos.checkout');
});

Route::get('/history', function () {
    return view('pos.history');
});

Route::get('/products', function () {
    return view('pos.products');
});

Route::get('/categories', function () {
    return view('pos.categories');
});

Route::get('/reports', function () {
    return view('pos.reports');
});

Route::get('/reports/sales', function () {
    return view('pos.reports.sales');
});

Route::get('/reports/inventory', function () {
    return view('pos.reports.inventory');
});

Route::get('/users', function () {
    return view('pos.users');
});

Route::get('/roles', function () {
    return view('pos.roles');
});

Route::get('/profile', function () {
    return view('pos.profile');
});

// --- API Routes ---
Route::prefix('api')->group(function () {
    Route::apiResource('roles', \App\Http\Controllers\Api\RoleController::class);
    Route::apiResource('users', \App\Http\Controllers\Api\UserController::class);
    Route::apiResource('categories', \App\Http\Controllers\Api\CategoryController::class);
    Route::apiResource('products', \App\Http\Controllers\Api\ProductController::class);
});
