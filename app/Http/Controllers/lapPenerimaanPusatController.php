<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LapPenerimaan;

class lapPenerimaanPusatController extends Controller
{
    public function index() {
        return view('pusat.lap_penerimaan');
    }
}
