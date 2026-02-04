<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
        }

        /* Navbar */
        nav {
            background: linear-gradient(135deg, #3b82f6 0%, #1e3a8a 100%);
            padding: 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
        }

        .nav-logo {
            width: 45px;
            height: 45px;
            padding: 0.5rem 1.5rem;
            object-fit: contain;
        }

        nav ul {
            list-style: none;
            display: flex;
            flex: 1;
            margin: 0;
            padding: 0;
        }

        nav li {
            margin: 0;
        }

        nav a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 1rem 1.5rem;
            transition: background 0.3s ease;
            border-bottom: 3px solid transparent;
        }

        nav a:hover {
            background: rgba(255, 255, 255, 0.1);
            border-bottom-color: #fff;
        }

        nav a.active {
            background: rgba(255, 255, 255, 0.2);
            border-bottom-color: #fff;
        }

        nav button {
            background: none;
            border: none;
            color: white;
            padding: 1rem 1.5rem;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s ease;
        }

        nav button:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Card */
        .card {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }

        .card h1 {
            color: #333;
            margin-bottom: 1rem;
            font-size: 2rem;
        }

        .card p {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
        }

        /* Grid */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .grid-item {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .grid-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .grid-item a {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.8rem 1.5rem;
            background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: opacity 0.3s ease;
        }

        .grid-item a:hover {
            opacity: 0.9;
        }

        .grid-item .icon {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .grid-item h3 {
            color: #333;
            margin-bottom: 0.5rem;
        }

        .grid-item p {
            color: #666;
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .card {
                padding: 1.5rem;
            }

            .card h1 {
                font-size: 1.5rem;
            }

            .grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <nav>
        @if (file_exists(public_path('logo/icon.svg')) || file_exists(public_path('logo/logo.png')))
            <img src="{{ asset(file_exists(public_path('logo/icon.svg')) ? 'logo/icon.svg' : 'logo/logo.png') }}"
                alt="Logo" class="nav-logo">
        @endif
        <ul>
            <li><a href="{{ route('dashboard') }}" class="active">Dashboard</a></li>
            <li><a href="{{ route('daftar-guru') }}">Data Guru</a></li>
            <li style="margin-left: auto;">
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <div class="container">
        <div class="card">
            <h1>Selamat datang, {{ Auth::user()->name }}!</h1>
            <p>Dashboard aplikasi manajemen guru institusi</p>
        </div>

        <div class="grid">
            <div class="grid-item">
                <div class="icon">👥</div>
                <h3>Data Guru</h3>
                <p>Lihat dan kelola daftar guru</p>
                <a href="{{ route('daftar-guru') }}">Akses</a>
            </div>

            <div class="grid-item">
                <div class="icon">⚙️</div>
                <h3>Pengaturan</h3>
                <p>Kelola pengaturan akun</p>
                <a href="#">Menyusul, kalau sempat</a>
            </div>
        </div>
    </div>
</body>

</html>
