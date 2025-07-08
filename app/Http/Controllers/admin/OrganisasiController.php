<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Biodata;
use App\Models\Organisasi;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($NIP)
    {
        $organisasi = Organisasi::where('nip', $NIP)->paginate(10);
        $data = Biodata::where('nip', $NIP)->first();

        if (!$data) {
            return redirect()->back()->with('error', 'data tidak ditemukan');
        }
        return view('admin.organisasi.index', compact('organisasi', 'NIP', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($NIP)
    {
        return view('admin.organisasi.create', compact('NIP'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NIP'=>'required',
            'nama_organisasi'=>'required',
            
        ]);
        
        Organisasi::create($request->all());
        return redirect()->route('admin.organisasi.index', $request->NIP)
                         ->with('sukses', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $organisasi = Organisasi::findOrFail($id);
        return view('admin.organisasi.edit', compact('organisasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'nama_organisasi'=>'required',
            
        ]);
        
        $organisasi = Organisasi::findOrFail($id);
        $organisasi->update($request->all());

        return redirect()->route('admin.organisasi.index', $organisasi->NIP)
                         ->with('sukses', 'Data berhasil diperbarui.');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $organisasi = Organisasi::findOrFail($id);
        $organisasi->delete();

        // Redirect ke halaman index dengan NIP yang sesuai
        return redirect()->route('admin.organisasi.index', $organisasi->NIP)
                         ->with('sukses', 'Data  berhasil dihapus.');
    }
}
