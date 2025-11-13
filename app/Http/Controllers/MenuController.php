<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index', compact('menus'));
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $gambarPath = null;
    
        if ($request->hasFile('gambar')) {
            // simpan ke storage/app/public/menus
            $gambarPath = $request->file('gambar')->store('menus', 'public');
        }
    
        Menu::create([
            'nama_menu' => $request->nama_menu,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'gambar' => $gambarPath,
        ]);
    
        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan!');
    }
    

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menu.edit', compact('menu'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $menu = Menu::findOrFail($id);
    
        // kalau ada gambar baru diupload
        if ($request->hasFile('gambar')) {
            // hapus gambar lama (jika ada)
            if ($menu->gambar && file_exists(storage_path('app/public/' . $menu->gambar))) {
                unlink(storage_path('app/public/' . $menu->gambar));
            }
    
            // simpan gambar baru
            $gambarPath = $request->file('gambar')->store('menus', 'public');
            $menu->gambar = $gambarPath;
        }
    
        $menu->nama_menu = $request->nama_menu;
        $menu->deskripsi = $request->deskripsi;
        $menu->harga = $request->harga;
    
        $menu->save();
    
        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui!');
    }
    

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        // hapus gambar juga
        if ($menu->gambar && Storage::disk('public')->exists($menu->gambar)) {
            Storage::disk('public')->delete($menu->gambar);
        }

        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus!');
    }
}
