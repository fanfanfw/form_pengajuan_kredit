<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'ajb',
            'kategori' => 'Kredit'
        ]);

        Product::create([
            'name' => 'shm',
        ]);

        Product::create([
            'name' => 'bedas',
        ]);

        Product::create([
            'name' => 'serbaguna',
            'kategori' => 'Tabungan'
        ]);

        Product::create([
            'name' => 'simple',
            'kategori' => 'Tabungan'
        ]);

        Product::create([
            'name' => 'giro',
            'kategori' => 'Tabungan'
        ]);

        Product::create([
            'name' => 'dina',
            'kategori' => 'Deposito'
        ]);
    }
}