<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\dashboardController;

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
Route::get('/admin/dashboard', [dashboardController::class, 'admin']);
Route::get('/pusat/dashboard', [dashboardController::class, 'pusat']);
