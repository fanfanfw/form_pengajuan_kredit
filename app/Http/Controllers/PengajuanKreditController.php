<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanKredit;
use App\Models\Nasabah;
use App\Models\Product;
use App\Models\User;

class PengajuanKreditController extends Controller
{
    public function dashboard()
    {
        $products = Product::all();
        $user = auth()->user();
        $pengajuans = PengajuanKredit::with(['nasabah', 'product'])->latest()->orderBy('created_at','desc')->get();
        return view('pengajuan.dashboard', compact('pengajuans', 'user', 'products'));
    }

    public function create()
    {
        $nasabahs = Nasabah::all();
        $products = Product::all();
        return view('pengajuan.create', compact('nasabahs', 'products'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nasabah_id' => 'required|exists:nasabah,id',
        'product_id' => 'required|exists:products,id',
        'tanggal_pengajuan' => 'required|date',
        'jaminan' => 'required|string|max:255',
        'jumlah_pengajuan' => 'required|string|min:0',
    ]);

    // Parsing jumlah_pengajuan untuk menghapus titik (delimiter ribuan)
    $jumlahPengajuan = (int) str_replace('.', '', $request->jumlah_pengajuan);

    $materai = 10000; // Biaya materai tetap
    $asuransi = $jumlahPengajuan * 0.01; // 1% dari jumlah pengajuan
    $totalPotongan = $materai + $asuransi;

    $jumlahACC = $jumlahPengajuan - $totalPotongan;

    PengajuanKredit::create([
        'nasabah_id' => $request->nasabah_id,
        'product_id' => $request->product_id,
        'tanggal_pengajuan' => $request->tanggal_pengajuan,
        'jaminan' => $request->jaminan,
        'jumlah_pengajuan' => $jumlahPengajuan,
        'jumlah_acc' => max($jumlahACC, 0),
    ]);

    return redirect()->route('pengajuan.dashboard')->with('success', 'Pengajuan kredit berhasil diajukan.');
}


    public function edit($id)
    {
        $pengajuan = PengajuanKredit::findOrFail($id);
        $nasabahs = Nasabah::all();
        $products = Product::all();
        return view('pengajuan.edit', compact('pengajuan', 'nasabahs', 'products'));

    }

    public function update(Request $request, $id)
{
    $pengajuan = PengajuanKredit::findOrFail($id);

    $request->validate([
        'tanggal_pengajuan' => 'required|date',
        'product_id' => 'required|exists:products,id',
        'jaminan' => 'required|string|max:255',
        'jumlah_pengajuan' => 'required|string|min:0',
    ]);

    // Parsing jumlah_pengajuan untuk menghapus delimiter ribuan
    $jumlahPengajuan = (int) str_replace('.', '', $request->jumlah_pengajuan);

    $materai = 10000; // Biaya materai tetap
    $asuransi = $jumlahPengajuan * 0.01; // 1% dari jumlah pengajuan
    $jumlahACC = $jumlahPengajuan - $materai - $asuransi;

    $pengajuan->update([
        'tanggal_pengajuan' => $request->tanggal_pengajuan,
        'product_id' => $request->product_id,
        'jaminan' => $request->jaminan,
        'jumlah_pengajuan' => $jumlahPengajuan,
        'jumlah_acc' => max($jumlahACC, 0),
    ]);

    return redirect()->route('pengajuan.dashboard')->with('success', 'Pengajuan berhasil diperbarui.');
}


    public function destroy($id)
    {
        $pengajuan = PengajuanKredit::findOrFail($id);
        $pengajuan->delete();

        return redirect()->route('pengajuan.dashboard')->with('success', 'Pengajuan kredit berhasil dihapus.');
    }

    public function updateStatus(Request $request, $id)
{
    $pengajuan = PengajuanKredit::findOrFail($id);

    $request->validate([
        'status' => 'required|string|in:approved,rejected',
    ]);

    $pengajuan->update([
        'status' => $request->status,
    ]);

    return redirect()->route('pengajuan.dashboard')->with('success', 'Status pengajuan berhasil diperbarui.');
}

public function createWithNasabah($nasabah_id)
{
    $nasabah = Nasabah::findOrFail($nasabah_id);
    $products = Product::all();
    $user = auth()->user();

    return view('pengajuan.create', compact('nasabah', 'products', 'user'));
}


}
