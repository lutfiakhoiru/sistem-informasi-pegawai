<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengalaman_Luar_Negeri;

class PengalamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Auth::guard('pegawai')->user();
        $pengalaman =Pengalaman_Luar_Negeri::where('NIP', $pegawai->nip)->paginate();

        return view('pegawai.pengalaman.index', compact('pengalaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.pengalaman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'negara'=>'required',
        ]);

        $pegawai = Auth::guard('pegawai')->user();
        Pengalaman_Luar_Negeri::create([
            'NIP' => $pegawai->nip,
            'negara' => $request->negara,
            'tujuan' => $request->tujuan,
            'lama' => $request->lama,
            'biaya' => $request->biaya,
        ]);
        return redirect()->route('pegawai.pengalaman.index')
                         ->with('sukses', 'Data pengalaman luar negeri berhasil ditambahkan.');
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
        $pengalaman = Pengalaman_Luar_Negeri::findOrFail($id);
        return view('pegawai.pengalaman.edit', compact('pengalaman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $request->validate([
            'negara'=>'required',
        ]);

        $pengalaman = Pengalaman_Luar_Negeri::findOrFail($id);
        $pengalaman->update([
            'negara' => $request->negara,
            'tujuan' => $request->tujuan,
            'lama' => $request->lama,
            'biaya' => $request->biaya,
        ]);
        return redirect()->route('pegawai.pengalaman.index')
                         ->with('sukses', 'Data pengalaman luar negeri berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengalaman = Pengalaman_Luar_Negeri::findOrFail($id);
        $pengalaman->delete();

        // Redirect ke halaman index dengan NIP yang sesuai
        return redirect()->route('pegawai.pengalaman.index')
                         ->with('sukses', 'Data pengalaman luar negeri berhasil dihapus.');
    }
}
