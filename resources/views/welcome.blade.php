<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-r from-indigo-500 via-purple-600 to-pink-500 text-white">

<x-navigasi></x-navigasi> <!-- Menampilkan komponen navigasi -->

  <div class="min-h-screen">
    <section class="text-gray-600 body-font py-24">
      <div class="container px-5 mx-auto text-center">
        <h1 class="sm:text-4xl text-3xl font-extrabold text-black mb-4">HALAMAN SISWA/I</h1>
        <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-black">Silahkan isi kegiatan kalian selama PKL</p>
        <div class="flex mt-8 justify-center">
          <div class="w-20 h-1 rounded-full bg-indigo-300 inline-flex"></div>
        </div>
      </div>

      <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-10 md:space-y-0 space-y-6">
        <!-- Jurnal Section -->
        <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
          <div class="w-24 h-24 inline-flex items-center justify-center rounded-full bg-indigo-600 mb-5 shadow-lg transform hover:scale-105 transition-all duration-300">
            <img src="image/bee.png" alt="Jurnal" class="w-14 h-14 object-cover">
          </div>
          <div class="flex-grow">
            <h2 class="text-lg font-semibold mb-3">Jurnal</h2>
            <p class="leading-relaxed text-base">Isi Jurnal kegiatan kamu</p>
            <a class="mt-3 text-indigo-400 inline-flex items-center hover:text-indigo-600 transition-all duration-300" href="{{ route('journals.index') }}">Go Page
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>

        <!-- Absensi Section -->
        <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
          <div class="w-24 h-24 inline-flex items-center justify-center rounded-full bg-purple-600 mb-5 shadow-lg transform hover:scale-105 transition-all duration-300">
            <img src="image/we.png" alt="Absensi" class="w-14 h-14 object-cover">
          </div>
          <div class="flex-grow">
            <h2 class="text-lg font-semibold mb-3">Absensi</h2>
            <p class="leading-relaxed text-base">Absen Hadir kegiatan PKL</p>
            <a class="mt-3 text-purple-400 inline-flex items-center hover:text-purple-600 transition-all duration-300" href="{{ route('daftarhdr.index') }}">Go Page
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>

        <!-- Absen Shalat Section -->
        <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
          <div class="w-24 h-24 inline-flex items-center justify-center rounded-full bg-pink-600 mb-5 shadow-lg transform hover:scale-105 transition-all duration-300">
            <img src="image/me.png" alt="Absen Shalat" class="w-14 h-14 object-cover">
          </div>
          <div class="flex-grow">
            <h2 class="text-lg font-semibold mb-3">Absen Shalat</h2>
            <p class="leading-relaxed text-base">Absen Shalat selama PKL</p>
            <a class="mt-3 text-pink-400 inline-flex items-center hover:text-pink-600 transition-all duration-300" href="{{ route('dftrshalats.index') }}">Go Page
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </section>
  </div>

<x-footer></x-footer>

</body>
