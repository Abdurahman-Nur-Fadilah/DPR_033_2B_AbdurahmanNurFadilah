<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KomponenGajiController;
use App\Http\Controllers\PenggajianController;

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboard.admin', ['title' => 'Admin Dashboard']);
    })->name('dashboard.admin');
    
    // Ke Form Pengelolaan Anggota
    Route::get('/admin/anggota', [AnggotaController::class, 'index'])->name('anggota.index');

    // Route CRUD Anggota
    Route::get('/admin/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
    Route::post('/admin/anggota/store', [AnggotaController::class, 'store'])->name('anggota.store');
    Route::get('/admin/anggota/{id}/edit', [AnggotaController::class, 'edit'])->name('anggota.edit');
    Route::put('/admin/anggota/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
    Route::delete('/admin/anggota/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');

    //Route CRUD Komponen Gaji
    Route::get('/admin/komponen', [KomponenGajiController::class, 'index'])->name('komponen.index');
    Route::get('/admin/komponen/create', [KomponenGajiController::class, 'create'])->name('komponen.create');
    Route::post('/admin/komponen/store', [KomponenGajiController::class, 'store'])->name('komponen.store');
    Route::get('/admin/komponen/{id}/edit', [KomponenGajiController::class, 'edit'])->name('komponen.edit');
    Route::put('/admin/komponen/{id}', [KomponenGajiController::class, 'update'])->name('komponen.update');
    Route::delete('/admin/komponen/{id}', [KomponenGajiController::class, 'destroy'])->name('komponen.destroy');

    //Route CRUD Penggajian
    Route::get('/admin/penggajian', [PenggajianController::class, 'index'])->name('penggajian.index');
    Route::get('/admin/penggajian/create', [PenggajianController::class, 'create'])->name('penggajian.create');
    Route::post('/admin/penggajian/store', [PenggajianController::class, 'store'])->name('penggajian.store');
    Route::get('/admin/penggajian/{id_anggota}/{id_komponen_gaji}/edit', [PenggajianController::class, 'edit'])->name('penggajian.edit');
    Route::put('/admin/penggajian/{id_anggota}/{id_komponen_gaji}', [PenggajianController::class, 'update'])->name('penggajian.update');
    Route::delete('/admin/penggajian/{id_anggota}/{id_komponen_gaji}', [PenggajianController::class, 'destroy'])->name('penggajian.destroy');
});

Route::middleware(['auth', 'role:Public'])->group(function () {
    Route::get('/public/dashboard', function () {
        return view('dashboard.public', ['title' => 'User Dashboard']);
    })->name('dashboard.public');
});

Route::get('/', function () {
    if (auth()->check()) {
        return auth()->user()->role === 'Admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('public.dashboard');
    }
    return redirect()->route('login');
});
