<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Biodata;
use App\Models\Penghargaan;


class PenghargaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($NIP)
    {
        $penghargaan = Penghargaan::where('nip', $NIP)->paginate(10);
        $data = Biodata::where('nip', $NIP)->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Biodata tidak ditemukan');
        }
        return view('admin.penghargaan.index', compact('penghargaan', 'NIP', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($NIP)
    {
        return view('admin.penghargaan.create', compact('NIP'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'NIP'=>'required',
            'nama'=>'required',
            'tahun'=>'required',
            'instansi'=>'nullable',
        ]);
      
      
        
        Penghargaan::create($request->all());
        return redirect()->route('admin.penghargaan.index', $request->NIP)
        ->with('sukses', 'Data penghargaan berhasil ditambahkan.');
        
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
        $penghargaan = Penghargaan::findOrFail($id);
        return view('admin.penghargaan.edit', compact('penghargaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'nama'=>'required',
            'tahun'=>'required',
            'instansi'=>'nullable',
             ]);

        $penghargaan = Penghargaan::findOrFail($id);
        $penghargaan->update($request->all());

        return redirect()->route('admin.penghargaan.index', $penghargaan->NIP)
                         ->with('sukses', 'Data pendidikan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $penghargaan = Penghargaan::findOrFail($id);
        $penghargaan->delete();

        // Redirect ke halaman index dengan NIP yang sesuai
        return redirect()->route('admin.penghargaan.index', $penghargaan->NIP)
                         ->with('sukses', 'Data pendidikan berhasil dihapus.');
    }
}
