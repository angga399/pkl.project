<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Jurnal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6 text-center">Daftar Jurnal</h1>
        <div class="mb-4 text-center">
            <a href="{{ route('journals.create') }}" class="bg-indigo-500 text-white py-2 px-4 rounded hover:bg-indigo-600">Tambah Jurnal</a>
        </div>
        @foreach ($journals as $journal)

        <h2 class="text-lg font-semibold text-gray-800 mb-2"></h2>
        <section class="text-gray-600 body-font overflow-hidden">
            <div class="container px-4 py-4 mx-auto"> <!-- Mengurangi py dari 8 ke 4 -->
                <div class="-my-2 divide-y divide-gray-100"> <!-- Mengurangi my dari 4 ke 2 -->
                    <div class="py-2 flex flex-wrap md:flex-nowrap"> <!-- Mengurangi py dari 4 ke 2 -->
                        <!-- Bagian pertama dengan border -->
                        <div class="md:w-64 md:mb-0 mb-2 flex-shrink-0 flex flex-col border-r border-gray-300 pr-2">
                            <span class="font-bold title-font text-gray-700">CATEGORY</span>
                            <span class="mt-1 text-gray-500 text-sm">{{ $journal->tanggal }}</span>
                            <span class="font-bold title-font text-gray-700">NAMA</span>
                            <span class="mt-1 text-gray-500 text-sm">{{ $journal->nama }}</span>
                        </div>
    
                        <!-- Bagian kedua dengan padding kiri lebih kecil -->
                        <div class="md:flex-grow pl-2">
                            <h2 class="text-xl font-bold text-gray-900 title-font mb-1">{{ $journal->judul_jurnal }}</h2>
                            <p class="leading-relaxed text-sm">{{ $journal->keterangan }}</p>
                            <a class="text-indigo-500 inline-flex items-center mt-2">summit
                                <svg class="w-4 h-4 ml-1" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    
        <form action="{{ route('journals.destroy', $journal->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
    
    @endforeach
    