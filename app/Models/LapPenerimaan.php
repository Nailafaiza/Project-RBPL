<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LapPenerimaan extends Model
{
    protected $table = 'lap_penerimaans';

    protected $fillable = [
        'nama_barang',
        'tanggal_penerimaan',
        'jumlah',
        'kondisi_barang'
    ];
}
