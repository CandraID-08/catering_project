<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Preorder - Dapur Ibu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow">
        <div class="card-body">
            <h3 class="mb-4">✏️ Edit Pesanan - {{ $order->nama }}</h3>

            {{-- ALERT SUKSES --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- FORM UPDATE --}}
            <form method="POST" action="{{ route('admin.preorder.update', $order->id) }}">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Pemesan</label>
                        <input type="text" name="nama" value="{{ $order->nama }}" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Menu</label>
                        <input type="text" name="menu" value="{{ $order->menu }}" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Acara</label>
                        <input type="text" name="nama_acara" value="{{ $order->nama_acara }}" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">No. HP</label>
                        <input type="text" name="nomor_hp" value="{{ $order->nomor_hp }}" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Jumlah (Qty)</label>
                        <input type="number" name="qty" value="{{ $order->qty }}" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Jam Acara</label>
                        <input type="time" name="jam_acara" value="{{ $order->jam_acara }}" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Tanggal Acara</label>
                        <input type="date" name="tanggal_acara" value="{{ $order->tanggal_acara }}" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status Pembayaran</label>
                        <select name="status_pembayaran" class="form-select" required>
                            <option value="Lunas" {{ $order->status_pembayaran == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                            <option value="DP" {{ $order->status_pembayaran == 'DP' ? 'selected' : '' }}>DP</option>
                            <option value="Belum Bayar" {{ $order->status_pembayaran == 'Belum Bayar' ? 'selected' : '' }}>Belum Bayar</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Lokasi Acara</label>
                        <input type="text" name="lokasi" value="{{ $order->lokasi }}" class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Catatan Tambahan</label>
                        <textarea name="catatan" class="form-control" rows="3">{{ $order->catatan }}</textarea>
                    </div>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-success">💾 Simpan Perubahan</button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">⬅️ Kembali</a>
                </div>
            </form>

            {{-- FORM HAPUS (dipisah dari form update) --}}
            <form action="{{ route('admin.preorder.destroy', $order->id) }}" method="POST" 
                  onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')" class="mt-3">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger w-100">🗑️ Hapus Pesanan Ini</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
