<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LapPenerimaan;

class lapPenerimaanPusatController extends Controller
{
    public function index()
    {
        $data = LapPenerimaan::all();
        return view('gudang.lap_penerimaan', compact('data'));
    }
}
