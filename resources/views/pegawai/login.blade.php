<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pegawai Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e8f0fe;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            background: white;
            padding: 2rem;
            border-radius: 6px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 320px;
        }
        h2 {
            margin-bottom: 1rem;
            text-align: center;
            color: #1a73e8;
        }
        label {
            display: block;
            margin-top: 1rem;
            font-weight: bold;
            color: #333;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 0.5rem;
            margin-top: 0.3rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .error {
            color: #d93025;
            font-size: 0.9rem;
            margin-top: 0.2rem;
        }
        button {
            margin-top: 1.5rem;
            width: 100%;
            padding: 0.6rem;
            background-color: #1a73e8;
            border: none;
            color: white;
            font-size: 1rem;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #155ab6;
        }
        .footer {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.85rem;
            color: #555;
        }
          .switch-login {
            text-align: center;
            margin-top: 1rem;
        }
        .switch-login a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo-wrapper" style="text-align: center; margin-bottom: 1rem;">
            <img src="https://upload.wikimedia.org/wikipedia/commons/c/cf/Logo_BNN.png" alt="Logo BNN" style="max-width: 100px;">
          
            <h3>Sistem Informasi Pegawai BNN Kabupaten Blitar </h3>
        </div>
        <form method="POST" action="{{ route('pegawai.login.submit') }}">
            @csrf
            <label for="nip">NIP</label>
            <input id="nip" type="text" name="nip" value="{{ old('nip') }}" required autofocus />
            @error('nip')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required />
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit">Login</button>
        </form>
        <div class="switch-login">
            <a href="{{ route('admin.login') }}">Login sebagai Admin</a>
        </div>
       
    </div>
</body>
</html>
