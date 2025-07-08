<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendidikan;
use App\Models\Kursus;
use App\Models\Biodata;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($NIP)
    {
        $pendidikan = Pendidikan::where('nip', $NIP)->paginate(10);
        $kursus = Kursus::where('nip', $NIP)->paginate(10);

        $data = Biodata::where('nip', $NIP)->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Biodata tidak ditemukan');
        }
        return view('admin.pendidikan.index', compact('pendidikan','kursus', 'NIP', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($NIP)
    {
         return view('admin.pendidikan.create', compact('NIP'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NIP'=>'required',
            'jenjang'=>'required',
            'nama_pendidikan'=>'required',
        ],[
            'jenjang.required'=>'Jenjang wajib diisi',
            'nama_pendidikan.required'=>'Nama institusi wajib diisi',
        ]);
      
        Pendidikan::create($request->all());
        return redirect()->route('admin.pendidikan.index', $request->NIP)
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
        return view('admin.pendidikan.edit', compact('pendidikan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenjang'=>'required',
            'nama_pendidikan'=>'required',
        ]);

        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->update($request->all());

        return redirect()->route('admin.pendidikan.index', $pendidikan->NIP)
                         ->with('sukses', 'Data pendidikan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->delete();

        // Redirect ke halaman index dengan NIP yang sesuai
        return redirect()->route('admin.pendidikan.index', $pendidikan->NIP)
                         ->with('sukses', 'Data pendidikan berhasil dihapus.');
    }
}
