@extends('admin.layout')
@section('konten')

<div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center  pb-1 mb-3 border-bottom">
    <p class="text-3xl font-bold leading-7 text-gray-900  text-center">Data Pegawai</p>
</div>
<div class="row justify-content-end pt-2 pb-3">
  <div class="col-md-4">
    <form class="d-flex" action="{{ route('admin.dataPegawai') }}" method="get">
        <input class="form-control me-1" type="search" name="keyword" value="{{ Request::get('keyword') }}" placeholder="Search" aria-label="Search">
        <button class="btn btn-secondary " type="submit">
          <i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
  </div>
</div>

<table class="table  ">
    <thead>
        <tr >
          <th class=" text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4; width:5%">No.</th>
          <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle;background-color:#B6B6B4;">FOTO</th>
          <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">NIP</th>
          <th class="col-md-3 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">NAMA LENGKAP</th>
          <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">JENIS KELAMIN</th>
          <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;">JABATAN</th>
          <th class="col-md-2 text-center" style="border: 1px solid #000; vertical-align: middle; background-color:#B6B6B4;"></th>
        </tr>
      </thead>
      <tbody>
        <?php $i=$data->firstItem()?>
        @forelse ($data as $item)   
           <tr>
               <td class="text-center" style="border: 1px solid #000; ">{{ $i }}</td>
               <td style="border: 1px solid #000; vertical-align: middle; text-align: center;">
                  @if ($item->foto)
                      <img style="max-width:100px; max-height:100px; display: block; margin: auto;" src="{{ url('foto').'/'.$item->foto}}"/>
                  @endif
               </td>
               <td style="border: 1px solid #000; ">{{ $item->NIP }}</td>
               <td style="border: 1px solid #000; ">{{ $item->nama }}</td>
               <td style="border: 1px solid #000; ">{{ $item->jenis_kelamin }}</td>
               <td style="border: 1px solid #000;">{{ $item->jabatan }}</td>
               <td  style="border: 1px solid #000; ">
                    <a href='{{ route('admin.biodata.index',  $item->NIP) }}' class="btn btn-warning btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg></a>
                   
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

@endsection