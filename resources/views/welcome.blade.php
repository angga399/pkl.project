
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
  <x-navigasi></x-navigasi> <!-- Menampilkan komponen navigasi -->

    <div class="min-h-full">

        <section class="text-gray-600 body-font">
          <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4 justify-center">
              <!-- Card 1: Jurnal -->
              <div class="lg:w-1/4 mb-6 p-4">
                <div class="bg-white shadow-md rounded-lg p-6 text-center">
                  <img alt="Jurnal" class="w-20 h-20 mb-4 mx-auto object-cover object-center rounded-full border-2 border-gray-200" src="https://dummyimage.com/100x100/000/fff&text=Jurnal">
                  <h2 class="text-lg font-medium text-gray-900 mb-2">Jurnal</h2>
                  <p class="text-gray-500">Isi jurnal harian Anda dengan mudah</p>
                  <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"> <a href="{{ route('journals.create') }}">Isi Jurnal</a></button>

                </div>
              </div>

              <!-- Card 2: Daftar Absen -->
              <div class="lg:w-1/4 mb-6 p-4">
                <div class="bg-white shadow-md rounded-lg p-6 text-center">
                  <img alt="Daftar Absen" class="w-20 h-20 mb-4 mx-auto object-cover object-center rounded-full border-2 border-gray-200" src="https://dummyimage.com/100x100/000/fff&text=Absen">
                  <h2 class="text-lg font-medium text-gray-900 mb-2">Daftar Absen</h2>
                  <p class="text-gray-500">Isi daftar absen Anda.</p>
                  <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">   <a href="{{ route('daftarhdr.create') }}">Absen Hadir</a></button>
                </div>
              </div>

              <!-- Card 3: Daftar Absen Sholat -->
              <div class="lg:w-1/4 p-4">
                <div class="bg-white shadow-md rounded-lg p-6 text-center">
                  <img alt="Absen Sholat" class="w-20 h-20 mb-4 mx-auto object-cover object-center rounded-full border-2 border-gray-200" src="https://dummyimage.com/100x100/000/fff&text=Sholat">
                  <h2 class="text-lg font-medium text-gray-900 mb-2">Daftar Absen Sholat</h2>
                  <p class="text-gray-500">Isi absen sholat dengan cepat.</p>
 
                  <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"> <a href="{{ route('dftrshalats.create') }}"> Absen Shalat</button>



                </div>
              </div>

            </div>
          </div>
        </section>
    </div>
  </body>




  
<x-footer></x-footer>