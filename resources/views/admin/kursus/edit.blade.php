@extends('admin.layout')
@section('konten')
    
<div class="pt-2">
    <form action="{{ route('admin.kursus.update', $kursus->id_kursus) }}" method="POST">
        @csrf
        @method('PUT')
        <p class="text-2xl font-bold leading-7 text-gray-900 pt-2 pb-3 text-center"> Edit Kursus/Latihan</p>
        <div class="pb-10">
            <div  class="mt-1 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
        <!-- Jenjang -->
                <div class="sm:col-span-3">
                    <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama Kursus</label>
                    <div class="mt-1">
                        <input type="text" name="nama" id="nama" value="{{ old('nama', $kursus->nama) }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                    </div>
                </div>
        <!-- Nama Institusi -->
                <div class="sm:col-span-3">
                    <label for="lama" class="block text-sm font-medium leading-6 text-gray-900">Lama Mengikuti (Hari/Bulan/Tahun)</label>
                    <div class="mt-1">
                        <input type="text" name="lama" id="lama" value="{{ old('lama', $kursus->lama) }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="ijazah" class="block text-sm font-medium leading-6 text-gray-900">No. Ijazah</label>
                    <div class="mt-1">
                        <input type="text" name="ijazah" id="ijazah" value="{{ old('ijazah', $kursus->ijazah) }}"class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="tempat" class="block text-sm font-medium leading-6 text-gray-900">Tempat</label>
                    <div class="mt-1">
                        <input type="text" name="tempat" id="tempat" value="{{ old('sttb', $kursus->tempat) }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="keterangan" class="block text-sm font-medium leading-6 text-gray-900">Keterangan</label>
                    <div class="mt-1">
                        <input type="text" name="keterangan" id="keterangan" value="{{ old('keterangan', $kursus->keterangan) }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                    </div>
                </div>

        
            </div>
        </div>
        <div class="flex justify-between mt-5">
            <a href="{{ route('admin.pendidikan.index', $kursus->NIP) }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded no-underline">Batal</a>
            <button type="submit"  class="bg-blue-500 text-white font-bold py-2 px-4 rounded no-underline">Simpan </button>
        </div>
    </form>
</div>


@endsection