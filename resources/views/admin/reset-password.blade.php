<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reset Password - Dapur Ibu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=TikTok+Sans:opsz,wght@12..36,300..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

    <div class="login-card p-4 shadow" style="max-width: 380px; width: 100%;">
        <h3 class="mb-4 text-center">Reset Password Admin</h3>

        @if($errors->any())
            <div class="alert alert-danger text-center">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('admin.password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-3">
                <input 
                    type="password" 
                    name="password" 
                    class="form-control" 
                    placeholder="Password baru" 
                    required
                >
            </div>

            <div class="mb-3">
                <input 
                    type="password" 
                    name="password_confirmation" 
                    class="form-control" 
                    placeholder="Ulangi password baru" 
                    required
                >
            </div>

            <button type="submit" class="btn w-100">Ubah Password</button>
        </form>

        <div class="mt-3 text-center">
            <a href="{{ route('admin.login') }}" class="text-decoration-none text-orange">
                Kembali ke Login
            </a>
        </div>
    </div>

</body>
</html>
