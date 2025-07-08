@extends('admin.layout')
@section('konten')

<div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center  pb-1 mb-3 mt-2 border-bottom">
  <p class="text-3xl font-bold leading-7 text-gray-900  text-center">Dashboard Sistem Informasi Pegawai</p>
</div>
<div class="row">
        <!-- Card Component -->
    @php
        $cards = [
            ['title' => 'Total Pegawai', 'value' => $totalPegawai, 'icon' => 'fas fa-users', 'bgColor' => 'background-color:#4863A0'],
            ['title' => 'Laki-laki', 'value' => $totalLakiLaki, 'icon' => 'fas fa-male', 'bgColor' => 'background-color:#98AFC7'],
            ['title' => 'Perempuan', 'value' => $totalPerempuan, 'icon' => 'fas fa-female', 'bgColor' => 'background-color:#778899']
        ];
    @endphp

    @foreach ($cards as $card)
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm  text-white" style="{{ $card['bgColor'] }}">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <a href="{{ route('admin.dataPegawai') }}" class="card-title no-underline text-lg">{{ $card['title'] }} : </a>
                        <p class="card-text display-6">{{ $card['value'] }}</p>
                    </div>
                    <div>
                        <i class="{{ $card['icon'] }} fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

   
</div>

@endsection