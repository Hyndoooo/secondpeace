<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk membuat 1 admin dan 1 pelanggan
     */
    public function run(): void
    {
        // Admin
        User::create([
            'username' => 'admin',
            'nama' => 'Sebastian',
            'email' => 'viviwulanseptiani@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'alamat' => 'Jl. Admin No. 1',
            'no_telepon' => '089664237779',
            'foto_profil' => null,
        ]);

        // Pelanggan
        User::create([
            'username' => 'pelanggan',
            'nama' => 'pelanggan',
            'email' => 'pelanggan@gmail.com',
            'password' => Hash::make('1'),
            'role' => 'pelanggan',
            'alamat' => 'Jl. Pelanggan No. 2',
            'no_telepon' => '089876543210',
            'foto_profil' => null,
        ]);
    }
}
