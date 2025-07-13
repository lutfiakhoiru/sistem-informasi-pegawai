<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Riwayat_Kepangkatan;
use App\Models\Pengalaman_Pekerjaan;

class KepangkatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Auth::guard('pegawai')->user();
     
        $pangkat = Riwayat_Kepangkatan::where('NIP', $pegawai->nip)->paginate();
        $jabatan = Pengalaman_Pekerjaan::where('NIP', $pegawai->nip)->paginate();

        return view('pegawai.kepangkatan.index', compact('pangkat','jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('pegawai.kepangkatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pangkat'=>'required',
        ],[
            'pangkat.required'=>'Pangkat wajib diisi',
            
        ]);

        $pangkat = str_replace('.', '', $request->input('gaji')); 

        $pegawai = Auth::guard('pegawai')->user();
        Riwayat_Kepangkatan::create([
            'NIP' => $pegawai->nip,
            'pangkat' => $request->pangkat,
            'gol_ruang_penggajian' => $request->gol_ruang_penggajian,
            'terhitung_mulai' => $request->terhitung_mulai,
            'gaji' => $request->gaji,
            's_pejabat' => $request->s_pejabat,
            's_tanggal' => $request->s_tanggal,
            's_nomor' => $request->s_nomor,
            'keterangan' => $request->keterangan,
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
    public function edit( $id)
    {
        $pangkat = Riwayat_Kepangkatan::findOrFail($id);
        return view('pegawai.kepangkatan.edit', compact('pangkat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'pangkat'=>'required',
        ],[
            'pangkat.required'=>'Pangkat wajib diisi',
            
        ]);

        $pangkat = str_replace('.', '', $request->input('gaji')); 

        $pangkat = Riwayat_Kepangkatan::findOrFail($id);
        $pangkat->update([
            'pangkat' => $request->pangkat,
            'gol_ruang_penggajian' => $request->gol_ruang_penggajian,
            'terhitung_mulai' => $request->terhitung_mulai,
            'gaji' => $request->gaji,
            's_pejabat' => $request->s_pejabat,
            's_tanggal' => $request->s_tanggal,
            's_nomor' => $request->s_nomor,
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->route('pegawai.kepangkatan.index')
                         ->with('sukses', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $pangkat = Riwayat_Kepangkatan::findOrFail($id);
        $pangkat->delete();

        // Redirect ke halaman index dengan NIP yang sesuai
        return redirect()->route('pegawai.kepangkatan.index')
                         ->with('sukses', 'Data berhasil dihapus.');
    }
}
