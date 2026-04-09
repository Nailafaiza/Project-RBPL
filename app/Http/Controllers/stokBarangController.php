<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StokBarang;

class stokBarangController extends Controller
{
    public function index()
    {
        $stok = StokBarang::all();

        return view('admin.stok_barang', compact('stok'));
    }

    public function edit($id)
    {
        $stok = StokBarang::findOrFail($id);

        return view('admin.edit_stok_barang', compact('stok'));
    }

    public function update(Request $request, $id)
    {
        $stok = StokBarang::findOrFail($id);

        $stok->update([
            'jumlah' => $request->jumlah
        ]);

        return redirect()->route('stokBarang.index')
            ->with('success', 'Stok berhasil diperbarui!');
    }
}
