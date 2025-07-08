<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BiodataController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth:pegawai');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Auth::guard('pegawai')->user();
        $data = $pegawai->biodata;
        return view('pegawai.biodata.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $pegawai = Auth::guard('pegawai')->user();
        $data = $pegawai->biodata;
        return view('pegawai.biodata.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,)
    {
        $pegawai = Auth::guard('pegawai')->user();
        $biodata = $pegawai->biodata;
        $request->validate([
                'NIK'=>'required|numeric',
                'nama'=>'required',
                'jenis_kelamin'=>'required',
                'tempat_lahir'=>'required',
                'tanggal_lahir'=>'required',
            ],[
                'NIK.required'=>'NIK wajib diisi',
                'NIK.numeric'=>'NIk wajib dalam angka',
                'nama.required'=>'Nama wajib diisi',
                'jenis_kelamin.required'=>'Jenis kelamin wajib diisi',
                'tempat_lahir.required'=>'Tempat Lahir wajib diisi',
                'tanggal_lahir.required'=>'Tanggal Lahir wajib diisi'
            ]);

            // $foto_file=$request->file('foto');
            $data=[
        
                'NIK'=>$request->NIK,
                'nama'=>$request->nama,
                'jenis_kelamin'=>$request->jenis_kelamin,
                'tempat_lahir'=>$request->tempat_lahir,
                'tanggal_lahir'=>$request->tanggal_lahir,
                'status'=>$request->status,
                'agama'=>$request->agama,
                'hobi'=>$request->hobi,
                'jalan'=>$request->jalan,
                'desa'=>$request->desa,
                'kecamatan'=>$request->kecamatan,
                'kabupaten'=>$request->kabupaten,
                'provinsi'=>$request->provinsi,
                'pangkat'=>$request->pangkat,
                'status_pegawai'=>$request->status_pegawai,
                'jabatan'=>$request->jabatan,
                'masa_kerja'=>$request->masa_kerja,
                'no_karpeg'=>$request->no_karpeg,
                'no_rek'=>$request->no_rek,
                'bpjs'=>$request->bpjs,
                'npwp'=>$request->npwp,
                'tinggi_badan'=>$request->tinggi_badan,
                'berat_badan'=>$request->berat_badan,
                'rambut'=>$request->rambut,
                'bentuk_muka'=>$request->bentuk_muka,
                'warna_kulit'=>$request->warna_kulit,
                'ciri_khas'=>$request->ciri_khas,
                'cacat'=>$request->cacat,
                'gol_darah'=>$request->gol_darah,
            ];
            

            if($request->hasFile('foto')){
                $request->validate([
                    'foto'=>'mimes:jpeg,jpg,png,gif'
                ],[
                'foto.mimes'=>'foto berupa JPEG, JPG, PNG dan GIF' 
                ]);
                $foto_file=$request->file('foto');
                $foto_ekstensi=$foto_file->extension();
                $foto_nama=date('ymdhis').".".$foto_ekstensi;
                $foto_file->move(public_path('foto'),$foto_nama);
                
                if ($biodata->foto && File::exists(public_path('foto/' . $biodata->foto))) {
                    File::delete(public_path('foto/' . $biodata->foto));
                }
                $data['foto']=$foto_nama;
            }
            $biodata->update($data);
        return redirect()->route('pegawai.biodata.index')->with('sukses', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
