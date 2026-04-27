<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function cetakPDF(Request $request) 
    {
        $bulan = $request->bulan;

        $data = DB::table('lap_penjualans') 
            ->select(
                'nama_barang',
                DB::raw('SUM(jumlah) as total_terjual'),
                DB::raw('SUM(total_pendapatan) as total_pendapatan')
            )
            ->whereMonth('created_at', $bulan)
            ->groupBy('nama_barang')
            ->get();

        $pdf = Pdf::loadView('admin.laporan_pdf', compact('data', 'bulan'));

        return $pdf->download('laporan_penjualan.pdf');
    }
}