<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PreOrder;
use App\Models\Menu;

class PreOrderController extends Controller
{
    public function create()
    {
        $menu = Menu::all();
        return view('preorder.create', compact('menu'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'menu_id' => 'required|exists:menus,id',
            'qty' => 'required|integer|min:10', // MINIMAL 10
            'jam_acara' => 'nullable',
            'tanggal_acara' => 'nullable|date',
            'status_pembayaran' => 'nullable|in:DP,Lunas',
            'lokasi' => 'nullable|string|max:255',
            'dokumentasi' => 'nullable|url',
            'catatan' => 'nullable|string',
        ]);

        $menu = Menu::find($request->menu_id);

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
        ]);

        return redirect()->back()->with('success', 'Pre-order berhasil dikirim!');
    }

    public function getEvents()
    {
        $events = \App\Models\PreOrder::all();
    
        $formattedEvents = $events->map(function($event) {
            return [
                'id' => $event->id,
                'title' => $event->nama_acara . ' (' . $event->status_pembayaran . ')',
                'start' => $event->tanggal_acara,
                'description' => $event->nama,
                'color' => match ($event->status_pembayaran) {
                    'lunas' => '#28a745',
                    'dp' => '#ff7b00',
                    default => '#6c757d',
                },
            ];
        });
    
        return response()->json($formattedEvents);
    }
    
    public function show($id)
    {
        $preorder = PreOrder::findOrFail($id);
        return view('detailbook', compact('preorder'));
    }

    public function edit($id)
    {
        $preorder = PreOrder::findOrFail($id);
        $menu = Menu::all();
        return view('preorder.edit', compact('preorder', 'menu'));
    }
    
    public function destroy($id) {
        $preorder = PreOrder::findOrFail($id);
        $preorder->delete();
        return redirect('/')->with('success', 'Pesanan berhasil dihapus.');
    }
    
    public function generateNota($id) {
        $preorder = PreOrder::findOrFail($id);
        return view('preorder.nota', compact('preorder'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'menu_id' => 'required|exists:menus,id',
            'nama_acara' => 'nullable|string|max:100',
            'nomor_hp' => 'required|string|max:20',
            'qty' => 'required|integer|min:10', // MINIMAL 10
            'jam_acara' => 'nullable',
            'tanggal_acara' => 'nullable|date',
            'status_pembayaran' => 'required|in:DP,Lunas',
            'lokasi' => 'nullable|string|max:255',
            'catatan' => 'nullable|string|max:255',
        ]);

        $order = PreOrder::findOrFail($id);

        $order->update($request->only([
            'menu_id',
            'nama',
            'nama_acara',
            'nomor_hp',
            'qty',
            'jam_acara',
            'tanggal_acara',
            'status_pembayaran',
            'lokasi',
            'catatan',
        ]));

        return redirect()->route('home')->with('success', 'Pesanan berhasil diperbarui.');
    }
    
}
