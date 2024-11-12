<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Pengambilan Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<div class="flex justify-center mb-4">
    <x-back></x-back>
</div>
<body class="bg-gray-100 py-10">


        <!-- Card Style Section for Displaying Each Item's Image and Data -->
         
        <section class="text-gray-600 body-font mt-10">
        <div class="container mx-auto px-4">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Daftar Pengambilan Foto</h1>

        <!-- Tabel Daftar Foto -->


        <!-- Link to go back to the photo capture page -->
        <div class="mt-6">
            <a href="{{ route('daftarhdr.create') }}" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Ambil Foto Baru</a>
        </div>      
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap -m-4">
            @foreach ($daftarhdrs as $item)
            <div class="p-4 md:w-1/3">
                <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                    <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ $item->dataGambar }}" alt="Foto">
                    <div class="p-6">
                        <!-- Display Hari and Tanggal -->
                        <div class="flex justify-between mb-3">
                            <div>
                                <h2 class="tracking-widest text-xs title-font font-medium text-gray-400">Hari:</h2>
                                <h1 class="title-font text-lg font-medium text-gray-900">{{ $item->hari }}</h1>
                            </div>
                            <div>
                                <h2 class="tracking-widest text-xs title-font font-medium text-gray-400">Tanggal:</h2>
                                <h1 class="title-font text-lg font-medium text-gray-900">{{ $item->tanggal }}</h1>
                            </div>
                        </div>

                        <!-- Display Latitude and Longitude -->
                       
                        <!-- Display Status -->
<div class="flex justify-between mb-3">
    <div>
        <h2 class="tracking-widest text-xs title-font font-medium text-gray-400">Status:</h2>
        <h1 class="title-font text-lg font-medium text-gray-900">{{ $item->status }}</h1>
    </div>
</div>


                       
                        <div class="flex justify-between">
                            <a href="{{ route('daftarhdr.edit', $item->id) }}" class="text-yellow-500 font-bold">Edit</a>
                            <form action="{{ route('daftarhdr.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 font-bold">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

    </div>
</body>
</html>
