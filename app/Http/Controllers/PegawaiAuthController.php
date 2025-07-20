<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PegawaiAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('pegawai.login'); // You'll create this view
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nip' => ['required', 'string'],
            'password' => ['required'],
        ]);

        if (Auth::guard('pegawai')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('pegawai.biodata.index');
        }

        return back()->withErrors([
            'nip' => 'NIP tidak terdaftar.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('pegawai')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/pegawai/login');
    }
}
