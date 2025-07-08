@extends('admin.layout')
@section('konten')
    
<div class="pt-2">
    <form action="{{ route('admin.pendidikan.update', $pendidikan->id_pendidikan) }}" method="POST">
        @csrf
        @method('PUT')
        <p class=" text-2xl font-bold leading-7 text-gray-900 pt-2 pb-3 text-center "> Edit Riwayat Pendidikan</p>
        <div class="pb-10">
            <div  class="mt-1 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
        <!-- Jenjang -->
                <div class="sm:col-span-3">
                    <label for="jenjang" class="block text-sm font-medium leading-6 text-gray-900">Jenjang</label>
                    <div class="mt-1">
                        <select id="jenjang" name="jenjang" autocomplete="jenjang" class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">      
                            <option value="S1/D3/D2"  {{ old('jenjang', $pendidikan->jenjang) == 'S1/D3/D2' ? 'selected' : '' }} >S1/D3/D2</option>
                            <option value="SMA" {{ old('jenjang', $pendidikan->jenjang) == 'SMA' ? 'selected' : '' }} >SMA Sederajat</option>
                            <option value="SMP" {{ old('jenjang', $pendidikan->jenjang) == 'SMP' ? 'selected' : '' }} >SMP Sederajat</option>
                            <option value="SD" {{ old('jenjang', $pendidikan->jenjang) == 'SD' ? 'selected' : '' }}>SD Sederajat</option>
                        </select>
                    </div>
                </div>
        <!-- Nama Institusi -->
                <div class="sm:col-span-3">
                    <label for="nama_pendidikan" class="block text-sm font-medium leading-6 text-gray-900">Nama Institusi</label>
                    <div class="mt-1">
                        <input type="text" name="nama_pendidikan" id="nama_pendidikan" value="{{ old('nama_pendidikan', $pendidikan->nama_pendidikan) }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                    </div>
                </div>

        <!-- Jurusan -->
                <div class="sm:col-span-3">
                    <label for="jurusan" class="block text-sm font-medium leading-6 text-gray-900">Jurusan</label>
                    <div class="mt-1">
                        <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan', $pendidikan->jurusan) }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

        <!-- Tahun Lulus -->
                <div class="sm:col-span-3">
                    <label for="sttb" class="block text-sm font-medium leading-6 text-gray-900">No. Ijazah</label>
                    <div class="mt-1">
                        <input type="text" name="sttb" id="sttb" value="{{ old('sttb', $pendidikan->sttb) }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="tempat" class="block text-sm font-medium leading-6 text-gray-900">Tempat</label>
                    <div class="mt-1">
                        <input type="text" name="tempat" id="tempat" value="{{ old('sttb', $pendidikan->tempat) }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="nama_dekan" class="block text-sm font-medium leading-6 text-gray-900">Nama Dekan / Nama Kepala Sekolah</label>
                    <div class="mt-1">
                        <input type="text" name="nama_dekan" id="nama_dekan" value="{{ old('nama_dekan', $pendidikan->nama_dekan) }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

        
            </div>
        </div>
        <div class=" mt-5 flex justify-between pb-4">
            <a href="{{ route('admin.pendidikan.index', $pendidikan->NIP) }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded no-underline">Batal</a>
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded no-underline">Simpan </button>
        </div>
    </form>
</div>

@endsection