<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Waktu Shalat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body>
<div class="container mx-auto mt-5">
    <h1 class="text-2xl font-bold mb-5">Daftar Waktu Shalat</h1>

    <!-- Pesan Sukses -->
    @if (session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-5">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Filter Jenis Shalat -->
    <div class="mb-4">
        <a href="{{ route('dftrshalats.create', ['jenis' => 'duha']) }}" id="duhaBtn" class="bg-cyan-500 text-white px-4 py-2 rounded mb-5 inline-block mr-2" style="display: none;">Tambah Waktu Shalat Duha</a>
        <a href="{{ route('dftrshalats.create', ['jenis' => 'dzuhur']) }}" id="dzuhurBtn" class="bg-yellow-400 text-white px-4 py-2 rounded mb-5 inline-block mr-2" style="display: none;">Tambah Waktu Shalat Dzuhur</a>
        <a href="{{ route('dftrshalats.create', ['jenis' => 'ashar']) }}" id="asharBtn" class="bg-orange-500 text-white px-4 py-2 rounded mb-5 inline-block mr-2" style="display: none;">Tambah Waktu Shalat Ashar</a>
    </div>


    <form method="GET" action="{{ route('dftrshalats.index') }}" class="flex items-center">
        <label for="week" class="mr-2 font-semibold text-gray-700">Pilih Minggu:</label>
        <input type="week" id="week" name="week" class="border rounded-lg p-2" 
               value="{{ request('week', \Carbon\Carbon::now()->format('Y-\WW')) }}">
        <button type="submit" class="ml-4 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
            Tampilkan
        </button>
    </form>
    
    <!-- Tabel Shalat Duha -->
    <div class="mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Waktu Shalat Duha</h2>
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">No</th>
                    <th class="border border-gray-300 px-4 py-2">Jenis</th>
                    <th class="border border-gray-300 px-4 py-2">Tanggal</th>
                    <th class="border border-gray-300 px-4 py-2">Hari</th>
                    <th class="border border-gray-300 px-4 py-2">Waktu</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dftrshalats->where('jenis', 'Duha') as $index => $shalat)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ ucfirst($shalat->jenis) }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $shalat->tanggal }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $shalat->hari }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $shalat->waktu }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ ucfirst($shalat->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tabel Shalat Dzuhur -->
    <div class="mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Waktu Shalat Dzuhur</h2>
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">No</th>
                    <th class="border border-gray-300 px-4 py-2">Jenis</th>
                    <th class="border border-gray-300 px-4 py-2">Tanggal</th>
                    <th class="border border-gray-300 px-4 py-2">Hari</th>
                    <th class="border border-gray-300 px-4 py-2">Waktu</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dftrshalats->where('jenis','Dzuhur') as $index => $shalat)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ ucfirst($shalat->jenis) }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $shalat->tanggal }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $shalat->hari }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $shalat->waktu }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ ucfirst($shalat->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tabel Shalat Ashar -->
    <div class="mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Waktu Shalat Ashar</h2>
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">No</th>
                    <th class="border border-gray-300 px-4 py-2">Jenis</th>
                    <th class="border border-gray-300 px-4 py-2">Tanggal</th>
                    <th class="border border-gray-300 px-4 py-2">Hari</th>
                    <th class="border border-gray-300 px-4 py-2">Waktu</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dftrshalats->where('jenis', 'Ashar') as $index => $shalat)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ ucfirst($shalat->jenis) }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $shalat->tanggal }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $shalat->hari }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $shalat->waktu }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ ucfirst($shalat->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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

</body>
</html>