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

Route::resource('transaksi', TransaksiController::class);
Route::get('/transaksi/export/excel', [TransaksiController::class, 'export_excel'])->name('transaksi.export_excel');
Route::get('/transaksi/export/csv', [TransaksiController::class, 'export_csv'])->name('transaksi.export_csv');

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::resource('users', UserController::class);
});