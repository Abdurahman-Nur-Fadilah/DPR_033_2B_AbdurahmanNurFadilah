<?php

namespace App\Http\Controllers;

use App\Models\KomponenGaji;
use Illuminate\Http\Request;

class KomponenGajiController
{
    // List semua komponen gaji
    public function index()
    {
        $komponen = KomponenGaji::all();
        return view('admin.komponen.index', compact('komponen'));
    }

    // Form tambah komponen
    public function create()
    {
        return view('admin.komponen.create');
    }

    // Simpan komponen baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_komponen' => 'required|string|max:100',
            'kategori' => 'required|in:Gaji Pokok,Tunjangan Melekat,Tunjangan Lain',
            'jabatan' => 'required|in:Ketua,Wakil Ketua,Anggota,Semua',
            'nominal' => 'required|numeric|min:0',
            'satuan' => 'required|in:Bulan,Hari,Periode',
        ]);

        KomponenGaji::create($request->all());

        return redirect()->route('komponen.index')->with('success', 'Komponen berhasil ditambahkan!');
    }

    // Form edit
    public function edit($id)
    {
        $komponen = KomponenGaji::findOrFail($id);
        return view('admin.komponen.edit', compact('komponen'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_komponen' => 'required|string|max:100',
            'kategori' => 'required|in:Gaji Pokok,Tunjangan Melekat,Tunjangan Lain',
            'jabatan' => 'required|in:Ketua,Wakil Ketua,Anggota,Semua',
            'nominal' => 'required|numeric|min:0',
            'satuan' => 'required|in:Bulan,Hari,Periode',
        ]);

        $komponen = KomponenGaji::findOrFail($id);
        $komponen->update($request->all());

        return redirect()->route('komponen.index')->with('success', 'Komponen berhasil diperbarui!');
    }

    // Hapus komponen gaji
    public function destroy($id)
    {
        $komponen = KomponenGaji::findOrFail($id);
        $komponen->delete();

        return redirect()->route('komponen.index')->with('success', 'Komponen berhasil dihapus!');
    }
}
