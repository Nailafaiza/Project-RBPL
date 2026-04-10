<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penjualan;
use Illuminate\Support\Facades\DB;

class LapPenjualanController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->bulan ?? date('m');

        $data = penjualan::select(
                'nama_barang',
                DB::raw('SUM(jumlah_terjual) as total_terjual'),
                DB::raw('SUM(total) as total_pendapatan')
            )
            ->whereMonth('created_at', $bulan)
            ->groupBy('nama_barang')
            ->get();

        $totalPendapatan = $data->sum('total_pendapatan');

        $terlaris = $data->sortByDesc('total_terjual')->first();

        return view('admin.lapPenjualan', compact(
            'data',
            'totalPendapatan',
            'terlaris',
            'bulan'
        ));
    }
}