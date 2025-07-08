@extends('pegawai.layout')
@section('konten')

<div class=" pb-4" style="display: flex; overflow-x: auto; white-space: nowrap; gap: 8px;">
    <style>
    .tab-btn {
      min-width: 120px;
      height: 50px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      white-space: normal;
    }
  </style>
  <a class="rounded font-bold tab-btn {{ request()->is('pegawai/biodata*') ?'bg-gray-500 text-white' : 'bg-gray-300' }}" href="{{ route('pegawai.biodata.index') }}" role="button">Biodata</a>
  <a class="rounded font-bold tab-btn {{ request()->is('pegawai/pendidikan*') ?'bg-gray-500 text-white' : 'bg-gray-300' }}" href="{{ route('pegawai.pendidikan.index') }}" role="button">
    <span style="display: block;">Riwayat</span>
    <span style="display: block;">Pendidikan</span>
  </a>
  <a class="rounded font-bold tab-btn {{ request()->is('pegawai/kepangkatan*') ? 'bg-gray-500 text-white' : 'bg-gray-300' }}" href="{{ route('pegawai.kepangkatan.index') }}"  role="button">
    <span style="display: block;">Riwayat</span>
    <span style="display: block;">Pekerjaan</span>
  </a>
  <a class="rounded font-bold tab-btn {{ request()->is('pegawai/penghargaan*') ?'bg-gray-500 text-white' : 'bg-gray-300' }}" href="{{ route('pegawai.penghargaan.index') }}"  role="button">Penghargaan</a>
  <a class="rounded font-bold tab-btn {{ request()->is('pegawai/pengalaman*') ? 'bg-gray-500 text-white' : 'bg-gray-300' }}" href="{{ route('pegawai.pengalaman.index') }}"  role="button">
    <span style="display: block;">Pengalaman</span>
    <span style="display: block;">Luar Negeri</span>
  </a>
  <a class="rounded font-bold tab-btn {{ request()->is('pegawai/keluarga*') ? 'bg-gray-500 text-white' : 'bg-gray-300' }}" href="{{ route('pegawai.keluarga.index') }}"  role="button">Keluarga</a>
  <a class="rounded font-bold tab-btn {{ request()->is('pegawai/organisasi*') ? 'bg-gray-500 text-white' : 'bg-gray-300' }}" href="{{ route('pegawai.organisasi.index') }}"  role="button">
    <span style="display: block;">Riwayat</span>
    <span style="display: block;">Organisasi</span> 
  </a>
</div>
<div>
    <form action="">
        <p class="text-2xl font-bold leading-7 text-gray-900 pb-2 text-center">Profil Pegawai</p>

        <div class=" ">
            <div class="row ">
                @if($data->foto)
                <div class="flex justify-center mb-3">
                    <img style="border: 1px solid #000;width: 150px; height: 200px; object-fit: cover;" src="{{ url('foto').'/'.$data->foto }}" />
                </div>
                @else
                <span class="badge badge-danger"> belum ada foto</span>
                @endif
            </div>
            <div class="row mt-3">
                <label for="NIP" class="col-sm-2 ">NIP</label>
                <div class="col-sm-5">
                    <p> : {{$data->NIP}}</p>
                </div>
            </div>
            <div class="row ">
                <label for="nik" class="col-sm-2">NIK</label>
                <div class="col-sm-10">
                <p>: {{ $data->NIK }}</p>
                </div>
            </div>
            <div class="row" >
                <label for="nama" class="col-sm-2">Nama Lengkap</label>
                <div class="col-sm-10">
                    <p>: {{ $data->nama }}</p>
                </div>
            </div>
            <div class="row ">
                <label for="jenis_kelamin" class="col-sm-2 ">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <p >: {{ $data->jenis_kelamin }}</p>
                </div>
            </div>
            <div class="row">
                <label for="tempat_lahir" class="col-sm-2 ">Tempat Lahir</label>
                <div class="col-sm-10">
                    <p>: {{ $data->tempat_lahir }}</p>
                </div>
            </div>
            <div class="row">
                <label for="tanggal_lahir" class="col-sm-2 ">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <p>: {{ $data->tanggal_lahir }}</p>
                </div>
            </div>
            <div class="row">
                <label for="status" class="col-sm-2 ">Status Pernikahan</label>
                <div class="col-sm-10">
                <p>: {{ $data->status }}</p>
                </div>
            </div>
            <div class="row">
                <label for="agama" class="col-sm-2 ">Status Agama</label>
                <div class="col-sm-10">
                <p>: {{ $data->agama }}</p>
                </div>
            </div>
            <div class="row">
                <label for="hobi" class="col-sm-2 ">Hobi</label>
                <div class="col-sm-10">
                <p>: {{ $data->hobi }}</p>
                </div>
            </div>
            <h6 class="pt-3 ">Alamat</h6>
            <div class="row">
                <label for="jalan" class="col-sm-2">Jalan</label>
                <div class="col-sm-10">
                <p >: {{ $data->jalan }}</p>
                </div>
            </div>
            <div class="row">
                <label for="desa" class="col-sm-2 ">Desa / Kelurahan</label>
                <div class="col-sm-10">
                    <p>: {{ $data->desa }}</p>
                </div>
            </div>
            <div class="row">
                <label for="kecamatan" class="col-sm-2 ">Kecamatan</label>
                <div class="col-sm-10">
                <p>: {{ $data->kecamatan }}</p>
                </div>
            </div>
            <div class="row">
                <label for="kabupaten" class="col-sm-2">Kabupaten / Kota</label>
                <div class="col-sm-10">
                <p>: {{ $data->kabupaten }}</p>
                </div>
            </div>
            <div class="row">
                <label for="provinsi" class="col-sm-2">Provinsi</label>
                <div class="col-sm-10">
                <p>: {{ $data->provinsi }}</p>
                </div>
            </div>
            <div>
                <p></p>
            </div>
            <div class="row pb-2">
                <label for="pangkat" class="col-sm-2">Pangkat dan Golongan ruang</label>
                <div class="col-sm-10">
                <p>: {{ $data->pangkat }}</p>
                </div>
            </div>
            <div class="row">
                <label for="status_pegawai" class="col-sm-2">Status Pegawai</label>
                <div class="col-sm-10">
                <p>: {{ $data->status_pegawai }}</p>
                </div>
            </div>
            <div class="row">
                <label for="jabatan" class="col-sm-2 ">Jabatan</label>
                <div class="col-sm-10">
                <p>: {{ $data->jabatan }}</p>
                </div>
            </div>
            <div class="row">
                <label for="masa_kerja" class="col-sm-2 ">Masa kerja</label>
                <div class="col-sm-10">
                <p>: {{ $data->masa_kerja }}</p>
                </div>
            </div>
            <div class="row">
                <label for="no_karpeg" class="col-sm-2 ">No. Karpeg</label>
                <div class="col-sm-10">
                <p>: {{ $data->no_karpeg }}</p>
                </div>
            </div>
            <div class="row">
                <label for="no_rek" class="col-sm-2 ">No. Rekening</label>
                <div class="col-sm-10">
                <p>: {{ $data->no_rek }}</p>
                </div>
            </div>
            <div class="row">
                <label for="bpjs" class="col-sm-2 ">No. BPJS</label>
                <div class="col-sm-10">
                <p>: {{ $data->bpjs }}</p>
                </div>
            </div>
            <div class="row">
                <label for="npwp" class="col-sm-2 ">NPWP</label>
                <div class="col-sm-10">
                <p>: {{ $data->npwp }}</p>
                </div>
            </div>
            <h6 class="pt-3">Keterangan</h6>
            <div class="row">
                <label for="tinggi_badan" class="col-sm-2 ">Tinggi Badan (cm)</label>
                <div class="col-sm-10">
                <p>: {{ $data->tinggi_badan }}</p>
                </div>
            </div>
            <div class="row">
                <label for="berat_badan" class="col-sm-2 ">Berat Badan (kg)</label>
                <div class="col-sm-10">
                <p>: {{ $data->berat_badan }}</p>
                </div>
            </div>
            <div class="row">
                <label for="rambut" class="col-sm-2 ">Rambut</label>
                <div class="col-sm-10">
                <p>: {{ $data->rambut }}</p>
                </div>
            </div>
            <div class="row">
                <label for="bentuk_muka" class="col-sm-2 ">Bentuk Muka</label>
                <div class="col-sm-10">
                <p>: {{ $data->bentuk_muka }}</p>
                </div>
            </div>
            <div class="row">
                <label for="warna_kulit" class="col-sm-2 ">Warna Kulit</label>
                <div class="col-sm-10">
                <p>: {{ $data->warna_kulit }}</p>
                </div>
            </div>
            <div class="row">
                <label for="ciri_khas" class="col-sm-2 ">Ciri-ciri khas</label>
                <div class="col-sm-10">
                <p>: {{ $data->ciri_khas }}</p>
                </div>
            </div>
            <div class="row">
                <label for="cacat" class="col-sm-2 ">Cacat</label>
                <div class="col-sm-10">
                <p>: {{ $data->cacat }}</p>
                </div>
            </div>
            <div class="row">
                <label for="gol_darah" class="col-sm-2 ">Golongan Darah</label>
                <div class="col-sm-10">
                <p>: {{ $data->gol_darah }}</p>
                </div>
            </div>

            <div class="flex justify-center mt-3 pb-3">
                <a href="{{ route('pegawai.biodata.edit') }}" type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded no-underline">Edit</a>
            </div>


        </div>       
    </form>
</div>



@endsection