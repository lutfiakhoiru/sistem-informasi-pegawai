@extends('admin.layout')
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
  <a class="rounded font-bold tab-btn {{ request()->is('admin/biodata*') ?'bg-gray-500 text-white' : 'bg-gray-300' }}" href="{{ route('admin.biodata.index', $data->NIP) }}" role="button">Biodata</a>
  <a class="rounded font-bold tab-btn {{ request()->is('admin/pendidikan*') ?'bg-gray-500 text-white' : 'bg-gray-300' }}" href="{{ route('admin.pendidikan.index', $data->NIP) }}" role="button">
    <span style="display: block;">Riwayat</span>
    <span style="display: block;">Pendidikan</span>
  </a>
  <a class="rounded font-bold tab-btn {{ request()->is('admin/kepangkatan*') ? 'bg-gray-500 text-white' : 'bg-gray-300' }}" href="{{ route('admin.kepangkatan.index', $data->NIP) }}"  role="button">
    <span style="display: block;">Riwayat</span>
    <span style="display: block;">Pekerjaan</span>
  </a>
  <a class="rounded font-bold tab-btn {{ request()->is('admin/penghargaan*') ?'bg-gray-500 text-white' : 'bg-gray-300' }}" href="{{ route('admin.penghargaan.index', $data->NIP) }}"  role="button">Penghargaan</a>
  <a class="rounded font-bold tab-btn {{ request()->is('admin/pengalaman*') ? 'bg-gray-500 text-white' : 'bg-gray-300' }}" href="{{ route('admin.pengalaman.index', $data->NIP) }}"  role="button">
    <span style="display: block;">Pengalaman</span>
    <span style="display: block;">Luar Negeri</span>
  </a>
  <a class="rounded font-bold tab-btn {{ request()->is('admin/keluarga*') ? 'bg-gray-500 text-white' : 'bg-gray-300' }}" href="{{ route('admin.keluarga.index', $data->NIP) }}"  role="button">Keluarga</a>
  <a class="rounded font-bold tab-btn {{ request()->is('admin/organisasi*') ? 'bg-gray-500 text-white' : 'bg-gray-300' }}" href="{{ route('admin.organisasi.index', $data->NIP) }}"  role="button">
    <span style="display: block;">Riwayat</span>
    <span style="display: block;">Organisasi</span> 
  </a>
</div>


<div class="pb-2">
    <div class="">
        <p class="text-2xl font-bold leading-7 text-gray-900  pt-1 pb-3 text-center">Riwayat Pekerjaan</p>
    </div>
    <p class="font-bold text-gray-900">1.Riwayat Kepangkatan Golongan Ruang Penggajian</p>
    <div class=" flex justify-end pb-1">
        <a href="{{ route('admin.kepangkatan.create', $NIP) }}"  class="btn btn-primary d-flex align-items-center px"> <i class="fa-solid fa-plus"></i></a>
    </div>
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
                    <th rowspan="2" style="text-align: center; vertical-align: middle; border: 1px solid #000; background-color:#B6B6B4;"></th>
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
                        <td style="border: 1px solid #000">
                            <a href="{{ route('admin.kepangkatan.edit', $item->id_kepangkatan) }}" class="btn btn-warning btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                </svg></a>
                            <form onsubmit="return confirm('Yakin menghapus data?')" class="d-inline" action="{{ route('admin.kepangkatan.destroy', $item->id_kepangkatan) }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button type="submit"class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                    </svg></button>
                            </form>
                        </td>
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
                    <td style="border: 1px solid #000; "></td>
                </tr>
            @endforelse
               
            </tbody>
        </table>
    </div>
</div>

<div class=" pt-3 pb-3">
    <p class="font-bold  text-gray-900">2.Pengalaman Jabatan/Pekerjaan</p>
    <div class=" flex justify-end pb-1">
        <a href="{{ route('admin.jabatan.create', $NIP) }}"  class="btn btn-primary d-flex align-items-center px"> <i class="fa-solid fa-plus"></i></a>
    </div>
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
                    <th rowspan="2" style="text-align: center; vertical-align: middle; border: 1px solid #000; background-color:#B6B6B4;"></th>
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
                        <td style="border: 1px solid #000">
                            <a href="{{ route('admin.jabatan.edit', $jabat->id_pekerjaan) }}" class="btn btn-warning btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                </svg></a>
                            <form onsubmit="return confirm('Yakin menghapus data?')" class="d-inline" action="{{ route('admin.jabatan.destroy', $jabat->id_pekerjaan) }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button type="submit"class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                    </svg></button>
                            </form>
                        </td>
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
                    <td style="border: 1px solid #000; "></td>
                </tr>
            @endforelse
                
            </tbody>
        </table>
    </div>
</div>


@endsection