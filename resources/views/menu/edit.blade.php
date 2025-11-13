@extends('app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Menu</h2>

    <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_menu" class="form-label">Nama Menu</label>
            <input type="text" class="form-control" id="nama_menu" name="nama_menu" value="{{ old('nama_menu', $menu->nama_menu) }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ old('deskripsi', $menu->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', $menu->harga) }}" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label><br>
            @if($menu->gambar)
                <img src="{{ asset('storage/' . $menu->gambar) }}" alt="Gambar Menu" width="200" class="mb-2">
            @endif
            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar</small>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('menu.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
