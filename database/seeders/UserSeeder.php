<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Naruto',
            'email' => 'naruto@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Sasuke',
            'email' => 'sasuke@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Sakura',
            'email' => 'sakura@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}