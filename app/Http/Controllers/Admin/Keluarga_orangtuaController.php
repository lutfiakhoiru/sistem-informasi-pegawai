<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Biodata;
use App\Models\Keluarga_Orangtua;

class Keluarga_orangtuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($NIP)
    {
       
        $orangtua = Keluarga_Orangtua::where('nip', $NIP)->paginate(10);
        $data = Biodata::where('nip', $NIP)->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Biodata tidak ditemukan');
        }
        return view('admin.keluarga.index', compact('orangtua', 'NIP', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($NIP)
    {
        return view('admin.keluarga_orangtua.create', compact('NIP'));
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

        Keluarga_Orangtua::create($request->all());
        return redirect()->route('admin.keluarga.index', $request->NIP)
                         ->with('sukses', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $orangtua = Keluarga_Orangtua::findOrFail($id);
        return view('admin.keluarga_orangtua.edit', compact('orangtua'));
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
        
        $orangtua = Keluarga_Orangtua::findOrFail($id);
        $orangtua->update($request->all());
        return redirect()->route('admin.keluarga.index', $orangtua->NIP)
        ->with('sukses', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $orangtua = Keluarga_Orangtua::findOrFail($id);
        $orangtua->delete();

        // Redirect ke halaman index dengan NIP yang sesuai
        return redirect()->route('admin.keluarga.index', $orangtua->NIP)
                         ->with('sukses', 'Data keluarga berhasil dihapus.');
    }
}
