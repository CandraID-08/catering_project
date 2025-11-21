<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PreOrder;
use App\Models\Menu;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class PreOrderController extends Controller
{
    // Halaman create preorder
    public function create()
    {
        $menu = Menu::all();
        return view('preorder.create', compact('menu'));
    }

    // Store preorder baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'menu_id' => 'required|exists:menus,id',
            'qty' => 'required|integer|min:10',
            'nama_acara' => 'nullable|string|max:255',
            'nomor_hp' => 'required|string|max:20',
            'jam_acara' => 'nullable',
            'tanggal_acara' => 'required|date',
            'status_pembayaran' => 'nullable|in:DP,Lunas',
            'lokasi' => 'nullable|string|max:255',
            'dokumentasi' => 'nullable|url',
            'catatan' => 'nullable|string|max:255',
        ]);

        $tanggal = Carbon::parse($request->tanggal_acara)->toDateString();

        // Maksimal 3 pemesan per tanggal
        $jumlahPesananHariIni = PreOrder::where('tanggal_acara', $tanggal)->count();
        if ($jumlahPesananHariIni >= 3) {
            return back()->withErrors(['tanggal_acara' => 'Maaf, untuk tanggal ini sudah mencapai maksimal 3 pemesan.']);
        }

        $menu = Menu::findOrFail($request->menu_id);

        PreOrder::create([
            'menu_id' => $request->menu_id,
            'menu' => $menu->nama_menu,
            'nama' => $request->nama,
            'nama_acara' => $request->nama_acara,
            'nomor_hp' => $request->nomor_hp,
            'qty' => $request->qty,
            'jam_acara' => $request->jam_acara,
            'tanggal_acara' => $request->tanggal_acara,
            'status_pembayaran' => $request->status_pembayaran ?? 'DP',
            'lokasi' => $request->lokasi,
            'dokumentasi' => $request->dokumentasi,
            'catatan' => $request->catatan,
            'status_approve' => false,
        ]);


        // buat template pesan WA
        $pesanWA = urlencode(
            "Halo Admin, saya ingin konfirmasi pre-order.\n\n" .
            "Nama Pemesan: {$request->nama}\n" .
            "Nama Acara: {$request->nama_acara}\n" .
            "Tanggal: {$request->tanggal_acara}\n" .
            "Jam: {$request->jam_acara}\n" .
            "Menu: {$menu->nama_menu}\n" .
            "Jumlah: {$request->qty}\n" .
            "Lokasi: {$request->lokasi}\n\n" .
            "Mohon dikonfirmasi ya, terima kasih!"
        );

        return redirect()->back()->with([
            'success' => 'Pre-order berhasil dikirim! Menunggu konfirmasi admin.',
            'wa_message' => $pesanWA
        ]);

    }

    // Get events untuk kalender
public function getEvents()
{
    // Ambil semua preorder yang sudah di-approve
    $events = PreOrder::where('status_approve', true)->get();

$formattedEvents = $events->map(function($event) {
    return [
        'id' => $event->id,
        'title' => $event->nama_acara . ' (' . $event->status_pembayaran . ')',
        'start' => date('Y-m-d', strtotime($event->tanggal_acara)),
        'description' => $event->nama,
        'color' => match (strtolower($event->status_pembayaran)) {
            'lunas' => '#28a745',
            'dp' => '#ff7b00',
            default => '#6c757d',
        },
        'extendedProps' => [
            'status' => strtolower($event->status_pembayaran),
        ]
    ];
});


    return response()->json($formattedEvents);
}


    // Detail preorder (admin)
    public function show($id)
    {
        $preorder = PreOrder::findOrFail($id);
        return view('detailbook', compact('preorder'));
    }

    // Edit preorder
    public function edit($id)
    {
        $preorder = PreOrder::findOrFail($id);
        $menu = Menu::all();
        return view('preorder.edit', compact('preorder', 'menu'));
    }

    // Update preorder
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'menu_id' => 'required|exists:menus,id',
            'nama_acara' => 'nullable|string|max:100',
            'nomor_hp' => 'required|string|max:20',
            'qty' => 'required|integer|min:10',
            'jam_acara' => 'nullable',
            'tanggal_acara' => 'nullable|date',
            'status_pembayaran' => 'required|in:DP,Lunas',
            'lokasi' => 'nullable|string|max:255',
            'catatan' => 'nullable|string|max:255',
        ]);

        $order = PreOrder::findOrFail($id);
        $order->update($request->only([
            'menu_id','nama','nama_acara','nomor_hp','qty','jam_acara',
            'tanggal_acara','status_pembayaran','lokasi','catatan'
        ]));

        return redirect()->route('home')->with('success', 'Pesanan berhasil diperbarui.');
    }

    // Hapus preorder
    public function destroy($id)
    {
        $preorder = PreOrder::findOrFail($id);
        $preorder->delete();
        return redirect()->back()->with('success', 'Pesanan berhasil dihapus.');
    }

    // Approve preorder
    public function approve($id)
    {
        $preorder = PreOrder::findOrFail($id);
        $preorder->status_approve = true;
        $preorder->save();

        return redirect()->back()->with('success', 'Pesanan telah disetujui dan tampil di kalender.');
    }
   public function listForApprove()
    {
        // Ambil semua preorder yang belum di-approve
        $preorders = \App\Models\PreOrder::where('status_approve', false)->get();

        // Tampilkan ke view
        return view('admin.approve', compact('preorders'));
    }

    // Generate nota view biasa
    public function generateNota($id)
    {
        $preorder = PreOrder::findOrFail($id);
        $menu = $preorder->menu()->first();
        $hargaMenu = $menu->harga;
        $totalHarga = $preorder->qty * $hargaMenu;
        $bayar = $preorder->status_pembayaran === 'DP' ? $totalHarga * 0.5 : $totalHarga;

        return view('preorder.nota', compact('preorder', 'menu', 'totalHarga', 'bayar'));
    }

   // Generate nota PDF
    public function generateNotaPDF($id)
    {
        // Ambil data preorder dan menu terkait
        $preorder = PreOrder::findOrFail($id);
        $menu = $preorder->menu()->first();

        // Hitung total harga
        $totalHarga = $preorder->qty * $menu->harga;

        // Pastikan status pembayaran lowercase
        $status = strtolower($preorder->status_pembayaran);

        if ($status === 'dp') {
            $bayar = round($totalHarga * 0.5); // DP = 50%
            $sisa = $totalHarga - $bayar;       // Sisa = 50%
            $keterangan = "DP (50% dari total harga)";
        } else {
            $bayar = $totalHarga;               // Lunas = 100%
            $sisa = 0;                           // Tidak ada sisa
            $keterangan = "Lunas (100% dari total harga)";
        }

        // Kirim semua variabel ke view nota PDF
        $pdf = Pdf::loadView('preorder.nota_pdf', compact('preorder', 'menu', 'totalHarga', 'bayar', 'sisa', 'keterangan'));

        // Download PDF
        return $pdf->download('nota_preorder_' . $preorder->id . '.pdf');
    }

}
