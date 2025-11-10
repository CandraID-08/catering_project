@extends('app')

@section('title', 'Detail Booking')

@section('content')
<div class="container py-4">
    <h2 class="text-2xl font-semibold mb-3">Detail Pesanan</h2>

    <div class="bg-white shadow rounded p-4">
        <p><strong>Nama Pemesan:</strong> {{ $preorder->nama }}</p>
        <p><strong>Nama Acara:</strong> {{ $preorder->nama_acara }}</p>
        <p><strong>Menu:</strong> {{ $preorder->menu }}</p>
        <p><strong>Qty:</strong> {{ $preorder->qty }}</p>
        <p><strong>Tanggal Acara:</strong> {{ $preorder->tanggal_acara }}</p>
        <p><strong>Jam Acara:</strong> {{ $preorder->jam_acara }}</p>
        <p><strong>Status Pembayaran:</strong> {{ $preorder->status_pembayaran }}</p>
        <p><strong>Lokasi:</strong> {{ $preorder->lokasi }}</p>
        <p><strong>Catatan:</strong> {{ $preorder->catatan }}</p>

        @if($preorder->dokumentasi)
            <p><sptrong>Dokumentasi:</sptrong> <a href="{{ $preorder->dokumentasi }}" target="_blank">Lihat</a></p>
        @endif

        <a href="/" class="btn btn-warning mt-3">Kembali</a>
    </div>
</div>
@endsection
