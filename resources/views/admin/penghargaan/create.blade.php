@extends('admin.layout')
@section('konten')
    

<form action="{{ route('admin.penghargaan.store') }}" method="POST">
    <div class=" mx-auto ">
        <p class=" text-2xl font-bold leading-7 text-gray-900 pt-2 pb-3 text-center ">Tambah Tanda Jasa/Penghargaan</p>
    
        <form action="{{ route('admin.penghargaan.store') }}" method="POST" class="space-y-4">
            @csrf
    
            <input type="hidden" name="NIP" value="{{ $NIP }}">

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama Penghargaan</label>
                    <div class="mt-1">
                        <input type="text" name="nama" id="nama" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
    
                <div>
                    <label for="tahun" class="block text-sm font-medium leading-6 text-gray-900">Tahun Perolehan</label>
                    <div class="mt-1">
                        <input type="text" name="tahun" id="tahun" autocomplete="off"  class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
    
                <div>
                    <label for="instansi" class="block text-sm font-medium leading-6 text-gray-900">Negara/Instansi yang Memberi</label>
                    <div class="mt-1">
                        <input type="text" name="instansi" id="instansi" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>
    
            <div class="flex justify-between mt-5">
                <a href="{{ route('admin.penghargaan.index',$NIP) }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded no-underline">Batal</a>
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded no-underline">
                    Simpan
                </button>
            </div>
        </form>
    </div>
    
</form>

@endsection