@extends('admin.layout')
@section('konten')


    <div class=" mx-auto p-2">
        <p class="text-xl font-bold leading-7 text-gray-900  pt-1 pb-3 text-center ">Tambah Akun Pegawai</p>
        <form action="{{ route('admin.akun-pegawai.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-1 gap-6">
              
                <div class="">
                    <label for="nip" class="block text-sm font-medium leading-6 text-gray-900">Pilih NIP Pegawai</label>
                    <select name="nip" class="form-select" required>
                        <option value="">-- Pilih NIP --</option>
                        @foreach($biodata as $data)
                            <option value="{{ $data->NIP }}">{{ $data->NIP }} - {{ $data->nama }}</option>
                        @endforeach
                    </select>
                </div>
                  <div>
                    <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama </label>
                    <div class="mt-2">
                        <input type="text" name="nama" id="nama" autocomplete="off" class="block w-full rounded-md border-0 py-1 px-2 text-gray-900  ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control form-control-user" id="password" name="password" required autocomplete="current-password">
                        <span class="input-group-text" onclick="togglePasswordVisibility('password', this)" style="background-color: white; border: 1px solid #ced4da;">
                            <i class="fa-solid fa-eye-slash" style="font-size: 1em;"></i>
                        </span>
                    </div>
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Konfirmasi Password</label>
                    <div class="mt-2">
                        <div class="input-group">
                            <input type="password" class="form-control form-control-user" id="password_confirmation" name="password_confirmation" required autocomplete="current-password">
                            <span class="input-group-text" onclick="togglePasswordVisibility('password_confirmation', this)" style="background-color: white; border: 1px solid #ced4da;">
                                <i class="fa-solid fa-eye-slash" style="font-size: 1em;"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-between items-center py-4">
                <a href="{{ route('admin.akun-pegawai.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded no-underline">
                    Batal
                </a>
                
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded no-underline">
                    Simpan
                </button>
            </div>
        </form>
    </div>
    
<script>
     function togglePasswordVisibility(inputId, iconSpan) {
        var input = document.getElementById(inputId);
        var icon = iconSpan.querySelector('i');

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        }
    }
</script>



@endsection