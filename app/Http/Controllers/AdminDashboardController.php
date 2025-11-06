<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PreOrder;


class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        $preorders = PreOrder::orderBy('created_at', 'desc')->get();
        return view('admin.dashboard', compact('preorders'));
    }

     public function index()
    {
        $preorders = Preorder::latest()->get();
        return view('admin.dashboard', compact('preorders'));
    }

    public function edit($id)
    {
        $order = Preorder::findOrFail($id);
        return view('admin.edit-preorder', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'menu' => 'required|string|max:100',
            'nama_acara' => 'nullable|string|max:100',
            'nomor_hp' => 'required|string|max:20',
            'qty' => 'required|integer|min:1',
            'jam_acara' => 'nullable',
            'tanggal_acara' => 'nullable|date',
            'status_pembayaran' => 'required|in:Lunas,DP,Belum Bayar',
            'lokasi' => 'nullable|string|max:255',
            'catatan' => 'nullable|string|max:255',
        ]);

        $order = \App\Models\Preorder::findOrFail($id);

        $order->update($request->only([
            'nama',
            'menu',
            'nama_acara',
            'nomor_hp',
            'qty',
            'jam_acara',
            'tanggal_acara',
            'status_pembayaran',
            'lokasi',
            'catatan',
        ]));

        return redirect()->route('admin.dashboard')->with('success', 'Pesanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $order = \App\Models\Preorder::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Pesanan berhasil dihapus.');
    }

}
