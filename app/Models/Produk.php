<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'id_user',
        'nama_produk',
        'kategori_produk',
        'deskripsi',
        'harga',
        'kualitas',
        'size',
        'stok',
        'gambar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'id_produk');
    }

}
