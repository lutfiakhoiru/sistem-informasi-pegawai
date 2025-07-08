@extends('admin.layout')
@section('konten')
    
<div class="ml-10 mr-10 pt-1">
    <form action="{{ route('admin.biodata.update', $data->NIP) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
     
      <div class="flex justify-between pb-2">
            <a href="{{ route('admin.biodata.index',$data->NIP) }}" type="submit" class="bg-gray-500 text-white font-bold py-2 px-4 rounded no-underline">Kembali</a>
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded no-underline"> Simpan</button>
      </div>
      <p class="text-2xl font-bold leading-7 text-gray-900 py-2 text-center">Edit Profil Pegawai</p>
      <div class=" pb-10">
        <div class="mt-1 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
          <div class="sm:col-span-6" >
            @if($data->foto)
              <div class="flex justify-center mb-3">
                  <img style="border: 1px solid #000;width: 150px; height: 200px; object-fit: cover;"  src="{{ url('foto').'/'.$data->foto }}" />
              </div>
            @else
              <span class="badge badge-danger"> belum ada foto</span>
            @endif
            <label for="foto"  class="block text-sm font-medium leading-6 text-gray-900">Foto</label>
            <div class="mt-1">
              <input type="file" id="foto" name="foto" accept="image/*" class="form-control block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
          

      

          <div class="sm:col-span-3">
            <label for="NIK" class="block text-sm font-medium leading-6 text-gray-900">NIK</label>
            <div class="mt-1">
              <input type="number" name="NIK" id="NIK" value="{{$data->NIK}}" autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
  
          <div class="sm:col-span-3">
            <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama Lengkap</label>
            <div class="mt-1">
              <input type="text" name="nama" id="nama" value="{{ $data->nama}}" autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="jenis_kelamin" class="block text-sm font-medium leading-6 text-gray-900">Jenis kelamin</label>
            <div class="mt-1">
              <select id="jenis_kelamin" name="jenis_kelamin" autocomplete="jk-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option value="Laki-Laki" {{ old('jenis_kelamin',$data->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }} >Laki-Laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin',$data->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }} >Perempuan</option>
              </select>
            </div>
          </div>
          
          <div class="sm:col-span-3">
            <label for="tempat_lahir" class="block text-sm font-medium leading-6 text-gray-900">Tempat Lahir</label>
            <div class="mt-1">
              <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ $data->tempat_lahir}}" autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>  

          <div class="sm:col-span-3">
            <label for="tanggal_lahir" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Lahir</label>
            <div class="mt-1">
              <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ $data->tanggal_lahir_for_input }}" autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status Perkawinan</label>
            <div class="mt-1">
              <select id="status" name="status"  autocomplete="jk-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option value="Belum Menikah" {{old('status',$data->status) == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                <option value="Menikah" {{ old('status',$data->status) == 'Menikah' ? 'selected' : '' }} >Menikah</option>
                <option value="Janda" {{old('status',$data->status) == 'Janda' ? 'selected' : '' }} >Janda</option>
                <option value="Duda" {{ old('status',$data->status) == 'Duda' ? 'selected' : '' }} >Duda</option>
              </select>
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="agama" class="block text-sm font-medium leading-6 text-gray-900">Agama</label>
            <div class="mt-1">
              <select id="agama" name="agama"  autocomplete="jk-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600sm:text-sm sm:leading-6">
                <option value="Islam" {{ old('agama',$data->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                <option value="Katolik" {{ old('agama',$data->agama) == 'Katolik' ? 'selected' : '' }} >Katolik</option>
                <option value="Kristen" {{ old('agama',$data->agama) == 'Kristen' ? 'selected' : '' }} >Kristen</option>
                <option value="Hindu" {{ old('agama',$data->agama) == 'Hindu' ? 'selected' : '' }} >Hindu</option>
                <option value="Buddha" {{ old('agama',$data->agama) == 'Buddha' ? 'selected' : '' }} >Buddha</option>
                <option value="Konghucu" {{ old('agama',$data->agama) == 'Konghucu' ? 'selected' : '' }} >Konghucu</option>
                <option value=">Lainnya" {{ old('agama',$data->agama) == '>Lainnya' ? 'selected' : '' }} >Lainnya</option>
              </select>
            </div>
          </div>
          


          <div class="sm:col-span-3">
            <label for="hobi" class="block text-sm font-medium leading-6 text-gray-900">Hobi</label>
            <div class="mt-1">
              <input type="text" name="hobi" id="hobi" value="{{ $data->hobi}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="col-span-6 pt-4">
            <p class="text-lg font-bold">Alamat </p>
          </div>
      
          <div class="sm:col-span-3">
            <label for="jalan" class="block text-sm font-medium leading-6 text-gray-900">Jalan </label>
            <div class="mt-1">
              <input type="text" name="jalan" id="jalan" value="{{$data->jalan}}"  autocomplete="given-name" rows="2" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></input>
            </div>
          </div>
          <div class="sm:col-span-3">
            <label for="desa" class="block text-sm font-medium leading-6 text-gray-900">Desa/Kelurahan</label>
            <div class="mt-1">
              <input type="text" name="desa" id="desa" value="{{$data->desa}}"  autocomplete="given-name" rows="2" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></input>
            </div>
          </div>
          <div class="sm:col-span-3">
            <label for="kecamatan" class="block text-sm font-medium leading-6 text-gray-900">Kecamatan</label>
            <div class="mt-1">
              <input type="text" name="kecamatan" id="kecamatan" value="{{$data->kecamatan}}"  autocomplete="given-name" rows="2" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></input>
            </div>
          </div>
           <div class="sm:col-span-3">
            <label for="kabupaten" class="block text-sm font-medium leading-6 text-gray-900">Kabupaten/Kota</label>
            <div class="mt-1">
              <input type="text" name="kabupaten" id="kabupaten" value="{{$data->kabupaten}}"  autocomplete="given-name" rows="2" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></input>
            </div>
          </div>
          <div class="sm:col-span-3">
            <label for="provinsi" class="block text-sm font-medium leading-6 text-gray-900">Provinsi</label>
            <div class="mt-1">
              <input type="text" name="provinsi" id="provinsi" value="{{$data->provinsi}}"  autocomplete="given-name" rows="2" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></input>
            </div>
          </div>
          <div class="sm:col-span-6 pt-3"></div>

          <div class="sm:col-span-3">
            <label for="pangkat" class="block text-sm font-medium leading-6 text-gray-900">Pangkat dan golongan ruang</label>
            <div class="mt-1">
              <input type="text" name="pangkat" id="pangkat" value="{{ $data->pangkat}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="status_pegawai" class="block text-sm font-medium leading-6 text-gray-900">Status Pegawai</label>
            <div class="mt-1">
              <select id="status_pegawai" name="status_pegawai"  autocomplete="jk-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option value="PNS" {{ old('status_pegawai',$data->status_pegawai) == 'PNS' ? 'selected' : '' }} >PNS</option>
                <option value="POLRI" {{  old('status_pegawai',$data->status_pegawai) == 'POLRI' ? 'selected' : '' }} >POLRI</option>
                <option value="PPNPN" {{  old('status_pegawai',$data->status_pegawai) == 'PPNPN' ? 'selected' : '' }} >PPNPN</option>
                <option value="P3K" {{  old('status_pegawai',$data->status_pegawai) == 'P3K' ? 'selected' : '' }}>P3K</option>
              </select>
            </div>
          </div>
         
          <div class="sm:col-span-3">
            <label for="jabatan" class="block text-sm font-medium leading-6 text-gray-900">Jabatan</label>
            <div class="mt-1">
              <input type="text" name="jabatan" id="jabatan" value="{{ $data->jabatan}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="masa_kerja" class="block text-sm font-medium leading-6 text-gray-900">Masa Kerja</label>
            <div class="mt-1">
              <input type="text" name="masa_kerja" id="masa_kerja" value="{{ $data->masa_kerja}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="no_karpeg" class="block text-sm font-medium leading-6 text-gray-900">No. Karpeg</label>
            <div class="mt-2">
              <input type="number" name="no_karpeg" id="no_karpeg" value="{{ $data->no_karpeg}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="no_rek" class="block text-sm font-medium leading-6 text-gray-900">No. Rekening</label>
            <div class="mt-1">
              <input type="number" name="no_rek" id="no_rek" value="{{ $data->no_rek}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="bpjs" class="block text-sm font-medium leading-6 text-gray-900">No. BPJS</label>
            <div class="mt-1">
              <input type="number" name="bpjs" id="bpjs" value="{{ $data->bpjs}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="npwp" class="block text-sm font-medium leading-6 text-gray-900">NPWP</label>
            <div class="mt-1">
              <input type="number" name="npwp" id="npwp" value="{{ $data->npwp}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="col-span-6 pt-4">
            <p class="text-lg font-bold">Keterangan </p>
          </div>
          <div class="sm:col-span-3">
            <label for="tinggi_badan" class="block text-sm font-medium leading-6 text-gray-900">Tinggi Badan(cm)</label>
            <div class="mt-1">
              <input type="number" name="tinggi_badan" id="tinggi_badan" value="{{ $data->tinggi_badan}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="berat_badan" class="block text-sm font-medium leading-6 text-gray-900">Berat Badan(kg)</label>
            <div class="mt-1">
              <input type="number" name="berat_badan" id="berat_badan" value="{{ $data->berat_badan}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="rambut" class="block text-sm font-medium leading-6 text-gray-900">Rambut</label>
            <div class="mt-1">
              <input type="text" name="rambut" id="rambut" value="{{ $data->rambut}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="bentuk_muka" class="block text-sm font-medium leading-6 text-gray-900">Bentuk Muka</label>
            <div class="mt-1">
              <input type="text" name="bentuk_muka" id="bentuk_muka" value="{{$data->bentuk_muka}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="warna_kulit" class="block text-sm font-medium leading-6 text-gray-900">Warna kulit</label>
            <div class="mt-1">
              <input type="text" name="warna_kulit" id="warna_kulit" value="{{ $data->warna_kulit}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="ciri_khas" class="block text-sm font-medium leading-6 text-gray-900">Ciri-ciri Khas</label>
            <div class="mt-1">
              <input type="text" name="ciri_khas" id="ciri_khas" value="{{ $data->ciri_khas}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="cacat" class="block text-sm font-medium leading-6 text-gray-900">Cacat</label>
            <div class="mt-1">
              <input type="text" name="cacat" id="cacat" value="{{ $data->cacat}}"  autocomplete="given-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="sm:col-span-3">
            <label for="gol_darah" class="block text-sm font-medium leading-6 text-gray-900">Golongan Darah</label>
            <div class="mt-1 mb-5">
              <select id="gol_darah" name="gol_darah" autocomplete="jk-name" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <option value="A" {{ old('gol_darah',$data->gol_darah) == 'A' ? 'selected' : '' }} >A</option>
                <option value="B" {{ old('gol_darah',$data->gol_darah) == 'B' ? 'selected' : '' }} >B</option>
                <option value="AB" {{ old('gol_darah',$data->gol_darah) == 'AB' ? 'selected' : '' }} >AB</option>
                <option value="O" {{ old('gol_darah',$data->gol_darah) == 'O' ? 'selected' : '' }} >O</option>
              </select>
            </div>
          </div>
          
        </div>
      </div>

    </form>
</div>



@endsection