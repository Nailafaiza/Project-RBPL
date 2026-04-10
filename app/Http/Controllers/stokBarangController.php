<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StokBarang;

class stokBarangController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $stok = StokBarang::when($search, function ($query, $search) {
            return $query->where('nama_barang', 'like', '%' . $search . '%');
        })->get();

        // Ambil asal halaman (gudang / admin)
        $from = $request->input('from');

        if ($from == 'gudang') {
            return view('gudang.lap_stok', compact('stok'));
        } else {
            return view('admin.stok_barang', compact('stok'));
        }
    }

    public function edit(Request $request, $id)
    {
        $stok = StokBarang::findOrFail($id);
        $from = $request->input('from');

        if ($from == 'gudang') {
            return view('gudang.edit_lap_stok', compact('stok', 'from'));
        } else {
            return view('admin.edit_stok_barang', compact('stok', 'from'));
        }
        if ($from == 'pusat'){
            return view('gudang.lap_stok');
        }
    }

    public function update(Request $request, $id)
    {
        $stok = StokBarang::findOrFail($id);

        $stok->update([
            'jumlah' => $request->jumlah
        ]);

        $from = $request->input('from');

        if ($from == 'gudang') {
            return redirect('/gudang/lap_stok')
                ->with('success', 'Stok berhasil diperbarui!');
        } else {
            return redirect('/admin/stok_barang')
                ->with('success', 'Stok berhasil diperbarui!');
        }
    }
}