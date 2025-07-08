<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    public function __construct()
    {
        // Protect with pegawai auth middleware
        $this->middleware('auth:pegawai');
    }

    public function dashboard()
    {
        $pegawai = Auth::guard('pegawai')->user();
        $biodata = $pegawai->biodata; 
        return view('pegawai.dashboard', compact('pegawai','biodata'));
    }

    // public function biodata()
    // {
    //     $pegawai = Auth::guard('pegawai')->user();
    //     return view('pegawai.biodata', compact('pegawai'));
    // }

}