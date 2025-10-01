<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pengguna')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'email' => 'admin@example.com',
                'nama_depan' => 'Admin',
                'nama_belakang' => 'Sistem',
                'role' => 'Admin',
            ],
            [
                'username' => 'user1',
                'password' => Hash::make('user123'),
                'email' => 'user1@example.com',
                'nama_depan' => 'Budi',
                'nama_belakang' => 'Santoso',
                'role' => 'Public',
            ],
        ]);
    }
}
