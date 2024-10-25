
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <div class="min-h-full">
        <x-navigasi></x-navigasi> <!-- Menampilkan komponen navigasi -->

        <section class="text-gray-600 body-font">
          <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4 justify-center">
              <!-- Card 1: Jurnal -->
              <div class="lg:w-1/4 mb-6 p-4">
                <div class="bg-white shadow-md rounded-lg p-6 text-center">
                  <img alt="Jurnal" class="w-20 h-20 mb-4 mx-auto object-cover object-center rounded-full border-2 border-gray-200" src="https://dummyimage.com/100x100/000/fff&text=Jurnal">
                  <h2 class="text-lg font-medium text-gray-900 mb-2">Jurnal</h2>
                  <p class="text-gray-500">Isi jurnal harian Anda dengan mudah</p>
                  <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"> <a href="{{ route('journals.index') }}">Isi Jurnal</a></button>
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
                  <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Isi Absen Sholat</button>
                </div>
              </div>

            </div>
          </div>
        </section>
    </div>
    
  </body>

  <footer class="text-gray-600 body-font">
    <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
      <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
          <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
        </svg>
        <span class="ml-3 text-xl">angga&fauzan</span>
      </a>
      <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">© 2024 angga&fauzan —
        <a href="https://twitter.com/knyttneve" class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank">@angga&fauzan</a>
      </p>
      <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
        <a class="text-gray-500">
          <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
          </svg>
        </a>
        <a class="ml-3 text-gray-500">
          <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
            <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
          </svg>
        </a>
        <a class="ml-3 text-gray-500">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
          </svg>
        </a>
        <a class="ml-3 text-gray-500">
          <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
            <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
            <circle cx="4" cy="4" r="2" stroke="none"></circle>
          </svg>
        </a>
      </span>
    </div>
  </footer>
