<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Waktu Shalat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1a1c2e 0%, #2d3047 100%);
            color: #e2e8f0;
            overflow: hidden;
        }

        .sidebar {
            background: linear-gradient(180deg, #1e1e2d 0%, #2d2d44 100%);
            width: 250px;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            position: fixed;
            height: 100vh;
            z-index: 40;
            overflow-y: auto;
        }

        .sidebar.collapsed {
            width: 60px;
        }

        .toggle-sidebar {
            position: absolute;
            top: 1rem;
            right: -12px;
            background: #2d2d44;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 50;
        }

        .main-content {
            margin-left: 250px;
            transition: all 0.3s ease;
            height: 100vh;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .main-content.expanded {
            margin-left: 60px;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1rem;
            padding: 1rem;
        }

        .table-container {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            height: 400px;
            overflow-y: auto;
            min-width: 280px;
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 255, 255, 0.2) transparent;
        }

        .table-container::-webkit-scrollbar {
            width: 6px;
        }

        .table-container::-webkit-scrollbar-track {
            background: transparent;
        }

        .table-container::-webkit-scrollbar-thumb {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }

        .compact-table {
            font-size: 0.875rem;
            width: 100%;
        }

        .compact-table th {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            font-weight: 500;
            padding: 0.75rem 1rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .compact-table td {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .compact-table tr:hover {
            background: rgba(255, 255, 255, 0.05);
        }

        .card-header {
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            border-radius: 10px 10px 0 0;
            padding: 1rem;
            position: sticky;
            top: 0;
            z-index: 20;
        }

        .btn-add {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            transition: all 0.3s ease;
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .week-picker {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            color: #fff;
            padding: 0.5rem 1rem;
        }

        .success-alert {
            background: rgba(16, 185, 129, 0.2);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #10b981;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .card-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="flex h-screen">
        <div class="sidebar shadow-xl" id="sidebar">
            <div class="toggle-sidebar" onclick="toggleSidebar()">
                <i class="fas fa-chevron-left" id="toggleIcon"></i>
            </div>
            @include('sidebar')
        </div>

        <div class="main-content" id="mainContent">
            <div class="p-8">
                <h1 class="text-3xl font-bold mb-8 text-white">Daftar Waktu Shalat</h1>

                @if (session('success'))
                    <div class="success-alert p-4 rounded-lg mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-8">
                    <a href="{{ route('dftrshalats.create', ['jenis' => 'duha']) }}" id="duhaBtn" class="btn-add text-white px-6 py-3 rounded-lg inline-block mr-4" style="display: none;">
                        <i class="fas fa-plus-circle mr-2"></i>Tambah Shalat Duha
                    </a>
                    <a href="{{ route('dftrshalats.create', ['jenis' => 'dzuhur']) }}" id="dzuhurBtn" class="btn-add text-white px-6 py-3 rounded-lg inline-block mr-4" style="display: none;">
                        <i class="fas fa-plus-circle mr-2"></i>Tambah Shalat Dzuhur
                    </a>
                    <a href="{{ route('dftrshalats.create', ['jenis' => 'ashar']) }}" id="asharBtn" class="btn-add text-white px-6 py-3 rounded-lg inline-block mr-4" style="display: none;">
                        <i class="fas fa-plus-circle mr-2"></i>Tambah Shalat Ashar
                    </a>
                    <a href="{{ route('dftrshalats.create', ['jenis' => 'maghrib']) }}" id="maghribBtn" class="btn-add text-white px-6 py-3 rounded-lg inline-block mr-4" style="display: none;">
                        <i class="fas fa-plus-circle mr-2"></i>Tambah Shalat Maghrib
                    </a>
                    <a href="{{ route('dftrshalats.create', ['jenis' => 'isya']) }}" id="isyaBtn" class="btn-add text-white px-6 py-3 rounded-lg inline-block" style="display: none;">
                        <i class="fas fa-plus-circle mr-2"></i>Tambah Shalat Isya
                    </a>
                </div>

                <div class="mb-8">
                    <form method="GET" action="{{ route('dftrshalats.index') }}" class="flex items-center flex-wrap gap-4">
                        <label for="week" class="font-medium text-white">Pilih Minggu:</label>
                        <input type="week" id="week" name="week" class="week-picker" 
                               value="{{ request('week', \Carbon\Carbon::now()->format('Y-\WW')) }}">
                        <button type="submit" class="btn-add px-6 py-2 rounded-lg">
                            <i class="fas fa-search mr-2"></i>Tampilkan
                        </button>
                    </form>
                </div>

                <div class="card-grid">
                    <!-- Tabel Shalat Duha -->
                    <div class="table-container">
                        <div class="card-header">
                            <h2 class="text-xl font-semibold">Waktu Shalat Duha</h2>
                        </div>
                        <div class="p-4">
                            <table class="compact-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Perusahaan</th>
                                        <th>Waktu</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dftrshalats->where('jenis', 'Duha') as $index => $shalat)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ ucfirst($shalat->nama) }}</td>
                                            <td>{{ ucfirst($shalat->perusahaan) }}</td>
                                            <td>{{ $shalat->waktu }}</td>
                                            <td>{{ ucfirst($shalat->status) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Tabel Shalat Dzuhur -->
                    <div class="table-container">
                        <div class="card-header">
                            <h2 class="text-xl font-semibold">Waktu Shalat Dzuhur</h2>
                        </div>
                        <div class="p-4">
                            <table class="compact-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Perusahaan</th>
                                        <th>Waktu</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dftrshalats->where('jenis', 'Dzuhur') as $index => $shalat)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ ucfirst($shalat->nama) }}</td>
                                            <td>{{ ucfirst($shalat->perusahaan) }}</td>
                                            <td>{{ $shalat->waktu }}</td>
                                            <td>{{ ucfirst($shalat->status) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Tabel Shalat Ashar -->
                    <div class="table-container">
                        <div class="card-header">
                            <h2 class="text-xl font-semibold">Waktu Shalat Ashar</h2>
                        </div>
                        <div class="p-4">
                            <table class="compact-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Perusahaan</th>
                                        <th>Waktu</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dftrshalats->where('jenis', 'Ashar') as $index => $shalat)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ ucfirst($shalat->nama) }}</td>
                                            <td>{{ ucfirst($shalat->perusahaan) }}</td>
                                            <td>{{ $shalat->waktu }}</td>
                                            <td>{{ ucfirst($shalat->status) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Tabel Shalat Maghrib -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const toggleIcon = document.getElementById('toggleIcon');
            
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
            toggleIcon.classList.toggle('fa-chevron-right');
            toggleIcon.classList.toggle('fa-chevron-left');
        }

        function showPrayerButtons() {
            const now = new Date();
            const hours = now.getHours();

            document.getElementById('duhaBtn').style.display = 'none';
            document.getElementById('dzuhurBtn').style.display = 'none';
            document.getElementById('asharBtn').style.display = 'none';

            if (hours >= 4 && hours < 12) {
                document.getElementById('duhaBtn').style.display = 'inline-block';
            } else if (hours >= 12 && hours < 15) {
                document.getElementById('dzuhurBtn').style.display = 'inline-block';
            } else if (hours >= 15 && hours < 18) {
                document.getElementById('asharBtn').style.display = 'inline-block';
            }
        }

        showPrayerButtons();
    </script>
</body>
</html>