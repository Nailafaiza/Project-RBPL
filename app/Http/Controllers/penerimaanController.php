<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LapPenerimaan;
use App\Models\StokBarang;

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
            'jumlah' => 'required|numeric|min:1',
            'kondisi_barang' => 'required'
        ], [
            'nama_barang.required' => 'Nama barang tidak boleh kosong!',

            'tanggal_penerimaan.required' => 'Tanggal penerimaan tidak boleh kosong!',
            'tanggal_penerimaan.date' => 'Format tanggal tidak valid!',

            'jumlah.required' => 'Jumlah barang tidak boleh kosong!',
            'jumlah.numeric' => 'Jumlah barang harus berupa angka!',
            'jumlah.min' => 'Jumlah barang minimal 1!',

            'kondisi_barang.required' => 'Kondisi barang wajib diisi!'
        ]);

        LapPenerimaan::create([
            'nama_barang' => $request->nama_barang,
            'tanggal_penerimaan' => $request->tanggal_penerimaan,
            'jumlah' => $request->jumlah,
            'kondisi_barang' => $request->kondisi_barang,
        ]);

        $stok = StokBarang::where('nama_barang', $request->nama_barang)->first();

        if ($stok) {

            $stok->jumlah += $request->jumlah;
            $stok->save();

        } else {

            StokBarang::create([
                'nama_barang' => $request->nama_barang,
                'jumlah' => $request->jumlah
            ]);
        }

        return redirect()->back()
            ->with('success', 'Data berhasil disimpan!');
    }
}