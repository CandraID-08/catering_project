@extends('app')

@section('title', 'Pre-Order Berhasil')

@section('content')
<div class="container py-5">

    @if(session('success'))
        <div class="alert alert-success text-center fw-bold">
            {{ session('success') }}
        </div>

        <div class="text-center mt-4">
            <a 
                href="https://wa.me/6281234567890?text=Halo%20Dapur%20Ibu,%20saya%20sudah%20melakukan%20pre-order.%20Mohon%20diproses%20ya."
                class="btn btn-success px-4 py-2"
                target="_blank"
            >
                Hubungi Admin via WhatsApp
            </a>
        </div>

        <div class="text-center mt-3">
            <a href="{{ route('home') }}" class="btn btn-secondary">
                Kembali ke Beranda
            </a>
        </div>
    @endif

</div>
@endsection
