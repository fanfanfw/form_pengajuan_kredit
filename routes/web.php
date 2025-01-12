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

Route::middleware('auth')->group(function () {
    Route::get('/products', [ProductController::class, 'dashboard'])->name('products.dashboard');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/nasabah', [NasabahController::class, 'dashboard'])->name('nasabah.dashboard');
    Route::get('/nasabah/create', [NasabahController::class, 'create'])->name('nasabah.create');
    Route::post('/nasabah/store', [NasabahController::class, 'store'])->name('nasabah.store');
    Route::get('/nasabah/{id}/edit', [NasabahController::class, 'edit'])->name('nasabah.edit');
    Route::put('/nasabah/{id}/update', [NasabahController::class, 'update'])->name('nasabah.update');
    Route::delete('/nasabah/{id}', [NasabahController::class, 'destroy'])->name('nasabah.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/pengajuan', [PengajuanKreditController::class, 'dashboard'])->name('pengajuan.dashboard');
    Route::get('/pengajuan/create/{nasabah_id}', [PengajuanKreditController::class, 'createWithNasabah'])->name('pengajuan.createWithNasabah');
    Route::post('/pengajuan/store', [PengajuanKreditController::class, 'store'])->name('pengajuan.store');
    Route::get('/pengajuan/{id}/edit', [PengajuanKreditController::class, 'edit'])->name('pengajuan.edit');
    Route::put('/pengajuan/{id}/', [PengajuanKreditController::class, 'update'])->name('pengajuan.update');
    Route::delete('/pengajuan/{id}', [PengajuanKreditController::class, 'destroy'])->name('pengajuan.destroy');
    Route::put('/pengajuan/{id}/update-status', [PengajuanKreditController::class, 'updateStatus'])->name('pengajuan.updateStatus');
});