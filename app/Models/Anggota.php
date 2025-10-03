<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';          // nama tabel di DB
    protected $primaryKey = 'id_anggota';  // primary key
    public $timestamps = false;            // karena tabel kita gak ada created_at, updated_at

    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'gelar_depan',
        'gelar_belakang',
        'jabatan',
        'status_pernikahan',
        'jumlah_anak',
    ];
}
