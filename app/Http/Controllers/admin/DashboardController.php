<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPegawai = Biodata::count();
        $totalLakiLaki = Biodata::where('jenis_kelamin', 'Laki-laki')->count();
        $totalPerempuan = Biodata::where('jenis_kelamin', 'Perempuan')->count();
        $agama = Biodata::select('agama', DB::raw('count(*) as total'))
                              ->groupBy('agama')
                              ->get();
        
        $jabatan = Biodata::select('jabatan', DB::raw('count(*) as total'))
                          ->groupBy('jabatan')
                          ->get();

                          return view('admin.dashboard',[
                            'totalPegawai' => $totalPegawai,
                            'totalLakiLaki' => $totalLakiLaki,
                            'totalPerempuan' => $totalPerempuan,
                            'jabatan' => $jabatan,
                            //'pendidikan' => $pendidikan,
                            'agama' => $agama, 
                           
                        ]);

                        
    }
}
