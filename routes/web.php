<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\penerimaanController;
use App\Http\Controllers\stokController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [loginController::class, 'register']);
Route::get('/login', [loginController::class, 'showLogin'])->name('login');
Route::post('/login', [loginController::class, 'login']);
Route::get('/logout', [loginController::class, 'logout'])->name('logout');

Route::get('/gudang/dashboard', [dashboardController::class, 'gudang']);
Route::get('/gudang/lap_penerimaan', [penerimaanController::class, 'lap_penerimaan']);
Route::post('/penerimaan', [penerimaanController::class, 'store'])->name('penerimaan.store');

Route::get('/gudang/lap_stok', [stokController::class, 'index'])->name('stok.index');
Route::get('/gudang/stok/edit/{id}', [stokController::class, 'edit'])->name('stok.edit');
Route::put('/gudang/stok/update/{id}', [stokController::class, 'update'])->name('stok.update');

Route::get('/admin/dashboard', [dashboardController::class, 'admin']);
Route::get('/pusat/dashboard', [dashboardController::class, 'pusat']);
