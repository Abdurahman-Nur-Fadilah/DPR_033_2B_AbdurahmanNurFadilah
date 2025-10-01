<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenggajianSeeder extends Seeder
{
    public function run(): void
    {
        // Misal Ahmad (id_anggota = 1) dapat Gaji Pokok Ketua (id_komponen_gaji = 1)
        DB::table('penggajian')->insert([
            'id_komponen_gaji' => 1,
            'id_anggota' => 1,
        ]);

        // Siti (id_anggota = 2) dapat Tunjangan Transport (id_komponen_gaji = 2)
        DB::table('penggajian')->insert([
            'id_komponen_gaji' => 2,
            'id_anggota' => 2,
        ]);
    }
}
