<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Simanis',
            'description' => 'Pinjaman bunga rendah',
            'kategori' => 'Tabungan'
        ]);

        Product::create([
            'name' => 'Serbaguna',
            'description' => 'Pinjaman untuk kebutuhan umu',
            'kategori' => 'Kredit Pintar'
        ]);

        Product::create([
            'name' => 'SiLambat',
            'description' => 'Pinjaman untuk kebutuhan besar tapi lambat',
            'kategori' => 'Kredit Murah'
        ]);

        Product::create([
            'name' => 'SiCepat',
            'description' => 'Pinjaman untuk kebutuhan kecil dengan cepat',
            'kategori' => 'Tabungan'
        ]);

        Product::create([
            'name' => 'Deposito',
            'description' => 'Menyimpan uang dengan waktu tertentu dan bunga besar',
            'kategori' => 'Tabungan'
        ]);

        Product::create([
            'name' => 'Tabungan',
            'description' => 'Tabungan masa masa depan',
            'kategori' => 'Kredit Pintar'
        ]);
    }
}