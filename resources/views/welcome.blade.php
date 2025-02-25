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
      
      .card-hover {
          transition: all 0.3s ease;
      }
      
      .card-hover:hover {
          transform: translateY(-10px);
          box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2), 0 10px 10px -5px rgba(0, 0, 0, 0.1);
      }
      
      .gradient-text {
          background: linear-gradient(45deg, #60A5FA, #34D399);
          -webkit-background-clip: text;
          background-clip: text;
          color: transparent;
          animation: gradient 3s ease infinite;
      }
      
      @keyframes gradient {
          0% { background-position: 0% 50%; }
          50% { background-position: 100% 50%; }
          100% { background-position: 0% 50%; }
      }
      
      .floating {
          animation: floating 3s ease-in-out infinite;
      }
      
      @keyframes floating {
          0% { transform: translateY(0px); }
          50% { transform: translateY(-10px); }
          100% { transform: translateY(0px); }
      }
  </style>
  <script>
      document.addEventListener('DOMContentLoaded', () => {
          // Page transition
          document.querySelectorAll('.transition-link').forEach(link => {
              link.addEventListener('click', (event) => {
                  event.preventDefault();
                  document.body.classList.add('fade-out');
                  setTimeout(() => {
                      window.location.href = link.href;
                  }, 500);
              });
          });

          // Add hover effect to cards
          document.querySelectorAll('.card').forEach(card => {
              card.addEventListener('mouseenter', () => {
                  card.querySelector('.icon-container').classList.add('floating');
              });
              card.addEventListener('mouseleave', () => {
                  card.querySelector('.icon-container').classList.remove('floating');
              });
          });
      });
  </script>
</head>

<body class="bg-gradient-to-br from-gray-900 via-blue-900 to-purple-900 text-white">
  <x-navigasi></x-navigasi>

  <div class="min-h-screen flex flex-col justify-center items-center relative overflow-hidden">
      <!-- Background decoration -->
      <div class="absolute inset-0 overflow-hidden pointer-events-none">
          <div class="absolute w-64 h-64 rounded-full bg-blue-500 opacity-10 -top-20 -left-20"></div>
          <div class="absolute w-96 h-96 rounded-full bg-purple-500 opacity-10 -bottom-32 -right-32"></div>
      </div>

      <section class="text-gray-600 body-font py-24 w-full relative z-10">
          <div class="container px-5 mx-auto text-center">
              <h1 class="sm:text-6xl text-5xl font-extrabold mb-6 gradient-text">
                  HALAMAN SISWA SISWI
              </h1>
              <p class="text-xl leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-blue-100 mb-8">
                  Silahkan isi kegiatan kalian selama PKL
              </p>
              <div class="flex justify-center">
                  <div class="w-40 h-1 rounded-full bg-gradient-to-r from-teal-300 to-blue-500"></div>
              </div>
          </div>

          <div class="container mx-auto flex flex-wrap justify-center gap-8 mt-16">
              @foreach ([
                  ['title' => 'Jurnal', 'desc' => 'Isi Jurnal kegiatan kamu', 'route' => 'journals.index', 'color' => 'from-teal-500 to-teal-700', 'icon' => 'fa-book-open'],
                  ['title' => 'Absensi', 'desc' => 'Absen Hadir kegiatan PKL', 'route' => 'daftarhdr.index', 'color' => 'from-blue-500 to-blue-700', 'icon' => 'fa-user-check'],
                  ['title' => 'Absen Shalat', 'desc' => 'Absen Shalat selama PKL', 'route' => 'dftrshalats.index', 'color' => 'from-purple-500 to-purple-700', 'icon' => 'fa-pray']
              ] as $item)
              <div class="card p-8 w-96 flex flex-col text-center items-center card-hover bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20">
                  <div class="icon-container w-24 h-24 flex items-center justify-center rounded-full bg-gradient-to-br {{ $item['color'] }} mb-6 shadow-lg">
                      <i class="fas {{ $item['icon'] }} text-3xl text-white"></i>
                  </div>
                  <div class="flex-grow">
                      <h2 class="text-2xl font-bold mb-4 text-white">{{ $item['title'] }}</h2>
                      <p class="leading-relaxed text-lg text-blue-100 mb-6">{{ $item['desc'] }}</p>
                      <a class="inline-flex items-center px-6 py-3 rounded-full bg-gradient-to-r from-blue-500 to-purple-500 text-white font-semibold hover:from-blue-600 hover:to-purple-600 transition-all duration-300 transition-link" href="{{ route($item['route']) }}">
                          Go Page
                          <i class="fas fa-arrow-right ml-3"></i>
                      </a>
                  </div>
              </div>
              @endforeach
          </div>
      </section>
  </div>

  <x-footer></x-footer>
</body>