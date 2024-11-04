<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil</title>
    @vite('resources/css/app.css')

</head>
<body>
    
    <h1 class="text-2xl font-semibold mb-4">Data Foto dengan Lokasi</h1>
    <a href="{{ route('daftarhdr.create') }}" class="btn btn-primary mb-4">Tambah Data</a>

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
