@extends('pegawai.layout')
@section('konten')

<div class="mx-auto"> 
    <form action="{{ route('pegawai.penghargaan.update', $penghargaan->id_penghargaan) }}" method="POST">
        @csrf
        @method('PUT')
        <p class=" text-2xl font-bold leading-7 text-gray-900 pt-2 pb-4 text-center"> Edit Tanda Jasa/Penghargaan</p>
        <div class="pb-10" >
            <div  class="mt-1 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama Penghargaan</label>
                    <div class="mt-1">
                        <input type="text" name="nama" id="nama" value="{{ old('nama', $penghargaan->nama) }}"  class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                    </div>
                </div>

        <!-- Nama Institusi -->
                <div class="sm:col-span-3">
                    <label for="tahun" class="block text-sm font-medium leading-6 text-gray-900">Tahun Perolehan</label>
                    <div class="mt-1">
                        <input type="text" name="tahun" id="tahun" value="{{ old('tahun', $penghargaan->tahun) }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                    </div>
                </div>

        <!-- Jurusan -->
                <div class="sm:col-span-3">
                    <label for="instansi" class="block text-sm font-medium leading-6 text-gray-900">Negara/Instansi yang Memberi</label>
                    <div class="mt-1">
                        <input type="text" name="instansi" id="instansi" value="{{ old('instansi', $penghargaan->instansi) }}"  class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-between mt-5">
            <a href="{{ route('pegawai.penghargaan.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded no-underline">Batal</a>
            <button type="submit" c class="bg-blue-500 text-white font-bold py-2 px-4 rounded no-underline">Simpan </button>
        </div>
    </form>
</div>

@endsection