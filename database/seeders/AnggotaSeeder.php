<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnggotaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('anggota')->insert([
            [
                'nama_depan' => 'Ahmad',
                'nama_belakang' => 'Hidayat',
                'gelar_depan' => 'Dr.',
                'gelar_belakang' => '',
                'jabatan' => 'Ketua',
                'status_pernikahan' => 'Kawin',
            ],
            [
                'nama_depan' => 'Siti',
                'nama_belakang' => 'Rahmawati',
                'gelar_depan' => '',
                'gelar_belakang' => 'S.H.',
                'jabatan' => 'Anggota',
                'status_pernikahan' => 'Belum Kawin',
            ],
        ]);
    }
}
