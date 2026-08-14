<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemsController;
use Illuminate\Support\Facades\Route;

Route::get('/', DashboardController::class)->name('dashboard');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');
    Route::post('/admin/users', [AdminController::class, 'store'])->name('admin.users.store');
    Route::post('/news', [ItemsController::class, 'storeNews'])->name('news.store');
    Route::get('/news', [ItemsController::class, 'indexNews'])->name('news.index');
    Route::get('/news/{id}', [ItemsController::class, 'showNews'])->name('news.show');
    Route::get('/news/{id}/edit', [ItemsController::class, 'editNews'])->name('news.edit');
    Route::put('/news/{id}', [ItemsController::class, 'updateNews'])->name('news.update');
    Route::delete('/news/{id}', [ItemsController::class, 'destroyNews'])->name('news.destroy');
});

Route::get('/items', [ItemsController::class, 'index'])->name('items');
Route::get('/items/upload', [ItemsController::class, 'create'])->name('items.upload');
Route::post('/items', [ItemsController::class, 'store'])->name('items.store');
Route::post('/categories', [ItemsController::class, 'storeCategory'])->name('categories.store');
Route::get('/categories/{slug}', [ItemsController::class, 'show'])->name('categories.show');
Route::get('/uploads/{id}', [ItemsController::class, 'showUpload'])->name('uploads.show');
Route::get('/uploads/{id}/edit', [ItemsController::class, 'edit'])->name('uploads.edit');
Route::put('/uploads/{id}', [ItemsController::class, 'update'])->name('uploads.update');
Route::delete('/uploads/{id}', [ItemsController::class, 'destroy'])->name('uploads.destroy');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
