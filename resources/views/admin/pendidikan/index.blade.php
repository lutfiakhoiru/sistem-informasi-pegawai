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


<div class=" pb-2">
    <div class=" ">
        <p class="text-2xl font-bold leading-7 text-gray-900  pt-1 pb-3 text-center">Riwayat Pendidikan</p>
    </div>
    <p class="font-bold">1. Pendidikan di Dalam dan Luar Negeri</p>
    <div class="pb-1 flex justify-end">
        <a href="{{ route('admin.pendidikan.create', $NIP) }}"  class="btn btn-primary d-flex align-items-center px"> <i class="fa-solid fa-plus"></i></a>
    </div>
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
                    <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;" > </th>
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
                        <td style="border: 1px solid #000; ">
                            <a href="{{ route('admin.pendidikan.edit', $item->id_pendidikan) }}" class="btn btn-warning btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                </svg></a>
                            <form onsubmit="return confirm('Yakin menghapus data?')" class="d-inline" action="{{ route('admin.pendidikan.destroy', $item->id_pendidikan) }}" method="POST" >
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
                </tr>
            @endforelse
                
            </tbody>
        </table>
    </div>
</div>

<div class=" pt-3 pb-3">
    <p class="font-bold">2. Kursus/Latihan di Dalam dan Luar Negeri</p>
    <div class="pb-1 flex justify-end">
        <a href="{{ route('admin.kursus.create', $NIP) }}" class="btn btn-primary d-flex align-items-center px"> <i class="fa-solid fa-plus"></i></a>
    </div>
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
                    <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle;  background-color:#B6B6B4;"></th>
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
                        <td style="border: 1px solid #000; ">
                            <a href="{{ route('admin.kursus.edit',  $kurs->id_kursus) }}"  class="btn btn-warning btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                </svg></a>
                            <form onsubmit="return confirm('Yakin menghapus data?')" class="d-inline" action="{{ route('admin.kursus.destroy',  $kurs->id_kursus) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
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
                </tr>
            @endforelse
               
            </tbody>
        </table>
    </div>
</div>

@endsection