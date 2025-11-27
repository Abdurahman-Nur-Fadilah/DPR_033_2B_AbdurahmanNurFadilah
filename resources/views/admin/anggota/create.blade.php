<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota</title>
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
    <h2>Tambah Anggota DPR</h2>

    <form action="{{ route('anggota.store') }}" method="POST" class="card p-4 shadow-sm mt-3">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Depan</label>
            <input type="text" name="nama_depan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Belakang</label>
            <input type="text" name="nama_belakang" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Gelar Depan</label>
            <input type="text" name="gelar_depan" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Gelar Belakang</label>
            <input type="text" name="gelar_belakang" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <select name="jabatan" class="form-select" required>
                <option value="Ketua">Ketua</option>
                <option value="Wakil Ketua">Wakil Ketua</option>
                <option value="Anggota">Anggota</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Status Pernikahan</label>
            <select name="status_pernikahan" class="form-select" required>
                <option value="Kawin">Kawin</option>
                <option value="Belum Kawin">Belum Kawin</option>
                <option value="Cerai Hidup">Cerai Hidup</option>
                <option value="Cerai Mati">Cerai Mati</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah Anak</label>
            <input type="number" name="jumlah_anak" value="0" min="0" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
