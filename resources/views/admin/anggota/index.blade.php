<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota DPR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #0d1b2a; color: #f1f1f1; }
        .navbar { background-color: #1b263b; }
        .card { background-color: #1e2d45; border: none; color: white; border-radius: 12px; }
        .card:hover { background-color: #2a3d5c; }
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
    <h2 class="mb-4">Data Anggota DPR</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('anggota.create') }}" class="btn btn-primary mb-3">+ Tambah Anggota</a>

    <table class="table table-dark table-striped table-bordered align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Lengkap</th>
                <th>Jabatan</th>
                <th>Status Pernikahan</th>
                <th>Jumlah Anak</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($anggota as $a)
            <tr>
                <td>{{ $a->id_anggota }}</td>
                <td>{{ $a->gelar_depan }} {{ $a->nama_depan }} {{ $a->nama_belakang }} {{ $a->gelar_belakang }}</td>
                <td>{{ $a->jabatan }}</td>
                <td>{{ $a->status_pernikahan }}</td>
                <td>{{ $a->jumlah_anak }}</td>
                <td>
                    <a href="{{ route('anggota.edit', $a->id_anggota) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('anggota.destroy', $a->id_anggota) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus data ini?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
