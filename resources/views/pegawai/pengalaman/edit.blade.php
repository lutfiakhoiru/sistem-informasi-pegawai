@extends('pegawai.layout')
@section('konten')

<div class="ml-10 mr-10 pt-1">
    <form action="{{ route('pegawai.pengalaman.update', $pengalaman->id_pengalaman) }}" method="POST">
        @csrf
        @method('PUT')
        <p class="text-2xl font-bold leading-7 text-gray-900 pt-2 pb-5 text-center ">Edit Pengalaman ke Luar Negeri</p>
        <div class="pb-10">
            <div  class="mt-1 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
        <!-- Jenjang -->
                <div class="sm:col-span-3">
                    <label for="negara" class="block text-sm font-medium leading-6 text-gray-900">Negara</label>
                    <div class="mt-1">
                        <input type="text" name="negara" id="negara" value="{{ old('negara', $pengalaman->negara) }}"class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="tujuan" class="block text-sm font-medium leading-6 text-gray-900">Tujuan Kunjungan</label>
                    <div class="mt-1">
                        <input type="text" name="tujuan" id="tujuan" value="{{ old('tujuan', $pengalaman->tujuan) }}"class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="lama" class="block text-sm font-medium leading-6 text-gray-900">Lamanya (Hari/Bulan/Tahun)</label>
                    <div class="mt-1">
                        <input type="text" name="lama" id="lama" value="{{ old('lama', $pengalaman->lama) }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="biaya" class="block text-sm font-medium leading-6 text-gray-900">Yang Membiayai</label>
                    <div class="mt-1">
                        <input type="text" name="biaya" id="biaya" value="{{ old('biaya', $pengalaman->biaya) }}" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                    </div>
                </div>

            </div>
        </div>
        <div class="flex justify-between mt-5">
            <a href="{{ route('pegawai.pengalaman.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded no-underline">Batal</a>
            <button type="submit"  class="bg-blue-500 text-white font-bold py-2 px-4 rounded no-underline">Simpan </button>
        </div>
    </form>
</div>

@endsection