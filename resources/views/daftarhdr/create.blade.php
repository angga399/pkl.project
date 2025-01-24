<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengambilan Foto dengan Lokasi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex flex-col items-center bg-gray-100 py-10">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Pengambilan Foto dengan Lokasi</h1>

    <div class="flex flex-col space-y-4">
        <a href="{{ route('absen.datang') }}" class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50">Absen Datang</a>
        <a href="{{ route('absen.pulang') }}" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">Absen Pulang</a>
    </div>
</body>
</html>