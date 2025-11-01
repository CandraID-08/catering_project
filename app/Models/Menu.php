<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';

    protected $fillable = [
        'nama_menu',
        'deskripsi',
        'harga',
        'gambar',
    ];

    /**
     * Relasi ke tabel pre_orders.
     * Satu menu bisa punya banyak preorder.
     */
    public function preOrders()
    {
        return $this->hasMany(PreOrder::class, 'menu_id');
    }
}
