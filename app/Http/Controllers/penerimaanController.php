<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LapPenerimaan; 



class penerimaanController extends Controller
{

    public function lap_penerimaan()
    {
    return view('gudang.lap_penerimaan'); 
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'nama_barang' => 'required',
            'tanggal_penerimaan' => 'required|date',
            'jumlah' => 'required|numeric',
            'kondisi_barang' => 'required'
        ]);

        // simpan ke database
        LapPenerimaan::create([
            'nama_barang' => $request->nama_barang,
            'tanggal_penerimaan' => $request->tanggal_penerimaan,
            'jumlah' => $request->jumlah,
            'kondisi_barang' => $request->kondisi_barang,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}
