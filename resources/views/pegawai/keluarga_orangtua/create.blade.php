@extends('pegawai.layout')
@section('konten')

<form action="{{ route('pegawai.keluarga_orangtua.store') }}" method="POST">
    <div class="mx-auto pb-4">
        <p class="text-2xl font-bold leading-7 text-gray-900  pt-1 pb-4 text-center  "> Tambah Keterangan Orang Tua</p>
    
        <form action="{{ route('pegawai.keluarga_orangtua.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama Lengkap</label>
                    <div class="mt-1">
                        <input type="text" name="nama" id="nama" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
    
                <div>
                    <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Tempat Lahir</label>
                    <div class="mt-1">
                        <select id="status" name="status" autocomplete="jk-name"  class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="Orang Tua Kandung" >Orang Tua Kandung</option>
                            <option value="Orang Tua Mertua" >Orang Tua Mertua</option>
                        </select>
                    </div>
                </div>
    
                <div>
                    <label for="tanggal_lahir" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Lahir</label>
                    <div class="mt-1">
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="pekerjaan" class="block text-sm font-medium leading-6 text-gray-900">Pekerjaan</label>
                    <div class="mt-1">
                        <input type="text" name="pekerjaan" id="pekerjaan" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="keterangan" class="block text-sm font-medium leading-6 text-gray-900">Keterangan</label>
                    <div class="mt-1">
                        <input type="text" name="keterangan" id="keterangan" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>
    
            <div class="mt-6 text-end">
                <div class="flex justify-between my-5">
                    <a href="{{ route('pegawai.keluarga.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded no-underline">Batal</a>
                    <button type="submit"  class="bg-blue-500 text-white font-bold py-2 px-4 rounded no-underline">Simpan </button>
                </div>
            </div>
        </form>
    </div>
    
</form>

@endsection