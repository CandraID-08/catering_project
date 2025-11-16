@extends('app')

@section('content')

<style>
    /* ===== FUN & FRIENDLY STYLE ===== */
    :root {
        --primary: #FF7B00;
        --text-muted: #6c757d;
    }

    .text-orange { color: var(--primary) !important; }
    .bg-orange { background-color: var(--primary) !important; }

    h1, h2, h3 {
        letter-spacing: 0.5px;
    }

    /* Hero */
    .about-hero {
        background: linear-gradient(180deg, rgba(255,123,0,0.8), rgba(0,0,0,0.5)),
                    url('{{ asset("assets/image/catering.png") }}') center/cover no-repeat;
        height: 350px;
        border-bottom-left-radius: 40px;
        border-bottom-right-radius: 40px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    /* Carousel */
    #menuCarousel img {
        border-radius: 20px;
    }

    /* Section Title */
    .section-title {
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 20px;
    }

    /* Price Items */
    .price-item {
        background: white;
        border-radius: 16px;
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .price-item:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 16px rgba(0,0,0,0.12);
    }

    /* Map */
    .map-container {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(0,0,0,0.1);
    }

    /* Testimonial Images */
    .about-testimoni img {
        border-radius: 20px;
        transition: transform .25s ease;
    }
    .about-testimoni img:hover {
        transform: scale(1.03);
    }

    /* Button Orange */
    .btn-orange {
        background: var(--primary);
        color: white;
        border-radius: 50px;
        transition: 0.2s ease;
    }
    .btn-orange:hover {
        background: #e96f00;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(255,123,0,0.4);
    }
</style>


<!-- 🧡 Hero -->
<section class="about-hero d-flex align-items-center justify-content-center text-white text-center">
    <div class="container">
        <h1 class="fw-bold">Tentang Kami</h1>
        <p class="lead mt-3">Dipercaya Sejak 2017 — Menangani 100++ Event di Jabodetabek 🍲</p>
    </div>
</section>


<!-- ✨ Tentang -->
<section class="about-content py-5">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-md-6 mb-4">
                <div id="menuCarousel" class="carousel slide shadow-sm" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('assets/image/catering.png') }}" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/image/tumpeng.png') }}" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/image/menu3.jpg') }}" class="d-block w-100">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 ps-md-4">
                <h2 class="section-title">Tentang Dapur Ibu</h2>
                <p class="text-muted">
                    <strong>Dapur Ibu</strong> hadir untuk kamu yang ingin menikmati kelezatan masakan rumahan
                    dengan sentuhan profesional. Sejak 2017, kami telah dipercaya menangani lebih dari
                    <strong>100 event di Jabodetabek</strong> — mulai dari wedding stand, acara kantor, hingga event pribadi.
                </p>
                <p class="text-muted">
                    Kami percaya bahwa setiap sajian adalah bentuk cinta, dan setiap acara pantas disajikan dengan rasa terbaik.
                </p>
            </div>

        </div>
    </div>
</section>


<!-- 💸 Harga Termasuk -->
<section class="about-price py-5 bg-light">
    <div class="container text-center">
        <h2 class="section-title">Harga Termasuk :</h2>

        <div class="row g-3 justify-content-center">
            @foreach([
                '🍴 Gratis biaya pengiriman oven on the spot',
                '🥄 Alat makan (sendok, alas cup, saos)',
                '🍲 1 porsi free sample',
                '🛍️ Lapak kami ditangani langsung oleh ahlinya'
            ] as $item)
            <div class="col-md-6 col-lg-4">
                <div class="price-item p-3 shadow-sm d-flex align-items-center gap-2">
                    <span class="fs-4">{{ explode(" ", $item)[0] }}</span>
                    <span>{{ substr($item, 5) }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<!-- 📍 Lokasi -->
<section class="about-location py-5">
    <div class="container text-center">
        <h2 class="section-title">Lokasi & Area Event</h2>

        <p class="text-muted mb-3">📍 Griya Kondang Asri BB5/8, Jakarta Timur</p>

        <p class="text-muted">
            Beberapa lokasi event kami:<br>
            <strong>Jl Tengah Condet</strong> • <strong>Car Free Day Cijantung</strong> •
            <strong>Pasar Pagi</strong> • <strong>Minggu Ria</strong> • <strong>Halim</strong>
        </p>

        <div class="map-container mt-4">
            <iframe src="https://www.google.com/maps?q=Griya+Kondang+Asri,+Jakarta+Timur&output=embed"
                width="100%" height="350" loading="lazy"></iframe>
        </div>
    </div>
</section>


<!-- 🗣️ Testimoni -->
<section class="about-testimoni py-5 bg-light">
    <div class="container text-center">
        <h2 class="section-title">Apa Kata Mereka</h2>

        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <img src="{{ asset('images/testimoni1.jpg') }}" class="img-fluid shadow-sm">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/testimoni2.jpg') }}" class="img-fluid shadow-sm">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/testimoni3.jpg') }}" class="img-fluid shadow-sm">
            </div>
        </div>

        <div class="mt-5">
            <a href="{{ url('/booking') }}" class="btn btn-orange px-4 py-2">
                <i class="fa fa-book"></i> Pesan Sekarang
            </a>
        </div>
    </div>
</section>

@endsection
