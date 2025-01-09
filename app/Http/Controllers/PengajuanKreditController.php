<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanKredit;
use App\Models\Nasabah;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class PengajuanKreditController extends Controller
{
    //
    public function index()
    {
        return response()->json(PengajuanKredit::with(['nasabah', 'product'])->get());
    }

    public function store(Request $request)
{
    $request->validate([
        'nasabah_id' => 'required|exists:nasabah,id',
        'product_id' => 'required|exists:products,id',
        'tanggal_pengajuan' => 'required|date',
        'jaminan' => 'required|string',
        'jumlah_pengajuan' => 'required|numeric|min:0',
    ]);

    $materai = 10000; // Biaya materai tetap
    $asuransi = $request->jumlah_pengajuan * 0.01; // 1% dari jumlah pengajuan
    $totalPotongan = $materai + $asuransi;

    $jumlahACC = $request->jumlah_pengajuan - $totalPotongan;

    PengajuanKredit::create([
        'nasabah_id' => $request->nasabah_id,
        'product_id' => $request->product_id,
        'tanggal_pengajuan' => $request->tanggal_pengajuan,
        'jaminan' => $request->jaminan,
        'jumlah_pengajuan' => $request->jumlah_pengajuan,
        'jumlah_acc' => $jumlahACC > 0 ? $jumlahACC : 0,
    ]);

    return redirect()->route('dashboard')->with('success', 'Pengajuan kredit berhasil diajukan.');
}

    

    public function show($id)
    {
        return response()->json(PengajuanKredit::with(['nasabah', 'product'])->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $pengajuan = PengajuanKredit::findOrFail($id);
        $pengajuan->update($request->all());
        return response()->json($pengajuan);
    }

    public function destroy($id)
    {
        PengajuanKredit::destroy($id);
        return response()->json(null, 204);
    }

    public function create()
    {
        $nasabah = Nasabah::all();
        $products = Product::all();
        return view('pengajuan_kredit.create', compact('nasabah', 'products'));
    }

    public function list()
{
    $pengajuanKredits = PengajuanKredit::with(['nasabah', 'product'])->get();
    return view('pengajuan_kredit.index', compact('pengajuanKredits'));
}

public function editFrontend($id)
{
    $pengajuan = PengajuanKredit::findOrFail($id);
    return view('pengajuan_kredit.edit', compact('pengajuan'));
}

public function updateFrontend(Request $request, $id)
{
    $pengajuan = PengajuanKredit::findOrFail($id);

    $request->validate([
        'status' => 'required|string',
        'persetujuan' => 'nullable|string',
    ]);

    $pengajuan->update([
        'status' => $request->status,
        'persetujuan' => $request->persetujuan,
    ]);

    return redirect()->route('daftar.pengajuan')->with('success', 'Pengajuan kredit berhasil diperbarui.');
}

public function dashboard()
{
    $pengajuan = PengajuanKredit::with(['nasabah', 'product'])->get();
    return view('pengajuan.dashboard', compact('pengajuan'));
}



}
