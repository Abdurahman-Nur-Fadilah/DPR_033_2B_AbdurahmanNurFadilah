<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komponen Gaji</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #0d1b2a; color: #f1f1f1; }
        .navbar { background-color: #1b263b; }
        .card { background-color: #1e2d45; border: none; color: white; border-radius: 12px; }
        .table { color: #f1f1f1; }
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
    <h2 class="mb-3">Daftar Komponen Gaji & Tunjangan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('komponen.create') }}" class="btn btn-primary mb-3">+ Tambah Komponen</a>

    <table class="table table-dark table-striped table-bordered align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Komponen</th>
                <th>Kategori</th>
                <th>Jabatan</th>
                <th>Nominal</th>
                <th>Satuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($komponen as $k)
            <tr>
                <td>{{ $k->id_komponen_gaji }}</td>
                <td>{{ $k->nama_komponen }}</td>
                <td>{{ $k->kategori }}</td>
                <td>{{ $k->jabatan }}</td>
                <td>{{ number_format($k->nominal, 0, ',', '.') }}</td>
                <td>{{ $k->satuan }}</td>
                <td>
                    <a href="{{ route('komponen.edit', $k->id_komponen_gaji) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('komponen.destroy', $k->id_komponen_gaji) }}" method="POST" class="d-inline">
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
