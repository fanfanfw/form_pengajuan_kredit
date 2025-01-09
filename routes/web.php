<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PengajuanKreditController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [ProductController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/registrasi-nasabah', [NasabahController::class, 'create'])->middleware('auth')->name('registrasi.nasabah');
Route::post('/registrasi-nasabah', [NasabahController::class, 'store'])->middleware('auth');

Route::get('/pengajuan-kredit', [PengajuanKreditController::class, 'create'])->middleware('auth')->name('pengajuan.kredit');
Route::post('/pengajuan-kredit', [PengajuanKreditController::class, 'store'])->middleware('auth');

Route::get('/daftar-pengajuan', [PengajuanKreditController::class, 'list'])->middleware('auth')->name('daftar.pengajuan');

Route::get('/pengajuan-kredit/{id}/edit', [PengajuanKreditController::class, 'editFrontend'])->middleware('auth')->name('pengajuan.edit');
Route::post('/pengajuan-kredit/{id}/update', [PengajuanKreditController::class, 'updateFrontend'])->middleware('auth')->name('pengajuan.update');


Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth')->name('products.create'); // Route untuk form create
Route::post('/products/store', [ProductController::class, 'store'])->middleware('auth')->name('products.store'); // Route untuk menyimpan produk

Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->middleware('auth')->name('products.edit'); // Route untuk form edit
Route::post('/products/{id}/update', [ProductController::class, 'update'])->middleware('auth')->name('products.update'); // Route untuk update produk