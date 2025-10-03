<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnggotaController;

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
