<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPenjualan extends Model
{
    protected $primaryKey = 'id_laporan';

    protected $fillable = [
        'id_user',
        'tanggal_laporan',
        'periode_bulan',
        'periode_tahun',
        'total_transaksi',
        'jumlah_pesanan',
        'total_produk_terjual',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
