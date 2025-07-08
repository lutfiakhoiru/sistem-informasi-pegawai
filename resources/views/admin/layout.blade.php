<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Admin Dashboard</title>
    <style>
        /* Reset & base */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body, html {
            height: 100%;
            background-color: #f4f6f8;
            color: #333;
            overflow-y: auto;
        }
        a {
            text-decoration: none;
            color: inherit;
        }
        ul {
            list-style-type: none;
        }
        /* Navbar */
        .navbar {
            height: 60px;
            background-color: #1a73e8;
            color: white;
            display: flex;
            align-items: center;
            padding: 0 20px;
            font-size: 1.25rem;
            font-weight: 600;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(26, 115, 232, 0.3);
        }
        /* Layout */
        .container {
            display: flex;
            height: 100vh;
            padding-top: 60px; /* navbar height */
        }
        /* Sidebar */
        .sidebar {
            width: 240px;
            background-color: #ffffff;
            border-right: 1px solid #ddd;
            padding-top: 1rem;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 60px;
            bottom: 0;
            left: 0;
            transition: width 0.3s ease;
            overflow-y: auto;
        }
        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #333;
            font-weight: 500;
            border-left: 4px solid transparent;
            transition: background-color 0.2s, border-color 0.2s;
        }
        .sidebar a:hover {
            background-color: #e8f0fe;
            border-left-color: #1a73e8;
            color: #1a73e8;
        }
        .sidebar a.logout-link {
            color: #d93025;
            font-weight: 600;
            border-left-color: transparent;
        }
        .sidebar a.logout-link:hover {
            background-color: #fce8e6;
            border-left-color: #d93025;
            color: #d93025;
        }
        /* Main content */
            .main-content {
            flex-grow: 1;
            margin-left: 200px;
            padding-left: 2rem;
            padding-right: 0;
            padding-top: 1rem;
            padding-bottom: 2rem;
            
        }
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                width: 200px;
                height: 100%;
                transform: translateX(-200px);
                transition: transform 0.3s ease;
                z-index: 1100;
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
                padding: 1rem;
            }
            .navbar .menu-toggle {
                display: block;
                cursor: pointer;
                margin-right: 1rem;
                font-size: 1.5rem;
                user-select: none;
            }
        }
        /* Hide menu toggle on desktop */
        .menu-toggle {
            display: none;
        }
    </style>
</head>
<body>
    <header class="navbar">
        <span class="menu-toggle" id="menu-toggle">&#9776;</span>
        Sistem Informasi Pegawai BNN Kabupaten Blitar
    </header>

    <div class="container">
        <nav class="sidebar d-flex flex-column justify-content-between" id="sidebar">
            <div>
                <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house me-1"></i>Dashboard</a>
                <a href="{{ route('admin.dataPegawai') }}"> <i class="fas fa-users me-1"></i>Data Pegawai</a>
                <a href="{{ route('admin.biodata.create') }}"><i class="fas fa-user-plus me-1"></i>Tambah Data Pegawai</a>
                <a href="{{ route('admin.akun-pegawai.index') }}"><i class="fas fa-users-cog me-1"></i>Akun Pegawai</a>
            </div>
           <div class="py-4">
                <a href="#" class="logout-link" 
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt me-1"></i> 
                Logout
                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>
            </div>
        </nav>
        <main class="main-content">
            @include('admin.pesan')
            @yield('konten')
        </main>
    </div>

    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const sidebar = document.getElementById('sidebar');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
    </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
