<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::statement("ALTER TABLE pre_orders MODIFY status_pembayaran ENUM('dp', 'lunas') NOT NULL DEFAULT 'dp'");
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesanan', function (Blueprint $table) {
            //
        });
    }
};
