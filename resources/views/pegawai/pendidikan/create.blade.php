@extends('pegawai.layout')
@section('konten')
    
<div class=" ">
    <p class="text-2xl font-bold leading-7 text-gray-900  pt-1 pb-3 text-center "> Tambah Riwayat Pendidikan</p>

    <form action="{{ route('pegawai.pendidikan.store') }}" method="POST" class="space-y-4">
        @csrf


        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label for="jenjang" class="block text-sm font-medium leading-6 text-gray-900">Jenjang</label>
                <div class="mt-2">
                    <select id="jenjang" name="jenjang" autocomplete="jenjang"  class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="S1/D3/D2" >S1/D3/D2</option>
                        <option value="SMA" >SMA Sederajat</option>
                        <option value="SMP" >SMP Sederajat</option>
                        <option value="SD" >SD Sederajat</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="nama_pendidikan" class="block text-sm font-medium leading-6 text-gray-900">Nama Institusi</label>
                <div class="mt-1">
                    <input type="text" name="nama_pendidikan" id="nama_pendidikan" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <label for="jurusan" class="block text-sm font-medium leading-6 text-gray-900">Jurusan</label>
                <div class="mt-1">
                    <input type="text" name="jurusan" id="jurusan" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <label for="sttb" class="block text-sm font-medium leading-6 text-gray-900">No. Ijazah</label>
                <div class="mt-1">
                    <input type="text" name="sttb" id="sttb" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <label for="tempat" class="block text-sm font-medium leading-6 text-gray-900">Tempat</label>
                <div class="mt-1">
                    <input type="text" name="tempat" id="tempat" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <label for="nama_dekan" class="block text-sm font-medium leading-6 text-gray-900">Nama Dekan / Nama Kepala Sekolah</label>
                <div class="mt-1">
                    <input type="text" name="nama_dekan" id="nama_dekan" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        </div>

        <div class="mt-5 flex justify-between">
            <a href="{{ route('pegawai.pendidikan.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded no-underline">Batal</a>
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded no-underline">
                Simpan
            </button>
        </div>
    </form>
</div>

@endsection