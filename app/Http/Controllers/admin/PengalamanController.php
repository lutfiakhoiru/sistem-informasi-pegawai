<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Biodata;
use App\Models\Pengalaman_Luar_Negeri;

class PengalamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($NIP)
    {
        $pengalaman =Pengalaman_Luar_Negeri::where('nip', $NIP)->paginate(10);
        $data = Biodata::where('nip', $NIP)->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Biodata tidak ditemukan');
        }
        return view('admin.pengalaman.index', compact('pengalaman', 'NIP', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($NIP)
    {
        return view('admin.pengalaman.create', compact('NIP'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NIP'=>'required',
            'negara'=>'required',
            
        ]);
        
        Pengalaman_Luar_Negeri::create($request->all());
        return redirect()->route('admin.pengalaman.index', $request->NIP)
                         ->with('sukses', 'Data pengalaman luar negeri berhasil ditambahkan.');
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
        $pengalaman = Pengalaman_Luar_Negeri::findOrFail($id);
        return view('admin.pengalaman.edit', compact('pengalaman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'negara'=>'required',
        ]);

        $pengalaman = Pengalaman_Luar_Negeri::findOrFail($id);
        $pengalaman->update($request->all());

        return redirect()->route('admin.pengalaman.index', $pengalaman->NIP)
                         ->with('sukses', 'Data pengalaman luar negeri berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $pengalaman = Pengalaman_Luar_Negeri::findOrFail($id);
        $pengalaman->delete();

        // Redirect ke halaman index dengan NIP yang sesuai
        return redirect()->route('admin.pengalaman.index', $pengalaman->NIP)
                         ->with('sukses', 'Data pengalaman luar negeri berhasil dihapus.');
    }
}
