<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lupa Password - Dapur Ibu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=TikTok+Sans:opsz,wght@12..36,300..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="login-card text-center">
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
