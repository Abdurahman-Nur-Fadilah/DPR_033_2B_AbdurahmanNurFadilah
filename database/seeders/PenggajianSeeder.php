<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenggajianSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('penggajian')->insert([
            'id_komponen_gaji' => 1,
            'id_anggota' => 1,
        ]);

        DB::table('penggajian')->insert([
            'id_komponen_gaji' => 2,
            'id_anggota' => 2,
        ]);
    }
}
