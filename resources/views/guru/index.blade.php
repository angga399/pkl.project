<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengambilan Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 py-10">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Data Daftar HDR</h2>
        
        <!-- Tabel Absen Datang -->
        <h3 class="text-xl font-semibold text-gray-800 mb-3">Absen Datang</h3>
        <table class="min-w-full bg-white border border-gray-200 mb-6">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Hari</th>
                    <th class="px-4 py-2 border">Tanggal</th>
                    <th class="px-4 py-2 border">link kordinat</th>
                    <th class="px-4 py-2 border">Gambar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarhdrs as $key => $data)
                    @if ($data->tipe === 'datang')
                    <tr>
                        <td class="px-4 py-2 border">{{ $key + 1 }}</td>
                        <td class="px-4 py-2 border">{{ $data->hari }}</td>
                        <td class="px-4 py-2 border">{{ $data->tanggal }}</td>
                        <td class="px-4 py-2 border">
                            <a href="https://www.google.com/maps?q={{ $data->latitude }},{{ $data->longitude }}" target="_blank" class="text-blue-500 underline">Lihat Lokasi</a>
                        </td>
                        <td class="px-4 py-2 border">
                            @if ($data->dataGambar)
                                <img src= "{{$data->dataGambar}}" width="100" class="rounded-md">
                            @else
                                Tidak ada gambar
                            @endif
                        </td>
                        <td class="px-4 py-2 border">{{ $data->notes ?? '-' }}</td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <!-- Tabel Absen Pulang -->
        <h3 class="text-xl font-semibold text-gray-800 mb-3">Absen Pulang</h3>
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Hari</th>
                    <th class="px-4 py-2 border">Tanggal</th>
                    <th class="px-4 py-2 border">link kordinat</th>
                    <th class="px-4 py-2 border">Gambar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarhdrs as $key => $data)
                    @if ($data->tipe === 'pulang')
                    <tr>
                        <td class="px-4 py-2 border">{{ $key + 1 }}</td>
                        <td class="px-4 py-2 border">{{ $data->hari }}</td>
                        <td class="px-4 py-2 border">{{ $data->tanggal }}</td>
                        <td class="px-4 py-2 border">
                            <a href="https://www.google.com/maps?q={{ $data->latitude }},{{ $data->longitude }}" target="_blank" class="text-blue-500 underline">Lihat Lokasi</a>
                        </td>
                        <td class="px-4 py-2 border">
                            @if ($data->dataGambar)
                                <img src= "{{$data->dataGambar}}" width="100" class="rounded-md">
                            @else
                                Tidak ada gambar
                            @endif
                        </td>
                        <td class="px-4 py-2 border">{{ $data->notes ?? '-' }}</td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
