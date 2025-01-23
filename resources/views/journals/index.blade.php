<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Jurnal</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <div class="container mx-auto mt-5">
        <h1 class="text-center text-3xl font-medium title-font mb-4 text-gray-900">Daftar Jurnal PKL</h1>

        <!-- Pesan Sukses -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative max-w-md mx-auto mt-6" role="alert">
                <strong class="font-bold">Sukses!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Tabel Daftar Jurnal -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">#</th>
                        <th class="py-2 px-4 border-b">Nama</th>
                        <th class="py-2 px-4 border-b">Tanggal</th>
                        <th class="py-2 px-4 border-b">Uraian Konsentrasi</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($journals->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center py-4">Tidak ada data jurnal.</td>
                        </tr>
                    @else
                        @foreach ($journals as $journal)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                                <td class="py-2 px-4 border-b">{{ $journal->nama }}</td>
                                <td class="py-2 px-4 border-b">{{ $journal->tanggal }}</td>
                                <td class="py-2 px-4 border-b">{{ $journal->uraian_konsentrasi }}</td>
                                <td class="py-2 px-4 border-b">
                                    <a href="{{ route('journals.edit', $journal->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                    <form action="{{ route('journals.destroy', $journal->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 ml-2">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('journals.create') }}" class="text-indigo-500 hover:text-indigo-700">Tambah Jurnal</a>
        </div>
    </div>

</body>
</html>