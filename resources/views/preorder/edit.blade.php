@extends('app')

@section('content')

<div class="container py-5">
    <h1 class="mb-4 text-center fw-bold">Edit Data Pre-Order Catering Dapur Ibu</h1>

    <form action="{{ route('preorder.update', $preorder->id) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="nama_acara" class="form-label">Nama Acara</label>
                <input type="text" id="nama_acara" name="nama_acara"
                       class="form-control"
                       value="{{ old('nama_acara', $preorder->nama_acara) }}">
            </div>

            <div class="col-md-4 mb-3">
                <label for="nama" class="form-label">Nama Pemesan</label>
                <input type="text" id="nama" name="nama"
                       class="form-control"
                       value="{{ old('nama', $preorder->nama) }}" required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="nomor_hp" class="form-label">Nomor HP</label>
                <input type="text" id="nomor_hp" name="nomor_hp"
                       class="form-control"
                       value="{{ old('nomor_hp', $preorder->nomor_hp) }}">
            </div>
        </div>

        <div class="row">
            {{-- pilih menu --}}
            <div class="col-md-4 mb-3">
                <label for="menu" class="form-label">Pilih Menu</label>
                <select id="menu" name="menu_id" class="form-select" required>
                    <option value="">-- Pilih Menu --</option>
                    @foreach ($menu as $m)
                        <option value="{{ $m->id }}"
                            {{ old('menu_id', $preorder->menu_id) == $m->id ? 'selected' : '' }}>
                            {{ $m->nama_menu }} - Rp{{ number_format($m->harga, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2 mb-3">
                <label for="qty" class="form-label">Jumlah (Qty)</label>
                <input type="number" id="qty" name="qty"
                       class="form-control"
                       value="{{ old('qty', $preorder->qty) }}" min="1">
            </div>

            <div class="col-md-3 mb-3">
                <label for="jam_acara" class="form-label">Jam Acara</label>
                <input type="time" id="jam_acara" name="jam_acara"
                       class="form-control"
                       value="{{ old('jam_acara', $preorder->jam_acara) }}">
            </div>

            <div class="col-md-3 mb-3">
                <label for="tanggal_acara" class="form-label">Tanggal Acara</label>
                <input type="date" id="tanggal_acara" name="tanggal_acara"
                       class="form-control"
                       value="{{ old('tanggal_acara', $preorder->tanggal_acara) }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="status_pembayaran" class="form-label">Metode Pembayaran</label>
                <select id="status_pembayaran" name="status_pembayaran" class="form-select">
                    <option value="DP" {{ old('status_pembayaran', $preorder->status_pembayaran) == 'DP' ? 'selected' : '' }}>DP</option>
                    <option value="Lunas" {{ old('status_pembayaran', $preorder->status_pembayaran) == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                </select>
            </div>

            <div class="col-md-8 mb-3">
                <label for="lokasi" class="form-label">Lokasi Acara</label>
                <input type="text" id="lokasi" name="lokasi"
                       class="form-control"
                       value="{{ old('lokasi', $preorder->lokasi) }}"
                       placeholder="Contoh: Sleman, Yogyakarta">
            </div>
        </div>

        <div class="mb-3">
            <label for="dokumentasi" class="form-label">Link Dokumentasi (opsional)</label>
            <input type="url" id="dokumentasi" name="dokumentasi"
                   class="form-control"
                   value="{{ old('dokumentasi', $preorder->dokumentasi) }}"
                   placeholder="https://drive.google.com/...">
        </div>

        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan / Instruksi</label>
            <textarea id="catatan" name="catatan" class="form-control" rows="3">{{ old('catatan', $preorder->catatan) }}</textarea>
        </div>

        <button type="submit" class="btn btn-warning w-100 fw-semibold">💾 Simpan Perubahan</button>
    </form>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif
</div>

@endsection
