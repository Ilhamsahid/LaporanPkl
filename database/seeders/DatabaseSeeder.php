<?php

namespace Database\Seeders;

use App\Models\Pembimbing;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Pembimbing::create([
            'nama' => 'Ilham',
            'nip' => 196787764,
            'password' => Hash::make('password'),
        ]);
    }
}
