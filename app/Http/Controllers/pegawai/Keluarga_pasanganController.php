<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Keluarga_Pasangan;
use App\Models\Keluarga_Anak;
use App\Models\Keluarga_Orangtua;
use App\Models\Keluarga_Saudara;

class Keluarga_pasanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Auth::guard('pegawai')->user();
        $pasangan =Keluarga_Pasangan::where('NIP', $pegawai->nip)->paginate();
        $anak = Keluarga_Anak::where('NIP', $pegawai->nip)->paginate();
        $orangtua = Keluarga_Orangtua::where('NIP', $pegawai->nip)->paginate();
        $saudara = Keluarga_Saudara::where('NIP', $pegawai->nip)->paginate();

        return view('pegawai.keluarga.index', compact('pasangan','anak','orangtua','saudara'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('pegawai.keluarga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
           
        ],[
            'nama.required'=>'Nama wajib diisi',
        ]);

        $pegawai = Auth::guard('pegawai')->user();
        Keluarga_Pasangan::create(attributes: [
            'NIP' => $pegawai->nip,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tanggal_nikah' => $request->tanggal_nikah,
            'pekerjaan' => $request->pekerjaan,
            'keterangan' => $request->keterangan,
        ]); 
        return redirect()->route('pegawai.keluarga.index')
                         ->with('sukses', 'Data berhasil ditambahkan.');
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
    public function edit($id)
    {
        $pasangan = Keluarga_Pasangan::findOrFail($id);
        return view('pegawai.keluarga.edit', compact('pasangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'=>'required',
           
        ],[
            'nama.required'=>'Nama wajib diisi',
        ]);

        $pasangan = Keluarga_Pasangan::findOrFail($id);
        $pasangan->update(attributes: [
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tanggal_nikah' => $request->tanggal_nikah,
            'pekerjaan' => $request->pekerjaan,
            'keterangan' => $request->keterangan,
        ]); 
        return redirect()->route('pegawai.keluarga.index')
                         ->with('sukses', 'Data berhasil diperbarui.');//
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $pasangan = Keluarga_Pasangan::findOrFail($id);
        $pasangan->delete();

        // Redirect ke halaman index dengan NIP yang sesuai
        return redirect()->route('pegawai.keluarga.index')
                         ->with('sukses', 'Data keluarga berhasil dihapus.');
    }
}
