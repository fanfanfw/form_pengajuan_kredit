<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Simanis',
            'description' => 'Pinjaman bunga rendah',
        ]);

        Product::create([
            'name' => 'Serbaguna',
            'description' => 'Pinjaman untuk kebutuhan umu',
        ]);

        Product::create([
            'name' => 'SiLambat',
            'description' => 'Pinjaman untuk kebutuhan besar tapi lambat',
        ]);

        Product::create([
            'name' => 'SiCepat',
            'description' => 'Pinjaman untuk kebutuhan kecil dengan cepat',
        ]);

        Product::create([
            'name' => 'Deposito',
            'description' => 'Menyimpan uang dengan waktu tertentu dan bunga besar',
        ]);

        Product::create([
            'name' => 'Tabungan',
            'description' => 'Tabungan masa masa depan',
        ]);
    }
}