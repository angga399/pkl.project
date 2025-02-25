<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  @vite('resources/css/app.css') 
  <style>
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

    .fade-out {
      opacity: 0;
      transition: opacity 0.5s ease-in-out;
    }

    .btn-hover {
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .btn-hover:before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(
        120deg,
        transparent,
        rgba(255, 255, 255, 0.2),
        transparent
      );
      transition: all 0.5s;
    }

    .btn-hover:hover:before {
      left: 100%;
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

<body class="bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900 text-white">
  <div class="absolute top-0 left-0 w-full h-full flex justify-center items-center -z-10">
    <img src="image/amaliah.jpg" alt="Background" class="w-full h-full object-cover opacity-10" />
  </div>

  <div class="min-h-screen flex flex-col justify-center items-center text-center px-5 animate-fadeInUp">
    <div class="bg-white/5 backdrop-blur-lg rounded-xl p-8 shadow-2xl">
      <h1 class="sm:text-5xl text-4xl font-extrabold mb-6 bg-gradient-to-r from-blue-200 to-indigo-200 bg-clip-text text-transparent">
        SELAMAT DATANG
      </h1>
      
      <p class="text-lg leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-200 mb-10">
jika belum memiliki akun harap register
      </p>

      <div class="flex gap-4 justify-center mt-8">
        <a href="{{ route('login') }}" class="transition-link btn-hover bg-indigo-600 text-white font-semibold py-3 px-8 rounded-lg shadow-lg hover:bg-indigo-700 transition-all duration-300">
          Login
        </a>
        
        <a href="{{ route('register') }}" class="transition-link btn-hover bg-transparent border-2 border-indigo-400 text-indigo-200 font-semibold py-3 px-8 rounded-lg shadow-lg hover:bg-indigo-400 hover:text-white transition-all duration-300">
          Register
        </a>
      </div>
    </div>
  </div>

  <div class="absolute bottom-5 text-center w-full">
    <p class="text-sm text-gray-300 opacity-80">&copy; 2025 PKL Project. All Rights Reserved.</p>
  </div>

  {{-- <x-footer></x-footer> --}}
</body>
</html>