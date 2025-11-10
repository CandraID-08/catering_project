@extends('app')

@section('title', 'Edit Preorder')

@section('content')
<div class="container py-4">
    <h2 class="mb-4" style="font-size: 1.75rem; font-weight: 600;">Edit Preorder</h2>

    <div class="bg-white shadow rounded p-4">
        <form action="{{ route('preorder.update', $preorder->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pemesan</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $preorder->nama) }}" required>
            </div>

            <div class="mb-3">
                <label for="nama_acara" class="form-label">Nama Acara</label>
                <input type="text" class="form-control" id="nama_acara" name="nama_acara" value="{{ old('nama_acara', $preorder->nama_acara) }}" required>
            </div>

            <div class="mb-3">
                <label for="menu" class="form-label">Menu</label>
                <select class="form-select" id="menu" name="menu_id" required>
                    @foreach($menu as $item)
                        <option value="{{ $item->id }}" {{ $preorder->menu_id == $item->id ? 'selected' : '' }}>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="qty" class="form-label">Qty</label>
                <input type="number" class="form-control" id="qty" name="qty" value="{{ old('qty', $preorder->qty) }}" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_acara" class="form-label">Tanggal Acara</label>
                <input type="date" class="form-control" id="tanggal_acara" name="tanggal_acara" value="{{ old('tanggal_acara', $preorder->tanggal_acara) }}" required>
            </div>

            <div class="mb-3">
                <label for="jam_acara" class="form-label">Jam Acara</label>
                <input type="time" class="form-control" id="jam_acara" name="jam_acara" value="{{ old('jam_acara', $preorder->jam_acara) }}" required>
            </div>

            <div class="mb-3">
                <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                <select class="form-select" id="status_pembayaran" name="status_pembayaran" required>
                    <option value="Belum Bayar" {{ $preorder->status_pembayaran == 'Belum Bayar' ? 'selected' : '' }}>Belum Bayar</option>
                    <option value="Lunas" {{ $preorder->status_pembayaran == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ old('lokasi', $preorder->lokasi) }}" required>
            </div>

            <div class="mb-3">
                <label for="catatan" class="form-label">Catatan</label>
                <textarea class="form-control" id="catatan" name="catatan" rows="3">{{ old('catatan', $preorder->catatan) }}</textarea>
            </div>

            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
