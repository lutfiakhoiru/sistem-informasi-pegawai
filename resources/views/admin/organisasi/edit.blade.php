@extends('admin.layout')
@section('konten')
    

<div class=" pt-1">
    <form action="{{ route('admin.organisasi.update', $organisasi->id_organisasi) }}" method="POST">
        @csrf
        @method('PUT')
        <p class="text-2xl font-bold leading-7 text-gray-900  pt-1 pb-4 text-center  ">Edit Pengalaman Organisasi</p>
        <div class="pb-10">
            <div  class="mt-1 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="nama_organisasi" class="block text-sm font-medium leading-6 text-gray-900">Nama Organisasi</label>
                    <div class="mt-1">
                        <input type="text" name="nama_organisasi" id="nama_organisasi" value="{{ old('nama_organisasi', $organisasi->nama_organisasi) }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="kedudukan" class="block text-sm font-medium leading-6 text-gray-900">Kedudukan dalam Organisasi</label>
                    <div class="mt-1">
                        <input type="text" name="kedudukan" id="kedudukan" value="{{ old('kedudukan', $organisasi->kedudukan) }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="tahun" class="block text-sm font-medium leading-6 text-gray-900">Tahun</label>
                    <div class="mt-1">
                        <input type="text" name="tahun" id="tahun" value="{{ old('tahun', $organisasi->tahun) }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="tempat" class="block text-sm font-medium leading-6 text-gray-900">Tempat</label>
                    <div class="mt-1">
                        <input type="text" name="tempat" id="tempat" value="{{ old('tempat', $organisasi->tempat) }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="nama_pimpinan" class="block text-sm font-medium leading-6 text-gray-900">Nama Pimpinan</label>
                    <div class="mt-1">
                        <input type="text" name="nama_pimpinan" id="nama_pimpinan" value="{{ old('nama_pimpinan', $organisasi->nama_pimpinan) }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

            </div>
        </div>
        <div class="flex justify-between my-5">
            <a href="{{ route('admin.organisasi.index', $organisasi->NIP) }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded no-underline">Batal</a>
            <button type="submit"  class="bg-blue-500 text-white font-bold py-2 px-4 rounded no-underline">Simpan </button>
        </div>
    </form>
</div>

@endsection