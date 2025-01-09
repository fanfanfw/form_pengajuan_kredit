<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PengajuanKreditController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Product
Route::get('/products', [ProductController::class, 'dashboard'])->middleware('auth')->name('products.dashboard');
Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth')->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->middleware('auth')->name('products.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->middleware('auth')->name('products.edit');
Route::post('/products/{id}/update', [ProductController::class, 'update'])->middleware('auth')->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->middleware('auth')->name('products.destroy');

// Nasabah
Route::get('/nasabah', [NasabahController::class, 'dashboard'])->middleware('auth')->name('nasabah.dashboard');
Route::get('/nasabah/create', [NasabahController::class, 'create'])->middleware('auth')->name('nasabah.create');
Route::post('/nasabah/store', [NasabahController::class, 'store'])->middleware('auth')->name('nasabah.store');
Route::get('/nasabah/{id}/edit', [NasabahController::class, 'edit'])->middleware('auth')->name('nasabah.edit');
Route::post('/nasabah/{id}/update', [NasabahController::class, 'update'])->middleware('auth')->name('nasabah.update');
Route::delete('/nasabah/{id}', [NasabahController::class, 'destroy'])->middleware('auth')->name('nasabah.destroy');

// Pengajuan Kredit
Route::get('/pengajuan', [PengajuanKreditController::class, 'dashboard'])->middleware('auth')->name('pengajuan.dashboard');
Route::get('/pengajuan/create', [PengajuanKreditController::class, 'create'])->middleware('auth')->name('pengajuan.create');
Route::post('/pengajuan/store', [PengajuanKreditController::class, 'store'])->middleware('auth')->name('pengajuan.store');
Route::get('/pengajuan/{id}/edit', [PengajuanKreditController::class, 'edit'])->middleware('auth')->name('pengajuan.edit');
Route::post('/pengajuan/{id}/update', [PengajuanKreditController::class, 'update'])->middleware('auth')->name('pengajuan.update');
Route::delete('/pengajuan/{id}', [PengajuanKreditController::class, 'destroy'])->middleware('auth')->name('pengajuan.destroy');