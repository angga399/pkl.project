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
      background: linear-gradient(135deg, #6B73FF 0%, #000DFF 100%);
      min-height: 100vh;
      font-family: 'Segoe UI', system-ui, sans-serif;
    }

    .glass-card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    }

    .custom-input {
      transition: all 0.3s ease;
      border: 2px solid #e2e8f0;
    }

    .custom-input:focus {
      border-color: #4F46E5;
      box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
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
      background: linear-gradient(45deg, #4F46E5, #6366F1);
      transition: all 0.3s ease;
    }

    .custom-button:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
    }

    .info-icon {
      color: #4F46E5;
      transition: all 0.3s ease;
    }

    .info-icon:hover {
      transform: scale(1.1);
    }
  </style>
</head>
<body class="text-gray-800">
  <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8 flex flex-col justify-center">
    <!-- Header -->
    <div class="text-center mb-12">
      <h1 class="text-5xl font-bold text-white mb-4">Selamat Datang</h1>
      <p class="text-xl text-gray-200">Sistem Informasi Praktek Kerja Lapangan</p>
    </div>
    
    <div class="max-w-7xl mx-auto w-full">
      <div class="flex flex-wrap -mx-4">
        <!-- Left Column -->
        <div class="w-full lg:w-5/12 px-4 mb-8">
          <div class="space-y-6">
            <!-- Introduction Card -->
            <div class="glass-card rounded-xl p-6">
              <div class="flex items-center mb-4">
                <i class="fas fa-book-open text-2xl info-icon mr-3"></i>
                <h3 class="text-xl font-semibold text-gray-800">Pendahuluan</h3>
              </div>
              <button class="flex items-center text-indigo-600 hover:text-indigo-800 transition-colors duration-200" id="toggleIntro">
                <span>Baca Selengkapnya</span>
                <i class="fas fa-chevron-down ml-2 transform transition-transform duration-200"></i>
              </button>
              <div class="collapse mt-4" id="introContent">
                <p class="text-gray-600 leading-relaxed">
                  Selamat datang di sistem informasi Praktek Kerja Lapangan. Di sini, Anda akan menemukan informasi penting mengenai PKL dan panduan lengkap untuk mengoptimalkan pengalaman pembelajaran Anda.
                </p>
              </div>
            </div>

            <!-- Regulations Card -->
            <div class="glass-card rounded-xl p-6">
              <div class="flex items-center mb-4">
                <i class="fas fa-clipboard-list text-2xl info-icon mr-3"></i>
                <h3 class="text-xl font-semibold text-gray-800">Peraturan PKL</h3>
              </div>
              <button class="flex items-center text-indigo-600 hover:text-indigo-800 transition-colors duration-200" id="toggleRegulation">
                <span>Baca Selengkapnya</span>
                <i class="fas fa-chevron-down ml-2 transform transition-transform duration-200"></i>
              </button>
              <div class="collapse mt-4" id="regulationContent">
                <ul class="space-y-3">
                  <li class="flex items-center text-gray-600">
                    <i class="fas fa-check-circle text-green-500 mr-3"></i>
                    <span>Hadir tepat waktu sesuai jadwal yang ditentukan</span>
                  </li>
                  <li class="flex items-center text-gray-600">
                    <i class="fas fa-check-circle text-green-500 mr-3"></i>
                    <span>Mengikuti arahan pembimbing dengan seksama</span>
                  </li>
                  <li class="flex items-center text-gray-600">
                    <i class="fas fa-check-circle text-green-500 mr-3"></i>
                    <span>Memahami dan mengimplementasikan materi yang disampaikan</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Column - Login Form -->
        <div class="w-full lg:w-7/12 px-4">
          <div class="glass-card rounded-xl p-8">
            <div class="text-center mb-8">
              <i class="fas fa-user-circle text-5xl text-indigo-600 mb-4"></i>
              <h2 class="text-3xl font-bold text-gray-800">Login Peserta</h2>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
              @csrf
              <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <div class="relative">
                  <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                  <input type="email" 
                         class="custom-input block w-full pl-10 pr-4 py-3 rounded-lg focus:outline-none" 
                         id="email"
                         name="email" 
                         placeholder="Masukkan email Anda"
                         value="{{ old('email') }}"
                         required>
                </div>
              </div>
              
              <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <div class="relative">
                  <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                  <input type="password" 
                         class="custom-input block w-full pl-10 pr-4 py-3 rounded-lg focus:outline-none" 
                         id="password"
                         name="password" 
                         placeholder="Masukkan password Anda"
                         required>
                </div>
              </div>
              
              <div class="flex items-center justify-between">
                <div class="flex items-center">
                  <input type="checkbox" 
                         class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" 
                         id="remember" 
                         name="remember">
                  <label class="ml-2 text-sm text-gray-600" for="remember">Remember me</label>
                </div>
                
                @if (Route::has('password.request'))
                  <a href="{{ route('password.request') }}" 
                     class="text-sm text-indigo-600 hover:text-indigo-800 transition-colors duration-200">
                    Lupa password?
                  </a>
                @endif
              </div>
              
              <button type="submit" 
                      class="custom-button w-full py-3 px-4 rounded-lg text-white font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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