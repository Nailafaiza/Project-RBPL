<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function cetakPdfAdmin(Request $request)
    {
        $bulan = $request->bulan ?? date('m');

        $data = Penjualan::selectRaw('nama_barang, SUM(jumlah) as total_terjual, SUM(total_pendapatan) as total_pendapatan')
            ->whereMonth('created_at', $bulan)
            ->groupBy('nama_barang')
            ->get();

        $totalPendapatan = $data->sum('total_pendapatan');
        $terlaris = $data->sortByDesc('total_terjual')->first();

        $pdf = Pdf::loadView('admin.laporan_pdf', compact(
            'data',
            'totalPendapatan',
            'terlaris',
            'bulan'
        ));

        return $pdf->download('laporan_penjualan_admin.pdf');
    }
}