<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Biodata;
use App\Models\Keluarga_Pasangan;
use App\Models\Keluarga_Anak;
use App\Models\Keluarga_Orangtua;
use App\Models\Keluarga_Saudara;

class Keluarga_pasanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($NIP)
    {
        $pasangan =Keluarga_Pasangan::where('nip', $NIP)->paginate(10);
        $anak = Keluarga_Anak::where('nip', $NIP)->paginate(10);
        $orangtua = Keluarga_Orangtua::where('nip', $NIP)->paginate(10);
        $saudara = Keluarga_Saudara::where('nip',$NIP)->paginate(10);


        $data = Biodata::where('nip', $NIP)->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Biodata tidak ditemukan');
        }
        return view('admin.keluarga.index', compact('pasangan','anak','orangtua','saudara', 'NIP', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($NIP)
    {
        return view('admin.keluarga.create', compact('NIP'));
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

        Keluarga_Pasangan::create($request->all());
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
        $pasangan = Keluarga_Pasangan::findOrFail($id);
        return view('admin.keluarga.edit', compact('pasangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
         $request->validate([
           
            'nama'=>'required',
           
        ],[
            'nama.required'=>'Nama wajib diisi',
        ]);

        $pasangan = Keluarga_Pasangan::findOrFail($id);
        $pasangan->update($request->all());
        
        return redirect()->route('admin.keluarga.index', $pasangan->NIP)
                         ->with('sukses', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $pasangan = Keluarga_Pasangan::findOrFail($id);
        $pasangan->delete();

        // Redirect ke halaman index dengan NIP yang sesuai
        return redirect()->route('admin.keluarga.index', $pasangan->NIP)
                         ->with('sukses', 'Data keluarga berhasil dihapus.');
    }
}
