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

    <div class="container mx-auto px-4">
        @foreach ($daftarhdrs as $item)
            <div class="bg-white shadow-lg rounded-lg p-4 mb-4">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h2 class="text-xl font-medium">{{ $item->hari }} - {{ $item->tanggal }}</h2>
                    </div>
                    <div>
                        <img src="{{ $item->dataGambar }}" alt="Foto" class="w-20 h-20 object-cover rounded-md">
                    </div>
                </div>

                <div class="text-center">
                    <!-- Jika sudah ada status, tampilkan status -->
                    @if($item->status)
                        <div class="text-lg font-semibold text-gray-700">
                            Status: <span class="text-green-500">{{ $item->status }}</span>
                        </div>
                    @else
                        <!-- Jika status belum ada, tampilkan tombol Setuju dan Tolak -->
                        <div class="flex justify-around mt-4">
                            <!-- Setujui Form -->
                            <form action="{{ route('pembimbing.aprove', $item->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md w-28">
                                    Setuju
                                </button>
                            </form>

                            <!-- Tolak Form -->
                            <form action="{{ route('pembimbing.reject', $item->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md w-28">
                                    Tolak
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

</body>
</html>
