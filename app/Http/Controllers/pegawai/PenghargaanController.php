<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Penghargaan;

class PenghargaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Auth::guard('pegawai')->user();
        $penghargaan = Penghargaan::where('NIP', $pegawai->nip)->paginate();

        return view('pegawai.penghargaan.index', compact('penghargaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.penghargaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'nama'=>'required',
            'tahun'=>'required',
            'instansi'=>'nullable',
        ]);
        
        $pegawai = Auth::guard('pegawai')->user();
        Penghargaan::create([
            'NIP' => $pegawai->nip,
            'nama' => $request->nama,
            'tahun' => $request->tahun,
            'instansi' => $request->instansi,
        ]);
        return redirect()->route('pegawai.penghargaan.index')
                         ->with('sukses', 'Data penghargaan berhasil ditambahkan.');
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
        $penghargaan = Penghargaan::findOrFail($id);
        return view('pegawai.penghargaan.edit', compact('penghargaan'));//
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'=>'required',
            'tahun'=>'required',
            'instansi'=>'nullable',
        ]);

        $penghargaan = Penghargaan::findOrFail($id);
        $penghargaan->update(attributes: [
            'nama' => $request->nama,
            'tahun' => $request->tahun,
            'instansi' => $request->instansi,
        ]);
        return redirect()->route('pegawai.penghargaan.index')
                         ->with('sukses', 'Data penghargaan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $penghargaan = Penghargaan::findOrFail($id);
        $penghargaan->delete();

        // Redirect ke halaman index dengan NIP yang sesuai
        return redirect()->route('pegawai.penghargaan.index', )
                         ->with('sukses', 'Data pendidikan berhasil dihapus.');
    }
}
