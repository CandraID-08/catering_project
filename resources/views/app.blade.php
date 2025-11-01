<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Catering')</title>

    <!-- Bootstrap CSS (pastikan sudah ada di layout kamu) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=TikTok+Sans:opsz,wght@12..36,300..900&display=swap" rel="stylesheet">

   </head>
<body>
    {{-- Navbar --}}
    @include('navbar.navbar')


    <div class="container py-4 position-absolute top-0 start-50 translate-middle-x text-center"
         style="z-index: 10; color: white;">
        @yield('content')
    </div>

    {{-- Kalender --}}
    @if (Request::is('/'))
        @include('kalender.kalender')
    @endif

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
