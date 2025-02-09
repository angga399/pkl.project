<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  @vite('resources/css/app.css')
  <style>
    /* Animasi Fade In Up */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    .animate-fadeInUp {
      animation: fadeInUp 1s ease-out;
    }

    /* Animasi Fade Out */
    .fade-out {
      opacity: 0;
      transition: opacity 0.5s ease-in-out;
    }
  </style>
  <script>
    // Script untuk menambahkan efek fade-out pada setiap link dengan class 'transition-link'
    document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('.transition-link').forEach(link => {
        link.addEventListener('click', (event) => {
          event.preventDefault(); // cegah aksi default
          document.body.classList.add('fade-out'); // tambahkan class fade-out ke body
          setTimeout(() => {
            window.location.href = link.href;
          }, 500); // pindah halaman setelah 500ms
        });
      });
    });
  </script>
</head>
  
<body class="bg-gradient-to-r from-teal-400 to-blue-500 text-white">
  <!-- Background image (posisi absolute agar tetap di belakang) -->
  <div class="absolute top-0 left-0 w-full h-full flex justify-center items-center -z-10">
    <img src="image/background.png" alt="Background" class="w-full h-full object-cover opacity-20" />
  </div>

  <!-- Konten utama -->
  <div class="min-h-screen flex flex-col justify-center items-center text-center px-5 animate-fadeInUp">
    <h1 class="sm:text-5xl text-4xl font-extrabold text-white mb-6">SELAMAT DATANG</h1>
    <p class="text-lg leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-white">
      Silakan login untuk mengisi jurnal, absensi, dan absen shalat selama PKL.
    </p>

    
    <!-- Tombol Login dengan efek fade-out saat diklik -->
    <div class="mt-10" style="animation-delay: 1s;">
      <a href="{{ route('login') }}" class="transition-link bg-white text-blue-600 font-semibold py-3 px-6 rounded-lg shadow-lg hover:bg-gray-200 transition-all duration-300 relative overflow-hidden">
        Login
      </a>
    </div>
  </div>
  
  <!-- Footer tetap berada di bawah -->
  <div class="absolute bottom-5 text-center w-full ">
    <p class="text-sm text-white opacity-80">&copy; 2025 PKL Project. All Rights Reserved.</p>
  </div>
  
  <x-footer></x-footer>
</body>
</html>
