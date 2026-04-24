<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\LapPenjualanController;
use App\Http\Controllers\penerimaanController;
use App\Http\Controllers\stokController;
use App\Http\Controllers\penjualanController;
use App\Http\Controllers\stokBarangController;
use App\Http\Controllers\lapPenjualanPusatController;
use App\Http\Controllers\lapStokPusatController;


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
Route::get('/gudang/lap_penerimaan', [penerimaanController::class, 'lap_penerimaan'])->name('lapPenerimaan.index'); 

Route::get('/admin/dashboard', [dashboardController::class, 'admin']);
Route::get('/admin/penjualan', [penjualanController::class, 'penjualan']);
Route::post('/admin/penjualan', [penjualanController::class, 'store'])->name('penjualan.store');
Route::get('/admin/stok_barang', [stokBarangController::class, 'index'])->name('stokBarang.index');
Route::get('/admin/stok_barang/edit/{id}', [stokBarangController::class, 'edit'])->name('stokBarang.edit');
Route::put('/admin/stok_barang/update/{id}', [stokBarangController::class, 'update'])->name('stokBarang.update');
Route::get('/admin/lap_penjualan', [LapPenjualanController::class, 'index'])->name('lapPenjualan.index');
Route::post('/admin/lap_penjualan/store', [LapPenjualanController::class, 'store'])->name('lapPenjualan.store');

Route::get('/lap-penjualan', [LapPenjualanController::class, 'index'])->name('laporan');
Route::get('/penjualan', [penjualanController::class, 'penjualan']);
Route::post('/penjualan', [penjualanController::class, 'store'])->name('penjualan.store');
Route::get('/pusat/dashboard', [dashboardController::class, 'pusat']);

Route::get('/pusat/lap_penjualan', [lapPenjualanPusatController::class, 'index'])->name('lap_penjualan.index');
Route::get('/pusat/lap_stok', [lapStokPusatController::class, 'index'])->name('lap_stok.index');
// Route::get('/pusat/lap_penerimaan', [penerimaanController::class, 'lap_penerimaan'])->name('lapPenerimaan.index');  
