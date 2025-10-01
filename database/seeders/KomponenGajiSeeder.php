<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KomponenGajiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('komponen_gaji')->insert([
            [
                'nama_komponen' => 'Gaji Pokok Ketua',
                'kategori' => 'Gaji Pokok',
                'jabatan' => 'Ketua',
                'nominal' => 15000000.00,
                'satuan' => 'Bulan',
            ],
            [
                'nama_komponen' => 'Tunjangan Transport',
                'kategori' => 'Tunjangan Lain',
                'jabatan' => 'Semua',
                'nominal' => 2000000.00,
                'satuan' => 'Bulan',
            ],
        ]);
    }
}
