<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengguna;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function showLogin()
    {
        return view('welcome');
    }

    public function register(Request $request)
{
    $request->validate([
        'username' => 'required|unique:pengguna,username',
        'password' => 'required|min:6',
        'role'     => 'required'
    ], [
        'username.required' => 'Username wajib diisi.',
        'username.unique'   => 'Username sudah digunakan!!!',
        'password.required' => 'Password wajib diisi.',
        'password.min'      => 'Password minimal 6 karakter.',
        'role.required'     => 'Role.'
    ]);

    pengguna::create([
        'username' => $request->username,
        'password' => Hash::make($request->password), 
        'role'     => $request->role,
    ]);

    return redirect()->route('login')
        ->with('success', 'Registrasi berhasil. Silakan login.');
}

    public function login(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
        'role'     => 'required'
    ]);

    $user = pengguna::where('username', $request->username)->first();

    if (!$user) {
        return back()->with('error', 'Username tidak ditemukan');
    }

    if ($user->role !== $request->role) {
        return back()->with('error', 'Role tidak sesuai!');
    }

    if (!Hash::check($request->password, $user->password)) {
        return back()->with('error', 'Password salah');
    }

    Session::put('user_id', $user->id);
    Session::put('username', $user->username);
    Session::put('role', $user->role);

    switch ($user->role) {
        case 'manajer_gudang':
            return redirect('/gudang/dashboard');

        case 'admin_toko':
            return redirect('/admin/dashboard');

        case 'manajer_pusat':
            return redirect('/pusat/dashboard');
    }
}
    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }
}