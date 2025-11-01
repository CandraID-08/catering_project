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
            'qty' => 'nullable|integer|min:1',
            'jam_acara' => 'nullable',
            'tanggal_acara' => 'nullable|date',
            'status_pembayaran' => 'nullable|in:DP,Lunas,Belum bayar',
            'lokasi' => 'nullable|string|max:255',
            'dokumentasi' => 'nullable|url',
            'catatan' => 'nullable|string',
        ]);

        $menu = Menu::find($request->menu_id);

        PreOrder::create([
            'menu_id' => $request->menu_id,
            'menu' => $menu->nama_menu, // backup nama menu
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
}