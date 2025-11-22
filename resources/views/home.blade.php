@extends('app')

@section('title', 'Dapur Ibu Catering')

{{-- HERO DI LUAR CONTAINER --}}
@section('fullwidth')
<section class="hero-slider position-relative">
    @include('anim.slider')

    <div class="hero-gradient"></div>

    <!-- HERO CONTENT: wrap + blur -->
    <div class="hero-content-outer">
        <div class="hero-content-wrap">

            <!-- TEXT UTAMA -->
            <div class="hero-text">
                <h1 class="text-4xl font-bold text-white">Dapur Ibu Booking Page</h1>
                <p class="mt-2 text-white">Silahkan pilih paket dan booking sekarang!</p>
            </div>

            <!-- TOTAL ORDER (diletakkan sebelum tombol) -->
            <div class="order-summary">
                <span class="order-label">Orderan terselesaikan:</span>
                <span class="order-count">{{ $totalOrder ?? 0 }}</span>
            </div>


            <!-- TOMBOL -->
            <a href="{{ route('preorder') }}" class="btn-booking mt-2">
                Booking Sekarang
            </a>
        </div>
    </div>
</section>
@endsection

{{-- KONTEN UTAMA --}}
@section('content')
{{-- ALERT PERHATIAN --}}
<div class="alert-attention mb-4 p-4 d-flex align-items-start gap-3">
    <span class="alert-icon">⚠️</span>
    <div class="alert-text">
        <strong>Perhatian!</strong> Anda dapat memesan catering dengan tombol 
        <span class="fw-bold">"Booking Sekarang"</span>. 
        Pastikan tanggal yang dipilih <span class="fw-semibold text-dark">belum mencapai  acara</span> 
        dan pesanan minimal <span class="fw-semibold text-dark">10 pcs per order</span>.
    </div>
</div>


<div class="card p-4 shadow-sm mt-5">
    @include('kalender.kalender')
</div>
@endsection