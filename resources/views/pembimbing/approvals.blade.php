<!-- resources/views/pembimbingd/index.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengambilan Foto - Persetujuan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 py-10">

    <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Halaman Persetujuan</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="bg-red-200 text-red-700 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="container mx-auto px-4">
        @foreach ($daftarhdrs as $item)
            <div class="flex justify-between border-b border-gray-300 py-4">
                <div>
                    <h2 class="text-lg font-medium">{{ $item->hari }} - {{ $item->tanggal }}</h2>
                    <img src="{{ $item->dataGambar }}" alt="Foto" class="w-32 h-32 object-cover rounded-md">
                </div>
                <div class="flex flex-col justify-between">
                <form action="{{ route('pembimbing.approve', $item->id) }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded">Setuju</button>
</form>

<form action="{{ route('pembimbing.reject', $item->id) }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded">Tolak</button>
</form>

                    
                </div>
            </div>
        @endforeach
    </div>

</body>
</html>
