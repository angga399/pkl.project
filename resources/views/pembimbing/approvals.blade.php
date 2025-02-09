<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengambilan Foto - Persetujuan</title>
</head>
<body>

    <h1>Halaman Persetujuan</h1>

    <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Halaman Persetujuan</h1>

    <div>
        <!-- Filter Tanggal Mingguan -->
        <form method="GET" action="{{ route('pembimbing.approvals') }}">
            <label for="week">Pilih Minggu:</label>
            <input type="week" id="week" name="week" value="{{ request('week', \Carbon\Carbon::now()->format('Y-\WW')) }}">
            <button type="submit">Tampilkan</button>
        </form>
        <p>
            Menampilkan data dari {{ $startOfWeek->format('d M Y') }} hingga {{ $endOfWeek->format('d M Y') }}
        </p>
    </div>

    <div>
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
                                    <!-- Setujui Form -->
                                    <form action="{{ route('pembimbing.approve', $item->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button 
                                            type="submit" 
                                            class="bg-green-500 text-white px-4 py-1 rounded-md hover:bg-green-600" 
                                            onclick="return confirm('Apakah Anda yakin ingin menyetujui item ini?')">
                                            Setuju
                                        </button>
                                    </form>
                                  
                                    <!-- Tolak Form -->
                                    <form action="{{ route('pembimbing.reject', $item->id) }}" method="POST" class="inline ml-2">
                                        @csrf
                                        <button 
                                            type="submit" 
                                            class="bg-red-500 text-white px-4 py-1 rounded-md hover:bg-red-600" 
                                            onclick="return confirm('Apakah Anda yakin ingin menolak item ini?')">
                                            Tolak
                                        </button>
                                    </form>
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

    <div>
        <!-- Bagian Absen Pulang -->
        <h2>Absen Pulang</h2>
        <table>
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Tanggal</th>
                    <th>Hari</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarhdrs as $item)
                    @if ($item->tipe === 'pulang')
                        <tr>
                            <td><img src="{{ $item->dataGambar }}" alt="Foto" width="50" height="50"></td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->hari }}</td>
                            <td>
                                @if ($item->status === 'Disetujui')
                                    Disetujui
                                @elseif ($item->status === 'Ditolak')
                                    Ditolak
                                @else
                                    Menunggu
                                @endif
                            </td>
                            <td>
                                @if (strtolower(trim($item->status)) === 'pending')
                                    <form action="{{ route('pembimbing.approve', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit">Setuju</button>
                                    </form>
                                    
                                    <form action="{{ route('pembimbing.reject', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit">Tolak</button>
                                    </form>
                                @else
                                    <p>Status: {{ $item->status }}</p>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
