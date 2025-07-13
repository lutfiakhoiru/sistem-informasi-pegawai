<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Keluarga_Saudara;

class Keluarga_saudaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Auth::guard('pegawai')->user();
        $saudara = Keluarga_Saudara::where('NIP', $pegawai->nip)->paginate();

        return view('pegawai.keluarga.index', compact('saudara'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.keluarga_saudara.create');
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
        Keluarga_Saudara::create(attributes: [
            'NIP' => $pegawai->nip,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
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
    public function edit( $id)
    {
        $saudara = Keluarga_Saudara::findOrFail($id);
        return view('pegawai.keluarga_saudara.edit', compact('saudara'));
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

        $saudara = Keluarga_Saudara::findOrFail($id);
        $saudara->update(attributes: [
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pekerjaan' => $request->pekerjaan,
            'keterangan' => $request->keterangan,
        ]); 
        return redirect()->route('pegawai.keluarga.index')
                         ->with('sukses', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $saudara = Keluarga_Saudara::findOrFail($id);
        $saudara->delete();

        // Redirect ke halaman index dengan NIP yang sesuai
        return redirect()->route('pegawai.keluarga.index')
                         ->with('sukses', 'Data keluaga berhasil dihapus.');
    }
}
