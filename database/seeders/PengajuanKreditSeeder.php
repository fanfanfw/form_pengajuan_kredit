<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PengajuanKreditSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $data = [];

        for ($i = 1; $i <= 20; $i++) {
            $data[] = [
                'nasabah_id' => $faker->numberBetween(1, 20),
                'product_id' => $faker->numberBetween(1, 5),
                'tanggal_pengajuan' => $faker->date(),
                'jaminan' => $faker->word(),
                'jumlah_pengajuan' => $faker->randomFloat(2, 1000000, 10000000),
                'jumlah_acc' => $faker->randomFloat(2, 500000, 9000000),
                'status' => $faker->randomElement(['pending', 'approved', 'rejected']),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('pengajuan_kredit')->insert($data);
    }
}
