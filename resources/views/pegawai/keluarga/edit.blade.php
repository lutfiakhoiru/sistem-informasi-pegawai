@extends('pegawai.layout')
@section('konten')

<div class="">
    <form action="{{ route('pegawai.keluarga.update', $pasangan->id_pasangan) }}" method="POST">
        @csrf
        @method('PUT')
        <p class="text-2xl font-bold leading-7 text-gray-900  pt-1 pb-3 text-center  "> Edit Keterangan Istri/Suami</p>
        <div class="pb-10">
            <div  class="mt-1 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama Lengkap</label>
                    <div class="mt-1">
                        <input type="text" name="nama" id="nama" value="{{ $pasangan->nama }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="tempat_lahir" class="block text-sm font-medium leading-6 text-gray-900">Tempat Lahir</label>
                    <div class="mt-1">
                        <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ $pasangan->tempat_lahir }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="tanggal_lahir" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Lahir</label>
                    <div class="mt-1">
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{$pasangan->tanggal_lahir_for_input }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="tanggal_nikah" class="block text-sm font-medium leading-6 text-gray-900"> Tanggal Nikah</label>
                    <div class="mt-1">
                        <input type="date" name="tanggal_nikah" id="tanggal_nikah" value="{{ $pasangan->tanggal_nikah_for_input }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="pekerjaan" class="block text-sm font-medium leading-6 text-gray-900"> Pekerjaan</label>
                    <div class="mt-1">
                        <input type="text" name="pekerjaan" id="pekerjaan" value="{{ $pasangan->pekerjaan }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="keterangan" class="block text-sm font-medium leading-6 text-gray-900"> Keterangan</label>
                    <div class="mt-1">
                        <input type="text" name="keterangan" id="keterangan" value="{{ $pasangan->keterangan }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                    </div>
                </div>

        
            </div>
        </div>
        <div class="flex justify-between my-5">
            <a href="{{ route('pegawai.keluarga.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded no-underline">Batal</a>
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded no-underline">Simpan </button>
        </div>
    </form>
</div>

@endsection