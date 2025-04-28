<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\DetailPesanan;
use App\Models\Keranjang;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Pesanan;
use GuzzleHttp\Psr7\Request;
use Illuminate\Container\Attributes\Auth;

class MidtransController extends Controller
{
    public function getSnapToken(Request $request)
{
    // Ambil keranjang pengguna yang sedang login
    $keranjang = Keranjang::where('id_user', Auth::id())->with('produk')->get();

    if ($keranjang->isEmpty()) {
        return response()->json(['message' => 'Keranjang kosong'], 400);
    }

    // Hitung total belanja
    $total = $keranjang->sum(function ($item) {
        return $item->produk->harga * $item->jumlah;
    });

    // Generate ID pesanan dan order_id untuk Midtrans
    $order_id = 'ORDER-' . strtoupper(Str::random(10));

    // Ambil alamat utama user
    $alamat = Alamat::where('id_user', Auth::id())->where('utama', true)->first();

    if (!$alamat) {
        return response()->json(['message' => 'Alamat utama tidak ditemukan'], 400);
    }

    // Simpan data pesanan
    $pesanan = Pesanan::create([
        'id_user'        => Auth::id(),
        'id_alamat'      => $alamat->id_alamat,
        'status_pesanan' => 'Menunggu Pembayaran',
        'id_pembayaran'  => $order_id,
        'created_at'     => now(),
        'updated_at'     => now(),
    ]);

    // Simpan detail pesanan
    foreach ($keranjang as $item) {
        DetailPesanan::create([
            'id_pesanan'  => $pesanan->id_pesanan,
            'id_produk'   => $item->produk->id_produk,
            'jumlah'      => $item->jumlah,
            'total_harga' => $item->produk->harga * $item->jumlah,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
    }

    // Persiapan data untuk Midtrans
    $params = [
        'transaction_details' => [
            'order_id'     => $order_id,
            'gross_amount' => $total,
        ],
        'customer_details' => [
            'first_name' => Auth::user()()->nama,
            'email'      => Auth::user()()->email,
        ],
    ];

    // Ambil Snap Token dari Midtrans
    try {
        $snapToken = Snap::getSnapToken($params);
        return response()->json(['snap_token' => $snapToken]);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Gagal mendapatkan Snap Token', 'error' => $e->getMessage()], 500);
    }
}

}
