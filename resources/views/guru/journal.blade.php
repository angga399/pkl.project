<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jurnal Guru</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
<div class="container mx-auto mt-5">
    <h1 class="text-center text-3xl font-medium title-font mb-4 text-gray-900">Data Jurnal Guru</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">#</th>
                    <th class="py-2 px-4 border-b">Nama</th>
                    <th class="py-2 px-4 border-b">Tanggal</th>
                    <th class="py-2 px-4 border-b">Uraian Konsentrasi</th>
                    <th class="py-2 px-4 border-b">Kelas</th>
                    <th class="py-2 px-4 border-b">NIK</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($journals as $index => $journal)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                        <td class="py-2 px-4 border-b">{{ $journal->nama }}</td>
                        <td class="py-2 px-4 border-b">{{ $journal->tanggal }}</td>
                        <td class="py-2 px-4 border-b">{{ $journal->uraian_konsentrasi }}</td>
                        <td class="py-2 px-4 border-b">{{ $journal->kelas }}</td>
                        <td class="py-2 px-4 border-b">{{ $journal->nik }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">Tidak ada data jurnal.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
