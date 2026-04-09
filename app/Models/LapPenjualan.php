<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LapPenjualan extends Model
{
    protected $table = 'lap_penjualans';

    protected $fillable = [
        'nama_barang',
        'jumlah',
        'total_pendapatan',
        'periode'
    ];
}