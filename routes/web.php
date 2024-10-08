<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication routes
Auth::routes();

// Additional routes
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/users', [UserController::class, 'index'])->name('users');

Route::resource('transaksi', TransaksiController::class);
Route::get('/transaksi/count', [TransaksiController::class, 'countTransaksi'])->name('transaksi.count');