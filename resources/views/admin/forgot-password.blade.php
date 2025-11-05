<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lupa Password - Dapur Ibu</title>
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
        <h3 class="mb-4">Lupa Password Admin</h3>
        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('admin.password.email') }}">
            @csrf
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Masukkan email admin" required autofocus>
            </div>
            <button type="submit" class="btn btn-orange w-100">Kirim Link Reset</button>
        </form>
        <div class="mt-3">
            <a href="{{ route('admin.login') }}" class="text-decoration-none">Kembali ke Login</a>
        </div>
    </div>
</div>
</body>
</html>
