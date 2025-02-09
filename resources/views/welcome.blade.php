<!-- resources/views/welcome.blade.php -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  @vite('resources/css/app.css')
  <style>
    .fade-out {
      opacity: 0;
      transition: opacity 0.5s ease-in-out;
    }
  </style>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('.transition-link').forEach(link => {
        link.addEventListener('click', (event) => {
          event.preventDefault();
          document.body.classList.add('fade-out');
          setTimeout(() => {
            window.location.href = link.href;
          }, 500);
        });
      });
    });
  </script>
</head>

<body class="bg-gradient-to-r from-teal-400 to-blue-500 text-white">
  <x-navigasi></x-navigasi>

  <div class="min-h-screen flex flex-col justify-center items-center">
    <section class="text-gray-600 body-font py-24 w-full">
      <div class="container px-5 mx-auto text-center">
        <h1 class="sm:text-5xl text-4xl font-extrabold text-white mb-4">HALAMAN SISWA SISWI</h1>
        <p class="text-lg leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-white">Silahkan isi kegiatan kalian selama PKL</p>
        <div class="flex mt-8 justify-center">
          <div class="w-32 h-1 rounded-full bg-teal-300 inline-flex"></div>
        </div>
      </div>

      <div class="container mx-auto flex flex-wrap justify-center gap-6 mt-10">
        <!-- Card Component -->
        @foreach ([
          ['title' => 'Jurnal', 'desc' => 'Isi Jurnal kegiatan kamu', 'route' => 'journals.index', 'color' => 'bg-teal-600', 'img' => 'image/bee.png'],
          ['title' => 'Absensi', 'desc' => 'Absen Hadir kegiatan PKL', 'route' => 'daftarhdr.index', 'color' => 'bg-blue-600', 'img' => 'image/we.png'],
          ['title' => 'Absen Shalat', 'desc' => 'Absen Shalat selama PKL', 'route' => 'dftrshalats.index', 'color' => 'bg-blue-800', 'img' => 'image/me.png']
        ] as $item)
        <div class="p-6 w-80 flex flex-col text-center items-center transition-transform transform hover:scale-110 bg-white rounded-lg shadow-lg text-gray-900">
          <div class="w-24 h-24 inline-flex items-center justify-center rounded-full {{ $item['color'] }} mb-5 shadow-lg">
            <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}" class="w-14 h-14 object-cover">
          </div>
          <div class="flex-grow">
            <h2 class="text-lg font-semibold mb-3">{{ $item['title'] }}</h2>
            <p class="leading-relaxed text-base">{{ $item['desc'] }}</p>
            <a class="mt-3 text-indigo-500 inline-flex items-center hover:text-indigo-700 transition-all duration-300 transition-link" href="{{ route($item['route']) }}">
              Go Page
              <i class="fas fa-arrow-right ml-2"></i>
            </a>
          </div>
        </div>
        @endforeach
      </div>
    </section>
  </div>

  <x-footer></x-footer>
</body>
