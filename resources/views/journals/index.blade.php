<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Jurnal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6 text-center">Daftar Jurnal</h1>
        <div class="mb-4 text-center">
            <a href="{{ route('journals.create') }}" class="bg-indigo-500 text-white py-2 px-4 rounded hover:bg-indigo-600">Tambah Jurnal</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($journals as $journal)
            <div class="bg-white border border-gray-200 rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105 hover:shadow-xl p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{ $journal->judul_jurnal }}</h2>
                
                <div class="text-gray-600 space-y-2">
                    <p><span class="font-medium">Tanggal:</span> {{ $journal->tanggal }}</p>
                    <p><span class="font-medium">Nama:</span> {{ $journal->nama }}</p>
                    <p><span class="font-medium">Paraf:</span> {{ $journal->paraf }}</p>
                    <p><span class="font-medium">Keterangan:</span> {{ $journal->keterangan }}</p>
                </div>
        
                <div class="flex justify-between items-center mt-6">
                    <a href="{{ route('journals.edit', $journal->id) }}" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition-colors">Edit</a>
                    <form action="{{ route('journals.destroy', $journal->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition-colors">Hapus</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        
    </div>
</body>
</html>
