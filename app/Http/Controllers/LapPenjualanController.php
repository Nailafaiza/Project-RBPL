<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LapPenjualan;

class LapPenjualanController extends Controller
{
    public function index()
    {
        $laporan = LapPenjualan::all();

        return view('admin.lap_penjualan', compact('laporan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required',
            'total_pendapatan' => 'required',
            'periode' => 'required'
        ],[
            'nama_barang.required' => 'Nama barang harus diisi!',
            'jumlah.required' => 'Jumlah terjual harus diisi!',
            'total_pendapatan.required' => 'Total Pendapatan harus diisi!',
            'periode.required' => 'Periode harus diisi!'
        ]);
        LapPenjualan::create([
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'total_pendapatan' => $request->total_pendapatan,
            'periode' => $request->periode
        ]);

        return redirect()->route('lapPenjualan.index')
            ->with('success', 'Data berhasil ditambahkan!');
    }
}
