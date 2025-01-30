<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal Kegiatan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }
    </script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
           <div class="sidebar" style="width: 250px; background-color: #343a40;">
            @include('sidebar')
        </div>
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <div class="bg-white py-4 px-6 shadow-md flex justify-between items-center">
                <button class="text-lg font-bold md:hidden" onclick="toggleSidebar()">☰</button>
                <div class="text-center font-bold text-lg flex-1">JOURNAL KEGIATAN</div>
            </div>
            
            <!-- Buttons & Filters -->
            <div class="p-6 flex flex-col md:flex-row items-center gap-4">
                <button class="bg-gray-500 text-white px-4 py-2 rounded">Tambah Jurnal</button>
                <div>
                    <form method="GET" action="{{ route('journals.index') }}">
                        <button type="submit" class="ml-4 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                            minggu
                        </button>
                        <input type="week" id="week" name="week" class="border rounded-lg p-2"
                        value="{{ request('week', \Carbon\Carbon::now()->format('Y-\WW')) }}">
                    </form>
                </div>
                <p>histori perminggu</p>
            </div>

            <!-- Table Section -->
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-400">
                        <thead class="bg-gray-300">
                            <tr class="text-black">
                                <th class="border px-4 py-2 ">No</th>
                                <th class="border px-4 py-2 ">Nama</th>
                                <th class="border px-4 py-2 ">Tanggal</th>
                                <th class="border px-4 py-2 ">Uraian</th>
                                <th class="border px-4 py-2 ">Jurusan</th>
                                <th class="border px-4 py-2 ">NIK</th>
                                <th class="border px-4 py-2 ">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-600">
                            @if ($journals->isEmpty())
                            <tr>
                                <td colspan="7" class="text-center py-4 text-white">Tidak ada data jurnal.</td>
                            </tr>
                            @else
                                @foreach ($journals as $journal)
                                    <tr class="text-white">
                                        <th class="py-2 px-4 border-b">{{ $loop->iteration }}</th>
                                        <th class="py-2 px-4 border-b">{{ $journal->nama }}</th>
                                        <th class="py-2 px-4 border-b">{{ $journal->tanggal }}</th>
                                        <th class="py-2 px-4 border-b">{{ $journal->uraian_konsentrasi }}</th>
                                        <th class="py-2 px-4 border-b">{{ $journal->kelas }}</th>
                                        <th class="py-2 px-4 border-b">{{ $journal->nik }}</th>
                                        <th class="py-2 px-4 border-b">{{ $journal->status }}</th>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- History Panel -->
            <div class="p-6">
                <h2 class="text-lg font-semibold">Histori Jurnal</h2>
                <div class="border border-gray-400 rounded p-4 bg-gray-200 mt-2">
                    <table class="w-full border-collapse border border-gray-400">
                        <thead class="bg-gray-300">
                            <tr class="text-black">
                                <th class="border px-2 py-1 ">No</th>
                                <th class="border px-2 py-1 ">Nama</th>
                                <th class="border px-2 py-1 ">Tanggal</th>
                                <th class="border px-2 py-1 ">Uraian</th>
                                <th class="border px-2 py-1 ">Jurusan</th>
                                <th class="border px-2 py-1 ">NIK</th>
                                <th class="border px-2 py-1 ">Tanggal Lengkap</th>
                                <th class="border px-2 py-1 ">Status</ </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($histories->isEmpty())
                            <tr>
                                <td colspan="8" class="text-center py-4 text-white">Tidak ada histori jurnal.</td>
                            </tr>
                            @else
                                @foreach ($histories as $history)
                                <tr class="text-black">
                                    <th class="border px-2 py-1">{{ $history->journal_id }}</th>
                                    <th class="border px-2 py-1">{{ json_decode($history->changes)->nama }}</th>
                                    <th class="border px-2 py-1">{{ json_decode($history->changes)->tanggal }}</th>
                                    <th class="border px-2 py-1">{{ json_decode($history->changes)->uraian_konsentrasi }}</th>
                                    <th class="border px-2 py-1">{{ json_decode($history->changes)->kelas }}</th>
                                    <th class="border px-2 py-1">{{ json_decode($history->changes)->nik }}</th>
                                    <th class="border px-2 py-1">{{ $history->created_at }}</th>
                                    <th class="border px-2 py-1">{{ $journal->status }}</th>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center py-4 text-sm">footer</div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>