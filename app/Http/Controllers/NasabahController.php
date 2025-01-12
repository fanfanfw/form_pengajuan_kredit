<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nasabah;

class NasabahController extends Controller
{
    public function index()
    {
        return response()->json(Nasabah::all());
    }

    public function create()
    {
        return view('nasabah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string',
            'no_ktp' => 'required|string|unique:nasabah,no_ktp',
        ]);

        // Generate no_registrasi unik
        $noRegistrasi = $this->generateNoRegistrasi();

        // Simpan data nasabah
        Nasabah::create([
            'no_registrasi' => $noRegistrasi,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'no_ktp' => $request->no_ktp,
        ]);

        return redirect()->route('nasabah.dashboard')->with('success', 'Nasabah berhasil didaftarkan.');
    }

    private function generateNoRegistrasi()
    {
        do {
            $noRegistrasi = 'NR' . str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        } while (Nasabah::where('no_registrasi', $noRegistrasi)->exists());

        return $noRegistrasi;
    }

    public function show($id)
    {
        return response()->json(Nasabah::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $nasabah = Nasabah::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string',
            'no_ktp' => 'required|string|unique:nasabah,no_ktp,' . $nasabah->id,
        ]);

        // Update data nasabah (no_registrasi tidak berubah)
        $nasabah->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'no_ktp' => $request->no_ktp,
        ]);

        return redirect()->route('nasabah.dashboard')->with('success', 'Data Nasabah berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $nasabah = Nasabah::findOrFail($id);
    
        // Cek apakah nasabah memiliki relasi dengan pengajuan kredit
        if ($nasabah->pengajuanKredit()->exists()) {
            return redirect()->route('nasabah.dashboard')->with('error', 'Data nasabah tidak dapat dihapus karena memiliki pengajuan kredit yang terkait.');
        }
    
        $nasabah->delete();
    
        return redirect()->route('nasabah.dashboard')->with('success', 'Data nasabah berhasil dihapus.');
    }

    public function dashboard()
    {
        $user = auth()->user();
        
        // Mengambil nasabah beserta jumlah pengajuan kredit
        $nasabahs = Nasabah::withCount('pengajuanKredit')->orderBy('created_at', 'desc')->get();
        
        return view('nasabah.dashboard', compact('nasabahs', 'user'));
    }

    public function edit($id)
    {
        $nasabah = Nasabah::findOrFail($id);
        return view('nasabah.edit', compact('nasabah'));
    }
}
