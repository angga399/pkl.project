<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login PKL</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <style>
    body {
      background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
      min-height: 100vh;
      font-family: 'Segoe UI', system-ui, sans-serif;
    }

    .glass-card {
      background: rgba(15, 23, 42, 0.8);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.1);
      box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
      color: #e2e8f0;
    }

    .custom-input {
      transition: all 0.3s ease;
      border: 2px solid #1e293b;
      background-color: rgba(30, 41, 59, 0.9);
      color: #e2e8f0;
    }

    .custom-input::placeholder {
      color: #94a3b8;
    }

    .custom-input:focus {
      border-color: #3b82f6;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
    }

    .collapse {
      transition: all 0.3s ease;
      max-height: 0;
      opacity: 0;
      overflow: hidden;
    }

    .collapse.show {
      max-height: 500px;
      opacity: 1;
    }

    .custom-button {
      background: linear-gradient(45deg, #1e40af, #3b82f6);
      transition: all 0.3s ease;
    }

    .custom-button:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
      background: linear-gradient(45deg, #1e3a8a, #2563eb);
    }

    .info-icon {
      color: #3b82f6;
      transition: all 0.3s ease;
    }

    .info-icon:hover {
      transform: scale(1.1);
    }
    
    .login-container {
      display: flex;
      height: 100vh;
      align-items: center;
      padding: 1rem;
      max-width: 1280px;
      margin: 0 auto;
    }
    
    @media (max-width: 1023px) {
      .login-container {
        flex-direction: column;
        height: auto;
      }
    }

    .text-glow {
      text-shadow: 0 0 15px rgba(59, 130, 246, 0.5);
    }
    
    .card-hover {
      transition: all 0.3s ease;
    }
    
    .card-hover:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
    }
    
    .checkbox-blue {
      accent-color: #3b82f6;
      width: 1.2rem;
      height: 1.2rem;
    }
    
    .animate-gradient {
      background-size: 200% 200%;
      animation: gradientAnimation 5s ease infinite;
    }
    
    @keyframes gradientAnimation {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
    }
  </style>
</head>
<body class="text-gray-100">
  <div class="login-container">
    <div class="container mx-auto">
      <!-- Header -->
      <div class="text-center mb-6">
        <h1 class="text-4xl font-bold text-white mb-2 text-glow">Selamat Datang</h1>
        <p class="text-lg text-blue-200">Sistem Informasi Praktek Kerja Lapangan</p>
      </div>
      
      <div class="flex flex-col lg:flex-row gap-5">
        <!-- Left Column - Information -->
        <div class="w-full lg:w-5/12">
          <div class="space-y-6">
            <!-- Introduction Card -->
            <div class="glass-card rounded-xl p-6 h-full card-hover">
              <div class="flex items-center mb-3">
                <i class="fas fa-book-open text-2xl info-icon mr-3"></i>
                <h3 class="text-xl font-semibold text-blue-300">Pendahuluan</h3>
              </div>
              <button class="flex items-center text-blue-400 hover:text-blue-300 transition-colors duration-200" id="toggleIntro">
                <span>Baca Selengkapnya</span>
                <i class="fas fa-chevron-down ml-2 transform transition-transform duration-200"></i>
              </button>
              <div class="collapse mt-4" id="introContent">
                <p class="text-gray-300 leading-relaxed text-base">
                  Selamat datang di sistem informasi Praktek Kerja Lapangan. Di sini, Anda akan menemukan informasi penting mengenai PKL dan panduan lengkap untuk mengoptimalkan pengalaman pembelajaran Anda.
                </p>
              </div>
            </div>

            <!-- Regulations Card -->
            <div class="glass-card rounded-xl p-6 h-full card-hover">
              <div class="flex items-center mb-3">
                <i class="fas fa-clipboard-list text-2xl info-icon mr-3"></i>
                <h3 class="text-xl font-semibold text-blue-300">Peraturan PKL</h3>
              </div>
              <button class="flex items-center text-blue-400 hover:text-blue-300 transition-colors duration-200" id="toggleRegulation">
                <span>Baca Selengkapnya</span>
                <i class="fas fa-chevron-down ml-2 transform transition-transform duration-200"></i>
              </button>
              <div class="collapse mt-4" id="regulationContent">
                <ul class="space-y-3">
                  <li class="flex items-center text-gray-300 text-base">
                    <i class="fas fa-check-circle text-blue-400 mr-2 text-base"></i>
                    <span>Hadir tepat waktu sesuai jadwal yang ditentukan</span>
                  </li>
                  <li class="flex items-center text-gray-300 text-base">
                    <i class="fas fa-check-circle text-blue-400 mr-2 text-base"></i>
                    <span>Mengikuti arahan pembimbing dengan seksama</span>
                  </li>
                  <li class="flex items-center text-gray-300 text-base">
                    <i class="fas fa-check-circle text-blue-400 mr-2 text-base"></i>
                    <span>Memahami dan mengimplementasikan materi yang disampaikan</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Column - Login Form -->
        <div class="w-full lg:w-7/12">
          <div class="glass-card rounded-xl p-7 h-full card-hover animate-gradient" style="background: linear-gradient(135deg, rgba(15, 23, 42, 0.9) 0%, rgba(30, 58, 138, 0.9) 100%);">
            <div class="text-center mb-6">
              <div class="inline-block p-3 rounded-full bg-gradient-to-r from-blue-800 to-blue-600 mb-3">
                <i class="fas fa-user-circle text-4xl text-white"></i>
              </div>
              <h2 class="text-2xl font-bold text-white text-glow">Login Peserta</h2>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-4 max-w-md mx-auto">
              @csrf
              <div>
                <label for="email" class="block text-base font-medium text-blue-200 mb-1">Email</label>
                <div class="relative">
                  <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-400 text-base"></i>
                  <input type="email" 
                         class="custom-input block w-full pl-10 pr-3 py-3 rounded-lg focus:outline-none text-base" 
                         id="email"
                         name="email" 
                         placeholder="Masukkan email Anda"
                         value="{{ old('email') }}"
                         required>
                </div>
              </div>
              
              <div>
                <label for="password" class="block text-base font-medium text-blue-200 mb-1">Password</label>
                <div class="relative">
                  <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-blue-400 text-base"></i>
                  <input type="password" 
                         class="custom-input block w-full pl-10 pr-3 py-3 rounded-lg focus:outline-none text-base" 
                         id="password"
                         name="password" 
                         placeholder="Masukkan password Anda"
                         required>
                </div>
              </div>
              
              <div class="flex items-center justify-between">
                <div class="flex items-center">
                  <input type="checkbox" 
                         class="checkbox-blue rounded" 
                         id="remember" 
                         name="remember">
                  <label class="ml-2 text-sm text-gray-300" for="remember">Remember me</label>
                </div>
                
                @if (Route::has('password.request'))
                  <a href="{{ route('password.request') }}" 
                     class="text-sm text-blue-300 hover:text-blue-200 transition-colors duration-200">
                    Lupa password?
                  </a>
                @endif
              </div>
              
              <button type="submit" 
                      class="custom-button w-full py-3 px-5 rounded-lg text-white font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 text-base">
                <i class="fas fa-sign-in-alt mr-2"></i> Masuk
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#toggleIntro, #toggleRegulation').click(function() {
        const content = $(this).next('.collapse');
        const icon = $(this).find('.fa-chevron-down');
        
        content.toggleClass('show');
        icon.toggleClass('rotate-180');
      });
    });
  </script>
</body>
</html>