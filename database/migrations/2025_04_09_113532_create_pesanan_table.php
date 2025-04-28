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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->bigIncrements('id_pesanan');
            $table->foreignId('id_user')->constrained('users', 'id')->onDelete('cascade');
            $table->foreignId('id_produk')->constrained('produk', 'id_produk')->onDelete('cascade');
            $table->foreignId('id_alamat')->constrained('alamat', 'id_alamat')->onDelete('cascade');
            $table->string('id_pembayaran')->nullable();
            $table->enum('status_pesanan', ['Menunggu Pembayaran', 'Pembayaran Diterima', 'Sedang Diproses', 'Pesanan Dibatalkan', 'Pesanan Dikirim', 'Pesanan Diterima']);
            $table->string('nomor_resi')->nullable();
            $table->string('ekspedisi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
