<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - Dapur Ibu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff7ef;
            font-family: 'Poppins', sans-serif;
            animation: fadeIn 0.6s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .login-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 40px;
            width: 380px;
        }
        .btn-orange {
            background-color: #f6b26b;
            border: none;
            color: white;
        }
        .btn-orange:hover {
            background-color: #e69138;
            color: #fff;
        }
        h3 {
            color: #4b3832;
        }
        a {
            color: #4b3832;
            text-decoration: none;
        }
        a:hover {
            color: #e69138;
        }
    </style>
</head>
<body>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="login-card text-center">
        <h3 class="mb-4">Login Admin</h3>

        {{-- ✅ Alert sukses (misal setelah reset password) --}}
        @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- ❌ Alert error (email atau password salah) --}}
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $errors->first() }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-orange w-100 mb-3">Masuk</button>
        </form>

        <div>
            <a href="{{ route('admin.password.request') }}">Lupa password?</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
