<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;

// --- Auth Routes ---
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- Protected Routes ---
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/pos', [PosController::class, 'index'])->name('pos');
    Route::get('/history', [OrderController::class, 'index'])->name('history');
    Route::post('/orders/{order}/mark-paid', [OrderController::class, 'markPaid'])->name('orders.markPaid');
    Route::get('/orders/{order}/ticket', [OrderController::class, 'showTicket'])->name('orders.ticket');
    Route::post('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
    Route::post('/pos/checkout', [PosController::class, 'store'])->name('pos.store');
    
    Route::get('/products', function () {
        return view('pos.products');
    })->name('products.index');

    Route::get('/categories', function () {
        return view('pos.categories');
    })->name('categories.index');

    Route::get('/reports', function () {
        return view('pos.reports');
    })->name('reports.index');
    Route::get('/reports/sales', [ReportController::class, 'sales'])->name('reports.sales');
    Route::get('/reports/inventory', function () {
        return view('pos.reports.inventory');
    })->name('reports.inventory');

    Route::get('/users', function () {
        return view('pos.users');
    })->name('users.index');
    Route::get('/roles', function () {
        return view('pos.roles');
    })->name('roles.index');
    Route::get('/providers', function () {
        return view('pos.providers');
    })->name('providers.index');
    Route::get('/profile', function () {
        return view('pos.profile');
    })->name('profile');

    // --- API Routes ---
    Route::prefix('api')->group(function () {
        Route::apiResource('roles', \App\Http\Controllers\Api\RoleController::class);
        Route::apiResource('users', \App\Http\Controllers\Api\UserController::class);
        Route::apiResource('categories', \App\Http\Controllers\Api\CategoryController::class);
        Route::apiResource('products', \App\Http\Controllers\Api\ProductController::class);
        Route::apiResource('providers', \App\Http\Controllers\Api\ProviderController::class);
    });
});
