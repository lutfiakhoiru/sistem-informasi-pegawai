<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Biodata;
use App\Models\Keluarga_Anak;

class Keluarga_anakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($NIP)
    {
        $anak = Keluarga_Anak::where('nip', $NIP)->paginate(10);
        $data = Biodata::where('nip', $NIP)->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Biodata tidak ditemukan');
        }
        return view('admin.keluarga.index', compact('anak', 'NIP', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($NIP)
    {
        return view('admin.keluarga_anak.create', compact('NIP'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NIP'=>'required',
            'nama'=>'required',
           
        ],[
            'nama.required'=>'Nama wajib diisi',
        ]);

        Keluarga_Anak::create($request->all());
        return redirect()->route('admin.keluarga.index', $request->NIP)
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
        return view('admin.keluarga_anak.edit', compact('anak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'nama'=>'required',
           
        ],[
            'nama.required'=>'Nama wajib diisi',
        ]);
        
        $anak = Keluarga_Anak::findOrFail($id);
        $anak->update($request->all());
        return redirect()->route('admin.keluarga.index', $anak->NIP)
                         ->with('sukses', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $anak = Keluarga_Anak::findOrFail($id);
        $anak->delete();

        // Redirect ke halaman index dengan NIP yang sesuai
        return redirect()->route('admin.keluarga.index', $anak->NIP)
                         ->with('sukses', 'Data keluaga berhasil dihapus.');
    }
}
