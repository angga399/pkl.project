<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengambilan Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
            z-index: 50;
        }
        .modal img {
            max-width: 95%;
            max-height: 95%;
            border-radius: 0.5rem;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            @include('sidebar')
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-5">
            <h1 class="text-2xl font-bold mb-5">Daftar Pengambilan Foto</h1>

            <!-- Pesan Sukses -->
            @if (session('success'))
                <div class="bg-green-200 text-green-800 p-3 rounded mb-5">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tombol Filter Jenis Shalat -->
            <div class="mb-4">
                <a href="{{ route('daftarhdr.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-5 inline-block mr-2">Ambil Foto Baru</a>
                <div>
                    <form method="GET" action="{{ route('daftarhdr.index') }}" class="flex items-center">
                        <label for="week" class="mr-2 font-semibold text-gray-700">Pilih Minggu:</label>
                        <input type="week" id="week" name="week" class="border rounded-lg p-2" 
                               value="{{ request('week', \Carbon\Carbon::now()->format('Y-\WW')) }}">
                        <button type="submit" class="ml-4 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                            Tampilkan
                        </button>
                    </form>
                </div>
                <p class="mt-2 text-gray-600">
                    Menampilkan data dari {{ $startOfWeek->format('d M Y') }} hingga {{ $endOfWeek->format('d M Y') }}
                </p>
            </div>

            <!-- Table Section -->
            <section class="container mx-auto px-4 mt-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tabel Absen Datang -->
                    <div class="bg-white p-4 rounded-lg shadow">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Absen Datang</h2>
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border">Foto</th>
                                    <th class="px-4 py-2 border">Hari</th>
                                    <th class="px-4 py-2 border">Tanggal</th>
                                    <th class="px-4 py-2 border">Lokasi</th>
                                    <th class="px-4 py-2 border">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($daftarhdrs as $item)
                                    @if ($item->tipe === 'datang')
                                    <tr>
                                        <td class="px-4 py-2 border">
                                            <img src="{{ $item->dataGambar }}" alt="Foto" class="w-16 h-16 object-cover rounded-md cursor-pointer" onclick="showModal(this)">
                                        </td>
                                        <td class="px-4 py-2 border">{{ $item->hari }}</td>
                                        <td class="px-4 py-2 border">{{ $item->tanggal }}</td>
                                        <td class="px-4 py-2 border">
                                            <a href="https://www.google.com/maps?q={{ $item->latitude }},{{ $item->longitude }}" target="_blank" class="text-blue-500 underline">Lihat Lokasi</a>
                                        </td>
                                        <td class="px-4 py-2 border">{{ $item->status }}</td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Tabel Absen Pulang -->
                    <div class="bg-white p-4 rounded-lg shadow">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Absen Pulang</h2>
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border">Foto</th>
                                    <th class="px-4 py-2 border">Hari</th>
                                    <th class="px-4 py-2 border">Tanggal</th>
                                    <th class="px-4 py-2 border">Lokasi</th>
                                    <th class="px-4 py-2 border">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($daftarhdrs as $item)
                                    @if ($item->tipe === 'pulang')
                                    <tr>
                                        <td class="px-4 py-2 border">
                                            <img src="{{ $item->dataGambar }}" alt="Foto" class="w-16 h-16 object-cover rounded-md cursor-pointer" onclick="showModal(this)">
                                        </td>
                                        <td class="px-4 py-2 border">{{ $item->hari }}</td>
                                        <td class="px-4 py-2 border">{{ $item->tanggal }}</td>
                                        <td class="px-4 py-2 border">
                                            <a href="https://www.google.com/maps?q={{ $item->latitude }},{{ $item->longitude }}" target="_blank" class="text-blue-500 underline">Lihat Lokasi</a>
                                        </td>
                                        <td class="px-4 py-2 border">{{ $item->status }}</td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Modal untuk Zoom Gambar -->
    <div id="imageModal" class="modal flex">
        <span class="absolute top-4 right-4 text-white text-3xl cursor-pointer" onclick="hideModal()">&times;</span>
        <img id="modalImage" src="" alt="Zoomed Foto">
    </div>

    <script>
        function showModal(img) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            modalImage.src = img.src;
            modal.style.display = 'flex';
        }

        function hideModal() {
            const modal = document.getElementById('imageModal');
            modal.style.display = 'none';
        }
    </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>