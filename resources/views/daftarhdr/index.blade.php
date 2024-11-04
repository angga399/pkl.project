<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Pengambilan Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <title>Hasil</title>
    @vite('resources/css/app.css')


</head>
<body class="bg-gray-100 py-10">
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Daftar Pengambilan Foto</h1>


        <!-- Tabel Daftar Foto -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b">#</th>
                        <th class="px-4 py-2 border-b">Hari</th>
                        <th class="px-4 py-2 border-b">Tanggal</th>
                        <th class="px-4 py-2 border-b">Latitude</th>
                        <th class="px-4 py-2 border-b">Longitude</th>
                        <th class="px-4 py-2 border-b">Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($daftarhdrs as $index => $item)
                    <tr>
                        <td class="px-4 py-2 border-b text-center">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ $item->hari }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ $item->tanggal }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ $item->latitude }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ $item->longitude }}</td>
                        <td class="px-4 py-2 border-b text-center">
                            <img src="{{ $item->dataGambar }}" alt="Foto" class="w-20 h-20 object-cover rounded-md">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Link to go back to the photo capture page -->
        <div class="mt-6">
            <a href="{{ route('daftarhdr.create') }}" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Ambil Foto Baru</a>
        </div>
    </div>

    <table class="table-auto w-full">
       
        <tbody>
            @foreach ($data as $item)
              
            <section class="text-gray-600 body-font">
                <div class="container px-5 py-24 mx-auto">
                  <div class="flex flex-wrap -m-4">
                    <div class="p-4 md:w-1/3">
                      <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                        <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ $item->image_data }}" alt="Foto">
                        <div class="p-6">
                          <div class="flex justify-between mb-3">
                            <div>
                              <h2 class="tracking-widest text-xs title-font font-medium text-gray-400">Latitude:</h2>
                              <h1 class="title-font text-lg font-medium text-gray-900">{{ $item->latitude }}</h1>
                            </div>
                            <div>
                              <h2 class="tracking-widest text-xs title-font font-medium text-gray-400">Longitude:</h2>
                              <h1 class="title-font text-lg font-medium text-gray-900">{{ $item->longitude }}</h1>
                            </div>
                          </div>
                          <p class="leading-relaxed mb-3">Catatan: {{ $item->notes }}</p>
                          <div class="flex items-center flex-wrap mb-4">
                            <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                              <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5l7 7-7 7"></path>
                              </svg>
                            </a>
                           
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
                  </div>
                </div>
            </section>
            
              @endforeach
        </tbody>
    </table>
  </body>



</html>
