<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login'); // pakai notasi dot
    }

    public function loginProses(Request $request)
    {
        // validasi + pesan
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ], [
            'email.required'     => 'Email Harus Diisi',
            'email.email'        => 'Format email tidak valid',
            'password.required'  => 'Password Harus Diisi',
            'password.min'       => 'Password Minimal 8 Karakter',
        ]);

        // login
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate(); // penting untuk security
            return redirect()->intended(route('dashboard'));
        }

        return back()
            ->with('error', 'Email atau Password Salah!')
            ->onlyInput('email'); // isi email tetap terisi
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Berhasil Logout');
    }
}