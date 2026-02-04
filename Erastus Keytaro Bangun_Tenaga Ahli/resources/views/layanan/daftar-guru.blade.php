<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru - Layanan</title>
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
            position: sticky;
            top: 0;
            z-index: 100;
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

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Header */
        .header {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .header h1 {
            color: #333;
            margin-bottom: 0.5rem;
        }

        .header p {
            color: #666;
            font-size: 0.95rem;
        }

        /* Table Wrapper */
        .table-wrapper {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .table-wrapper table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-wrapper thead {
            background: #f8f9fa;
            border-bottom: 2px solid #e0e0e0;
        }

        .table-wrapper th {
            padding: 1.2rem;
            text-align: left;
            font-weight: 600;
            color: #333;
            font-size: 0.95rem;
        }

        .table-wrapper td {
            padding: 1rem 1.2rem;
            border-bottom: 1px solid #e0e0e0;
            color: #555;
        }

        .table-wrapper tbody tr:hover {
            background: #f9f9f9;
        }

        .table-wrapper tbody tr:last-child td {
            border-bottom: none;
        }

        /* Badge */
        .badge {
            display: inline-block;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .badge-pns {
            background: #e6f0ff;
            color: #1e40af;
        }

        .badge-honorer {
            background: #fff3e0;
            color: #f57c00;
        }

        /* Info Section */
        .info {
            background: #e8f1ff;
            border-left: 4px solid #1e40af;
            padding: 1rem;
            margin-bottom: 2rem;
            border-radius: 4px;
            color: #1e3a8a;
        }

        .info strong {
            display: block;
            margin-bottom: 0.3rem;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #999;
        }

        .empty-state p {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }

        /* Button Actions */
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn {
            padding: 0.5rem 0.8rem;
            border: none;
            border-radius: 4px;
            font-size: 0.85rem;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .btn-edit {
            background: #3b82f6;
            color: white;
        }

        .btn-edit:hover {
            background: #1e40af;
        }

        .btn-delete {
            background: #f44336;
            color: white;
        }

        .btn-delete:hover {
            background: #d32f2f;
        }

        .btn-add {
            background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
            color: white;
            padding: 0.8rem 1.2rem;
            margin-bottom: 1.5rem;
            display: inline-block;
            border-radius: 5px;
        }

        .btn-add:hover {
            opacity: 0.95;
        }

        /* Alert Messages */
        .alert {
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1.5rem;
            border-left: 4px solid;
        }

        .alert-success {
            background: #e8f5e9;
            color: #2e7d32;
            border-left-color: #4caf50;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            max-width: 400px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .modal-content h3 {
            color: #333;
            margin-bottom: 1rem;
        }

        .modal-content p {
            color: #666;
            margin-bottom: 1.5rem;
        }

        .modal-buttons {
            display: flex;
            gap: 1rem;
        }

        .modal-buttons button {
            flex: 1;
            padding: 0.8rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-confirm {
            background: #f44336;
            color: white;
        }

        .btn-confirm:hover {
            background: #d32f2f;
        }

        .btn-cancel {
            background: #e0e0e0;
            color: #333;
        }

        .btn-cancel:hover {
            background: #d0d0d0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            nav ul {
                flex-wrap: wrap;
            }

            nav a {
                padding: 0.8rem 1rem;
                font-size: 0.9rem;
            }

            .container {
                padding: 1rem;
            }

            .header {
                padding: 1.5rem;
            }

            .table-wrapper {
                overflow-x: auto;
            }

            .table-wrapper th,
            .table-wrapper td {
                padding: 0.8rem;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav>
        @if (file_exists(public_path('logo/icon.svg')) || file_exists(public_path('logo/logo.png')))
            <img src="{{ asset(file_exists(public_path('logo/icon.svg')) ? 'logo/icon.svg' : 'logo/logo.png') }}"
                alt="Logo" class="nav-logo">
        @endif
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('daftar-guru') }}" class="active">Data Guru</a></li>
            <li style="margin-left: auto;">
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit"
                        style="background: none; border: none; color: white; padding: 1rem 1.5rem; cursor: pointer; font-size: 1rem;">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>📚 Data Guru</h1>
            <p>Daftar lengkap guru yang tersedia di institusi kami</p>
        </div>

        <!-- Success Alert -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Controls: add + search + filters -->
        <div style="display:flex; gap:0.5rem; align-items:center; margin-bottom:1rem;">
            <a href="{{ route('guru.create') }}" class="btn-add">+ Tambah Guru Baru</a>
            <form method="GET" action="{{ route('daftar-guru') }}" style="margin-left:1rem;">
                <input type="text" name="q" placeholder="Cari nama, NIP, email, mapel..."
                    value="{{ isset($q) ? $q : '' }}"
                    style="padding:0.6rem 0.8rem; border-radius:6px; border:1px solid #ddd;">
                <button type="submit" class="btn"
                    style="margin-left:0.4rem; background:#e6f0ff; color:#1e40af;">Cari</button>
            </form>
            <div style="margin-left: auto; display:flex; gap:0.5rem;">
                <a href="{{ route('daftar-guru') }}" class="btn" style="background:#eef2ff; color:#1e3a8a;">Semua</a>
                <a href="{{ route('daftar-guru', array_merge(request()->query(), ['filter' => 'eligible'])) }}"
                    class="btn" style="background:#e6f0ff; color:#1e40af;">Eligible</a>
                <a href="{{ route('daftar-guru', array_merge(request()->query(), ['filter' => 'not'])) }}"
                    class="btn" style="background:#fff1f0; color:#c53030;">Tidak Eligible</a>
            </div>
        </div>

        <!-- Info -->
        <div class="info">
            <strong>Total Guru: {{ count($gurus) }} orang</strong>
            Data guru diperbarui secara berkala untuk memastikan informasi terkini
        </div>

        <!-- Table -->
        <div class="table-wrapper">
            @if ($gurus->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Mata Pelajaran</th>
                            <th>Pendidikan</th>
                            <th>Status</th>
                            <th>Eligible</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gurus as $key => $guru)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td><strong>{{ $guru->nip }}</strong></td>
                                <td>{{ $guru->nama }}</td>
                                <td>{{ $guru->email }}</td>
                                <td>{{ $guru->mata_pelajaran }}</td>
                                <td>{{ $guru->pendidikan }}</td>
                                <td>
                                    <span class="badge {{ $guru->status === 'PNS' ? 'badge-pns' : 'badge-honorer' }}">
                                        {{ $guru->status }}
                                    </span>
                                </td>
                                <td>
                                    @if (isset($guru->eligible) && $guru->eligible)
                                        <span class="badge" style="background:#e6ffed; color:#0f5132;">Ya</span>
                                    @else
                                        <span class="badge" style="background:#fff0f0; color:#9b2c2c;">Tidak</span>
                                    @endif
                                    <div style="margin-top:0.5rem; font-size:0.85rem; color:#555;">
                                        <a href="#"
                                            onclick="toggleReason({{ $guru->id }}); return false;">Lihat alasan</a>
                                        <div id="reason-{{ $guru->id }}"
                                            style="display:none; margin-top:0.5rem; background:#fafafa; padding:0.6rem; border-radius:4px; border:1px solid #eee;">
                                            <strong>Aturan:</strong>
                                            <ul style="margin-left:1rem; margin-top:0.4rem;">
                                                <li>Status PNS:
                                                    <strong>{{ $guru->eligibility_rules['status_pns'] ? 'Ya' : 'Tidak' }}</strong>
                                                </li>
                                                <li>Pendidikan S1/S2:
                                                    <strong>{{ $guru->eligibility_rules['education_degree'] ? 'Ya' : 'Tidak' }}</strong>
                                                </li>
                                                <li>Lama mengajar ≥ 5 tahun:
                                                    <strong>{{ $guru->eligibility_rules['years_experience'] ? 'Ya' : 'Tidak' }}
                                                        ({{ $guru->years_experience }} tahun)
                                                    </strong>
                                                </li>
                                                <li>Pelatihan ≥ 2:
                                                    <strong>{{ $guru->eligibility_rules['trainings_completed'] ? 'Ya' : 'Tidak' }}
                                                        ({{ $guru->trainings_completed }})</strong>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-edit">✏️ Edit</a>
                                        <button type="button" class="btn btn-delete"
                                            onclick="openDeleteModal({{ $guru->id }}, '{{ $guru->nama }}')">🗑️
                                            Hapus</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div style="padding:1rem; display:flex; justify-content:flex-end;">
                    {{ $gurus->appends(request()->query())->links() }}
                </div>
            @else
                <div class="empty-state">
                    <p>📭 Tidak ada data guru</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <h3>Hapus Data Guru</h3>
            <p>Anda yakin ingin menghapus data guru <strong id="guruName"></strong>?</p>
            <p style="font-size: 0.9rem; color: #999;">Tindakan ini tidak dapat dibatalkan.</p>
            <div class="modal-buttons">
                <form id="deleteForm" method="POST" style="flex: 1;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-confirm" style="width: 100%;">Hapus</button>
                </form>
                <button type="button" class="btn-cancel" onclick="closeDeleteModal()">Batal</button>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(guruId, guruName) {
            document.getElementById('guruName').textContent = guruName;
            document.getElementById('deleteForm').action = `/guru/${guruId}`;
            document.getElementById('deleteModal').classList.add('show');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('show');
        }

        // Close modal when clicking outside
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });

        function toggleReason(id) {
            const el = document.getElementById('reason-' + id);
            if (!el) return;
            el.style.display = el.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</body>

</html>
