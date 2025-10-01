<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// ==== LOGIN ====
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// ==== ADMIN DASHBOARD ====
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboard.admin', ['title' => 'Admin Dashboard']);
    })->name('dashboard.admin');
});

// ==== USER/PUBLIC DASHBOARD ====
Route::middleware(['auth', 'role:Public'])->group(function () {
    Route::get('/public/dashboard', function () {
        return view('dashboard.public', ['title' => 'User Dashboard']);
    })->name('dashboard.public');
});

// ==== ROOT ====
Route::get('/', function () {
    if (auth()->check()) {
        return auth()->user()->role === 'Admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('public.dashboard');
    }
    return redirect()->route('login');
});
