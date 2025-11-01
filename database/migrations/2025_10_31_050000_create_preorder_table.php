<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pre_orders', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel menus
            $table->foreignId('menu_id')
                  ->nullable()
                  ->constrained('menus')
                  ->onDelete('set null');

            // Menyimpan nama menu juga (backup teks)
            $table->string('menu')->nullable();

            $table->string('nama');
            $table->string('nama_acara')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->integer('qty')->nullable();
            $table->time('jam_acara')->nullable();
            $table->date('tanggal_acara')->nullable();
            $table->enum('status_pembayaran', ['DP', 'Lunas', 'Belum bayar'])->default('DP');
            $table->string('lokasi')->nullable();
            $table->string('dokumentasi')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pre_orders');
    }
};
