@extends('admin.layout')
@section('konten')
    
<div>
    <form action="">
        <h4 class="text-xl font-bold leading-7 text-gray-900 py-3 text-center">Profil Pegawai</h4>
        <p class="text-lg font-bold leading-7 text-gray-900  ">A. Biodata</p>
        <div class="mx-5 ">
        <div class="row ">
            @if($data->foto)
            <div class="flex justify-center mb-1">
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

        </div>
                
    </form>
</div>

<div>
    <div class=" pb-1">
        <div class="pt-5 ">
            <p class="text-lg font-bold leading-7 text-gray-900  ">B. Riwayat Pendidikan</p>
        </div>
        <p class="font-bold">1. Pendidikan di Dalam dan Luar Negeri</p>
        <div class="table-responsive">
            <table class="table ">
                <thead>
                    <tr>
                        <th class=" text-center" style="width:5%; border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">No</th>
                        <th class="col-md-1 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">Jenjang</th>
                        <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">Nama Institusi</th>
                        <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">Jurusan</th>
                        <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">No. Ijazah</th>
                        <th class="col-md-1 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">Tempat</th>
                        <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">Nama Dekan/Kepala Sekolah</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=$pendidikan->firstItem()?>
                @forelse ($pendidikan as $item)
                        <tr>
                            <td class="text-center"  style="border: 1px solid #000;">{{ $i }}</td>
                            <td style="border: 1px solid #000; ">{{ $item->jenjang }}</td>
                            <td style="border: 1px solid #000;">{{ $item->nama_pendidikan }}</td>
                            <td style="border: 1px solid #000; ">{{ $item->jurusan }}</td>
                            <td style="border: 1px solid #000;">{{ $item->sttb}}</td>
                            <td style="border: 1px solid #000;">{{ $item->tempat }}</td>
                            <td style="border: 1px solid #000; ">{{ $item->nama_dekan}}</td>
                        </tr>
                    <?php $i++?>
                @empty
                    <tr style="height:30px">
                        <td class="text-center" style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>

    <div class=" pt-1 pb-3">
        <p class="font-bold">2. Kursus/Latihan di Dalam dan Luar Negeri</p>
        <div class="table-responsive">
            <table class="table ">
                <thead>
                    <tr>
                        <th class="text-center" style="width:5%; border: 1px solid #000; vertical-align: middle;  background-color:#B6B6B4;">No</th>
                        <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle;  background-color:#B6B6B4;">Nama Kursus</th>
                        <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle;  background-color:#B6B6B4;">Lamanya</th>
                        <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle;  background-color:#B6B6B4;">No. Ijazah</th>
                        <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle;  background-color:#B6B6B4;">Tempat</th>
                        <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle;  background-color:#B6B6B4;">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=$kursus->firstItem()?>
                @forelse ($kursus as $kurs)
                        <tr>
                            <td class="text-center" style="border: 1px solid #000; ">{{ $i }}</td>
                            <td style="border: 1px solid #000;">{{  $kurs->nama }}</td>
                            <td style="border: 1px solid #000;">{{  $kurs->lama }}</td>
                            <td style="border: 1px solid #000;">{{  $kurs->ijazah }}</td>
                            <td style="border: 1px solid #000; ">{{  $kurs->tempat }}</td>
                            <td style="border: 1px solid #000; ">{{  $kurs->keterangan}}</td>
                        </tr>
                    <?php $i++?>
                @empty
                    <tr style="height:30px">
                        <td class="text-center" style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                    </tr>
                @endforelse
                
                </tbody>
            </table>
        </div>
    </div>
</div>

<div>
    <div class="pb-2">
        <div class="pt-3 ">
            <p class="text-lg font-bold leading-7 text-gray-900">C. Riwayat Pekerjaan</p>
        </div>
        <p class="font-bold">1.Riwayat Kepangkatan Golongan Ruang Penggajian</p>
        <div class="table-responsive">
            <table border="1" cellpadding="5" cellspacing="0" style="width: 100%; " class="table "  >
                <thead>
                    <tr>
                        <th rowspan="2" style="text-align: center; vertical-align: middle; border: 1px solid #000;  background-color:#B6B6B4;">No.</th>
                        <th class="col-md-2" rowspan="2" style="text-align: center;vertical-align: middle; border: 1px solid #000;  background-color:#B6B6B4;">Pangkat</th>
                        <th class="col-md-1" rowspan="2" style="text-align: center;vertical-align: middle; border: 1px solid #000;  background-color:#B6B6B4;">Gol. Ruang Penggajian</th>
                        <th rowspan="2" style="text-align: center; vertical-align: middle; border: 1px solid #000; background-color:#B6B6B4;">Terhitung Mulai</th>
                        <th rowspan="2" style="text-align: center; vertical-align: middle; border: 1px solid #000; background-color:#B6B6B4;" >Gaji Pokok</th>
                        <th colspan="3" style="text-align: center; border: 1px solid #000; background-color:#B6B6B4;" >Surat Keputusan</th>
                        <th rowspan="2" style="text-align: center; vertical-align: middle; border: 1px solid #000; background-color:#B6B6B4;">Keterangan</th>
                    </tr>
                    <tr>
                        <th style="border: 1px solid #000;text-align: center; background-color:#B6B6B4;" >Pejabat</th>
                        <th style="border: 1px solid #000;text-align: center; background-color:#B6B6B4;" >Tanggal</th>
                        <th style="border: 1px solid #000;text-align: center; background-color:#B6B6B4;" >Nomor</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=$pangkat->firstItem()?>
                @forelse ($pangkat as $item)
                        <tr>
                            <td class="text-center" style="border: 1px solid #000">{{ $i }}</td>
                            <td style="border: 1px solid #000">{{ $item->pangkat }}</td>
                            <td style="border: 1px solid #000">{{ $item->gol_ruang_penggajian }}</td>
                            <td style="border: 1px solid #000">{{ $item->terhitung_mulai }}</td>
                            <td style="border: 1px solid #000">{{ $item->gaji }}</td>
                            <td style="border: 1px solid #000">{{ $item->s_pejabat }}</td>
                            <td style="border: 1px solid #000">{{ $item->s_tanggal }}</td>
                            <td style="border: 1px solid #000">{{ $item->s_nomor }}</td>
                            <td style="border: 1px solid #000">{{ $item->s_keterangan }}</td>
                           
                        </tr>
                    <?php $i++?>
                @empty
                    <tr style="height:30px">
                        <td class="text-center" style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                    </tr>
                @endforelse
                
                </tbody>
            </table>
        </div>
    </div>

    <div class=" pt-1 pb-3">
        <p class="font-bold">2.Pengalaman Jabatan/Pekerjaan</p>
        <div class="table-responsive">
            <table border="1" cellpadding="5" cellspacing="0" style="width: 100%; " class="table "  >
                <thead>
                    <tr>
                        <th rowspan="2" style="text-align: center; vertical-align: middle; border: 1px solid #000; background-color:#B6B6B4;">No.</th>
                        <th rowspan="2" style="text-align: center; vertical-align: middle; border: 1px solid #000; background-color:#B6B6B4;">Jabatan/Pekerjaan</th>
                        <th rowspan="2"style="text-align: center; vertical-align: middle; border: 1px solid #000; background-color:#B6B6B4;">Mulai</th>
                        <th rowspan="2" style="text-align: center; vertical-align: middle; border: 1px solid #000; background-color:#B6B6B4;">Selesai</th>
                        <th class="col-md-1" rowspan="2" style="text-align: center; vertical-align: middle; border: 1px solid #000; background-color:#B6B6B4;">Gol. Ruang Penggajian</th>
                        <th rowspan="2" style="text-align: center; vertical-align: middle; border: 1px solid #000; background-color:#B6B6B4;" >Gaji Pokok</th>
                        <th colspan="3"style="text-align: center; vertical-align: middle; border: 1px solid #000; background-color:#B6B6B4;" >Surat Keputusan</th>
                    </tr>
                    <tr>
                        <th style="text-align: center; vertical-align: middle; border: 1px solid #000; background-color:#B6B6B4;" >Pejabat</th>
                        <th style="text-align: center; vertical-align: middle; border: 1px solid #000; background-color:#B6B6B4;" >Tanggal</th>
                        <th style="text-align: center; vertical-align: middle; border: 1px solid #000; background-color:#B6B6B4;">Nomor</th>
                    </tr>
                </thead>
                <tbody> 
                <?php $i=$jabatan->firstItem()?>
                @forelse ($jabatan as $jabat)
                        <tr>
                            <td class="text-center" style="border: 1px solid #000">{{ $i }}</td>
                            <td style="border: 1px solid #000">{{ $jabat->jabatan }}</td>
                            <td style="border: 1px solid #000">{{ $jabat->terhitung_mulai }}</td>
                            <td style="border: 1px solid #000">{{ $jabat->selesai }}</td>
                            <td style="border: 1px solid #000">{{ $jabat->gol_ruang_penggajian }}</td>
                            <td style="border: 1px solid #000">{{ $jabat->gaji }}</td>
                            <td style="border: 1px solid #000">{{ $jabat->s_pejabat }}</td>
                            <td style="border: 1px solid #000">{{ $jabat->s_tanggal }}</td>
                            <td style="border: 1px solid #000">{{ $jabat->s_nomor }}</td>                      
                            
                        </tr>
                    <?php $i++?>
                @empty
                    <tr style="height:30px">
                        <td class="text-center" style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                    </tr>
                @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>

</div>

<div class="pb-2">
    <div class="pt-3 ">
        <p class="text-lg font-bold leading-7 text-gray-900  ">D. Tanda Jasa/Penghargaan</p>
    </div>
  
    <div class="table-responsive">
        <table class="table ">
            <thead>
                <tr>
                    <th class="col-md-1 text-center" style="width:5%; border: 1px solid #000; vertical-align: middle;  background-color:#B6B6B4; ">No. </th>
                    <th class="col-md-4 text-center" style="border: 1px solid #000; vertical-align: middle;  background-color:#B6B6B4;">Nama penghargaan</th>
                    <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle;  background-color:#B6B6B4;">Tahun Perolehan</th>
                    <th class="col-md-3 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4; ">Negara/Instansi yang Memberi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=$penghargaan->firstItem()?>
            @forelse ($penghargaan as $item)
                    <tr>
                        <td class="text-center" style="border: 1px solid #000;">{{ $i }}</td>
                        <td style="border: 1px solid #000;">{{ $item->nama }}</td>
                        <td style="border: 1px solid #000;">{{ $item->tahun }}</td>
                        <td style="border: 1px solid #000;">{{ $item->instansi }}</td>
                    </tr>
                <?php $i++?>
            @empty
            <tr style="height:30px">
                <td class="text-center" style="border: 1px solid #000; "></td>
                <td style="border: 1px solid #000; "></td>
                <td style="border: 1px solid #000; "></td>
                <td style="border: 1px solid #000; "></td>
            @endforelse
                
            </tbody>
        </table>
    </div>
</div>

<div class="pb-2">
    <div class="pt-2 ">
        <p class="text-lg font-bold leading-7 text-gray-900 ">E. Pengalaman Ke Luar Negeri</p>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="col-md-1 text-center" style="width:5%; border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">No.</th>
                    <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">Negara</th>
                    <th class="col-md-3 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4; ">Tujuan Kunjungan</th>
                    <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">Lamanya</th>
                    <th class="col-md-3 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">Yang Membiayai</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=$pengalaman->firstItem()?>
            @forelse ($pengalaman as $item)
                    <tr>
                        <td class="text-center" style="border: 1px solid #000">{{ $i }}</td>
                        <td style="border: 1px solid #000">{{ $item->negara }}</td>
                        <td style="border: 1px solid #000">{{ $item->tujuan }}</td>
                        <td style="border: 1px solid #000">{{ $item->lama }}</td>
                        <td style="border: 1px solid #000">{{ $item->biaya }}</td>
                    </tr>
                <?php $i++?>
            @empty
            <tr style="height:30px">
                <td class="text-center" style="border: 1px solid #000; "></td>
                <td style="border: 1px solid #000; "></td>
                <td style="border: 1px solid #000; "></td>
                <td style="border: 1px solid #000; "></td>
                <td style="border: 1px solid #000; "></td>
            </tr>
            @endforelse
                
            </tbody>
        </table>
    </div>
</div>

<div>
    <div class="">
        <div class=" ">
            <p class="text-lg font-bold leading-7 text-gray-900  ">F. Keterangan Keluarga</p>
        </div>
        <p class="font-bold">1. Istri/Suami</p>
        <div class="table-responsive">
            <table class="table ">
                <thead>
                    <tr>
                        <th class="col-md-1 text-center" style="width:5%; border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">No</th>
                        <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">Nama</th>
                        <th class="col-md-1 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">Tempat lahir</th>
                        <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">Tanggal Lahir</th>
                        <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">Tanggal Nikah</th>
                        <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">Pekerjaan</th>
                        <th class="col-md-1 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=$pasangan->firstItem()?>
                @forelse ($pasangan as $item)
                        <tr>
                            <td class="text-center" style="border: 1px solid #000;">{{ $i }}</td>
                            <td style="border: 1px solid #000;">{{ $item->nama }}</td>
                            <td style="border: 1px solid #000;">{{ $item->tempat_lahir }}</td>
                            <td style="border: 1px solid #000;">{{ $item->tanggal_lahir }}</td>
                            <td style="border: 1px solid #000;">{{ $item->tanggal_nikah}}</td>
                            <td style="border: 1px solid #000;">{{ $item->pekerjaan }}</td>
                            <td style="border: 1px solid #000;">{{ $item->keterangan}}</td>
                        </tr>
                    <?php $i++?>
                @empty
                    <tr style="height:30px">
                        <td class="text-center" style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="">
        <p class="font-bold">2. Anak</p>
        <div class="table-responsive">
            <table class="table ">
                <thead>
                    <tr>
                        <th class="col-md-1 text-center"style="width:5%; border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">No. </th>
                        <th class="col-md-2 text-center"style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">Nama</th>
                        <th class="col-md-1 text-center"style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">Jenis Kelamin</th>
                        <th class="col-md-2 text-center"style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">Tempat lahir</th>
                        <th class="col-md-2 text-center"style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">Tanggal Lahir</th>    
                        <th class="col-md-1 text-center"style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">Pekerjaan</th>
                        <th class="col-md-2 text-center"style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=$anak->firstItem()?>
                @forelse ($anak as $anaks)
                        <tr>
                            <td class="text-center" style="border: 1px solid #000;">{{ $i }}</td>
                            <td style="border: 1px solid #000;">{{  $anaks->nama }}</td>
                            <td style="border: 1px solid #000;">{{  $anaks->jenis_kelamin }}</td>
                            <td style="border: 1px solid #000;">{{  $anaks->tempat_lahir }}</td>
                            <td style="border: 1px solid #000;">{{  $anaks->tanggal_lahir }}</td>
                            <td style="border: 1px solid #000;">{{  $anaks->pekerjaan }}</td>
                            <td style="border: 1px solid #000;">{{  $anaks->keterangan}}</td>
                        </tr>
                    <?php $i++?>
                @empty
                    <tr style="height:30px">
                        <td class="text-center" style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class=" ">
        <p class="font-bold">3. Orang Tua</p>

        <div class="table-responsive">
            <table class="table ">
                <thead>
                    <tr>
                        <th class=" text-center" style="width:5%; border: 1px solid #000; background-color:#B6B6B4;">No</th>
                        <th class="col-md-2 text-center" style="border: 1px solid #000; background-color:#B6B6B4;">Nama</th>
                        <th class="col-md-2 text-center" style="border: 1px solid #000; background-color:#B6B6B4;">Status</th>  
                        <th class="col-md-2 text-center" style="border: 1px solid #000; background-color:#B6B6B4;">Tanggal Lahir</th>    
                        <th class="col-md-2 text-center" style="border: 1px solid #000; background-color:#B6B6B4;">Pekerjaan</th>
                        <th class="col-md-2 text-center" style="border: 1px solid #000; background-color:#B6B6B4;">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=$orangtua->firstItem()?>
                @forelse ($orangtua as $orang)
                        <tr>
                            <td class="text-center" style="border: 1px solid #000;">{{ $i }}</td>
                            <td style="border: 1px solid #000;">{{  $orang->nama }}</td>
                            <td style="border: 1px solid #000;">{{  $orang->status }}</td>
                            <td style="border: 1px solid #000;">{{  $orang->tanggal_lahir }}</td>
                            <td style="border: 1px solid #000;">{{  $orang->pekerjaan }}</td>
                            <td style="border: 1px solid #000;">{{  $orang->keterangan}}</td>
                        </tr>
                    <?php $i++?>
                @empty
                    <tr style="height:30px">
                        <td class="text-center" style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                    </tr>
                @endforelse
                
                </tbody>
            </table>
        </div>
    </div>

    <div class=" ">
        <p class="font-bold">4. Saudara</p>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center" style="width:5%; border: 1px solid #000;  background-color:#B6B6B4;">No</th>
                        <th class="col-md-2 text-center" style="border: 1px solid #000;  background-color:#B6B6B4;">Nama</th>
                        <th class="col-md-2 text-center" style="border: 1px solid #000;  background-color:#B6B6B4;">Jenis Kelamin</th>  
                        <th class="col-md-2 text-center" style="border: 1px solid #000;  background-color:#B6B6B4;">Tanggal Lahir</th>    
                        <th class="col-md-2 text-center" style="border: 1px solid #000;  background-color:#B6B6B4;">Pekerjaan</th>
                        <th class="col-md-2 text-center" style="border: 1px solid #000;  background-color:#B6B6B4;">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=$saudara->firstItem()?>
                @forelse ($saudara as $saudar)
                        <tr>
                            <td class="text-center" style="border: 1px solid #000;">{{ $i }}</td>
                            <td style="border: 1px solid #000;">{{ $saudar->nama }}</td>
                            <td style="border: 1px solid #000;">{{ $saudar->jenis_kelamin }}</td>
                            <td style="border: 1px solid #000;">{{  $saudar->tanggal_lahir }}</td>
                            <td style="border: 1px solid #000;">{{  $saudar->pekerjaan }}</td>
                            <td style="border: 1px solid #000;">{{  $saudar->keterangan}}</td>
                        </tr>
                    <?php $i++?>
                @empty
                    <tr style="height:30px">
                        <td class="text-center" style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                        <td style="border: 1px solid #000; "></td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class=" pb-2">
    <div class="pt-2">
        <p class="text-lg font-bold leading-7 text-gray-900">G. Riwayat Organisasi</p>
    </div>
    <div class="table-responsive">
        <table class="table ">
            <thead>
                <tr>
                    <th class=" text-center" style=" width:5%; border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4; ">No. </th>
                    <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4; ">Nama Organisasi</th>
                    <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4; ">Kedudukan</th>
                    <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle;  background-color:#B6B6B4;">Tahun</th>
                    <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">Tempat</th>
                    <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">Nama Pimpinan</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=$organisasi->firstItem()?>
            @forelse ($organisasi as $item)
                    <tr>
                        <td class="text-center" style="border: 1px solid #000;">{{ $i }}</td>
                        <td style="border: 1px solid #000;">{{ $item->nama_organisasi }}</td>
                        <td style="border: 1px solid #000;">{{ $item->kedudukan }}</td>
                        <td style="border: 1px solid #000;">{{ $item->tahun }}</td>
                        <td style="border: 1px solid #000;">{{ $item->tempat }}</td>
                        <td style="border: 1px solid #000;">{{ $item->nama_pimpinan }}</td>
                    </tr>
                <?php $i++?>
            @empty
                <tr style="height:30px">
                    <td class="text-center" style="border: 1px solid #000; "></td>
                    <td style="border: 1px solid #000; "></td>
                    <td style="border: 1px solid #000; "></td>
                    <td style="border: 1px solid #000; "></td>
                    <td style="border: 1px solid #000; "></td>
                    <td style="border: 1px solid #000; "></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection