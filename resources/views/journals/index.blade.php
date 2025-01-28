<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Jurnal PKL</title>
    @vite('resources/css/app.css')
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 16px;
            margin: 10px 0;
            background-color: #f9f9f9;
            transition: box-shadow 0.3s;
        }
        .card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .card-content {
            margin: 10px 0;
        }
        .btn {
            background-color: #4f46e5;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #4338ca;
        }
        .dropdown-content {
            display: none; /* Sembunyikan dropdown secara default */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 10px;
            background-color: #fff;
        }
    </style>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto mt-5">
        <h1 class="text-center text-3xl font-medium title-font mb-4 text-gray-900">Daftar Jurnal PKL</h1>

        <!-- Filter Tanggal Mingguan -->
        <div class="container mx-auto px-4 mb-6">
            <form method="GET" action="{{ route('journals.index') }}" class="flex items-center">
                <label for="week" class="mr-2 font-semibold text-gray-700">Pilih Minggu:</label>
                <input type="week" id="week" name="week" class="border rounded-lg p-2"
                    value="{{ request('week', \Carbon\Carbon::now()->format('Y-\WW')) }}">
                <button type="submit" class="ml-4 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                    Tampilkan
                </button>
            </form>
            <p class="mt-2 text-gray-600">
                Menampilkan data dari {{ $startOfWeek->format('d M Y') }} hingga {{ $endOfWeek->format('d M Y') }}
            </p>
        </div>

        <!-- Pesan Sukses -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative max-w-md mx-auto mt-6" role="alert">
                <strong class="font-bold">Sukses!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Tabel Daftar Jurnal -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">#</th>
                        <th class="py-2 px-4 border-b">Nama</th>
                        <th class="py-2 px-4 border-b">Tanggal</th>
                        <th class="py-2 px-4 border-b">Uraian Konsentrasi</th>
                        <th class="py-2 px-4 border-b">Kelas</th>
                        <th class="py-2 px-4 border-b">NIK</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($journals->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center py-4">Tidak ada data jurnal.</td>
                        </tr>
                    @else
                        @foreach ($journals as $journal)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                                <td class="py-2 px-4 border-b">{{ $journal->nama }}</td>
                                <td class="py-2 px-4 border-b">{{ $journal->tanggal }}</td>
                                <td class="py-2 px-4 border-b">{{ $journal->uraian_konsentrasi }}</td>
                                <td class="py-2 px-4 border-b">{{ $journal->kelas }}</td>
                                <td class="py-2 px-4 border-b">{{ $journal->nik }}</td>
                                <td class="py-2 px-4 border-b">
                                    <a href="{{ route('journals.edit', $journal->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                    <form action="{{ route('journals.destroy', $journal->id) }}" method="POST" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 ml-2">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('journals.create') }}" class="text-indigo-500 hover:text-indigo-700">Tambah Jurnal</a>
        </div>

        <!-- Panel untuk Menampilkan Histori dalam Bentuk Kartu -->
        <div class="mt-6">
            <h2 class="text-xl font-semibold">Histori Jurnal</h2>
            @if ($histories->isEmpty())
                <p>Tidak ada histori jurnal.</p>
            @else
                @foreach ($histories as $history)
                    <div class="card">
                        <div class="card-title">Jurnal:{{ $history->journal_id }}</div>
                        <div class="card-content">
                            <p>Aksi: {{ $history->action }}</p>
                            <p>Tanggal Aksi: {{ $history->created_at }}</p>
                        </div>
                        <button class="btn" onclick="toggleDropdown(this)">Lihat Selengkapnya</button>
                        <div class="dropdown-content">
                            <h3 class="font-semibold">Detail Aksi:</h3>
                            <ul>
                                <li><strong>Nama:</strong> {{ json_decode($history->changes)->nama }}</li>
                                <li><strong>Tanggal:</strong> {{ json_decode($history->changes)->tanggal }}</li>
                                <li><strong>Kelas:</strong> {{ json_decode($history->changes)->kelas }}</li>
                                <li><strong>NIK:</strong> {{ json_decode($history->changes)->nik }}</li>
                                <li><strong>Uraian Konsentrasi:</strong> {{ json_decode($history->changes)->uraian_konsentrasi }}</li>
                            </ul>
                            <p><strong>Waktu Aksi:</strong> {{ $history->created_at->format('d-m-Y H:i:s') }}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <script>
        function toggleDropdown(button) {
            const dropdown = button.nextElementSibling;
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        }
    </script>
</body>
</html>
