@extends('app')

@section('title', 'Daftar Pesanan Baru')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Pesanan Baru Menunggu Approve</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">  <!-- Tambahan untuk HP -->
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Pemesan</th>
                    <th>No HP</th>
                    <th>Menu</th>
                    <th>Qty</th>
                    <th>Tanggal Acara</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($preorders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->nama }}</td>
                    <td>{{ $order->nomor_hp }}</td>
                    <td>{{ $order->menu }}</td>
                    <td>{{ $order->qty }}</td>
                    <td>{{ \Carbon\Carbon::parse($order->tanggal_acara)->format('d-m-Y') }}</td>

                    <td>
                        @if($order->status_approve)
                            <span class="badge bg-success">Approved</span>
                        @else
                            <span class="badge bg-warning text-dark">Pending</span>
                        @endif
                    </td>

                    <td class="d-flex flex-column">
                        @if(!$order->status_approve)
                            <a href="{{ route('preorder.approve', $order->id) }}" class="btn btn-success btn-sm mb-1">
                                Approve
                            </a>
                        @endif

                        <form action="{{ route('preorder.destroy', $order->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mb-1"
                                onclick="return confirm('Yakin ingin menghapus pesanan ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>

        </table>
    </div> <!-- END table-responsive -->

</div>
@endsection
