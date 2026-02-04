<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($guru) ? 'Edit Guru' : 'Tambah Guru' }}</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        nav ul {
            list-style: none;
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0;
        }

        nav a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 1rem 1.5rem;
            transition: background 0.3s ease;
        }

        nav a:hover {
            background: rgba(255, 255, 255, 0.1);
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
            max-width: 600px;
            margin: 2rem auto;
            padding: 0 20px;
        }

        /* Card */
        .card {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .card h1 {
            color: #333;
            margin-bottom: 2rem;
            font-size: 1.8rem;
        }

        /* Form Group */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.85rem 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
            font-family: inherit;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .form-group input::placeholder {
            color: #ccc;
        }

        /* Error Messages */
        .error-message {
            background: #fee;
            color: #c33;
            padding: 0.75rem 1rem;
            border-radius: 5px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            border-left: 4px solid #c33;
        }

        .field-error {
            color: #c33;
            font-size: 0.85rem;
            margin-top: 0.3rem;
        }

        /* Button Group */
        .button-group {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            flex: 1;
            padding: 0.9rem 1.5rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: #4f46e5;
            color: white;
        }

        .btn-primary:hover {
            background: #3730a3;
        }

        .btn-secondary {
            background: #e0e0e0;
            color: #333;
        }

        .btn-secondary:hover {
            background: #d0d0d0;
        }

        @media (max-width: 600px) {
            .container {
                margin: 1rem auto;
            }

            .card {
                padding: 1.5rem;
            }

            .card h1 {
                font-size: 1.5rem;
            }

            .button-group {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('daftar-guru') }}">Data Guru</a></li>
            <li style="margin-left: auto;">
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="card">
            <h1>{{ isset($guru) ? 'Edit Data Guru' : 'Tambah Guru Baru' }}</h1>

            @if ($errors->any())
                <div class="error-message">
                    <strong>Terjadi kesalahan:</strong>
                    <ul style="margin-left: 1.5rem; margin-top: 0.5rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ isset($guru) ? route('guru.update', $guru->id) : route('guru.store') }}">
                @csrf
                @if (isset($guru))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" id="nip" name="nip"
                        value="{{ old('nip', isset($guru) ? $guru->nip : '') }}" placeholder="Masukkan NIP"
                        {{ isset($guru) ? 'readonly style="background: #f5f5f5;"' : 'required' }}>
                    @error('nip')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama"
                        value="{{ old('nama', isset($guru) ? $guru->nama : '') }}" placeholder="Masukkan nama lengkap"
                        required>
                    @error('nama')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email"
                        value="{{ old('email', isset($guru) ? $guru->email : '') }}" placeholder="Masukkan email"
                        required>
                    @error('email')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="mata_pelajaran">Mata Pelajaran</label>
                    <input type="text" id="mata_pelajaran" name="mata_pelajaran"
                        value="{{ old('mata_pelajaran', isset($guru) ? $guru->mata_pelajaran : '') }}"
                        placeholder="Masukkan mata pelajaran" required>
                    @error('mata_pelajaran')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pendidikan">Pendidikan</label>
                    <input type="text" id="pendidikan" name="pendidikan"
                        value="{{ old('pendidikan', isset($guru) ? $guru->pendidikan : '') }}"
                        placeholder="Masukkan tingkat pendidikan" required>
                    @error('pendidikan')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="years_experience">Lama Mengajar (tahun)</label>
                    <input type="number" id="years_experience" name="years_experience" min="0"
                        value="{{ old('years_experience', isset($guru) ? $guru->years_experience : 0) }}"
                        placeholder="Masukkan lama mengajar (tahun)">
                    @error('years_experience')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="trainings_completed">Jumlah Pelatihan yang Diikuti</label>
                    <input type="number" id="trainings_completed" name="trainings_completed" min="0"
                        value="{{ old('trainings_completed', isset($guru) ? $guru->trainings_completed : 0) }}"
                        placeholder="Masukkan jumlah pelatihan yang diikuti">
                    @error('trainings_completed')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="PNS"
                            {{ old('status', isset($guru) ? $guru->status : '') === 'PNS' ? 'selected' : '' }}>PNS
                        </option>
                        <option value="Honorer"
                            {{ old('status', isset($guru) ? $guru->status : '') === 'Honorer' ? 'selected' : '' }}>
                            Honorer</option>
                    </select>
                    @error('status')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                @if (isset($guru))
                    <div class="form-group">
                        <label for="eligibility_override">Override Eligibility</label>
                        <select id="eligibility_override" name="eligibility_override">
                            <option value="">(Gunakan perhitungan otomatis)</option>
                            <option value="1"
                                {{ old('eligibility_override', $guru->eligibility_override) === 1 ? 'selected' : '' }}>
                                Eligible (Ya)</option>
                            <option value="0"
                                {{ old('eligibility_override', $guru->eligibility_override) === 0 ? 'selected' : '' }}>
                                Tidak Eligible (Tidak)</option>
                        </select>
                        @error('eligibility_override')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="eligibility_note">Catatan Override</label>
                        <input type="text" id="eligibility_note" name="eligibility_note"
                            value="{{ old('eligibility_note', isset($guru) ? $guru->eligibility_note : '') }}"
                            placeholder="Alasan atau catatan admin (opsional)">
                        @error('eligibility_note')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>
                @endif

                <div class="button-group">
                    <button type="submit" class="btn btn-primary">
                        {{ isset($guru) ? 'Simpan Perubahan' : 'Tambah Guru' }}
                    </button>
                    <a href="{{ route('daftar-guru') }}" class="btn btn-secondary"
                        style="text-decoration: none; display: flex; align-items: center; justify-content: center;">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
