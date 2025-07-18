@extends('pegawai.layout')
@section('konten')

<form action="{{ route('pegawai.kepangkatan.store') }}" method="POST">
    <div class="  ">
        <p class=" text-2xl font-bold leading-7 text-gray-900 pt-2 pb-3 text-center "> Tambah Riwayat Kepangkatan Golongan Ruang Penggajian</p>
        <form action="{{ route('pegawai.kepangkatan.store') }}" method="POST" class="space-y-4">
            @csrf


            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="pangkat" class="block text-sm font-medium leading-6 text-gray-900">Pangkat</label>
                    <div class="mt-1">
                        <input type="text" name="pangkat" id="pangkat" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
    
                <div>
                    <label for="gol_ruang_penggajian" class="block text-sm font-medium leading-6 text-gray-900">Golongan Ruang Penggajian</label>
                    <div class="mt-1">
                        <input type="text" name="gol_ruang_penggajian" id="gol_ruang_penggajian" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="terhitung_mulai" class="block text-sm font-medium leading-6 text-gray-900">Terhitung Mulai</label>
                    <div class="mt-1">
                        <input type="date" name="terhitung_mulai" id="terhitung_mulai" autocomplete="off"class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="gaji" class="block text-sm font-medium leading-6 text-gray-900">Gaji</label>
                    <div class="mt-1">
                        <input type="number" name="gaji" id="gaji" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div>
                    <p class="block text-sm font-medium leading-6 text-gray-900">Surat Keputusan</p>
                    <div class="flex space-x-4">
                        <div class="flex-1">
                            <label for="s_pejabat" class="block text-sm font-medium leading-6 text-gray-900">Pejabat</label>
                            <div>
                                <input type="text" name="s_pejabat" id="s_pejabat" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2  text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="flex-1">
                            <label for="s_tanggal" class="block text-sm font-medium leading-6 text-gray-900">Tanggal</label>
                            <div >
                                <input type="date" name="s_tanggal" id="s_tanggal" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="flex-1">
                            <label for="s_nomor" class="block text-sm font-medium leading-6 text-gray-900">Nomor</label>
                            <div>
                                <input type="text" name="s_nomor" id="s_nomor" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <label for="keterangan" class="block text-sm font-medium leading-6 text-gray-900">Keterangan</label>
                    <div class="mt-1">
                        <input type="text" name="keterangan" id="keterangan" autocomplete="off" class="block w-full rounded-md border-0 py-4 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
               
            </div>
    
            <div class="flex justify-between mt-5">
                <a href="{{ route('pegawai.kepangkatan.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded no-underline">Batal</a>
                <button type="submit"  class="bg-blue-500 text-white font-bold py-2 px-4 rounded no-underline">Simpan </button>
            </div>
        </form>
    </div>
    
</form>

@endsection