<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Penggajian</title>
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
        <h3 class="mb-3">Edit Data Penggajian</h3>

        <form action="{{ route('penggajian.update', [$penggajian->id_anggota, $penggajian->id_komponen_gaji]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Anggota</label>
                <input type="text" class="form-control" 
                       value="{{ $penggajian->anggota->nama_depan }} {{ $penggajian->anggota->nama_belakang }}" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Komponen Gaji</label>
                <input type="text" class="form-control" 
                       value="{{ $penggajian->komponen->nama_komponen }}" disabled>
            </div>

            <div class="mb-3">
                <label for="take_home_pay" class="form-label">Take Home Pay</label>
                <input type="number" name="take_home_pay" id="take_home_pay" class="form-control" 
                       value="{{ $penggajian->take_home_pay }}" required>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('penggajian.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
</body>
</html>
