<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ambil file untuk slider
        $files = array_diff(scandir(public_path('assets/image')), ['.', '..']);
    
        // ambil total orderan real dari DB
        $totalOrder = \DB::table('pre_orders') // ganti 'orders' kalau tabelmu beda
                    ->where('status_pembayaran', 'lunas')
                    ->count();
    
        // kirim ke view
        return view('home', compact('files', 'totalOrder'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
