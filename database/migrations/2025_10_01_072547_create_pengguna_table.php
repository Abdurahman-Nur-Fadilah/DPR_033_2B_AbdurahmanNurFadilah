<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->bigIncrements('id_pengguna');
            $table->string('username', 15)->unique();
            $table->string('password', 128);
            $table->string('email', 255)->unique();
            $table->string('nama_depan', 100);
            $table->string('nama_belakang', 100);
            $table->enum('role', ['Admin', 'Public']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};
