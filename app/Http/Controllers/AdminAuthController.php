<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLogin()
    {
        if (session('admin_logged_in') === true) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    /**
     * Handle the authentication request.
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === 'ganydena' && $password === 'rancaupas') {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.dashboard')->with('success', 'Selamat datang kembali, Kak Gany! Dashboard admin siap digunakan. 👑✨');
        }

        return redirect()->route('admin.login')
            ->withInput($request->only('username'))
            ->with('error', 'Aduh sayang, username atau passwordnya salah tuh! Coba diinget lagi ya... 🤫🔐');
    }

    /**
     * Log out of the administration panel.
     */
    public function logout(Request $request)
    {
        $request->session()->forget('admin_logged_in');
        return redirect()->route('admin.login')->with('success', 'Berhasil logout. Sampai jumpa lagi, Kak Gany! 🧸👋');
    }
}
