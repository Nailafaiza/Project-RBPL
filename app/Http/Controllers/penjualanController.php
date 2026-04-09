<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penjualan;

class penjualanController extends Controller
{
    public function penjualan()
    {
        return view('admin.penjualan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'jumlah_terjual' => 'required',
            'harga_satuan' => 'required',
            'total' => 'required'
        ],[
            'nama_barang.required' => 'Nama barang harus diisi!',
            'jumlah_terjual.required' => 'Jumlah terjual harus diisi!',
            'harga_satuan.required' => 'Harga satuan harus diisi!',
            'total.required' => 'Total harus diisi!'
        ]);

        penjualan::create([
            'nama_barang' => $request->nama_barang,
            'jumlah_terjual' => $request->jumlah_terjual,
            'harga_satuan' => $request->harga_satuan,
            'total' => $request->total,
        ]);
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}
