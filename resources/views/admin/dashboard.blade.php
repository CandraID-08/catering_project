<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Dapur Ibu</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
    <h1 class="mb-4 text-center">📊 Data Pre Order</h1>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>Menu</th>
                        <th>Nama Acara</th>
                        <th>No. HP</th>
                        <th>Qty</th>
                        <th>Jam Acara</th>
                        <th>Tanggal Acara</th>
                        <th>Status Pembayaran</th>
                        <th>Lokasi</th>
                        <th>Catatan</th>
                        <th>Tanggal Input</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($preorders as $index => $order)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $order->nama }}</td>
                            <td>{{ $order->menu ?? '-' }}</td>
                            <td>{{ $order->nama_acara ?? '-' }}</td>
                            <td>{{ $order->nomor_hp ?? '-' }}</td>
                            <td class="text-center">{{ $order->qty ?? '-' }}</td>
                            <td>{{ $order->jam_acara ?? '-' }}</td>
                            <td>{{ $order->tanggal_acara ?? '-' }}</td>
                            <td>
                                <span class="badge 
                                    @if($order->status_pembayaran == 'Lunas') bg-success 
                                    @elseif($order->status_pembayaran == 'DP') bg-warning 
                                    @else bg-danger @endif">
                                    {{ $order->status_pembayaran }}
                                </span>
                            </td>
                            <td>{{ $order->lokasi ?? '-' }}</td>
                            <td>{{ $order->catatan ?? '-' }}</td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.preorder.edit', $order->id) }}" class="btn btn-sm btn-primary">
                                    ✏️ Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="13" class="text-center text-muted">Belum ada data pre order</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
