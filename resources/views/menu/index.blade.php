@extends('app')

@section('title', 'Daftar Menu')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">
            Daftar Menu Catering
        </h1>
        <p class="text-muted mb-3" style="font-size: 1rem;">
            Nikmati berbagai pilihan hidangan lezat dari dapur catering kami — siap menemani setiap acara spesialmu!
        </p>

        @if(Auth::guard('admin')->check())
            <a href="{{ route('menu.create') }}" class="btn btn-primary shadow-sm px-4 mt-2">
                + Tambah Menu
            </a>
        @endif
    </div>


    <div class="row g-4">
        @foreach($menus as $menu)
            <div class="col-md-4 col-sm-6">
                <div class="card h-100 border-0 shadow-sm hover-card">
                    <div class="position-relative">
                        @if($menu->gambar)
                            <img src="{{ asset('storage/' . $menu->gambar) }}" 
                                 class="card-img-top rounded-top" 
                                 alt="{{ $menu->nama_menu }}" 
                                 style="object-fit: cover; height: 220px;">
                        @else
                            <img src="{{ asset('images/no-image.jpg') }}" 
                                 class="card-img-top rounded-top" 
                                 alt="No image" 
                                 style="object-fit: cover; height: 220px;">
                        @endif
                        <span class="position-absolute top-0 end-0 bg-light text-dark px-3 py-1 rounded-start shadow-sm fw-semibold" style="font-size: 0.9rem;">
                            Rp{{ number_format($menu->harga, 0, ',', '.') }}
                        </span>
                    </div>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-semibold">{{ $menu->nama_menu }}</h5>
                        <p class="card-text text-muted flex-grow-1" style="font-size: 0.95rem;">
                            {{ $menu->deskripsi }}
                        </p>

                        @if(Auth::guard('admin')->check())
                            <div class="d-flex justify-content-between mt-3">
                                <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-warning btn-sm px-3">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus menu ini?')" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm px-3">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

        @if($menus->isEmpty())
            <div class="text-center text-muted py-5">
                <img src="{{ asset('images/empty.svg') }}" alt="Empty" width="120" class="mb-3">
                <p class="mb-0">Belum ada menu yang tersedia.</p>
            </div>
        @endif
    </div>
</div>

{{-- Tambahan efek hover --}}
<style>
    .hover-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    }
</style>
@endsection
