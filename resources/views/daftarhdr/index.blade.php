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
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Daftar Pengambilan Foto</h1>

        <!-- Tabel Daftar Foto -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b">#</th>
                        <th class="px-4 py-2 border-b">Hari</th>
                        <th class="px-4 py-2 border-b">Tanggal</th>
                        <th class="px-4 py-2 border-b">Latitude</th>
                        <th class="px-4 py-2 border-b">Longitude</th>
                        <th class="px-4 py-2 border-b">Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($daftarhdrs as $index => $item)
                    <tr>
                        <td class="px-4 py-2 border-b text-center">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ $item->hari }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ $item->tanggal }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ $item->latitude }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ $item->longitude }}</td>
                        <td class="px-4 py-2 border-b text-center">
                            <img src="{{ $item->dataGambar }}" alt="Foto" class="w-20 h-20 object-cover rounded-md">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Link to go back to the photo capture page -->
        <div class="mt-6">
            <a href="{{ route('daftarhdr.create') }}" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Ambil Foto Baru</a>
        </div>
    </div>
</body>
</html>
