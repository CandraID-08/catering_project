@extends('app')

@section('content')

<style>
    :root {
        --primary: #FF7B00;
        --text-muted: #6c757d;
    }

    .text-orange { color: var(--primary) !important; }
    .bg-orange { background-color: var(--primary) !important; }

    .about-hero {
    padding-top: 80px;
    padding-bottom: 60px;
}

.about-title {
    font-size: 2.4rem;
    font-weight: 700;
    color: #333;
    letter-spacing: 0.5px;
}

.title-underline {
    width: 70px;
    height: 3px;
    background: #ff7b00;
    border-radius: 10px;
}

.about-subtitle {
    max-width: 700px;
    margin: 0 auto;
    font-size: 1.1rem;
    color: #555;
}

    #menuCarousel img {
        border-radius: 20px;
        height: 340px;
        object-fit: cover;
    }

    .section-title {
        font-weight: 700;
        color: var(--primary);
    }

    .price-item {
        background: white;
        border-radius: 16px;
        transition: transform .2s ease, box-shadow .2s ease;
        font-weight: 500;
    }
    .price-item:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 16px rgba(0,0,0,0.12);
    }

    .map-container {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(0,0,0,0.1);
    }

    /* ===== Marquee Section ===== */
.marquee {
    width: 100%;
    overflow: hidden;
    position: relative;
}

.marquee-track {
    display: flex;
    gap: 16px;
    width: max-content;
    animation: scrollLeft 25s linear infinite;
}

.marquee-item {
    background: #fff;
    padding: 14px 22px;
    border-radius: 16px;
    white-space: nowrap;
    font-weight: 500;
    color: #333;
    box-shadow: 0 3px 12px rgba(0,0,0,0.08);
    border: 1px solid #ffe1c2;
}

@keyframes scrollLeft {
    from { transform: translateX(0); }
    to { transform: translateX(-50%); }
}

/* Pause saat di-hover */
.marquee:hover .marquee-track {
    animation-play-state: paused;
}

.carousel-wrapper {
    position: relative;
}

.carousel-wrapper::before {
    content: "";
    position: absolute;
    top: 10%;
    left: 50%;
    transform: translateX(-50%);
    width: 95%;
    height: 90%;
    background: rgba(255, 123, 0, 0.25); /* oranye lembut */
    filter: blur(50px);                   /* glow tebal */
    border-radius: 20px;                  /* biar smooth */
    z-index: -1;                          /* di belakang slider */
}

.btn-ig {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background-color: #ff7b00;
    color: white;
    padding: 10px 18px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: 0.25s ease;
    border: none;
    box-shadow: 0 4px 12px rgba(255, 123, 0, 0.3);
}

.btn-ig:hover {
    background: white;
    color: #ff7b00;
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(0,0,0,0.15);
}

.text-justify {
    text-align: justify;
}

.highlight-address {
    font-size: 1.2rem;
    font-weight: 600;
    position: relative;
    display: inline-block;
    padding: 10px 25px;
}

.highlight-address::before,
.highlight-address::after {
    content: "";
    position: absolute;
    top: 50%;
    width: 40px;
    height: 2px;
    background: #ff6f3c;
}

.highlight-address::before {
    left: -50px;
}

.highlight-address::after {
    right: -50px;
}


</style>


<!-- 🧡 Hero -->
<section class="about-hero text-center py-5">
    <div class="container">
        <h1 class="fw-bold mb-2 about-title">Tentang Kami</h1>
        <div class="title-underline mx-auto mb-3"></div>

        <p class="lead about-subtitle">
            Sejak 2017, Dapur Ibu telah menjadi pilihan terpercaya untuk menghadirkan hidangan rumahan premium di lebih dari 
            <strong>100+ acara Jabodetabek</strong>.
        </p>
    </div>
</section>


<!-- ✨ Tentang -->
<section class="about-content py-5">
    <div class="container">
        <div class="row align-items-center">

            <!-- Slider -->
            <div class="col-md-6 mb-4">
                <div class="carousel-wrapper">
                    <div id="menuCarousel" class="carousel slide shadow-sm" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach([
                                'assets/image/catering.png',
                                'assets/image/tumpeng.png',
                            ] as $i => $img)
                            <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                                <img src="{{ asset($img) }}" class="d-block w-100">
                            </div>
                            @endforeach
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#menuCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#menuCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Text & Instagram Button -->
            <div class="col-md-6 ps-md-4">
                <h2 class="section-title mb-3">Tentang Dapur Ibu</h2>

                <p class="text-muted text-justify">
                    <strong>Dapur Ibu</strong> berawal dari dapur kecil dengan mimpi besar: menghadirkan masakan rumahan yang hangat, autentik, dan berkesan.
                    Kini kami berkembang menjadi layanan catering profesional tanpa meninggalkan rasa rumahan yang khas.
                </p>

                <p class="text-muted text-justify">
                    Setiap hidangan kami dibuat fresh, higienis, dan penuh perhatian.
                    Kami percaya bahwa <strong>makanan bukan hanya soal rasa, tapi juga pengalaman</strong>.
                    Itulah mengapa setiap acara yang kamu percayakan kepada kami selalu kami tangani dengan detail dan cinta.
                </p>

                <!-- Instagram Button -->
                <a href="https://instagram.com/dapuribu" target="_blank" class="btn btn-ig mt-3">
                    <i class="bi bi-instagram"></i> Kunjungi Instagram Kami
                </a>

            </div>

        </div>
    </div>
</section>


<!-- 🌟 Kenapa Pilih Kami -->
<section class="py-5">
    <div class="container text-center">
        <h2 class="section-title mb-4">Kenapa Banyak Event Memilih Dapur Ibu?</h2>

        <div class="marquee">
            <div class="marquee-track">
                @foreach([
                    'Rasa rumahan yang autentik & konsisten',
                    'Porsi tebal, bukan yang hemat-hematan',
                    'Selalu tepat waktu, tanpa drama',
                    'Bahan fresh setiap hari',
                    'Stand rapi & estetik',
                    'Tim berpengalaman di berbagai event'
                ] as $item)
                    <div class="marquee-item">{{ $item }}</div>
                @endforeach

                {{-- DUPLIKASI UNTUK LOOPING MULUS --}}
                @foreach([
                    'Rasa rumahan yang autentik & konsisten',
                    'Porsi tebal, bukan yang hemat-hematan',
                    'Selalu tepat waktu, tanpa drama',
                    'Bahan fresh setiap hari',
                    'Stand rapi & estetik',
                    'Tim berpengalaman di berbagai event'
                ] as $item)
                    <div class="marquee-item">{{ $item }}</div>
                @endforeach
            </div>
        </div>

    </div>
</section>



<!-- 💸 Harga Termasuk -->
<section class="about-price py-5">
    <div class="container text-center">
        <h2 class="section-title mb-4">Harga Sudah Termasuk</h2>

        <div class="row g-3 justify-content-center">
            @foreach([
                'Gratis biaya pengiriman',
                'Perlengkapan makan lengkap (sendok, tisu, tusuk gigi)',
                '1 porsi free sample sebelum acara',
                'Ditangani langsung oleh tim berpengalaman',
                'Setup meja rapi & cepat'
            ] as $item)
            <div class="col-md-6 col-lg-4">
                <div class="price-item p-3 shadow-sm">
                    {{ $item }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<!-- 📍 Lokasi -->
<section class="about-location py-5">
    <div class="container text-center">
        <h2 class="section-title mb-4">Lokasi & Area Layanan</h2>

        <!-- Highlight Alamat -->
        <div class="highlight-address mx-auto mb-4">
            <p class="m-0">
                📍 <strong>Griya Kondang Asri BB5/8, Karawang</strong>
            </p>
        </div>

        <p class="text-muted mb-2">
            Melayani area: Karawang — Cikarang — Bekasi — sebagian Jabodetabek  
        </p>
        <small class="text-muted">*Tanya admin untuk detail coverage</small>

        <div class="map-container mt-4">
            <iframe 
                src="https://www.google.com/maps?q=Griya+Kondang+Asri+Karawang&output=embed"
                width="100%" height="350" loading="lazy">
            </iframe>
        </div>
    </div>
</section>


@endsection
