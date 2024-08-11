<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Handle the login attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            // Kembalikan ke halaman login dengan error jika validasi gagal
            return Redirect::back()->withErrors($validator)->withInput();
        }

        // Ambil kredensial dari request
        $credentials = $request->only('username', 'password');

        // Coba login dengan kredensial
        if (Auth::attempt($credentials)) {
            // Jika berhasil login, redirect berdasarkan peran pengguna
            if (Auth::user()->role == 'admin') {
                return redirect('/admin');
            } else {
                return redirect('/kasir');
            }
        } else {
            // Jika login gagal, kembalikan ke halaman login dengan pesan error
            return Redirect::back()->with('error', 'Login failed. Please check your credentials and try again.');
        }
    }
}
