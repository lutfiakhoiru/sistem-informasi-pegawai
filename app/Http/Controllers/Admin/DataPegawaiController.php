<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Biodata;
use App\Models\Pendidikan;
use App\Models\Kursus;
use App\Models\Riwayat_Kepangkatan;
use App\Models\Pengalaman_Pekerjaan;
use App\Models\Penghargaan;
use App\Models\Pengalaman_Luar_Negeri;
use App\Models\Keluarga_Pasangan;
use App\Models\Keluarga_Anak;
use App\Models\Keluarga_Orangtua;
use App\Models\Keluarga_Saudara;
use App\Models\Organisasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 

class DataPegawaiController extends Controller
{
    public function dataPegawai(Request $request)
    {
        $keyword=$request->keyword;
        $jumlahbaris=10;
        if(strlen($keyword)){
            $data=Biodata::where('NIP','like',"%$keyword%")
                    ->orWhere('nama','like',"%$keyword%")
                    ->orWhere('jabatan','like',"%$keyword%")
                    ->paginate();
        } else{
            $data=Biodata::orderBy('NIP','asc')->paginate($jumlahbaris);
        }
       
       
        return view('admin.dataKaryawan',compact('data'));
    }

    public function show($NIP)
{
    $data = Biodata::where('nip', $NIP)->firstOrFail();
    $pendidikan = Pendidikan::where('nip', $NIP)->paginate();
    $kursus = Kursus::where('nip', $NIP)->paginate();
    $pangkat = Riwayat_Kepangkatan::where('nip', $NIP)->paginate();
    $jabatan = Pengalaman_Pekerjaan::where('nip', $NIP)->paginate();
    $penghargaan = Penghargaan::where('nip', $NIP)->paginate();
    $pengalaman =Pengalaman_Luar_Negeri::where('nip', $NIP)->paginate();
    $pasangan =Keluarga_Pasangan::where('nip', $NIP)->paginate();
    $anak = Keluarga_Anak::where('nip', $NIP)->paginate();
    $orangtua = Keluarga_Orangtua::where('nip', $NIP)->paginate();
    $saudara = Keluarga_Saudara::where('nip',$NIP)->paginate();
    $organisasi = Organisasi::where('nip', $NIP)->paginate();

    return view('admin.detail-pegawai', compact('data','pendidikan','kursus','pangkat', 'jabatan','penghargaan','pengalaman','pasangan','anak','orangtua','saudara','organisasi'
    ));
}

}
