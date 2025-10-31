

<div class="container py-4">
    <div id="sliderCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">

    <div class="carousel-inner">
    @foreach($files as $file)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img class="d-block w-100 slider-img" src="{{ asset('assets/image/'.$file) }}" alt="">
        </div>
    @endforeach
  </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#sliderCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#sliderCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>
</div>
<style>
    .slider-img {
        height: 400px;       /* Tinggi tetap, bisa diubah sesuai kebutuhan */
        object-fit: cover;    /* Memotong gambar supaya mengisi area tanpa merusak rasio */
    }
</style>
