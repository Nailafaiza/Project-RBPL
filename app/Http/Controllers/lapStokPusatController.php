<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StokBarang;  

class lapStokPusatController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $stok = StokBarang::when($search, function ($query, $search) {
            return $query->where('nama_barang', 'like', '%' . $search . '%');
        })->get();

        $from = $request->input('from');

        if ($from == 'gudang') {
            return view('gudang.lap_stok', compact('stok'));
        } else if ($from == 'admin') {
            return view('admin.stok_barang', compact('stok'));
        }else{
            return view('pusat.lap_stok', compact('stok'));
        }
    }

}
