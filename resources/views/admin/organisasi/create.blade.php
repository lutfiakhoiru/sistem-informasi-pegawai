@extends('admin.layout')
@section('konten')
    

<form action="{{ route('admin.organisasi.store') }}" method="POST">
    <div class=" mx-auto pb-4">
        <p class="text-2xl font-bold leading-7 text-gray-900  pt-1 pb-4 text-center  ">Tambah Pengalaman Organisasi</p>
        <form action="{{ route('admin.pengalaman.store') }}" method="POST" class="space-y-4">
            @csrf
    
            <input type="hidden" name="NIP" value="{{ $NIP }}">

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="nama_organisasi" class="block text-sm font-medium leading-6 text-gray-900">Nama Organisasi</label>
                    <div class="mt-1">
                        <input type="text" name="nama_organisasi" id="nama_organisasi" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
    
                <div>
                    <label for="kedudukan" class="block text-sm font-medium leading-6 text-gray-900">Kedudukan</label>
                    <div class="mt-1">
                        <input type="text" name="kedudukan" id="kedudukan" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="tahun" class="block text-sm font-medium leading-6 text-gray-900">Tahun</label>
                    <div class="mt-1">
                        <input type="text" name="tahun" id="tahun" autocomplete="off"class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="tempat" class="block text-sm font-medium leading-6 text-gray-900">Tempat</label>
                    <div class="mt-1">
                        <input type="text" name="tempat" id="tempat" autocomplete="off"class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="nama_pimpinan" class="block text-sm font-medium leading-6 text-gray-900">Nama Pimpinan</label>
                    <div class="mt-1">
                        <input type="text" name="nama_pimpinan" id="nama_pimpinan" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

               
            </div>
    
          
            <div class="flex justify-between my-5">
                <a href="{{ route('admin.organisasi.index', $NIP) }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded no-underline">Batal</a>
                <button type="submit"  class="bg-blue-500 text-white font-bold py-2 px-4 rounded no-underline">Simpan </button>
            </div>
        </form>
    </div>
    
</form>

@endsection