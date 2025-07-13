<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($NIP)
    {
        $data = Biodata::where('NIP', $NIP)->first();
        return view('admin.biodata.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.biodata.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('NIP',$request->NIP);
        Session::flash('NIK',$request->NIK);
        Session::flash('nama',$request->nama);
        Session::flash('jenis_kelamin',$request->jenis_kelamin);
        Session::flash('tempat_lahir',$request->tempat_lahir);
        Session::flash('tanggal_lahir',$request->tanggal_lahir);
        Session::flash('status',$request->status);
        Session::flash('agama',$request->agama);
        Session::flash('hobi',$request->hobi);
        Session::flash('jalan',$request->jalan);
        Session::flash('desa',$request->desa);
        Session::flash('kecamatan',$request->kecamatan);
        Session::flash('kabupaten',$request->kabupaten);
        Session::flash('provinsi',$request->provinsi);
        Session::flash('pangkat',$request->pangkat);
        Session::flash('status_pegawai',$request->status_pegawai);
        Session::flash('jabatan',$request->jabatan);
        Session::flash('masa_kerja',$request->masa_kerja);
        Session::flash('no_karpeg',$request->no_kaspeg);
        Session::flash('no_rek',$request->no_rek);
        Session::flash('bpjs',$request->bpjs);
        Session::flash('npwp',$request->npwp);
        Session::flash('tinggi_badan',$request->tinggi_badan);
        Session::flash('berat_badan',$request->berat_badan);
        Session::flash('rambut',$request->rambut);
        Session::flash('bentuk_muka',$request->bentuk_muka);
        Session::flash('warna_kulit',$request->warna_kulit);
        Session::flash('ciri_khas',$request->ciri_khas);
        Session::flash('cacat',$request->cacat);
        Session::flash('gol_darah',$request->gol_darah);

        $request->validate([
            'NIP'=>'required|numeric|unique:Biodata,NIP',
            'NIK'=>'required|numeric',
            'nama'=>'required',
            'jenis_kelamin'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'foto'=>'mimes:jpeg,jpg,png,gif',
        ],[
            'NIP.required'=>'NIP wajib diisi',
            'NIP.numeric'=>'NIP wajib dalam angka',
            'NIP.unique'=>'NIP yang diisikan sudah ada',
            'NIK.required'=>'NIK wajib diisi',
            'NIK.numeric'=>'NIk wajib dalam angka',
            'nama.required'=>'Nama wajib diisi',
            'jenis_kelamin.required'=>'Jenis kelamin wajib diisi',
            'tempat_lahir.required'=>'Tempat Lahir wajib diisi',
            'tanggal_lahir.required'=>'Tanggal Lahir wajib diisi',
            'foto.required'=>'Foto wajib diisi',
            'foto.mimes'=>'foto berupa JPEG, JPG, PNG dan GIF'
        ]);

        $foto_file=$request->file('foto');
        $foto_ekstensi=$foto_file->extension();
        $foto_nama=date('ymdhis').".".$foto_ekstensi;
        $foto_file->move(public_path('foto'),$foto_nama);

        $data=[
            'NIP'=>$request->NIP,
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
            'foto'=>$foto_nama,
        ];
        Biodata::create($data);
        return redirect()->route('admin.dataPegawai')->with('sukses', 'berhasil menambahkan data');

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
    public function edit(string $NIP)
    {
        $data=Biodata::where('NIP',$NIP)->first();
        return view('admin.biodata.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $NIP)
    {
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
            
            $data_foto=Biodata::where('NIP', $NIP)->first();
            File::delete(public_path('foto').'/'.$data_foto->foto);

            $data['foto']=$foto_nama;
        }

       
        Biodata::where('NIP',$NIP)->update($data);
        return redirect()->route('admin.biodata.index',['nip' => $NIP])->with('sukses', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
