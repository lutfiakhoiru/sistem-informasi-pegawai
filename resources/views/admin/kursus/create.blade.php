@extends('admin.layout')
@section('konten')
    
<form action="{{ route('admin.kursus.store') }}" method="POST">
    <div class=" mx-auto p-2">
        <p class=" text-2xl font-bold leading-7 text-gray-900 pt-2 pb-3 text-center "> Tambah Kursus/Latihan</p>
    
        <form action="{{ route('admin.kursus.store') }}" method="POST" class="space-y-4">
            @csrf
    
            <input type="hidden" name="NIP" value="{{ $NIP }}">

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama Kursus</label>
                    <div class="mt-1">
                        <input type="text" name="nama" id="nama" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                    </div>
                </div>
    
                <div>
                    <label for="lama" class="block text-sm font-medium leading-6 text-gray-900">Lama Mengikuti (Hari/Bulan/Tahun)</label>
                    <div class="mt-1">
                        <input type="text" name="lama" id="lama" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
    
                <div>
                    <label for="ijazah" class="block text-sm font-medium leading-6 text-gray-900">No. Ijazah</label>
                    <div class="mt-1">
                        <input type="text" name="ijazah" id="ijazah" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="tempat" class="block text-sm font-medium leading-6 text-gray-900">Tempat</label>
                    <div class="mt-1">
                        <input type="text" name="tempat" id="tempat" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="keterangan" class="block text-sm font-medium leading-6 text-gray-900">Keterangan</label>
                    <div class="mt-1">
                        <input type="text" name="keterangan" id="keterangan" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>
    
            <div class="flex justify-between mt-5">
                <a href="{{ route('admin.pendidikan.index',$NIP) }}"" class="bg-gray-500 text-white font-bold py-2 px-4 rounded no-underline">Batal</a>
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded no-underline">Simpan </button>
            </div>
        </form>
    </div>
    
</form>


@endsection