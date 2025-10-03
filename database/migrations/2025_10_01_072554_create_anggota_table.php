<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->bigIncrements('id_anggota');
            $table->string('nama_depan', 100);
            $table->string('nama_belakang', 100);
            $table->string('gelar_depan', 50)->nullable();
            $table->string('gelar_belakang', 50)->nullable();
            $table->enum('jabatan', ['Ketua', 'Wakil Ketua', 'Anggota']);
            $table->enum('status_pernikahan', ['Kawin', 'Belum Kawin', 'Cerai Hidup', 'Cerai Mati']);
            $table->integer('jumlah_anak')->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anggota');
    }
};
