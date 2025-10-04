<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0d1b2a;
            color: #f1f1f1;
        }
        .navbar {
            background-color: #1b263b;
        }
        .card {
            background-color: #1e2d45;
            border: none;
            color: white;
            border-radius: 12px;
        }
        .card:hover {
            background-color: #2a3d5c;
        }
    </style>
</head>
<body>

    <!--Buat Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-info" href="#">Admin Dashboard</a>
            <div>
                <a href="{{ route('logout') }}" class="btn btn-sm btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <!--Buat Content-->
    <div class="container mt-4">
        <h2 class="mb-4">Halo, {{ Auth::user()->nama_depan }}</h2>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card p-3 shadow-sm">
                    <h5>Kelola Data Anggota DPR</h5>
                    <p>Tambah, edit, hapus anggota DPR.</p>
                    <a href="{{ route('anggota.index') }}" class="btn btn-outline-info btn-sm">Kelola</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3 shadow-sm">
                    <h5>Kelola Data Komponen Gaji & Tunjangan</h5>
                    <p>Atur komponen gaji dan tunjangan DPR.</p>
                    <a href="{{ route('komponen.index') }}" class="btn btn-outline-info btn-sm">Kelola</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3 shadow-sm">
                    <h5>Kelola Data Penggajian</h5>
                    <p>Proses data penggajian anggota DPR.</p>
                    <a href="{{ route('penggajian.index') }}" class="btn btn-outline-info btn-sm">Kelola</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
