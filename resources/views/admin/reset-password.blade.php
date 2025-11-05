<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reset Password - Dapur Ibu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #fff7ef;
            font-family: 'Poppins', sans-serif;
        }
        .card {
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
        }
        h3 {
            color: #4b3832;
        }
    </style>
</head>
<body>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card text-center">
        <h3 class="mb-4">Reset Password Admin</h3>
        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('admin.password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password baru" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password baru" required>
            </div>
            <button type="submit" class="btn btn-orange w-100">Ubah Password</button>
        </form>
        <div class="mt-3">
            <a href="{{ route('admin.login') }}" class="text-decoration-none">Kembali ke Login</a>
        </div>
    </div>
</div>
</body>
</html>
