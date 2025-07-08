@extends('pegawai.layout')
@section('konten')
    
 <div class=" mx-auto p-2">
        <h5 class="text-lg font-bold leading-7 text-gray-900 pb-5 text-center ">Ganti Password</h5>
        <form action="{{ route('pegawai.password.update') }}" method="POST" class="space-y-4">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-1 gap-6">
          
                <div>
                    <label for="current_password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control form-control-user" id="password" name="current_password" required autocomplete="current-password">
                        <span class="input-group-text" onclick="togglePasswordVisibility()" style="background-color: white; border: 1px solid #ced4da;">
                            <i class="fa-solid fa-eye-slash" style="font-size: 1em;"></i>
                        </span>
                    </div>
                </div>
                <div>
                    <label for="new_password" class="block text-sm font-medium leading-6 text-gray-900">Konfirmasi Password</label>
                    <div class="mt-2">
                        <div class="input-group">
                            <input type="password" class="form-control form-control-user" id="password" name="new_password" required autocomplete="current-password">
                            <span class="input-group-text" onclick="togglePasswordVisibility()" style="background-color: white; border: 1px solid #ced4da;">
                                <i class="fa-solid fa-eye-slash" style="font-size: 1em;"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="new_password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Konfirmasi Password</label>
                    <div class="mt-2">
                        <div class="input-group">
                            <input type="password" class="form-control form-control-user" id="password" name="new_password_confirmation" required autocomplete="current-password">
                            <span class="input-group-text" onclick="togglePasswordVisibility()" style="background-color: white; border: 1px solid #ced4da;">
                                <i class="fa-solid fa-eye-slash" style="font-size: 1em;"></i>
                            </span>
                        </div>
                    </div>
                </div>

            </div>


            <div class="flex justify-center  py-4">
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded no-underline">
                    Simpan
                </button>
            </div>
        </form>
    </div>

<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');
        var eyeIcon = document.querySelector('.input-group-text i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        }
    }
</script>


@endsection