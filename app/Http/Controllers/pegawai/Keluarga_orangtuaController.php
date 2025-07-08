<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Keluarga_Orangtua;

class Keluarga_orangtuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Auth::guard('pegawai')->user();
        $orangtua = Keluarga_Orangtua::where('NIP', $pegawai->nip)->paginate();

        return view('pegawai.keluarga.index', compact('orangtua'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.keluarga_orangtua.create');
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
        Keluarga_Orangtua::create(attributes: [
            'NIP' => $pegawai->nip,
            'nama' => $request->nama,
            'status' => $request->status,
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
    public function edit($id)
    {
        $orangtua = Keluarga_Orangtua::findOrFail($id);
        return view('pegawai.keluarga_orangtua.edit', compact('orangtua'));
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

        $orangtua = Keluarga_Orangtua::findOrFail($id);
         $orangtua->update(attributes: [
            'nama' => $request->nama,
            'status' => $request->status,
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
        $orangtua = Keluarga_Orangtua::findOrFail($id);
        $orangtua->delete();

        // Redirect ke halaman index dengan NIP yang sesuai
        return redirect()->route('pegawai.keluarga.index')
                         ->with('sukses', 'Data keluarga berhasil dihapus.');
    }
}
