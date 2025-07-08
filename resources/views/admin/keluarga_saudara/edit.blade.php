@extends('admin.layout')
@section('konten')
    

<div class="pt-1">
    <form action="{{ route('admin.keluarga_saudara.update', $saudara->id_saudara) }}" method="POST">
        @csrf
        @method('PUT')
        <p class="text-2xl font-bold leading-7 text-gray-900  pt-1 pb-4 text-center  "> Edit Keterangan Saudara</p>
        <div class="pb-10">
            <div  class="mt-1 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama Lengkap</label>
                    <div class="mt-1">
                        <input type="text" name="nama" id="nama" value="{{ $saudara->nama }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="jenis_kelamin" class="block text-sm font-medium leading-6 text-gray-900"> Jenis Kelamin</label>
                    <div class="mt-1">
                        <select id="jenis_kelamin" name="jenis_kelamin" autocomplete="jk-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="Laki-Laki" {{ old('jenis_kelamin', $saudara->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }} >Laki-Laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin', $saudara->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }} >Perempuan</option>
                          </select>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="tanggal_lahir" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Lahir</label>
                    <div class="mt-1">
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{$saudara->tanggal_lahir_for_input }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="pekerjaan" class="block text-sm font-medium leading-6 text-gray-900"> Pekerjaan</label>
                    <div class="mt-1">
                        <input type="text" name="pekerjaan" id="pekerjaan" value="{{ $saudara->pekerjaan }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="keterangan" class="block text-sm font-medium leading-6 text-gray-900"> Keterangan</label>
                    <div class="mt-1">
                        <input type="text" name="keterangan" id="keterangan" value="{{ $saudara->keterangan }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                    </div>
                </div>

        
            </div>
        </div>
        <div class="flex justify-between my-5">
            <a href="{{ route('admin.keluarga.index', $saudara->NIP) }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded no-underline">Batal</a>
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded no-underline">Simpan </button>
        </div>
    </form>
</div>

@endsection