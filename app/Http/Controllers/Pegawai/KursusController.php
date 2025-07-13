<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendidikan; 
use App\Models\Kursus; 

class KursusController extends Controller
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
        return view('pegawai.kursus.create');
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
        Kursus::create([
            'NIP' => $pegawai->nip, // otomatis dari pegawai login
            'nama' => $request->nama,
            'lama' => $request->lama,
            'ijazah' => $request->ijazah,
            'tempat' => $request->tempat,
            'keterangan' => $request->keterangan,
        ]);
        
        return redirect()->route('pegawai.pendidikan.index')
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
        $kursus = Kursus::findOrFail($id);
        return view('pegawai.kursus.edit', compact('kursus'));
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

        $kursus = Kursus::findOrFail($id);
        $kursus->update([
            'nama' => $request->nama,
            'lama' => $request->lama,
            'ijazah' => $request->ijazah,
            'tempat' => $request->tempat,
            'keterangan' => $request->keterangan,
        ]);
        
        return redirect()->route('pegawai.pendidikan.index')
                         ->with('sukses', 'Data berhasil  diperbarui.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $kursus = Kursus::findOrFail($id);
        $kursus->delete();

        // Redirect ke halaman index dengan NIP yang sesuai
        return redirect()->route('pegawai.pendidikan.index')
                         ->with('sukses', 'Data pendidikan berhasil dihapus.');
    }
}
