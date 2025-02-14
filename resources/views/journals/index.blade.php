<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal Kegiatan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    @vite('resources/css/app.css')
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
        }
    </script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <div class="sidebar" style="width: 250px; background-color: #343a40;">
            @include('sidebar')
        </div>
        <div class="flex-1 flex flex-col">
            <div class="bg-white py-4 px-6 shadow-md flex justify-between items-center">
                <button class="text-lg font-bold md:hidden" onclick="toggleSidebar()">☰</button>
                <div class="text-center font-bold text-lg flex-1">JOURNAL KEGIATAN</div>
            </div>
            <div class="p-6 flex flex-col md:flex-row items-center gap-4">
                <a class="bg-gray-500 text-white px-4 py-2 rounded" href="{{route('journals.create')}}">Tambah Jurnal</a>
                <form method="GET" action="{{ route('journals.index') }}">
                    <button type="submit" class="ml-4 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">Minggu</button>
                    <input type="week" id="week" name="week" class="border rounded-lg p-2" value="{{ request('week', \Carbon\Carbon::now()->format('Y-\WW')) }}">
                </form>
                <p>Histori Perminggu</p>
            </div>
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-400">
                        <thead class="bg-gray-300">
                            <tr class="text-black">
                                <th class="border px-4 py-2">No</th>
                                <th class="border px-4 py-2">Nama</th>
                                <th class="border px-4 py-2">Tanggal</th>
                                <th class="border px-4 py-2">Uraian</th>
                                <th class="border px-4 py-2">Jurusan</th>
                                <th class="border px-4 py-2">Nik</th>
                                <th class="border px-4 py-2">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-600">
                            @forelse ($journals as $journal)
                                <tr class="text-white">
                                    <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                                    <td class="py-2 px-4 border-b">{{ $journal->nama }}</td>
                                    <td class="py-2 px-4 border-b">{{ $journal->tanggal }}</td>
                                    <td class="py-2 px-4 border-b">{{ $journal->uraian_konsentrasi }}</td>
                                    <td class="py-2 px-4 border-b">{{ $journal->kelas }}</td>
                                    <td class="py-2 px-4 border-b">{{ Auth::user()->nik }}</td>
                                    <td class="py-2 px-4 border-b">{{ $journal->status }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-white">Tidak ada data jurnal.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="p-6">
                <h2 class="text-lg font-semibold">Histori Jurnal</h2>
                <div class="border border-gray-400 rounded p-4 bg-gray-200 mt-2">
                    <table class="w-full border-collapse border border-gray-400">
                        <thead class="bg-gray-300">
                            <tr class="text-black">
                                <th class="border px-2 py-1">No</th>
                                <th class="border px-2 py-1">Nama</th>
                                <th class="border px-2 py-1">Tanggal</th>
                                <th class="border px-2 py-1">Uraian</th>
                                <th class="border px-2 py-1">Jurusan</th>
                                <th class="border px-2 py-1">NIK</th>
                                <th class="border px-2 py-1">Tanggal Lengkap</th>
                                <th class="border px-2 py-1">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($histories as $history)
                                @php $changes = json_decode($history->changes); @endphp
                                <tr class="text-black">
                                    <td class="border px-2 py-1">{{ $history->journal_id }}</td>
                                    <td class="border px-2 py-1">{{ Auth::user()->full_name }}</td>
                                    <td class="border px-2 py-1">{{ $changes->tanggal }}</td>
                                    <td class="border px-2 py-1">{{ $changes->uraian_konsentrasi }}</td>
                                    <td class="border px-2 py-1">{{ Auth::user()->major }}</td>
                                    <td class="border px-2 py-1">{{ Auth::user()->nik }}</td>
                                    <td class="border px-2 py-1">{{ $history->created_at }}</td>
                                    <td class="border px-2 py-1">{{ $journal->status }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4 text-black">Tidak ada histori jurnal.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-center py-4 text-sm">Footer</div>
        </div>
    </div>
    <x-back>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</x-back>
</body>
</html>
