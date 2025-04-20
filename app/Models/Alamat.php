<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    protected $table = 'alamat';
    protected $primaryKey = 'id_alamat';

    protected $fillable = [
        'id_user',
        'nama',
        'no_whatsapp',
        'alamat',
        'utama',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
