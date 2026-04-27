<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
public function cetakPdf(Request $request)
{
    $bulan = $request->bulan ?? date('m');

    $data = Penjualan::selectRaw('nama_barang, SUM(jumlah) as total_terjual, SUM(total_pendapatan) as total_pendapatan')
        ->whereMonth('created_at', $bulan)
        ->groupBy('nama_barang')
        ->get();

    $totalPendapatan = $data->sum('total_pendapatan');

    $terlaris = $data->sortByDesc('total_terjual')->first();

    $pdf = Pdf::loadView('laporan_pdf', compact('data', 'totalPendapatan', 'terlaris', 'bulan'));

    return $pdf->download('laporan_penjualan.pdf');
}
}