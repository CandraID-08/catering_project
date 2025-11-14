@extends('app')

@section('content')

<!-- 🧡 Hero Section -->
<section class="about-hero text-center text-white d-flex align-items-center justify-content-center">
    <div class="container">
        <h1 class="fw-bold mb-3">Tentang Kami</h1>
        <p class="lead">Dipercaya Sejak Tahun 2017 — Menangani 100++ Event di Jabodetabek 🍲</p>
    </div>
</section>

<section class="about-content py-5">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-md-6 mb-5 mb-md-0">
                <div id="menuCarousel" class="carousel slide shadow-sm rounded-4 overflow-hidden" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('assets/image/catering.png') }}" class="d-block w-100" alt="Menu 1">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/image/tumpeng.png') }}" class="d-block w-100" alt="Menu 2">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/image/menu3.jpg') }}" class="d-block w-100" alt="Menu 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#menuCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#menuCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-md-6 ps-md-4">
                <h2 class="fw-bold text-orange mb-3">Tentang Dapur Ibu</h2>
                <p class="text-muted">
                    <strong>Dapur Ibu</strong> hadir untuk kamu yang ingin menikmati kelezatan masakan rumahan
                    dengan sentuhan profesional. Sejak 2017, kami telah dipercaya menangani lebih dari
                    <strong>100 event di Jabodetabek</strong> — mulai dari wedding stand, acara kantor, hingga event pribadi.
                </p>
                <p class="text-muted">
                    Kami percaya bahwa setiap sajian adalah bentuk cinta, dan setiap acara pantas disajikan dengan
                    rasa terbaik.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- 💸 Harga Termasuk -->
<section class="about-price py-5 bg-light">
    <div class="container text-center">
        <h2 class="fw-bold text-orange mb-4">Harga Termasuk :</h2>
        <div class="row g-3 justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="price-item p-3 shadow-sm rounded-3 d-flex align-items-center gap-2">
                    <span class="fs-4">🍴</span>
                    <span>Gratis biaya pengiriman oven on the spot</span>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="price-item p-3 shadow-sm rounded-3 d-flex align-items-center gap-2">
                    <span class="fs-4">🥄</span>
                    <span>Alat makan (sendok, alas cup, saos)</span>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="price-item p-3 shadow-sm rounded-3 d-flex align-items-center gap-2">
                    <span class="fs-4">🍲</span>
                    <span>1 porsi free sample</span>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="price-item p-3 shadow-sm rounded-3 d-flex align-items-center gap-2">
                    <span class="fs-4">🛍️</span>
                    <span>Lapak kami ditangani langsung oleh ahlinya</span>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- 📍 Lokasi & Event Area -->
<section class="about-location py-5">
    <div class="container text-center">
        <h2 class="fw-bold text-orange mb-4">Lokasi & Area Event</h2>
        <p class="text-muted mb-3">📍 Griya Kondang Asri BB5/8, Jakarta Timur</p>
        <p class="text-muted">
            Beberapa lokasi event kami:
            <br>
            <strong>Jl Tengah Condet</strong> • <strong>Car Free Day Cijantung</strong> •
            <strong>Pasar Pagi</strong> • <strong>Minggu Ria</strong> • <strong>Halim</strong>
        </p>
        <div class="map-container mt-4 rounded-4 overflow-hidden shadow-sm">
            <iframe
                src="https://www.google.com/maps?q=Griya+Kondang+Asri,+Jakarta+Timur&output=embed"
                width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>
    </div>
</section>

<!-- 🗣️ Apa Kata Mereka -->
<section class="about-testimoni py-5 bg-light">
    <div class="container text-center">
        <h2 class="fw-bold text-orange mb-4">Apa Kata Mereka</h2>
        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <img src="{{ asset('images/testimoni1.jpg') }}" alt="Testimoni 1" class="img-fluid rounded-4 shadow-sm">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/testimoni2.jpg') }}" alt="Testimoni 2" class="img-fluid rounded-4 shadow-sm">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/testimoni3.jpg') }}" alt="Testimoni 3" class="img-fluid rounded-4 shadow-sm">
            </div>
        </div>
        <div class="mt-5">
            <a href="{{ url('/booking') }}" class="btn btn-orange px-4 py-2 rounded-pill fw-semibold">
                <i class="fa fa-book"></i> Pesan Sekarang
            </a>
        </div>
    </div>
</section>

@endsection
