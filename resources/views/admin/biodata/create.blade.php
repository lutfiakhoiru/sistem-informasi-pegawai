@extends('admin.layout')
@section('konten')
<div class="ml-1 mr-1">
    <form action="{{ route('admin.biodata.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
      <p class="text-2xl font-bold leading-7 text-gray-900 pt-2 pb-3 text-center">Tambah Data Pegawai</p>
      <div class=" pb-10">
        <div class="mt-1 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
          <div class="sm:col-span-6" >
            <label for="foto" class=" form-label block text-sm font-medium leading-6 text-gray-900">Foto</label>
            <input type="file" id="foto" name="foto" accept="image/*" class="form-control block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
          <div class="sm:col-span-3">
            <label for="NIP" class="block text-sm font-medium leading-6 text-gray-900">NIP</label>
            <div class="mt-1">
              <input type="number" name="NIP" id="NIP" value="{{ Session::get('NIP')}}" autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
    
          <div class="sm:col-span-3">
            <label for="NIK" class="block text-sm font-medium leading-6 text-gray-900">NIK</label>
            <div class="mt-1">
              <input type="number" name="NIK" id="NIK" value="{{ Session::get('NIK')}}" autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
  
          <div class="sm:col-span-3">
            <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama Lengkap</label>
            <div class="mt-1">
              <input type="text" name="nama" id="nama" value="{{ Session::get('nama')}}" autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="jenis_kelamin" class="block text-sm font-medium leading-6 text-gray-900">Jenis kelamin</label>
            <div class="mt-1">
              <select id="jenis_kelamin" name="jenis_kelamin" autocomplete="jk-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                <option value="" disabled {{ Session::get('jenis_kelamin') ? '' : 'selected' }}>Pilih Jenis kelamin</option>
                <option value="Laki-Laki" {{ Session::get('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }} >Laki-Laki</option>
                <option value="Perempuan" {{ Session::get('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }} >Perempuan</option>
              </select>
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="tempat_lahir" class="block text-sm font-medium leading-6 text-gray-900">Tempat Lahir</label>
            <div class="mt-1">
              <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ Session::get('tempat_lahir')}}" autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>  

          <div class="sm:col-span-3">
            <label for="tanggal_lahir" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Lahir</label>
            <div class="mt-1">
              <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ Session::get('tanggal_lahir')}}" autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status Perkawinan</label>
            <div class="mt-1">
              <select id="status" name="status"  autocomplete="jk-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option value="" disabled {{ Session::get('status') ? '' : 'selected' }}>Pilih Status Perkawinan</option>
                <option value="Belum Menikah" {{ Session::get('status') == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                <option value="Menikah" {{ Session::get('status') == 'Menikah' ? 'selected' : '' }} >Menikah</option>
                <option value="Janda" {{ Session::get('status') == 'Janda' ? 'selected' : '' }} >Janda</option>
                <option value="Duda" {{ Session::get('status') == 'Duda' ? 'selected' : '' }} >Duda</option>
              </select>
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="agama" class="block text-sm font-medium leading-6 text-gray-900">Agama</label>
            <div class="mt-1">
              <select id="agama" name="agama"  autocomplete="jk-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option value="" disabled {{ Session::get('agama') ? '' : 'selected' }}>Pilih Agama</option>
                <option value="Islam" {{ Session::get('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                <option value="Katolik" {{ Session::get('agama') == 'Katolik' ? 'selected' : '' }} >Katolik</option>
                <option value="Kristen" {{ Session::get('agama') == 'Kristen' ? 'selected' : '' }} >Kristen</option>
                <option value="Hindu" {{ Session::get('agama') == 'Hindu' ? 'selected' : '' }} >Hindu</option>
                <option value="Buddha" {{ Session::get('agama') == 'Buddha' ? 'selected' : '' }} >Buddha</option>
                <option value="Konghucu" {{ Session::get('agama') == 'Konghucu' ? 'selected' : '' }} >Konghucu</option>
                <option value=">Lainnya" {{ Session::get('agama') == '>Lainnya' ? 'selected' : '' }} >Lainnya</option>
              </select>
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="hobi" class="block text-sm font-medium leading-6 text-gray-900">Hobi</label>
            <div class="mt-1">
              <input type="text" name="hobi" id="hobi" value="{{ Session::get('hobi')}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>


          <div class="col-span-6 pt-4">
            <p class="text-lg  font-bold">Alamat </p>
          </div>
      
          <div class="sm:col-span-3">
            <label for="jalan" class="block text-sm font-medium leading-6 text-gray-900">Jalan </label>
            <div class="mt-1">
              <input type="text" name="jalan" id="jalan" value="{{ Session::get('jalan')}}"  autocomplete="given-name" rows="2" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></input>
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="desa" class="block text-sm font-medium leading-6 text-gray-900">Desa/Kelurahan</label>
            <div class="mt-1">
              <input type="text" name="desa" id="desa" value="{{ Session::get('desa')}}"  autocomplete="given-name" rows="2" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></input>
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="kecamatan" class="block text-sm font-medium leading-6 text-gray-900">Kecamatan</label>
            <div class="mt-1">
              <input type="text" name="kecamatan" id="kecamatan" value="{{ Session::get('kecamatan')}}"  autocomplete="given-name" rows="2" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></input>
            </div>
          </div>

          <div class="sm:col-span-3 form-group">
            <label for="kabupaten" class="block text-sm font-medium leading-6 text-gray-900">Kabupaten/Kota</label>
            <div class="mt-1">
              <input type="text" name="kabupaten" id="kabupaten" value="{{ Session::get('kabupaten')}}"  autocomplete="given-name" rows="2" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></input>
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="provinsi" class="block text-sm font-medium leading-6 text-gray-900">Provinsi</label>
            <div class="mt-1">
              <input type="text" name="provinsi" id="provinsi" value="{{ Session::get('provinsi')}}"  autocomplete="given-name" rows="2" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></input>
            </div>
          </div>

          <div class="sm:col-span-6 pt-3"></div>

          <div class="sm:col-span-3">
            <label for="pangkat" class="block text-sm font-medium leading-6 text-gray-900">Pangkat dan golongan ruang</label>
            <div class="mt-1">
              <input type="text" name="pangkat" id="pangkat" value="{{ Session::get('pangkat')}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="status_pegawai" class="block text-sm font-medium leading-6 text-gray-900">Status Pegawai</label>
            <div class="mt-1">
              <select id="status_pegawai" name="status_pegawai"  autocomplete="jk-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option value="" disabled {{ Session::get('status_pegawai') ? '' : 'selected' }}>Pilih Status Pegawai</option>
                <option value="PNS" {{ Session::get('status_pegawai') == 'PNS' ? 'selected' : '' }} >PNS</option>
                <option value="POLRI" {{ Session::get('status_pegawai') == 'POLRI' ? 'selected' : '' }} >POLRI</option>
                <option value="PPNPN" {{ Session::get('status_pegawai') == 'PPNPN' ? 'selected' : '' }} >PPNPN</option>
                <option value="P3K" {{ Session::get('status_pegawai') == 'P3K' ? 'selected' : '' }}>P3K</option>
              </select>
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="jabatan" class="block text-sm font-medium leading-6 text-gray-900">Jabatan</label>
            <div class="mt-1">
              <input type="text" name="jabatan" id="jabatan" value="{{ Session::get('jabatan')}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="masa_kerja" class="block text-sm font-medium leading-6 text-gray-900">Masa Kerja</label>
            <div class="mt-1">
              <input type="text" name="masa_kerja" id="masa_kerja" value="{{ Session::get('masa_jabatan')}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="no_karpeg" class="block text-sm font-medium leading-6 text-gray-900">No. Karpeg</label>
            <div class="mt-1">
              <input type="number" name="no_karpeg" id="no_karpeg" value="{{ Session::get('no_karpeg')}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="no_rek" class="block text-sm font-medium leading-6 text-gray-900">No. Rekening</label>
            <div class="mt-1">
              <input type="number" name="no_rek" id="no_rek" value="{{ Session::get('no_rek')}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="bpjs" class="block text-sm font-medium leading-6 text-gray-900">No. BPJS</label>
            <div class="mt-1">
              <input type="number" name="bpjs" id="bpjs" value="{{ Session::get('bpjs')}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="npwp" class="block text-sm font-medium leading-6 text-gray-900">NPWP</label>
            <div class="mt-1">
              <input type="number" name="npwp" id="npwp" value="{{ Session::get('npwp')}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="col-span-6 pt-4">
            <p class="text-lg font-bold">Keterangan </p>
          </div>
          <div class="sm:col-span-3">
            <label for="tinggi_badan" class="block text-sm font-medium leading-6 text-gray-900">Tinggi Badan(cm)</label>
            <div class="mt-1">
              <input type="number" name="tinggi_badan" id="tinggi_badan" value="{{ Session::get('tinggi_badan')}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="berat_badan" class="block text-sm font-medium leading-6 text-gray-900">Berat Badan(kg)</label>
            <div class="mt-1">
              <input type="number" name="berat_badan" id="berat_badan" value="{{ Session::get('berat_badan')}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="rambut" class="block text-sm font-medium leading-6 text-gray-900">Rambut</label>
            <div class="mt-1">
              <input type="text" name="rambut" id="rambut" value="{{ Session::get('rambut')}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="bentuk_muka" class="block text-sm font-medium leading-6 text-gray-900">Bentuk Muka</label>
            <div class="mt-1">
              <input type="text" name="bentuk_muka" id="bentuk_muka" value="{{ Session::get('bentuk_muka')}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="warna_kulit" class="block text-sm font-medium leading-6 text-gray-900">Warna kulit</label>
            <div class="mt-1">
              <input type="text" name="warna_kulit" id="warna_kulit" value="{{ Session::get('warna_kulit')}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="ciri_khas" class="block text-sm font-medium leading-6 text-gray-900">Ciri-ciri Khas</label>
            <div class="mt-1">
              <input type="text" name="ciri_khas" id="ciri_khas" value="{{ Session::get('ciri_khas')}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="cacat" class="block text-sm font-medium leading-6 text-gray-900">Cacat</label>
            <div class="mt-1">
              <input type="text" name="cacat" id="cacat" value="{{ Session::get('cacat')}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="gol_darah" class="block text-sm font-medium leading-6 text-gray-900">Golongan Darah</label>
            <div class="mt-1">
              <select id="gol_darah" name="gol_darah" autocomplete=" " class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option value="" disabled {{ Session::get('gol_darah') ? '' : 'selected' }}>Pilih Golongan Darah</option>
                <option value="A" {{ Session::get('gol_darah') == 'A' ? 'selected' : '' }} >A</option>
                <option value="B" {{ Session::get('gol_darah') == 'B' ? 'selected' : '' }} >B</option>
                <option value="AB" {{ Session::get('gol_darah') == 'AB' ? 'selected' : '' }} >AB</option>
                <option value="O" {{ Session::get('gol_darah') == 'O' ? 'selected' : '' }} >O</option>
              </select>
            </div>
          </div>

        </div>
      </div>

      <div class="flex justify-end py-5">
        <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Simpan</button>
      </div>

    </form>
  </div>
@endsection