<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Biodata;
use App\Models\Riwayat_Kepangkatan;
use App\Models\Pengalaman_Pekerjaan;
class KepangkatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($NIP)
    {
        $pangkat = Riwayat_Kepangkatan::where('nip', $NIP)->paginate(10);
        $jabatan = Pengalaman_Pekerjaan::where('nip', $NIP)->paginate(10);

        $data = Biodata::where('nip', $NIP)->first();

        if (!$data) {
            return redirect()->back()->with('error', 'data tidak ditemukan');
        }
        return view('admin.kepangkatan.index', compact('pangkat','jabatan', 'NIP', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($NIP)
    {
        return view('admin.kepangkatan.create', compact('NIP'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NIP'=>'required',
            'pangkat'=>'required',
        ],[
            'pangkat.required'=>'Pangkat wajib diisi',
            
        ]);

        $pangkat = str_replace('.', '', $request->input('gaji')); 
        Riwayat_Kepangkatan::create($request->all());
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
    public function edit(string $id)
    {
        $pangkat = Riwayat_Kepangkatan::findOrFail($id);
        return view('admin.kepangkatan.edit', compact('pangkat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'pangkat'=>'required',
        ],[
            'pangkat.required'=>'Pangkat wajib diisi',
            
        ]);
        
        $pangkat= Riwayat_Kepangkatan::findOrFail($id);
        $pangkat->gaji = str_replace('.', '', $request->input('gaji'));
        $pangkat->update($request->all());

        return redirect()->route('admin.kepangkatan.index', $pangkat->NIP)
                         ->with('sukses', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pangkat = Riwayat_Kepangkatan::findOrFail($id);
        $pangkat->delete();

        // Redirect ke halaman index dengan NIP yang sesuai
        return redirect()->route('admin.kepangkatan.index', $pangkat->NIP)
                         ->with('sukses', 'Data berhasil dihapus.');
    }
}
