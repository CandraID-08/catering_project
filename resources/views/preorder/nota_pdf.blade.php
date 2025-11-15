<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nota Pre-Order - Dapur Ibu Catering</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; line-height: 1.6; color: #333; }
        header { background: #f8c471; padding: 20px; text-align: center; border-radius: 8px; }
        header h1 { margin: 0; font-size: 1.8rem; color: #fff; text-shadow: 1px 1px 2px #b5651d; }
        p { margin: 5px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ccc; }
        th { background: #f7dc6f; color: #333; padding: 10px; text-align: left; }
        td { padding: 8px; }
        tr:nth-child(even) { background: #fff9e6; }
        .highlight { background: #fcf3cf; padding: 5px 8px; border-radius: 4px; }
        .total { text-align: right; font-weight: bold; color: #c0392b; font-size: 1.1rem; }
        .note { margin-top: 20px; font-size: 0.85rem; color: #555; }
        footer { margin-top: 30px; font-size: 0.85rem; color: #555; border-top: 1px dashed #ccc; padding-top: 10px; }
    </style>
</head>
<body>
    <header>
        <h1>Nota Pre-Order Catering</h1>
        <p>Dapur Ibu Catering</p>
    </header>

    <section>
        <p><strong>Nama Pemesan:</strong> {{ $preorder->nama }}</p>
        <p><strong>Nama Acara:</strong> {{ $preorder->nama_acara }}</p>
        <p><strong>Tanggal Acara:</strong> {{ $preorder->tanggal_acara }}</p>
        <p><strong>Jam Acara:</strong> {{ $preorder->jam_acara ?? '-' }}</p>
        <p><strong>Lokasi:</strong> {{ $preorder->lokasi ?? '-' }}</p>
        <p><strong>Status Pembayaran:</strong> {{ ucfirst($preorder->status_pembayaran) }} - {{ $keterangan }}</p>
    </section>

    <table>
        <thead>
            <tr>
                <th>Menu</th>
                <th>Harga Satuan</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $menu->nama_menu }}</td>
                <td>Rp{{ number_format($menu->harga, 0, ',', '.') }}</td>
                <td>{{ $preorder->qty }}</td>
                <td class="highlight">Rp{{ number_format($totalHarga, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <p class="total">
        Jumlah yang dibayar sekarang: <span class="highlight">Rp{{ number_format($bayar, 0, ',', '.') }}</span>
    </p>

    @if($sisa > 0)
        <p class="total">
            Sisa yang harus dibayar: <span class="highlight">Rp{{ number_format($sisa, 0, ',', '.') }}</span>
        </p>
    @else
        <p class="total">
            Total sudah lunas: <span class="highlight">Rp{{ number_format($bayar, 0, ',', '.') }}</span>
        </p>
    @endif

    <p class="note">
        Catatan: Pelunasan sisa pembayaran maksimal 2 hari sebelum tanggal acara.<br>
        Jika sisa pembayaran tidak dilakukan sampai batas waktu, pesanan dianggap batal dan DP tidak dapat dikembalikan.
    </p>

    <footer>
        Dapur Ibu Catering - Telp: 0812-xxxx-xxxx | Email: info@dapuribu.id <br>
        Terima kasih telah mempercayakan catering Anda kepada kami!
    </footer>
</body>
</html>
