<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Organisasi;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Auth::guard('pegawai')->user();
        $organisasi = Organisasi::where('NIP', $pegawai->nip)->paginate();

         return view('pegawai.organisasi.index', compact('organisasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.organisasi.create');
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
        Organisasi::create(attributes: [
            'NIP' => $pegawai->nip,
            'nama_organisasi' => $request->nama_organisasi,
            'kedudukan' => $request->kedudukan,
            'tahun' => $request->tahun,
            'tempat' => $request->tempat,
            'nama_pimpinan' => $request->nama_pimpinan,
        ]); 
        return redirect()->route('pegawai.organisasi.index')
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
        $organisasi = Organisasi::findOrFail($id);
        return view('pegawai.organisasi.edit', compact('organisasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_organisasi'=>'required',
           
        ],[
            'nama_organisasi.required'=>'Nama wajib diisi',
        ]);

        $organisasi = Organisasi::findOrFail($id);
         $organisasi->update(attributes: [
            'nama_organisasi' => $request->nama_organisasi,
            'kedudukan' => $request->kedudukan,
            'tahun' => $request->tahun,
            'tempat' => $request->tempat,
            'nama_pimpinan' => $request->nama_pimpinan,
        ]); 
        return redirect()->route('pegawai.organisasi.index')
                         ->with('sukses', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $organisasi = Organisasi::findOrFail($id);
        $organisasi->delete();

        // Redirect ke halaman index dengan NIP yang sesuai
        return redirect()->route('pegawai.organisasi.index')
                         ->with('sukses', 'Data  berhasil dihapus.');
    }
}
