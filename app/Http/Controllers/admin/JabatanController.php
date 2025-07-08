<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Biodata;
use App\Models\Pengalaman_Pekerjaan;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($NIP)
    {
        $jabatan = Pengalaman_Pekerjaan::where('nip', $NIP)->paginate(10);
        $data = Biodata::where('nip', $NIP)->first();

        if (!$data) {
            return redirect()->back()->with('error', 'data tidak ditemukan');
        }
        return view('admin.kepangkatan.index', compact('jabatan', 'NIP', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($NIP)
    {
        return view('admin.jabatan.create', compact('NIP'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jabatan'=>'required',
        ],[
            'jabatan.required'=>'Nama wajib diisi',
        ]);
      
        
        $jabatan = str_replace('.', '', $request->input('gaji')); 
        Pengalaman_Pekerjaan::create($request->all());
        return redirect()->route('admin.kepangkatan.index', $request->NIP)
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
        $jabatan = Pengalaman_Pekerjaan::findOrFail($id);
        return view('admin.jabatan.edit', compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jabatan'=>'required',
        ],[
            'jabatan.required'=>'Nama wajib diisi',
        ]);
        $jabatan = Pengalaman_Pekerjaan::findOrFail($id);
        $jabatan->gaji = str_replace('.', '', $request->input('gaji'));
        $jabatan->update($request->all());

        return redirect()->route('admin.kepangkatan.index', $jabatan->NIP)
                         ->with('sukses', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $jabatan = Pengalaman_Pekerjaan::findOrFail($id);
        $jabatan->delete();

        // Redirect ke halaman index dengan NIP yang sesuai
        return redirect()->route('admin.kepangkatan.index', $jabatan->NIP)
                         ->with('sukses', 'Data berhasil dihapus.');
    }
}
