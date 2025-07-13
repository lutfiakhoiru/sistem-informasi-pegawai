<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengalaman_Pekerjaan;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Auth::guard('pegawai')->user();
        $jabatan = Pengalaman_Pekerjaan::where('NIP', $pegawai->nip)->paginate();

       
        return view('pegawai.kepangkatan.index', compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('pegawai.jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jabatan'=>'required',
        ],[
            'jabatan.required'=>'Nama wajib diisi',
        ]);
      
        
        $jabatan = str_replace('.', '', $request->input('gaji'));
        
        $pegawai = Auth::guard('pegawai')->user();
        Pengalaman_Pekerjaan::create([
            'NIP' => $pegawai->nip,
            'jabatan' => $request->jabatan,
            'terhitung_mulai' => $request->terhitung_mulai,
            'selesai' => $request->selesai,
            'gol_ruang_penggajian' => $request->gol_ruang_penggajian,
            'gaji' => $request->gaji,
            's_pejabat' => $request->s_pejabat,
            's_tanggal' => $request->s_tanggal,
            's_nomor' => $request->s_nomor,
        ]);  
        return redirect()->route('pegawai.kepangkatan.index')
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
    public function edit(string $id)
    {
        $jabatan = Pengalaman_Pekerjaan::findOrFail($id);
        return view('pegawai.jabatan.edit', compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'jabatan'=>'required',
        ],[
            'jabatan.required'=>'Nama wajib diisi',
        ]);
        
        $jabatan = str_replace('.', '', $request->input('gaji'));

        $jabatan = Pengalaman_Pekerjaan::findOrFail($id);
        $jabatan->update([
            'jabatan' => $request->jabatan,
            'terhitung_mulai' => $request->terhitung_mulai,
            'selesai' => $request->selesai,
            'gol_ruang_penggajian' => $request->gol_ruang_penggajian,
            'gaji' => $request->gaji,
            's_pejabat' => $request->s_pejabat,
            's_tanggal' => $request->s_tanggal,
            's_nomor' => $request->s_nomor
        ]);  
        return redirect()->route('pegawai.kepangkatan.index')
                         ->with('sukses', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $jabatan = Pengalaman_Pekerjaan::findOrFail($id);
        $jabatan->delete();

        return redirect()->route('pegawai.kepangkatan.index')
                         ->with('sukses', 'Data berhasil dihapus.');
    }
}
