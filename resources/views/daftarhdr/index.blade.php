<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengambilan Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 py-10">

    <div class="flex justify-center mb-4">
        <a href="{{ route('daftarhdr.create') }}" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Ambil Foto Baru</a>
    </div>

    <section class="container mx-auto px-4 mt-10">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Daftar Pengambilan Foto</h1>

        <!-- Tabel Absen Datang -->
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Absen Datang</h2>
        <table class="min-w-full bg-white border border-gray-200 mb-6">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Foto</th>
                    <th class="px-4 py-2 border">Hari</th>
                    <th class="px-4 py-2 border">Tanggal</th>
                    <th class="px-4 py-2 border">Lokasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarhdrs as $item)
                    @if ($item->tipe === 'datang')
                    <tr>
                        <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 border">
                            <img src="{{ $item->dataGambar }}" alt="Foto" class="w-16 h-16 object-cover rounded-md">
                        </td>
                        <td class="px-4 py-2 border">{{ $item->hari }}</td>
                        <td class="px-4 py-2 border">{{ $item->tanggal }}</td>
                        <td class="px-4 py-2 border">
                            <a href="https://www.google.com/maps?q={{ $item->latitude }},{{ $item->longitude }}" target="_blank" class="text-blue-500 underline">Lihat Lokasi</a>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <!-- Tabel Absen Pulang -->
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Absen Pulang</h2>
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Foto</th>
                    <th class="px-4 py-2 border">Hari</th>
                    <th class="px-4 py-2 border">Tanggal</th>
                    <th class="px-4 py-2 border">Lokasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarhdrs as $item)
                    @if ($item->tipe === 'pulang')
                    <tr>
                        <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 border">
                            <img src="{{ $item->dataGambar }}" alt="Foto" class="w-16 h-16 object-cover rounded-md">
                        </td>
                        <td class="px-4 py-2 border">{{ $item->hari }}</td>
                        <td class="px-4 py-2 border">{{ $item->tanggal }}</td>
                        <td class="px-4 py-2 border">
                            <a href="https://www.google.com/maps?q={{ $item->latitude }},{{ $item->longitude }}" target="_blank" class="text-blue-500 underline">Lihat Lokasi</a>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </section>
</body>
</html>