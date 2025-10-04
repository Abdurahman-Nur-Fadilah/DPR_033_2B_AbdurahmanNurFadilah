<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Komponen Gaji</title>
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
        <div>
            <a href="{{ route('logout') }}" class="btn btn-sm btn-danger">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h2>Edit Komponen Gaji</h2>

    <form action="{{ route('komponen.update', $komponen->id_komponen_gaji) }}" method="POST" class="card p-4 shadow-sm mt-3">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Komponen</label>
            <input type="text" name="nama_komponen" value="{{ $komponen->nama_komponen }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="kategori" class="form-select" required>
                <option value="Gaji Pokok" {{ $komponen->kategori == 'Gaji Pokok' ? 'selected' : '' }}>Gaji Pokok</option>
                <option value="Tunjangan Melekat" {{ $komponen->kategori == 'Tunjangan Melekat' ? 'selected' : '' }}>Tunjangan Melekat</option>
                <option value="Tunjangan Lain" {{ $komponen->kategori == 'Tunjangan Lain' ? 'selected' : '' }}>Tunjangan Lain</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <select name="jabatan" class="form-select" required>
                <option value="Ketua" {{ $komponen->jabatan == 'Ketua' ? 'selected' : '' }}>Ketua</option>
                <option value="Wakil Ketua" {{ $komponen->jabatan == 'Wakil Ketua' ? 'selected' : '' }}>Wakil Ketua</option>
                <option value="Anggota" {{ $komponen->jabatan == 'Anggota' ? 'selected' : '' }}>Anggota</option>
                <option value="Semua" {{ $komponen->jabatan == 'Semua' ? 'selected' : '' }}>Semua</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nominal</label>
            <input type="number" name="nominal" value="{{ $komponen->nominal }}" class="form-control" min="0" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Satuan</label>
            <select name="satuan" class="form-select" required>
                <option value="Bulan" {{ $komponen->satuan == 'Bulan' ? 'selected' : '' }}>Bulan</option>
                <option value="Hari" {{ $komponen->satuan == 'Hari' ? 'selected' : '' }}>Hari</option>
                <option value="Periode" {{ $komponen->satuan == 'Periode' ? 'selected' : '' }}>Periode</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('komponen.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
