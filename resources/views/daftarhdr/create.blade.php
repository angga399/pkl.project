<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengambilan Foto dengan Lokasi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-b from-gray-100 to-gray-300 py-10">
    <h1 class="text-4xl font-bold text-gray-800 mb-12 bg-white px-8 py-4 rounded-lg shadow-lg">Pengambilan Foto dengan Lokasi</h1>

    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-2 mt-6 max-w-4xl">
        <div class="p-8 bg-white rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-200">
            <a href="{{ route('absen.datang') }}" class="flex flex-col items-center">
                <div class="w-20 h-20 bg-green-500 text-white flex items-center justify-center rounded-full mb-6 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m2 0a2 2 0 01-2 2H9a2 2 0 01-2-2m6 0a2 2 0 012-2H9a2 2 0 00-2 2m8 0v6m-8-6v6" />
                    </svg>
                </div>
                <span class="text-xl font-semibold text-gray-700">Absen Datang</span>
            </a>
        </div>

        <div class="p-8 bg-white rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-200">
            <a href="{{ route('absen.pulang') }}" class="flex flex-col items-center">
                <div class="w-20 h-20 bg-blue-500 text-white flex items-center justify-center rounded-full mb-6 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m2 0a2 2 0 01-2 2H9a2 2 0 01-2-2m6 0a2 2 0 012-2H9a2 2 0 00-2 2m8 0v6m-8-6v6" />
                    </svg>
                </div>
                <span class="text-xl font-semibold text-gray-700">Absen Pulang</span>
            </a>
        </div>
    </div>
</body>
</html>
