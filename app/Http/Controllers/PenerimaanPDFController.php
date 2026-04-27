<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenerimaanPDFController extends Controller
{
    public function cetakPDF()
    {
        $data = DB::table('lap_penerimaans')->get();

        $pdf = Pdf::loadView('pusat.penerimaan_pdf', compact('data'));

        return $pdf->download('laporan_penerimaan.pdf');
    }
}