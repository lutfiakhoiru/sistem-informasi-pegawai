<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\Pegawai;
use App\Models\Biodata;
use App\Models\Pendidikan;
use App\Models\Kursus;
use App\Models\Riwayat_Kepangkatan;
use App\Models\Pengalaman_Pekerjaan;
use App\Models\Penghargaan;
use App\Models\Pengalaman_Luar_Negeri;
use App\Models\Keluarga_Pasangan;
use App\Models\Keluarga_Anak;
use App\Models\Keluarga_Orangtua;
use App\Models\Keluarga_Saudara;
use App\Models\Organisasi;

class HapusAkunPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $akun = Pegawai::findOrFail($id); // model akun pegawai
        $nip = $akun->nip; // ambil NIP dari akun pegawai

        // Hapus semua data terkait seperti di fungsi `biodata::destroy()`
        $data = Biodata::where('NIP', $nip)->first();
        if ($data && $data->foto) {
            File::delete(public_path('foto') . '/' . $data->foto);
        }
        Biodata::where('NIP', $nip)->delete();
        Pendidikan::where('NIP', $nip)->delete();
        Kursus::where('NIP', $nip)->delete();
        Riwayat_Kepangkatan::where('NIP', $nip)->delete();
        Pengalaman_Pekerjaan::where('NIP', $nip)->delete();
        Penghargaan::where('NIP', $nip)->delete();
        Pengalaman_Luar_Negeri::where('NIP', $nip)->delete();
        Keluarga_Pasangan::where('NIP', $nip)->delete();
        Keluarga_Anak::where('NIP', $nip)->delete();
        Keluarga_Orangtua::where('NIP', $nip)->delete();
        Keluarga_Saudara::where('NIP', $nip)->delete();
        Organisasi::where('NIP', $nip)->delete();
        

        // Terakhir hapus akun pegawai-nya
        $akun->delete();

        return redirect()->route('admin.akun-pegawai.index')->with('sukses', 'Akun pegawai dan seluruh data berhasil dihapus.');
    }
}
