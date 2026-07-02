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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/pos', [PosController::class, 'index'])->name('pos');
Route::get('/history', [OrderController::class, 'index'])->name('history');
Route::post('/orders/{order}/mark-paid', [OrderController::class, 'markPaid'])->name('orders.markPaid');
Route::get('/orders/{order}/ticket', [OrderController::class, 'showTicket'])->name('orders.ticket');
Route::post('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
Route::post('/pos/checkout', [PosController::class, 'store'])->name('pos.store');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/reports/sales', [ReportController::class, 'sales'])->name('reports.sales');
Route::get('/reports/inventory', [ReportController::class, 'inventory'])->name('reports.inventory');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
