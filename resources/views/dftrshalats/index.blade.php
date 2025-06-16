<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Waktu Shalat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #111827;
            color: #e0e0e0;
        }

        .prayer-card {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3), 0 4px 6px -2px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            background-color: #1f2937;
            border: 1px solid #374151;
        }

        .prayer-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 10px 10px -5px rgba(0, 0, 0, 0.2);
        }

        .prayer-header {
            position: relative;
            overflow: hidden;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .prayer-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0.2;
            z-index: 0;
        }

        .prayer-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0.3;
            font-size: 3rem;
        }

        .prayer-title {
            position: relative;
            z-index: 1;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
        }

        .prayer-table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }

        .prayer-table th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            color: #9ca3af;
        }

        .prayer-table tr:last-child td {
            border-bottom: none;
        }

        .prayer-table tr:hover td {
            background-color: rgba(55, 65, 81, 0.5);
        }

        .prayer-table tbody tr td {
            border-color: #374151;
        }

        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.6rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .float-time {
            position: fixed;
            bottom: 1.5rem;
            right: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3), 0 4px 6px -2px rgba(0, 0, 0, 0.2);
            z-index: 50;
            overflow: hidden;
        }

        .gradient-border {
            position: relative;
            border-radius: 1rem;
            overflow: hidden;
        }

        .gradient-border::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #4f46e5, #8b5cf6, #ec4899);
            z-index: -1;
            border-radius: 1rem;
            animation: animateBorder 3s linear infinite;
        }

        @keyframes animateBorder {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .page-header {
            position: relative;
            overflow: hidden;
            padding: 3rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 2rem 2rem;
            background: linear-gradient(135deg, #1e3a8a, #4f46e5);
            color: white;
            text-align: center;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.4;
        }

        .main-title {
            position: relative;
            z-index: 1;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .prayer-time-wrapper {
            position: relative;
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
            font-weight: 600;
            text-align: center;
            background-color: rgba(255,255,255,0.1);
            backdrop-filter: blur(5px);
        }

        /* Prayer type specific styles */
        .duha-theme {
            background: linear-gradient(135deg, #b45309, #d97706);
        }

        .duha-theme::before {
            background-color: #b45309;
        }

        .dzuhur-theme {
            background: linear-gradient(135deg, #1d4ed8, #3b82f6);
        }

        .dzuhur-theme::before {
            background-color: #1d4ed8;
        }

        .ashar-theme {
            background: linear-gradient(135deg, #6d28d9, #8b5cf6);
        }

        .ashar-theme::before {
            background-color: #6d28d9;
        }

        .status-active {
            background-color: #064e3b;
            color: #6ee7b7;
        }

        .status-inactive {
            background-color: #374151;
            color: #9ca3af;
        }
        
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #0f172a;
            color: #e0e0e0;
            z-index: 1000;
            border-right: 1px solid #1e293b;
        }
        
        .btn-add {
            background: rgba(31, 41, 55, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
        }
        
        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.2), 0 4px 6px -2px rgba(0, 0, 0, 0.1);
        }
        
        .main-table {
            background: #1f2937;
            border: 1px solid #374151;
            border-radius: 1rem;
            overflow: hidden;
        }
        
        .main-table th {
            background-color: #111827;
            color: #9ca3af;
            font-weight: 600;
            letter-spacing: 0.025em;
        }
        
        .main-table tbody tr {
            border-bottom: 1px solid #374151;
        }
        
        .main-table tbody tr:hover {
            background-color: rgba(55, 65, 81, 0.5);
        }
    </style>
</head>

<body>
    @include('sidebar')
    
    <!-- Page Header -->
    <div class="page-header">
        <div class="container mx-auto px-4">
            <h1 class="main-title text-3xl md:text-4xl mb-2">Daftar Waktu Shalat</h1>
            <p class="opacity-90">Jadwal shalat harian untuk kegiatan ibadah</p>
        </div>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="container mx-auto px-4 mb-6">
            <div class="bg-green-900 border-l-4 border-green-500 text-green-100 p-4 rounded shadow-md" role="alert">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="ml-3">
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Debug Info -->
    <div class="fixed bottom-0 left-0 bg-black text-white p-2 z-50 text-xs">
        Debug: User {{ auth()->id() }} | 
        Total: {{ $dftrshalats->count() }} |
        @foreach(['Duha','Dzuhur','Ashar'] as $type)
            {{ $type }}: {{ $dftrshalats->where('jenis', $type)->count() }} |
        @endforeach
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 pb-20">
        <!-- Add Prayer Buttons -->
        <div class="mb-8">
            <a href="{{ route('dftrshalats.create', ['jenis' => 'duha']) }}" id="duhaBtn" class="btn-add text-yellow-400 px-6 py-3 rounded-lg inline-block mr-4" style="display: none;">
                <i class="fas fa-plus-circle mr-2"></i>Tambah Shalat Duha
            </a>
            <a href="{{ route('dftrshalats.create', ['jenis' => 'dzuhur']) }}" id="dzuhurBtn" class="btn-add text-blue-400 px-6 py-3 rounded-lg inline-block mr-4" style="display: none;">
                <i class="fas fa-plus-circle mr-2"></i>Tambah Shalat Dzuhur
            </a>
            <a href="{{ route('dftrshalats.create', ['jenis' => 'ashar']) }}" id="asharBtn" class="btn-add text-purple-400 px-6 py-3 rounded-lg inline-block" style="display: none;">
                <i class="fas fa-plus-circle mr-2"></i>Tambah Shalat Ashar
            </a>
        </div>

        <!-- All Prayers Table -->
        <div class="mb-10 main-table shadow-xl">
            <div class="p-6 bg-gradient-to-r from-indigo-900 to-purple-900 text-white">
                <h2 class="text-xl font-bold mb-1">Semua Jadwal Shalat</h2>
                <p class="text-sm opacity-80">Tampilan lengkap jadwal shalat dari semua kategori</p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Jenis</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Hari</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Perusahaan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Waktu</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @forelse ($dftrshalats as $index => $shalat)
                            <tr class="transition-colors duration-150 ease-in-out">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full
                                        @if($shalat->jenis == 'Duha') bg-yellow-900 text-yellow-300
                                        @elseif($shalat->jenis == 'Dzuhur') bg-blue-900 text-blue-300
                                        @elseif($shalat->jenis == 'Ashar') bg-purple-900 text-purple-300
                                        @endif">
                                        {{ $shalat->jenis }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">{{ $shalat->tanggal }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">{{ $shalat->hari }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">{{ $shalat->perusahaan }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-200 bg-gray-800 px-3 py-1 rounded-full inline-block border border-gray-700">
                                        <i class="far fa-clock mr-1 opacity-70"></i> {{ $shalat->waktu }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="status-badge {{ $shalat->status == 'aktif' ? 'status-active' : 'status-inactive' }}">
                                        {{ ucfirst($shalat->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-gray-400">
                                    <i class="fas fa-info-circle mr-2"></i> Belum ada data shalat
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Prayer Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach(['Duha' => 'fas fa-sun', 'Dzuhur' => 'fas fa-mosque', 'Ashar' => 'fas fa-cloud-sun'] as $type => $icon)
                @php
                    $prayers = $dftrshalats->where('jenis', $type);
                @endphp
                
                <div class="prayer-card">
                    <div class="prayer-header {{ strtolower($type) }}-theme">
                        <i class="{{ $icon }} prayer-icon"></i>
                        <h2 class="prayer-title text-white text-xl">Shalat {{ $type }}</h2>
                    </div>
                    <div class="p-4">
                        @if($prayers->isEmpty())
                            <div class="text-center py-4 text-yellow-400">
                                <i class="fas fa-info-circle mr-2"></i>
                                Belum ada data shalat {{ $type }}
                            </div>
                        @else
                            <div class="overflow-hidden">
                                <table class="prayer-table">
                                    <thead>
                                        <tr>
                                            <th class="py-3 text-left pl-4">Tanggal</th>
                                            <th class="py-3 text-center">Hari</th>
                                            <th class="py-3 text-center">Waktu</th>
                                            <th class="py-3 text-right pr-4">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($prayers as $shalat)
                                            <tr>
                                                <td class="py-3 text-sm pl-4 border-b">{{ $shalat->tanggal }}</td>
                                                <td class="py-3 text-sm text-center border-b">{{ $shalat->hari }}</td>
                                                <td class="py-3 border-b">
                                                    <div class="prayer-time-wrapper text-sm {{ strtolower($type) }}-theme text-white">
                                                        {{ $shalat->waktu }}
                                                    </div>
                                                </td>
                                                <td class="py-3 text-sm text-right pr-4 border-b">
                                                    <span class="status-badge {{ $shalat->status == 'aktif' ? 'status-active' : 'status-inactive' }}">
                                                        {{ ucfirst($shalat->status) }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Floating Time Display -->
    <div class="float-time">
        <div class="gradient-border">
            <div class="bg-gray-900 p-4 border border-gray-700" style="position: relative; z-index: 1;">
                <div class="text-sm text-gray-400 mb-1">Waktu Sekarang</div>
                <div id="current-time" class="text-xl font-bold text-white">00:00:00</div>
            </div>
        </div>
    </div>

    <script>
        // Live clock
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('current-time').textContent = `${hours}:${minutes}:${seconds}`;
        }
        
        // Update clock immediately and then every second
        updateClock();
        setInterval(updateClock, 1000);

        // Show prayer buttons based on current time
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