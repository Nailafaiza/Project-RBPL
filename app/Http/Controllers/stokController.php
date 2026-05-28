<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StokBarang;

class stokController extends Controller
{
    public function index()
    {
        $stok = StokBarang::all();

        return view('gudang.lap_stok', compact('stok'));
    }

    public function edit($id)
    {
        $stok = StokBarang::findOrFail($id);

        return view('gudang.edit_lap_stok', compact('stok'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|numeric|min:1'
        ], [
            'jumlah.required' => 'Jumlah barang tidak boleh kosong!',
            'jumlah.numeric' => 'Jumlah barang harus berupa angka!',
            'jumlah.min' => 'Jumlah barang minimal 1!'
        ]);

        $stok = StokBarang::findOrFail($id);

        $stok->update([
            'jumlah' => $request->jumlah
        ]);

        return redirect()->route('stok.index')
            ->with('success', 'Stok berhasil diperbarui!');
    }
}