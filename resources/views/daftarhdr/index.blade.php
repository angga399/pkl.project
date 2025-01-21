<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengambilan Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 py-10">

    <div class="flex justify-center mb-4">
        <x-back></x-back>
    </div>

    <section class="container mx-auto px-4 mt-10">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Daftar Pengambilan Foto</h1>

        <!-- Link to go back to the photo capture page -->
        <div class="mt-6 mb-4">
            <a href="{{ route('daftarhdr.create') }}" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Ambil Foto Baru</a>
        </div>

        <!-- Table Daftar Foto -->
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Foto</th>
                    <th class="px-4 py-2 border">Hari</th>
                    <th class="px-4 py-2 border">Tanggal</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Lokasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarhdrs as $item)
                <tr>
                    <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border">
                        <a href="#" data-toggle="modal" data-target="#fotoModal{{ $item->id }}">
                            <img src="{{ $item->dataGambar }}" alt="Foto" class="w-16 h-16 object-cover rounded-md">
                        </a>
                    </td>
                    <td class="px-4 py-2 border">{{ $item->hari }}</td>
                    <td class="px-4 py-2 border">{{ $item->tanggal }}</td>
                    <td class="px-4 py-2 border">{{ $item->status }}</td>
                    <td class="px-4 py-2 border">
                        @if($item->latitude && $item->longitude)
                            <a href="https://www.google.com/maps?q={{ $item->latitude }},{{ $item->longitude }}" target="_blank" class="text-blue-500 underline">Lihat Lokasi</a>
                        @else
                            Tidak tersedia
                        @endif
                    </td>
                </tr>

                <!-- Modal untuk Foto Besar -->
                <div class="modal fade" id="fotoModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="fotoModalLabel{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="fotoModalLabel{{ $item->id }}">Foto Besar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ $item->dataGambar }}" alt="Foto Besar" class="w-full">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </section>

    <!-- Tambahkan JS untuk modal (Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
