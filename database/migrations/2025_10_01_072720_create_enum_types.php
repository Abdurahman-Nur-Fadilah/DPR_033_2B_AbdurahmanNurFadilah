<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("CREATE TYPE role_pengguna AS ENUM ('Admin', 'Public')");
        DB::statement("CREATE TYPE jabatan_anggota AS ENUM ('Ketua', 'Wakil Ketua', 'Anggota')");
        DB::statement("CREATE TYPE status_pernikahan AS ENUM ('Kawin', 'Belum Kawin', 'Cerai Hidup', 'Cerai Mati')");
        DB::statement("CREATE TYPE kategori_komponen AS ENUM ('Gaji Pokok', 'Tunjangan Melekat', 'Tunjangan Lain')");
        DB::statement("CREATE TYPE jabatan_komponen AS ENUM ('Ketua', 'Wakil Ketua', 'Anggota', 'Semua')");
        DB::statement("CREATE TYPE satuan_komponen AS ENUM ('Bulan', 'Hari', 'Periode')");
    }

    public function down(): void
    {
        DB::statement('DROP TYPE IF EXISTS role_pengguna');
        DB::statement('DROP TYPE IF EXISTS jabatan_anggota');
        DB::statement('DROP TYPE IF EXISTS status_pernikahan');
        DB::statement('DROP TYPE IF EXISTS kategori_komponen');
        DB::statement('DROP TYPE IF EXISTS jabatan_komponen');
        DB::statement('DROP TYPE IF EXISTS satuan_komponen');
    }
};
