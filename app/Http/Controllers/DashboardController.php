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
        $totalProducts = Product::count();
        $totalNasabah = Nasabah::count();
        $totalPengajuan = PengajuanKredit::count();
        $recentProducts = Product::latest()->take(5)->get();
        $user = auth()->user();
        $products = Product::all();
    
        // Data untuk grafik
        $pengajuanKredit = PengajuanKredit::selectRaw('DATE_FORMAT(tanggal_pengajuan, "%Y-%m") as periode, COUNT(*) as total')
            ->groupBy('periode')
            ->orderBy('periode')
            ->pluck('total', 'periode');
    
        $registrasiNasabah = Nasabah::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as periode, COUNT(*) as total')
            ->groupBy('periode')
            ->orderBy('periode')
            ->pluck('total', 'periode');
    
        return view('index', compact(
            'products', 
            'user', 
            'totalProducts', 
            'totalNasabah', 
            'totalPengajuan', 
            'recentProducts', 
            'pengajuanKredit', 
            'registrasiNasabah'
        ));
    }
    

}
