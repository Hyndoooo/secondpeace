<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan_penjualan', function (Blueprint $table) {
            $table->id('id_laporan');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade'); // pakai 'id'
            $table->date('tanggal_laporan');
            $table->integer('periode_bulan');
            $table->integer('periode_tahun');
            $table->integer('total_transaksi');
            $table->integer('jumlah_pesanan');
            $table->integer('total_produk_terjual');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_penjualans');
    }
};
