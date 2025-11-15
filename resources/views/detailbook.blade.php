@extends('app')

@section('title', 'Detail Booking')

@section('content')
<div class="container py-4">

    {{-- ===== ALERT JIKA QTY DI BAWAH 10 ===== --}}
    @if($preorder->qty < 10)
    <div class="alert alert-danger">
        <strong>Perhatian!</strong> Jumlah pesanan kurang dari <strong>10</strong>. Minimal pemesanan adalah 10 porsi.
    </div>
    @endif
    {{-- ======================================= --}}

    <h2 class="mb-4" style="font-size: 1.75rem; font-weight: 600;">Detail Pesanan</h2>

    <div class="row g-3">
        <!-- Nama Pemesan -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Nama Pemesan</h6>
                    <p class="card-text">{{ $preorder->nama }}</p>
                </div>
            </div>
        </div>

        <!-- Nama Acara -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Nama Acara</h6>
                    <p class="card-text">{{ $preorder->nama_acara }}</p>
                </div>
            </div>
        </div>

        <!-- Menu -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Menu</h6>
                    <p class="card-text">{{ $preorder->menu }}</p>
                </div>
            </div>
        </div>

        <!-- Qty -->
        <div class="col-md-4">
            <div class="card shadow-sm border 
                @if($preorder->qty < 10) border-danger @endif">
                <div class="card-body">
                    <h6 class="card-title">Qty</h6>
                    <p class="card-text 
                        @if($preorder->qty < 10) text-danger fw-bold @endif">
                        {{ $preorder->qty }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Tanggal Acara -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Tanggal Acara</h6>
                    <p class="card-text">{{ $preorder->tanggal_acara }}</p>
                </div>
            </div>
        </div>

        <!-- Jam Acara -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Jam Acara</h6>
                    <p class="card-text">{{ $preorder->jam_acara }}</p>
                </div>
            </div>
        </div>

        <!-- Status Pembayaran -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Status Pembayaran</h6>
                    <p class="card-text">{{ $preorder->status_pembayaran }}</p>
                </div>
            </div>
        </div>

        <!-- Lokasi -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Lokasi</h6>
                    <p class="card-text">{{ $preorder->lokasi }}</p>
                </div>
            </div>
        </div>

        <!-- Catatan -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Catatan</h6>
                    <p class="card-text">{{ $preorder->catatan ?? '-' }}</p>
                </div>
            </div>
        </div>

        <!-- Dokumentasi -->
        @if($preorder->dokumentasi)
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Dokumentasi</h6>
                    <a href="{{ $preorder->dokumentasi }}" target="_blank" class="btn btn-sm btn-outline-primary">Lihat</a>
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="d-flex gap-2 mt-4">
        <a href="{{ route('preorder.edit', $preorder->id) }}" class="btn btn-primary">Edit</a>

        <form action="{{ route('preorder.destroy', $preorder->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesanan ini?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>

        <a href="{{ route('preorder.generateNotaPDF', $preorder->id) }}" class="btn btn-success">Download Nota PDF</a>

        <a href="/" class="btn btn-warning ms-auto">Kembali</a>
    </div>
</div>
@endsection
