<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Nasabah;

class NasabahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) { // Misal kita buat 10 data
            Nasabah::create([
                'nama' => 'Nasabah ' . $i,
                'alamat' => 'Alamat ' . $i,
                'no_telepon' => '0812' . rand(10000000, 99999999),
                'no_ktp' => rand(1000000000000000, 9999999999999999),
                'no_registrasi' => $this->generateNoRegistrasi(),
            ]);
        }
    }

    /**
     * Generate unique no_registrasi.
     */
    private function generateNoRegistrasi(): string
    {
        do {
            $noRegistrasi = 'NR' . str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        } while (Nasabah::where('no_registrasi', $noRegistrasi)->exists());

        return $noRegistrasi;
    }
}
