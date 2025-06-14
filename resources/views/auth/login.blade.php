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
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 1rem;
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
      flex-direction: column;
      width: 100%;
      max-width: 1280px;
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

    /* Tambahan untuk memusatkan konten */
    .main-content {
      width: 100%;
      display: flex;
      justify-content: center;
    }
    
    .form-container {
      width: 100%;
      max-width: 600px; /* Sesuaikan jika perlu */
    }
  </style>
</head>
<body class="text-gray-100">
  <div class="login-container">
    <!-- Header -->
    <div class="text-center mb-6">
      <h1 class="text-4xl font-bold text-white mb-2 text-glow">Selamat Datang</h1>
      <p class="text-lg text-blue-200">Sistem Informasi Praktek Kerja Lapangan</p>
    </div>
    
    <div class="main-content">
      <div class="form-container">
        <!-- Right Column - Login Form -->
        <div class="glass-card rounded-xl p-7 card-hover animate-gradient" style="background: linear-gradient(135deg, rgba(15, 23, 42, 0.9) 0%, rgba(30, 58, 138, 0.9) 100%);">
          <div class="text-center mb-6">
            <div class="inline-block p-3 rounded-full bg-gradient-to-r from-blue-800 to-blue-600 mb-3">
              <i class="fas fa-user-circle text-4xl text-white"></i>
            </div>
            <h2 class="text-2xl font-bold text-white text-glow">Login </h2>
          </div>

          <form method="POST" action="{{ route('login') }}" class="space-y-4">
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
    </div> <div class="text-center text-xs text-blue-300 pt-3">
          belum punya akun? 
          <a href="{{ route('register') }}" class="font-medium text-white hover:text-blue-200 transition-colors">
            Masuk disini
          </a>
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