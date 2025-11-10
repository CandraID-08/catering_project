@extends('app')

@section('title', 'Catering Home')

@section('content')

    <div class="position-relative">
    @if (Request::is('/'))
        @include('anim.slider')
    @endif

    <h1 class="text-4xl font-bold text-gray-900 dark:text-white">Dapur Ibu Booking Page</h1>
    <p class="mt-4 text-gray-600 dark:text-gray-400">Silahkan pilih paket dan booking sekarang!</p>

    <div class="mt-6">
        <a href="{{ route('preorder') }}" class="btn btn-primary">Booking Sekarang</a>

    </div>

    <div class="card p-4 shadow-sm">
        {{-- Kalender --}}
        @if (Request::is('/'))
            @include('kalender.kalender')
        @endif
    </div>
@endsection

