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


    <div class="container mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($daftarhdrs as $item)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="relative">
                    <img src="{{ $item->dataGambar }}" alt="Foto" class="w-full h-56 object-cover rounded-t-lg">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black via-transparent p-4">
                        <h2 class="text-lg font-medium text-white">{{ $item->hari }} - {{ $item->tanggal }}</h2>
                    </div>
                </div>

<<<<<<< Updated upstream
                <div class="text-center">
                    <div class="text-center">
                        @if($item->status)
                            <!-- Jika sudah ada status, tampilkan status -->
                          
                            <!-- Jika status belum ada, tampilkan tombol Setuju dan Tolak -->
                            <div class="flex justify-around mt-4">
                                <!-- Setujui Form -->
                                <form action="{{ route('pembimbing.approve', $item->id) }}" method="POST">
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
=======
                <div class="p-4">
                    <!-- Jika sudah ada status, tampilkan status -->
                    @if($item->status)
                        <div class="text-lg font-semibold text-gray-700">
                            Status: <span class="text-green-500">{{ $item->status }}</span>
                        </div>
                    @else
                        <!-- Jika status belum ada, tampilkan tombol Setuju dan Tolak -->
                        <div class="flex justify-between mt-4">
                            <!-- Setujui Form -->
                            <form action="{{ route('pembimbing.aprove', $item->id) }}" method="POST" class="w-full">
                                @csrf
                                <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-md w-full hover:bg-green-600 focus:outline-none transition">
                                    Setuju
                                </button>
                            </form>

                            <!-- Tolak Form -->
                            <form action="{{ route('pembimbing.reject', $item->id) }}" method="POST" class="w-full">
                                @csrf
                                <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded-md w-full hover:bg-red-600 focus:outline-none transition">
                                    Tolak
                                </button>
                            </form>
                        </div>
                    @endif
>>>>>>> Stashed changes
                </div>
            </div>
        @endforeach
    </div>

</body>
</html>
