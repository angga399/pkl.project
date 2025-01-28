<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengambilan Foto - Persetujuan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 py-10">

    <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Halaman Persetujuan</h1>
    @if(session('status'))
    <div class="bg-green-200 text-green-700 px-4 py-2 rounded mb-4">
        {{ session('status') }}
    </div>
    @endif

    <div class="container mx-auto px-4 mb-6">
        <!-- Filter Tanggal Mingguan -->
        <form method="GET" action="{{ route('pembimbing.approvals') }}" class="flex items-center">
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

    <div class="container mx-auto px-4">
        <!-- Bagian Absen Datang -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Absen Datang</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-600">
                        <th class="py-3 px-4 border-b border-gray-300">Foto</th>
                        <th class="py-3 px-4 border-b border-gray-300">Tanggal</th>
                        <th class="py-3 px-4 border-b border-gray-300">Hari</th>
                        <th class="py-3 px-4 border-b border-gray-300">Status</th>
                        <th class="py-3 px-4 border-b border-gray-300">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftarhdrs as $item)
                        @if ($item->tipe === 'datang')
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border-b border-gray-300">
                                    <img src="{{ $item->dataGambar }}" alt="Foto" class="w-20 h-20 object-cover rounded">
                                </td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $item->tanggal }}</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $item->hari }}</td>
                                <td class="py-2 px-4 border-b border-gray-300">
                                    @if ($item->status === 'Disetujui')
                                        <span class="text-green-500 font-bold">Disetujui</span>
                                    @elseif ($item->status === 'Ditolak')
                                        <span class="text-red-500 font-bold">Ditolak</span>
                                    @else
                                        <span class="text-yellow-500 font-bold">Menunggu Persetujuan</span>
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b border-gray-300">
                                    @if ($item->status === 'Menunggu Persetujuan')
                                        <!-- Setujui Form -->
                                        <form action="{{ route('pembimbing.approve', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="bg-green-500 text-white px-4 py-1 rounded-md">
                                                Setuju
                                            </button>
                                        </form>
                                      
                                        <!-- Tolak Form -->
                                        <form action="{{ route('pembimbing.reject', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded-md">
                                                Tolak
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Bagian Absen Pulang -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-4 mt-10">Absen Pulang</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-600">
                        <th class="py-3 px-4 border-b border-gray-300">Foto</th>
                        <th class="py-3 px-4 border-b border-gray-300">Tanggal</th>
                        <th class="py-3 px-4 border-b border-gray-300">Hari</th>
                        <th class="py-3 px-4 border-b border-gray-300">Status</th>
                        <th class="py-3 px-4 border-b border-gray-300">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftarhdrs as $item)
                        @if ($item->tipe === 'pulang')
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border-b border-gray-300">
                                    <img src="{{ $item->dataGambar }}" alt="Foto" class="w-20 h-20 object-cover rounded">
                                </td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $item->tanggal }}</td>
                                <td class="py-2 px-4 border-b border-gray-300">{{ $item->hari }}</td>
                                <td class="py-2 px-4 border-b border-gray-300">
                                    @if ($item->status === 'Disetujui')
                                        <span class="text-green-500 font-bold">Disetujui</span>
                                    @elseif ($item->status === 'Ditolak')
                                        <span class="text-red-500 font-bold">Ditolak</span>
                                    @else
                                        <span class="text-yellow-500 font-bold">Menunggu Persetujuan</span>
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b border-gray-300">
                                    @if ($item->status === 'Menunggu Persetujuan')
                                        <!-- Setujui Form -->
                                        <form action="{{ route('pembimbing.approve', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="bg-green-500 text-white px-4 py-1 rounded-md">
                                                Setuju
                                            </button>
                                        </form>
                                      
                                        <!-- Tolak Form -->
                                        <form action="{{ route('pembimbing.reject', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded-md">
                                                Tolak
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
