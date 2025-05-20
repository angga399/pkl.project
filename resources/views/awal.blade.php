<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  @vite('resources/css/app.css') 
  <style>
    body {
      background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
      min-height: 100vh;
      font-family: 'Segoe UI', system-ui, sans-serif;
    }

    /* Glass card effect */
    .glass-card {
      background: rgba(15, 23, 42, 0.8);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.1);
      box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
      color: #e2e8f0;
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
    
    /* Elegant Particle Background Animation */
    .particles {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: -1;
    }
    
    .particle {
      position: absolute;
      border-radius: 50%;
      background: rgba(59, 130, 246, 0.05);
      box-shadow: 0 0 10px rgba(59, 130, 246, 0.2);
      pointer-events: none;
      animation: elegantFloat 25s infinite ease-in-out;
    }
    
    @keyframes elegantFloat {
      0% {
        transform: translateY(0) translateX(0) rotate(0deg);
        opacity: 0;
      }
      5% {
        opacity: 0.2;
      }
      50% {
        transform: translateY(-500px) translateX(100px) rotate(180deg);
      }
      95% {
        opacity: 0.1;
      }
      100% {
        transform: translateY(-1000px) translateX(0) rotate(360deg);
        opacity: 0;
      }
    }
    
    /* Page transitions */
    .fade-out {
      opacity: 0;
      transition: opacity 0.6s ease-in-out;
    }
    
    /* Button animations */
    .custom-button {
      background: linear-gradient(45deg, #1e40af, #3b82f6);
      transition: all 0.3s ease;
    }

    .custom-button:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
      background: linear-gradient(45deg, #1e3a8a, #2563eb);
    }
    
    /* Card hover effect */
    .card-hover {
      transition: all 0.3s ease;
    }
    
    .card-hover:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
    }
    
    /* Text glow effect */
    .text-glow {
      text-shadow: 0 0 15px rgba(59, 130, 246, 0.5);
    }
    
    /* Custom scrollbar */
    ::-webkit-scrollbar {
      width: 8px;
    }
    
    ::-webkit-scrollbar-track {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 10px;
    }
    
    ::-webkit-scrollbar-thumb {
      background: rgba(59, 130, 246, 0.5);
      border-radius: 10px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
      background: rgba(59, 130, 246, 0.8);
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
          }, 600);
        });
      });
      
      // Create elegant background animations
      createElegantBackground();
      
      // Toggle theme button
      const themeToggle = document.getElementById('theme-toggle');
      const body = document.body;
      
      if (themeToggle) {
        themeToggle.addEventListener('click', () => {
          if (body.classList.contains('theme-dark')) {
            body.classList.remove('theme-dark');
            body.classList.add('theme-light');
            themeToggle.innerHTML = '<i class="fas fa-moon"></i>';
          } else {
            body.classList.remove('theme-light');
            body.classList.add('theme-dark');
            themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
          }
        });
      }
      
      // Countdown animation
      startCountdown();
    });
    
    function createElegantBackground() {
      const container = document.querySelector('.particles');
      if (!container) return;
      
      // Clear existing particles if any
      container.innerHTML = '';
      
      // Create fewer, more elegant particles
      const particleCount = 30;
      
      for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.classList.add('particle');
        
        // More controlled positioning for elegant effect
        const posX = Math.random() * window.innerWidth;
        const posY = Math.random() * window.innerHeight;
        
        // Smaller, more subtle sizes
        const size = Math.random() * 8 + 2;
        
        // Slower, more elegant movement
        const duration = Math.random() * 30 + 20;
        
        // Staggered appearance
        const delay = Math.random() * 10;
        
        // Apply styles
        particle.style.left = `${posX}px`;
        particle.style.top = `${posY}px`;
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        particle.style.opacity = `${Math.random() * 0.5 + 0.1}`;
        particle.style.animationDuration = `${duration}s`;
        particle.style.animationDelay = `${delay}s`;
        
        container.appendChild(particle);
        
        // Create new particle when this one completes
        setTimeout(() => {
          particle.remove();
          createNewElegantParticle(container);
        }, (duration + delay) * 1000);
      }
    }
    
    function createNewElegantParticle(container) {
      const particle = document.createElement('div');
      particle.classList.add('particle');
      
      const posX = Math.random() * window.innerWidth;
      const posY = window.innerHeight + Math.random() * 20; // Start from bottom
      
      const size = Math.random() * 8 + 2;
      const duration = Math.random() * 30 + 20;
      
      particle.style.left = `${posX}px`;
      particle.style.top = `${posY}px`;
      particle.style.width = `${size}px`;
      particle.style.height = `${size}px`;
      particle.style.opacity = `${Math.random() * 0.5 + 0.1}`;
      particle.style.animationDuration = `${duration}s`;
      
      container.appendChild(particle);
      
      setTimeout(() => {
        particle.remove();
        createNewElegantParticle(container);
      }, duration * 1000);
    }
    
    function startCountdown() {
      const countdownEl = document.getElementById('countdown');
      if (!countdownEl) return;
      
      // Set launch date (example: 1 month from now)
      const launchDate = new Date();
      launchDate.setMonth(launchDate.getMonth() + 1);
      
      function updateCountdown() {
        const now = new Date();
        const difference = launchDate - now;
        
        const days = Math.floor(difference / (1000 * 60 * 60 * 24));
        const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((difference % (1000 * 60)) / 1000);
        
        countdownEl.innerHTML = `
          <div class="flex space-x-4 justify-center">
            <div class="text-center">
              <div class="text-3xl font-bold">${days}</div>
              <div class="text-xs uppercase tracking-wide">Days</div>
            </div>
            <div class="text-center">
              <div class="text-3xl font-bold">${hours}</div>
              <div class="text-xs uppercase tracking-wide">Hours</div>
            </div>
            <div class="text-center">
              <div class="text-3xl font-bold">${minutes}</div>
              <div class="text-xs uppercase tracking-wide">Minutes</div>
            </div>
            <div class="text-center">
              <div class="text-3xl font-bold">${seconds}</div>
              <div class="text-xs uppercase tracking-wide">Seconds</div>
            </div>
          </div>
        `;
      }
      
      updateCountdown();
      setInterval(updateCountdown, 1000);
    }
  </script>
</head>

<body>
  <!-- Particles Background -->
  <div class="particles"></div>
  
  <!-- Background Image Overlay -->
  <div class="absolute top-0 left-0 w-full h-full -z-10">
    <img src="image/amaliah.jpg" alt="Background" class="w-full h-full object-cover opacity-5" />
  </div>
  
  <!-- Header with Logo Only -->
  <header class="absolute top-0 left-0 w-full p-4">
    <div class="flex items-center space-x-2">
      <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-800 to-blue-600 flex items-center justify-center">
        <i class="fas fa-code text-white"></i>
      </div>
      <span class="font-bold text-xl bg-gradient-to-r from-blue-300 to-blue-100 bg-clip-text text-transparent">PKL Project</span>
    </div>
  </header>
  
  <!-- Main Content -->
  <div class="min-h-screen flex flex-col justify-center items-center text-center px-5">
    <div class="glass-card rounded-xl p-10 shadow-2xl card-hover max-w-3xl w-full animate-gradient" style="background: linear-gradient(135deg, rgba(15, 23, 42, 0.9) 0%, rgba(30, 58, 138, 0.9) 100%);">
      <h1 class="sm:text-6xl text-5xl font-extrabold mb-8 tracking-tight text-white text-glow">
        SELAMAT DATANG
      </h1>
      
      <p class="text-lg leading-relaxed xl:w-2/3 mx-auto text-blue-200 mb-10">
        Jika belum memiliki akun harap register untuk mengakses sistem
      </p>
      
      <!-- Action Buttons -->
      <div class="flex flex-col md:flex-row gap-4 justify-center mt-6">
        <a href="{{ route('login') }}" class="transition-link custom-button text-white font-semibold py-4 px-10 rounded-lg shadow-lg flex items-center justify-center space-x-2">
          <span>Masuk</span>
          <i class="fas fa-arrow-right ml-2"></i>
        </a>
        
        <a href="{{ route('register') }}" class="transition-link bg-transparent border-2 border-blue-400/50 text-blue-200 font-semibold py-4 px-10 rounded-lg shadow-lg hover:bg-blue-500/20 flex items-center justify-center space-x-2 transition-all duration-300">
          <span>Daftar Akun</span>
          <i class="fas fa-user-plus ml-2"></i>
        </a>
      </div>
    </div>
  </div>
  
  <!-- Social Media Links -->
  <div class="absolute bottom-16 mb-4 flex justify-center w-full space-x-4">
    <a href="#" class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-800/30 to-blue-600/30 flex items-center justify-center transition-all hover:bg-blue-600 hover:-translate-y-1 duration-300">
      <i class="fab fa-instagram"></i>
    </a>
    <a href="#" class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-800/30 to-blue-600/30 flex items-center justify-center transition-all hover:bg-blue-600 hover:-translate-y-1 duration-300">
      <i class="fab fa-github"></i>
    </a>
    <a href="#" class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-800/30 to-blue-600/30 flex items-center justify-center transition-all hover:bg-blue-600 hover:-translate-y-1 duration-300">
      <i class="fab fa-linkedin-in"></i>
    </a>
  </div>
  
  <!-- Footer -->
  <div class="absolute bottom-5 text-center w-full">
    <p class="text-sm text-gray-300 opacity-80">&copy; 2025 PKL Project. All Rights Reserved.</p>
  </div>
</body>
</html>