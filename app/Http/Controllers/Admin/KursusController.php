<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\biodata;
use App\Models\kursus;

class KursusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($NIP)
    {
        $kursus = Kursus::where('nip', $NIP)->paginate(10);
        $data = Biodata::where('nip', $NIP)->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Biodata tidak ditemukan');
        }
        return view('admin.pendidikan.index', compact('kursus', 'NIP', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($NIP)
    {
        return view('admin.kursus.create', compact('NIP'));
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
      
        Kursus::create($request->all());
        return redirect()->route('admin.pendidikan.index', $request->NIP)
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
        $kursus = Kursus::findOrFail($id);
        return view('admin.kursus.edit', compact('kursus'));
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
        $kursus->update($request->all());

        return redirect()->route('admin.pendidikan.index', $kursus->NIP)
                         ->with('sukses', 'Data pendidikan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $kursus = Kursus::findOrFail($id);
        $kursus->delete();

        // Redirect ke halaman index dengan NIP yang sesuai
        return redirect()->route('admin.pendidikan.index', $kursus->NIP)
                         ->with('sukses', 'Data berhasil dihapus.');
    }
}
