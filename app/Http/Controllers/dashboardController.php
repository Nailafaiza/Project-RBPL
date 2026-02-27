<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function gudang()
    {
        if (Session::get('role') !== 'manajer_gudang') {
            return redirect('/login');
        }

        return view('gudang.dashboard');
    }

    public function admin()
    {
        if (Session::get('role') !== 'admin_toko') {
            return redirect('/login');
        }

        return view('admin.dashboard');
    }

    public function pusat()
    {
        if (Session::get('role') !== 'manajer_pusat') {
            return redirect('/login');
        }

        return view('pusat.dashboard');
    }
}