<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  @vite('resources/css/app.css')
  
</head>

<body class="bg-gradient-to-r from-teal-400 to-blue-500 text-white">
  <div class="min-h-screen">
    <section class="text-gray-600 body-font py-24">
      <div class="container px-5 mx-auto text-center">
        <h1 class="sm:text-5xl text-4xl font-extrabold text-white mb-4">HALAMAN SISWA/I</h1>
        <p class="text-lg leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-white">Silahkan isi kegiatan kalian selama PKL</p>
        <div class="flex mt-8 justify-center">
          <div class="w-32 h-1 rounded-full bg-teal-300 inline-flex"></div>
        </div>
      </div>

      <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-10 md:space-y-0 space-y-6">
        <!-- Jurnal Section -->
    <div class="p-4 md:w-1/3 flex flex-col text-center items-center transition-transform transform hover:scale-105">
  <div class="w-24 h-24 inline-flex items-center justify-center rounded-full bg-teal-600 mb-5 shadow-lg">
    <img src="image/bee.png" alt="Jurnal" class="w-14 h-14 object-cover">
  </div>
  <div class="flex-grow">
    <h2 class="text-lg font-semibold mb-3">Jurnal</h2>
    <p class="leading-relaxed text-base">Isi Jurnal kegiatan kamu</p>
    <a class="mt-3 text-teal-400 inline-flex items-center hover:text-teal-600 transition-all duration-300 transition-page" href="{{ route('journals.index') }}">
      Go Page
      <i class="fas fa-arrow-right ml-2"></i>
    </a>
  </div>
</div>


        <!-- Absensi Section -->
        <div class="p-4 md:w-1/3 flex flex-col text-center items-center transition-transform transform hover:scale-105">
          <div class="w-24 h-24 inline-flex items-center justify-center rounded-full bg-blue-600 mb-5 shadow-lg">
            <img src="image/we.png" alt="Absensi" class="w-14 h-14 object-cover">
          </div>
          <div class="flex-grow">
            <h2 class="text-lg font-semibold mb-3">Absensi</h2>
            <p class="leading-relaxed text-base">Absen Hadir kegiatan PKL</p>
            <a class="mt-3 text-blue-400 inline-flex items-center hover:text-blue-600 transition-all duration-300" href="{{ route('daftarhdr.index') }}">
              Go Page
              <i class="fas fa-arrow-right ml-2"></i>
            </a>
          </div>
        </div>

        <!-- Absen Shalat Section -->
        <div class="p-4 md:w-1/3 flex flex-col text-center items-center transition-transform transform hover:scale-105">
          <div class="w-24 h-24 inline-flex items-center justify-center rounded-full bg-blue-800 mb-5 shadow-lg">
            <img src="image/me.png" alt="Absen Shalat" class="w-14 h-14 object-cover">
          </div>
          <div class="flex-grow">
            <h2 class="text-lg font-semibold mb-3">Absen Shalat</h2>
            <p class="leading-relaxed text-base">Absen Shalat selama PKL</p>
            <a class="mt-3 text-blue-400 inline-flex items-center hover:text-blue-600 transition-all duration-300" href="{{ route('dftrshalats.index') }}">
              Go Page
              <i class="fas fa-arrow-right ml-2"></i>
            </a>
          </div>
        </div>
      </div>
    </section>
  </div>

  <x-footer></x-footer>

  <style>
    body {
      font-family: 'Arial', sans-serif;
    }

    .bg-gradient-to-r {
      background: linear-gradient(to right, #4fd1c5, #63b3ed);
    }

    .text-white {
      color: #ffffff;
    }

    .text-black {
      color: #000000;
    }

    .transition-transform {
      transition: transform 0.3s ease;
    }

    .hover\:scale-105:hover {
      transform: scale(1.05);
    }

    @media (max-width: 768px) {
      .text-lg {
        font-size: 1.25rem;
      }
    }

       /* CSS untuk halaman transisi */
       .transition-page {
      position: relative;
      display: inline-block;
      transition: transform 0.5s ease, opacity 0.5s ease;
    }
  
    /* Transisi aktif saat diklik */
    .transition-page.clicked {
      transform: scale(1.2); /* Membesarkan halaman */
      opacity: 0.8; /* Mengurangi opacity */
    }
  
    /* Efek hover pada transisi */
    .transition-page:hover {
      transform: scale(1.1);
    }
  </style>

<script>
  document.querySelectorAll('.transition-page').forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault(); // Mencegah navigasi langsung

      // Menambahkan kelas untuk animasi transisi
      this.classList.add('clicked');

      // Menunggu transisi selesai (500ms), lalu berpindah halaman
      setTimeout(() => {
        window.location.href = this.href; // Pindah ke halaman yang dituju
      }, 500); // Waktu yang sama dengan durasi animasi
    });
  });
</script>

</body>