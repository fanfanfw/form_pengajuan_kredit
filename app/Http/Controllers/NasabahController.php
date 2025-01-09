<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nasabah;
use Illuminate\Support\Facades\Log;

class NasabahController extends Controller
{
    public function index()
    {
        return response()->json(Nasabah::all());
    }

//     public function store(Request $request)
// {
//     Log::info('Request Data:', $request->all());
    
//     try {
//         $request->validate([
//             'nama' => 'required',
//             'alamat' => 'required',
//             'no_telepon' => 'required',
//             'no_ktp' => 'required|unique:nasabah',
//         ]);
//         Log::info('Validation Passed');
        
//         $nasabah = Nasabah::create($request->all());
//         Log::info('Nasabah Created:', $nasabah->toArray());
        
//         return response()->json($nasabah, 201);
//     } catch (\Exception $e) {
//         Log::error('Error Creating Nasabah:', ['error' => $e->getMessage()]);
//         return response()->json(['error' => $e->getMessage()], 500);
//     }
// }

    public function create()
    {
        return view('nasabah.registrasi');
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

    return redirect()->route('dashboard')->with('success', 'Nasabah berhasil didaftarkan.');
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
        $nasabah->update($request->all());
        return response()->json($nasabah);
    }

    public function destroy($id)
    {
        Nasabah::destroy($id);
        return response()->json(null, 204);
    }
    public function dashboard()
{
    if (!auth()->check()) {
        dd('User not logged in');
    }
    $user = auth()->user();
    $nasabah = Nasabah::all();
    return view('nasabah.dashboard', compact('nasabah', 'user'));
}

}
