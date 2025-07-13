<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendidikan; 
use App\Models\Kursus; 

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Auth::guard('pegawai')->user();
        $pendidikan = Pendidikan::where('NIP', $pegawai->nip)->paginate();
        $kursus = Kursus::where('NIP', $pegawai->nip)->paginate();
       // $pendidikan = $pegawai->pendidikan()->paginate();
        return view('pegawai.pendidikan.index', compact('pendidikan','kursus'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.pendidikan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenjang'=>'required',
            'nama_pendidikan'=>'required',
        ],[
            'jenjang.required'=>'Jenjang wajib diisi',
            'nama_pendidikan.required'=>'Nama institusi wajib diisi',
        ]);
        
        $pegawai = Auth::guard('pegawai')->user();
        Pendidikan::create([
            'NIP' => $pegawai->nip, // otomatis dari pegawai login
            'jenjang' => $request->jenjang,
            'nama_pendidikan' => $request->nama_pendidikan,
            'jurusan' => $request->jurusan,
            'sttb' => $request->sttb,
            'tempat' => $request->tempat,
            'nama_dekan' => $request->nama_dekan,
        ]);
        return redirect()->route('pegawai.pendidikan.index',)
        ->with('sukses', 'Data pendidikan berhasil ditambahkan.');
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
        $pendidikan = Pendidikan::findOrFail($id);
        return view('pegawai.pendidikan.edit', compact('pendidikan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jenjang'=>'required',
            'nama_pendidikan'=>'required',
        ],[
            'jenjang.required' => 'Jenjang wajib diisi',
            'nama_pendidikan.required' => 'Nama institusi wajib diisi',
        ]);

        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->update([
            'jenjang' => $request->jenjang,
            'nama_pendidikan' => $request->nama_pendidikan,
            'jurusan' => $request->jurusan,
            'sttb' => $request->sttb,
            'tempat' => $request->tempat,
            'nama_dekan' => $request->nama_dekan,
        ]);

        return redirect()->route('pegawai.pendidikan.index')
                         ->with('sukses', 'Data pendidikan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->delete();

        // Redirect ke halaman index dengan NIP yang sesuai
        return redirect()->route('pegawai.pendidikan.index')
                         ->with('sukses', 'Data pendidikan berhasil dihapus.');
     
    }
}
