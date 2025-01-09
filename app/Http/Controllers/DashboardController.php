<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Nasabah;
use App\Models\PengajuanKredit;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data untuk dashboard utama
        $totalProducts = Product::count();
        $totalNasabah = Nasabah::count();
        $totalPengajuan = PengajuanKredit::count();
        $recentProducts = Product::latest()->take(5)->get(); 
        $user = auth()->user();
        $products = Product::all();// 5 Produk terbaru

        return view('index', compact('products', 'user', 'totalProducts', 'totalNasabah', 'totalPengajuan', 'recentProducts'));
    }
}
