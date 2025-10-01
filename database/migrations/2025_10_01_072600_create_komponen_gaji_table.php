<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('komponen_gaji', function (Blueprint $table) {
            $table->bigIncrements('id_komponen_gaji');
            $table->string('nama_komponen', 100);
            $table->enum('kategori', ['Gaji Pokok', 'Tunjangan Melekat', 'Tunjangan Lain']);
            $table->enum('jabatan', ['Ketua', 'Wakil Ketua', 'Anggota', 'Semua']);
            $table->decimal('nominal', 17, 2);
            $table->enum('satuan', ['Bulan', 'Hari', 'Periode']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('komponen_gaji');
    }
};
