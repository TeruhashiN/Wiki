<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/items', [ItemsController::class, 'index'])->name('items');
Route::get('/items/upload', [ItemsController::class, 'create'])->name('items.upload');
Route::post('/items', [ItemsController::class, 'store'])->name('items.store');
Route::post('/categories', [ItemsController::class, 'storeCategory'])->name('categories.store');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

