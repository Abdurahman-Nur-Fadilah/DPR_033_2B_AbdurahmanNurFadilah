<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0d1b2a;
            color: #eaeaea;
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

    <!-- Buat Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-info" href="#">Public Dashboard</a>
            <div>
                <a href="{{ route('logout') }}" class="btn btn-sm btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <!--Buat Content-->
    <div class="container mt-4">
        <h2 class="mb-4">Halo, {{ Auth::user()->nama_depan }} </h2>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card p-3 shadow-sm">
                    <h5>Menu Data Anggota DPR</h5>
                    <p></p>
                    <p></p>
                    <a href="#" class="btn btn-outline-info btn-sm">Lihat Data</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card p-3 shadow-sm">
                    <h5>Menu Data Penggajian</h5>
                    <p></p>
                    <p></p>
                    <a href="#" class="btn btn-outline-info btn-sm">Lihat Data</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
