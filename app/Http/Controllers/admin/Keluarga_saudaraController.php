<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Biodata;
use App\Models\Keluarga_Saudara;

class Keluarga_saudaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($NIP)
    {
        $saudara = Keluarga_Saudara::where('nip', $NIP)->paginate(10);
        $data = Biodata::where('nip', $NIP)->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Biodata tidak ditemukan');
        }
        return view('admin.keluarga.index', compact('saudara', 'NIP', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($NIP)
    {
        return view('admin.keluarga_saudara.create', compact('NIP'));
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

        Keluarga_Saudara::create($request->all());
        return redirect()->route('admin.keluarga.index', $request->NIP)
                         ->with('sukses', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show( )
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $saudara = Keluarga_Saudara::findOrFail($id);
        return view('admin.keluarga_saudara.edit', compact('saudara'));
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
        
        $saudara = Keluarga_Saudara::findOrFail($id);
        $saudara->update($request->all());
        return redirect()->route('admin.keluarga.index', $saudara->NIP)
                         ->with('sukses', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $saudara = Keluarga_Saudara::findOrFail($id);
        $saudara->delete();

        // Redirect ke halaman index dengan NIP yang sesuai
        return redirect()->route('admin.keluarga.index', $saudara->NIP)
                         ->with('sukses', 'Data keluaga berhasil dihapus.');
    }
}
