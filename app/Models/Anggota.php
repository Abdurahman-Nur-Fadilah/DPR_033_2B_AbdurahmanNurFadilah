<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';        
    protected $primaryKey = 'id_anggota';  
    public $timestamps = false;            

    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'gelar_depan',
        'gelar_belakang',
        'jabatan',
        'status_pernikahan',
        'jumlah_anak',
    ];

    public function penggajian()
    {
        return $this->hasMany(Penggajian::class, 'id_anggota', 'id_anggota');
    }


    public function getTakeHomePayAttribute()
    {
        return $this->penggajian()
        ->with('komponen')
        ->get()
        ->sum(function ($p) {
            return (int) ($p->komponen->nominal ?? 0);
        });
    }
}
