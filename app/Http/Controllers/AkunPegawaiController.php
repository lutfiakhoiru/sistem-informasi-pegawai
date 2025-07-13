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

class AkunPegawaiController extends Controller
{
    public function index()
    {
        $akun = Pegawai::paginate();
        
        return view('admin.akun-pegawai.index', compact('akun'));
    }

    public function create()
    {
        $nipSudahPunyaAkun = Pegawai::pluck('nip')->toArray();

    // Ambil hanya NIP dari biodata yang belum dibuatkan akun
        $biodata = Biodata::whereNotIn('NIP', $nipSudahPunyaAkun)->get();
        
        return view('admin.akun-pegawai.create', compact('biodata'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'nip' => 'required|exists:biodata,nip|unique:pegawai,nip',
            'password' => 'required|min:6|confirmed',
        ]);

        Pegawai::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'password' => Hash::make($request->password),
            
        ]);

        return redirect()->route('admin.akun-pegawai.index')->with('sukses', 'Akun pegawai berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $akun = Pegawai::findOrFail($id);
        $biodata = Biodata::all();
        return view('admin.akun-pegawai.edit', compact('akun', 'biodata'));
    }

    public function update(Request $request, $id)
    {
        $akun = Pegawai::findOrFail($id);

        $request->validate([
            'nip' => 'required|exists:Biodata,nip|unique:users,nip,' . $akun->id,
            'nama' => 'required|string|max:100',
        ]);

        $akun->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
        ]);

        return redirect()->route('admin.akun-pegawai.index')->with('sukses', 'Akun pegawai berhasil diperbarui.');
    }

    public function destroy($nip)
    {
        $akun = Pegawai::where('nip', $nip)->firstOrFail();
        

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
