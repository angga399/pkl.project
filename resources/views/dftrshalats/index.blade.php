<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Waktu Shalat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <style>
        .compact-table {
            font-size: 0.875rem; /* Ukuran font lebih kecil */
        }
        .compact-table th,
        .compact-table td {
            padding: 0.25rem 0.5rem; /* Padding lebih kecil */
        }
        .compact-table th {
            white-space: nowrap; /* Mencegah text wrapping di header */
        }
        .table-container {
            overflow-x: auto; /* Scroll horizontal jika diperlukan */
            margin-bottom: 1rem; /* Jarak antar tabel */
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="sidebar w-64 bg-gray-800 text-white">
            @include('sidebar')
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-5">
            <h1 class="text-2xl font-bold mb-5">Daftar Waktu Shalat</h1>

            <!-- Pesan Sukses -->
            @if (session('success'))
                <div class="bg-green-200 text-green-800 p-3 rounded mb-5">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tombol Filter Jenis Shalat -->
            <div class="mb-4">
                <a href="{{ route('dftrshalats.create', ['jenis' => 'duha']) }}" id="duhaBtn" class="bg-yellow-400 text-gray-700 px-4 py-2 rounded mb-5 inline-block mr-2" style="display: none; text-decoration: none;">Tambah Waktu Shalat Duha</a>
                <a href="{{ route('dftrshalats.create', ['jenis' => 'dzuhur']) }}" id="dzuhurBtn" class="bg-yellow-400 text-gray-700 px-4 py-2 rounded mb-5 inline-block mr-2" style="display: none; text-decoration: none;">Tambah Waktu Shalat Dzuhur</a>
                <a href="{{ route('dftrshalats.create', ['jenis' => 'ashar']) }}" id="asharBtn" class="bg-yellow-400 text-gray-700 px-4 py-2 rounded mb-5 inline-block mr-2" style="display: none; text-decoration: none;">Tambah Waktu Shalat Ashar</a>
            </div>
            <div class="mb-4">
                <form method="GET" action="{{ route('dftrshalats.index') }}" class="flex items-center mb-4">
                    <label for="week" class="mr-2 font-semibold text-gray-700">Pilih Minggu:</label>
                    <input type="week" id="week" name="week" class="border rounded-lg p-2" 
                           value="{{ request('week', \Carbon\Carbon::now()->format('Y-\WW')) }}">
                    <button type="submit" class="ml-4 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                        Tampilkan
                    </button>
                </form>
            </div>

            <!-- Tabel Shalat -->
            <div class="flex flex-wrap -mx-2">
                <!-- Tabel Shalat Duha -->
                <div class="w-full md:w-1/3 px-2 mb-4">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Waktu Shalat Duha</h2>
                    <div class="table-container">
                        <table class="compact-table table-auto w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-2 py-1 text-sm">No</th>
                                    <th class="border border-gray-300 px-2 py-1 text-sm">Jenis</th>
                                    <th class="border border-gray-300 px-2 py-1 text-sm">Nama</th>
                                    <th class="border border-gray-300 px-2 py-1 text-sm">Perusahaan</th>
                                    <th class="border border-gray-300 px-2 py-1 text-sm">Tanggal</th>
                                    <th class="border border-gray-300 px-2 py-1 text-sm">Hari</th>
                                    <th class="border border-gray-300 px-2 py-1 text-sm">Waktu</th>
                                    <th class="border border-gray-300 px-2 py-1 text-sm">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dftrshalats->where('jenis', 'Duha') as $index => $shalat)
                                    <tr>
                                        <td class="border border-gray-300 px-2 py-1 text-sm">{{ $index + 1 }}</td>
                                        <td class="border border-gray-300 px-2 py-1 text-sm">{{ ucfirst($shalat->jenis) }}</td>
                                        <td class="border border-gray-300 px-2 py-1 text-sm">{{ ucfirst($shalat->nama) }}</td>
                                        <td class="border border-gray-300 px-2 py-1 text-sm">{{ ucfirst($shalat->perusahaan) }}</td>
                                        <td class="border border-gray-300 px-2 py-1 text-sm">{{ $shalat->tanggal }}</td>
                                        <td class="border border-gray-300 px-2 py-1 text-sm">{{ $shalat->hari }}</td>
                                        <td class="border border-gray-300 px-2 py-1 text-sm">{{ $shalat->waktu }}</td>
                                        <td class="border border-gray-300 px-2 py-1 text-sm">{{ ucfirst($shalat->status) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tabel Shalat Dzuhur -->
                <div class="w-full md:w-1/3 px-2 mb-4">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Waktu Shalat Dzuhur</h2>
                    <div class="table-container">
                        <table class="compact-table table-auto w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-2 py-1 text-sm">No</th>
                                    <th class="border border-gray-300 px-2 py-1 text-sm">Jenis</th>
                                    <th class="border border-gray-300 px-2 py-1 text-sm">Nama</th>
                                    <th class="border border-gray-300 px-2 py-1 text-sm">Perusahaan</th>
                                    <th class="border border-gray-300 px-2 py-1 text-sm">Tanggal</th>
                                    <th class="border border-gray-300 px-2 py-1 text-sm">Hari</th>
                                    <th class="border border-gray-300 px-2 py-1 text-sm">Waktu</th>
                                    <th class="border border-gray-300 px-2 py-1 text-sm">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dftrshalats->where('jenis', 'Dzuhur') as $index => $shalat)
                                    <tr>
                                        <td class="border border-gray-300 px-2 py-1 text-sm">{{ $index + 1 }}</td>
                                        <td class="border border-gray-300 px-2 py-1 text-sm">{{ ucfirst($shalat->jenis) }}</td>
                                        <td class="border border-gray-300 px-2 py-1 text-sm">{{ ucfirst($shalat->nama) }}</td>
                                        <td class="border border-gray-300 px-2 py-1 text-sm">{{ ucfirst($shalat->perusahaan) }}</td>
                                        <td class="border border-gray-300 px-2 py-1 text-sm">{{ $shalat->tanggal }}</td>
                                        <td class="border border-gray-300 px-2 py-1 text-sm">{{ $shalat->hari }}</td>
                                        <td class="border border-gray-300 px-2 py-1 text-sm">{{ $shalat->waktu }}</td>
                                        <td class="border border-gray-300 px-2 py-1 text-sm">{{ ucfirst($shalat->status) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tabel Shalat Ashar -->
                <div class="w-full md:w-1/3 px-2 mb-4">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Waktu Shalat Ashar</h2>
                    <div class="table-container">
                        <table class="compact-table table-auto w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-2 py-1 text-sm">No</th>
                                    <th class="border border-gray-300 px-2 py-1 text-sm">Jenis</th>
                                    <th class="border border-gray-300 px-2 py-1 text-sm">Nama</th>
                                    <th class="border border-gray-300 px-2 py-1 text-sm">Perusahaan</th>
                                    <th class="border border-gray-300 px-2 py-1 text-sm">Tanggal</th>
                                    <th class="border border-gray-300 px-2 py-1 text-sm">Hari</th>
                                    <th class="border border-gray-300 px-2 py-1 text-sm">Waktu</th>
                                    <th class="border border-gray-300 px-2 py-1 text-sm">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dftrshalats->where('jenis', 'Ashar') as $index => $shalat)
                                    <tr>
                                        <td class="border border-gray-300 px-2 py-1 text-sm">{{ $index + 1 }}</td>
                                        <td class="border border-gray-300 px-2 py-1 text-sm">{{ ucfirst($shalat->jenis) }}</td>
                                        <td class="border border-gray-300 px-2 py-1 text-sm">{{ ucfirst($shalat->nama) }}</td>
                                        <td class="border border-gray-300 px-2 py-1 text-sm">{{ ucfirst($shalat->perusahaan) }}</td>
                                        <td class="border border-gray-300 px-2 py-1 text-sm">{{ $shalat->tanggal }}</td>
                                        <td class="border border-gray-300 px-2 py-1 text-sm">{{ $shalat->hari }}</td>
                                        <td class="border border-gray-300 px-2 py-1 text-sm">{{ $shalat->waktu }}</td>
                                        <td class="border border-gray-300 px-2 py-1 text-sm">{{ ucfirst($shalat->status) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showPrayerButtons() {
            const now = new Date();
            const hours = now.getHours();

            // Sembunyikan semua tombol
            document.getElementById('duhaBtn').style.display = 'none';
            document.getElementById('dzuhurBtn').style.display = 'none';
            document.getElementById('asharBtn').style.display = 'none';

            // Menampilkan tombol berdasarkan jam
            if (hours >= 4 && hours < 12) {
                // Pagi hari (duha)
                document.getElementById('duhaBtn').style.display = 'inline-block';
            } else if (hours >= 12 && hours < 15) {
                // Siang hari (dzuhur)
                document.getElementById('dzuhurBtn').style.display = 'inline-block';
            } else if (hours >= 15 && hours < 18) {
                // Sore hari (ashar)
                document.getElementById('asharBtn').style.display = 'inline-block';
            }
        }

        // Jalankan fungsi untuk menampilkan tombol yang sesuai
        showPrayerButtons();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>