@extends('app')

@section('content')

<div class="container py-5">
    <h1 class="mb-4 text-center fw-bold">Form Pre-Order Catering Dapur Ibu</h1>

    <form action="{{ route('preorder.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="nama_acara" class="form-label">Nama Acara</label>
                <input type="text" id="nama_acara" name="nama_acara" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <label for="nama" class="form-label">Nama Pemesan</label>
                <input type="text" id="nama" name="nama" class="form-control" required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="nomor_hp" class="form-label">Nomor HP</label>
                <input type="text" id="nomor_hp" name="nomor_hp" class="form-control">
            </div>
        </div>

        <div class="row">
            {{-- pilih menu --}}
            <div class="col-md-4 mb-3">
                <label for="menu" class="form-label">Pilih Menu</label>
                <select id="menu" name="menu_id" class="form-select" required>
                    <option value="">-- Pilih Menu --</option>
                    @foreach ($menu as $m)
                        <option value="{{ $m->id }}">{{ $m->nama_menu }} - Rp{{ number_format($m->harga, 0, ',', '.') }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2 mb-3">
                <label for="qty" class="form-label">Jumlah (Qty)</label>
                <input type="number" id="qty" name="qty" class="form-control" min="1">
            </div>

            <div class="col-md-3 mb-3">
                <label for="jam_acara" class="form-label">Jam Acara</label>
                <input type="time" id="jam_acara" name="jam_acara" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label for="tanggal_acara" class="form-label">Tanggal Acara</label>
                <input type="date" id="tanggal_acara" name="tanggal_acara" class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="status_pembayaran" class="form-label">Metode Pembayaran</label>
                <select id="status_pembayaran" name="status_pembayaran" class="form-select">
                    <option value="DP">DP</option>
                    <option value="Lunas">Lunas</option>
                </select>
            </div>

            <div class="col-md-8 mb-3">
                <label for="lokasi" class="form-label">Lokasi Acara</label>
                <input type="text" id="lokasi" name="lokasi" class="form-control" placeholder="Contoh: Sleman, Yogyakarta">
            </div>
        </div>

        <div class="mb-3">
            <label for="dokumentasi" class="form-label">Link Dokumentasi (opsional)</label>
            <input type="url" id="dokumentasi" name="dokumentasi" class="form-control" placeholder="https://drive.google.com/...">
        </div>

        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan / Instruksi</label>
            <textarea id="catatan" name="catatan" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn w-100">Konfirmasi</button>
    </form>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif
</div>

@endsection
