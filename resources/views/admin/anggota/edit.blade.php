<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota DPR</title>
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
    <h2>Edit Anggota DPR</h2>

    <form action="{{ route('anggota.update', $anggota->id_anggota) }}" method="POST" class="card p-4 shadow-sm mt-3">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Depan</label>
            <input type="text" name="nama_depan" value="{{ $anggota->nama_depan }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Belakang</label>
            <input type="text" name="nama_belakang" value="{{ $anggota->nama_belakang }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Gelar Depan</label>
            <input type="text" name="gelar_depan" value="{{ $anggota->gelar_depan }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Gelar Belakang</label>
            <input type="text" name="gelar_belakang" value="{{ $anggota->gelar_belakang }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <select name="jabatan" class="form-select" required>
                <option value="Ketua" {{ $anggota->jabatan == 'Ketua' ? 'selected' : '' }}>Ketua</option>
                <option value="Wakil Ketua" {{ $anggota->jabatan == 'Wakil Ketua' ? 'selected' : '' }}>Wakil Ketua</option>
                <option value="Anggota" {{ $anggota->jabatan == 'Anggota' ? 'selected' : '' }}>Anggota</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Status Pernikahan</label>
            <select name="status_pernikahan" class="form-select" required>
                <option value="Kawin" {{ $anggota->status_pernikahan == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                <option value="Belum Kawin" {{ $anggota->status_pernikahan == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                <option value="Cerai Hidup" {{ $anggota->status_pernikahan == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                <option value="Cerai Mati" {{ $anggota->status_pernikahan == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah Anak</label>
            <input type="number" name="jumlah_anak" value="{{ $anggota->jumlah_anak }}" min="0" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
