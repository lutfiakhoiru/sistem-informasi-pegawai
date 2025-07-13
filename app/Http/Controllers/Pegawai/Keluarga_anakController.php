<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Keluarga_Anak;
class Keluarga_anakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Auth::guard('pegawai')->user();
        $anak = Keluarga_Anak::where('NIP', $pegawai->nip)->paginate();

        return view('pegawai.keluarga.index', compact('anak'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('pegawai.keluarga_anak.create');
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
        Keluarga_Anak::create(attributes: [
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
        $anak = Keluarga_Anak::findOrFail($id);
        return view('pegawai.keluarga_anak.edit', compact('anak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'=>'required',
           
        ],[
            'nama.required'=>'Nama wajib diisi',
        ]);

        $anak = Keluarga_Anak::findOrFail($id);
        $anak->update(attributes: [
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
        $anak = Keluarga_Anak::findOrFail($id);
        $anak->delete();

        // Redirect ke halaman index dengan NIP yang sesuai
        return redirect()->route('admin.keluarga.index')
                         ->with('sukses', 'Data keluaga berhasil dihapus.');
    }
}
