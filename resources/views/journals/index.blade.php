<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Jurnal</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Konten Utama -->
        <div class="container mx-auto flex-grow">
            <h1 class="text-center text-3xl font-bold mb-6">Daftar Jurnal</h1>
            <div class="text-center mb-4">
                <a href="{{ route('journals.create') }}" class="text-indigo-500 hover:underline">Tambah Jurnal</a>
            </div>
            <a href="/welcome" class="text-blue-500 hover:underline">Back</a>
            <!-- Card Jurnal -->
            @foreach ($journals as $journal)
                <section class="text-gray-600 body-font">
                    <div class="container mx-auto flex flex-col items-center mt-10">
                        <div class="flex flex-col sm:flex-row w-full max-w-4xl bg-white shadow-lg rounded-lg p-6 mb-10">
                            <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
                                <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </div>
                                <div class="flex flex-col items-center text-center justify-center">
                                    <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">{{ $journal->nama }}</h2>
                                    <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
                                    <p class="text-base">{{ $journal->tanggal }}</p>
                                </div>
                            </div>
                            <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
                                <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">Isi jurnal:</h2>
                                <p class="leading-relaxed text-lg mb-4">{{ $journal->uraian_konsentrasi }}</p>
                                <button href="#" class="text-indigo-500 inline-flex items-center">Summit to
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                                <!-- Tombol Edit dan Hapus -->
                                <div class="flex justify-between mt-4">
                                    <a href="{{ route('journals.edit', $journal->id) }}" class="text-indigo-500 hover:underline">Edit</a>
                                    <form action="{{ route('journals.destroy', $journal->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endforeach
        </div>
        
        <!-- Footer di bagian bawah halaman -->
        <x-footer class="bg-gray-800 text-white py-4 mt-auto"></x-footer>
    </div>
</body>
</html>
