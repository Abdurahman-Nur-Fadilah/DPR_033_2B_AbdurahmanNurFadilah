<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penggajian', function (Blueprint $table) {
            $table->unsignedBigInteger('id_komponen_gaji');
            $table->unsignedBigInteger('id_anggota');
            $table->primary(['id_komponen_gaji', 'id_anggota']);

            $table->foreign('id_komponen_gaji')->references('id_komponen_gaji')->on('komponen_gaji');
            $table->foreign('id_anggota')->references('id_anggota')->on('anggota');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penggajian');
    }
};
