<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

      @keyframes ripple {
        from {
          transform: scale(0);
          opacity: 0.5;
        }
        to {
          transform: scale(4);
          opacity: 0;
        }
      }

      .animate-fadeInUp {
        animation: fadeInUp 1s ease-out;
      }

      .ripple-effect {
        position: fixed;
        top: 50%;
        left: 50%;
        width: 200px;
        height: 200px;
        background: rgba(59, 130, 246, 0.5);
        border-radius: 50%;
        transform: translate(-50%, -50%) scale(0);
        animation: ripple 0.8s ease-out;
      }
    </style>
    <script>
      function createRippleEffect(event) {
        const ripple = document.createElement('div');
        ripple.classList.add('ripple-effect');
        document.body.appendChild(ripple);

        setTimeout(() => {
          window.location.href = event.target.href;
        }, 500);
      }
    </script>
</head>
  
<body class="bg-gradient-to-r from-teal-400 to-blue-500 text-white">
  <div class="absolute top-0 left-0 w-full h-full flex justify-center items-center -z-10">
    <img src="image/background.png" alt="Background" class="w-full h-full object-cover opacity-20">
  </div>

  <div class="min-h-screen flex flex-col justify-center items-center text-center px-5 animate-fadeInUp">
    <h1 class="sm:text-5xl text-4xl font-extrabold text-white mb-6">SELAMAT DATANG</h1>
    <p class="text-lg leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-white">
      Silakan login untuk mengisi jurnal, absensi, dan absen shalat selama PKL.
    </p>
    <div class="flex mt-6 justify-center animate-fadeInUp" style="animation-delay: 0.5s;">
      <div class="w-32 h-1 rounded-full bg-teal-300 inline-flex"></div>
    </div>
    
    <div class="mt-10 animate-fadeInUp" style="animation-delay: 1s;">
      <a href="{{ route('login') }}" onclick="createRippleEffect(event); event.preventDefault();" class="bg-white text-blue-600 font-semibold py-3 px-6 rounded-lg shadow-lg hover:bg-gray-200 transition-all duration-300 relative overflow-hidden">
        Login
      </a>
    </div>
  </div>
  
  <div class="absolute bottom-5 text-center w-full animate-fadeInUp" style="animation-delay: 1.5s;">
    <p class="text-sm text-white opacity-80">&copy; 2025 PKL Project. All Rights Reserved.</p>
  </div>
  
  <x-footer></x-footer>
</body>