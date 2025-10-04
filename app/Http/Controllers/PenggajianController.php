<?php

namespace App\Http\Controllers;

use App\Models\Penggajian;
use App\Models\Anggota;
use App\Models\KomponenGaji;
use Illuminate\Http\Request;

class PenggajianController
{
    public function index()
    {
        $anggota = Anggota::with(['penggajian.komponen'])->get();
        return view('admin.penggajian.index', compact('anggota'));
    }

    public function create()
    {
        $anggota = Anggota::all();
        $komponen = KomponenGaji::all();
        return view('admin.penggajian.create', compact('anggota', 'komponen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_anggota' => 'required|exists:anggota,id_anggota',
            'id_komponen_gaji' => 'required|exists:komponen_gaji,id_komponen_gaji',
        ]);

        $exists = Penggajian::where('id_anggota', $request->id_anggota)
            ->where('id_komponen_gaji', $request->id_komponen_gaji)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Komponen gaji ini sudah ditambahkan untuk anggota tersebut!');
        }

        Penggajian::create($request->only('id_anggota', 'id_komponen_gaji'));

        return redirect()->route('penggajian.index')->with('success', 'Penggajian berhasil ditambahkan!');
    }

    public function edit($id_anggota, $id_komponen_gaji)
    {
        $penggajian = Penggajian::where('id_anggota', $id_anggota)
            ->where('id_komponen_gaji', $id_komponen_gaji)
            ->firstOrFail();

        $anggota = Anggota::all();
        $komponen = KomponenGaji::all();

        return view('admin.penggajian.edit', compact('penggajian', 'anggota', 'komponen'));
    }

    public function update(Request $request, $id_anggota, $id_komponen_gaji)
    {
        $request->validate([
            'id_anggota' => 'required|exists:anggota,id_anggota',
            'id_komponen_gaji' => 'required|exists:komponen_gaji,id_komponen_gaji',
        ]);

        $penggajian = Penggajian::where('id_anggota', $id_anggota)
            ->where('id_komponen_gaji', $id_komponen_gaji)
            ->firstOrFail();

        // Cek apakah kombinasi baru sudah ada
        $exists = Penggajian::where('id_anggota', $request->id_anggota)
            ->where('id_komponen_gaji', $request->id_komponen_gaji)
            ->whereNot(function ($query) use ($id_anggota, $id_komponen_gaji) {
                $query->where('id_anggota', $id_anggota)
                      ->where('id_komponen_gaji', $id_komponen_gaji);
            })->exists();

        if ($exists) {
            return back()->with('error', 'Kombinasi anggota dan komponen gaji sudah ada!');
        }

        // Hapus record lama → insert baru (karena composite key)
        $penggajian->delete();
        Penggajian::create($request->only('id_anggota', 'id_komponen_gaji'));

        return redirect()->route('penggajian.index')->with('success', 'Penggajian berhasil diperbarui!');
    }

    public function destroy($id_anggota, $id_komponen_gaji)
{
    Penggajian::where('id_anggota', $id_anggota)
        ->where('id_komponen_gaji', $id_komponen_gaji)
        ->delete();

    return redirect()->route('penggajian.index')->with('success', 'Penggajian berhasil dihapus!');
}

}
