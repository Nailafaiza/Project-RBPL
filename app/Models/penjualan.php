<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    protected $table = 'penjualan';
    protected $fillable = [
        'nama_barang',
        'jumlah_terjual',
        'harga_satuan',
        'total',
    ];
}
