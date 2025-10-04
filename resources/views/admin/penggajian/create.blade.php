<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Penggajian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #0d1b2a; color: #f1f1f1; }
        .navbar { background-color: #1b263b; }
        .card { background-color: #1e2d45; border: none; color: white; border-radius: 12px; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-info" href="{{ route('dashboard.admin') }}">Admin Dashboard</a>
        <div><a href="{{ route('logout') }}" class="btn btn-sm btn-danger">Logout</a></div>
    </div>
</nav>

<div class="container mt-4">
    <div class="card p-4">
        <h3 class="mb-3">Tambah Data Penggajian</h3>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('penggajian.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="id_anggota" class="form-label">Pilih Anggota</label>
                <select name="id_anggota" id="id_anggota" class="form-select" required>
                    <option value="">-- Pilih Anggota --</option>
                    @foreach($anggota as $a)
                        <option value="{{ $a->id_anggota }}">
                            {{ $a->nama_depan }} {{ $a->nama_belakang }} - {{ $a->jabatan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="id_komponen_gaji" class="form-label">Pilih Komponen Gaji</label>
                <select name="id_komponen_gaji" id="id_komponen_gaji" class="form-select" required>
                    <option value="">-- Pilih Komponen --</option>
                    @foreach($komponen as $k)
                        <option value="{{ $k->id_komponen_gaji }}">
                            {{ $k->nama_komponen }} ({{ $k->kategori }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="take_home_pay" class="form-label">Take Home Pay</label>
                <input type="number" name="take_home_pay" id="take_home_pay" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('penggajian.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
</body>
</html>
