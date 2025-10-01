<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0d1b2a;
            color: #fff;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background-color: #1b263b;
            border-radius: 12px;
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0px 5px 20px rgba(0,0,0,0.5);
        }
        .login-card h3 {
            color: #00b4d8;
            font-weight: bold;
        }
        .form-label {
            color: #eaeaea; /* Biar label terlihat */
            font-weight: 500;
        }
        .form-control {
            background-color: #1e2d45;
            border: none;
            color: white;
        }
        .form-control:focus {
            background-color: #243a5e;
            color: white;
            box-shadow: none;
        }
        .btn-login {
            background-color: #00b4d8;
            border: none;
            font-weight: bold;
        }
        .btn-login:hover {
            background-color: #0096c7;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <h3 class="text-center mb-4">Login Sistem</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-login">Login</button>
            </div>
        </form>
    </div>

</body>
</html>
