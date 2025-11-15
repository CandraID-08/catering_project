<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id', 'menu', 'nama', 'nama_acara', 'nomor_hp',
        'qty', 'jam_acara', 'tanggal_acara', 'status_pembayaran',
        'lokasi', 'dokumentasi', 'catatan', 'status_approve'
    ];

    protected $casts = [
        'status_approve' => 'boolean',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
