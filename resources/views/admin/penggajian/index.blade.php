<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penggajian</title>
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
    <h2>Data Penggajian</h2>
    <a href="{{ route('penggajian.create') }}" class="btn btn-primary mb-3">+ Tambah Penggajian</a>

    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

    <table class="table table-dark table-striped table-bordered align-middle">
        <thead>
            <tr>
                <th>ID Anggota</th>
                <th>Nama Lengkap</th>
                <th>Jabatan</th>
                <th>Take Home Pay</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($anggota as $a)
                @foreach($a->penggajian as $p)
                <tr>
                    <td>{{ $a->id_anggota }}</td>
                    <td>{{ $a->gelar_depan }} {{ $a->nama_depan }} {{ $a->nama_belakang }} {{ $a->gelar_belakang }}</td>
                    <td>{{ $a->jabatan }}</td>
                    <td>Rp {{ number_format($a->take_home_pay, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('penggajian.edit', [$p->id_anggota, $p->id_komponen_gaji]) }}" 
                           class="btn btn-sm btn-warning mb-1">Edit {{ $p->komponen->nama_komponen }}</a>

                        <form action="{{ route('penggajian.destroy', [$p->id_anggota, $p->id_komponen_gaji]) }}" 
                              method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Yakin hapus komponen ini?')" 
                                    class="btn btn-sm btn-danger">Hapus {{ $p->komponen->nama_komponen }}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
