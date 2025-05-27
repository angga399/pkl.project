<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengambilan Foto dengan Lokasi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #121212;
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(53, 71, 125, 0.2) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(95, 75, 139, 0.15) 0%, transparent 50%);
            min-height: 100vh;
        }
        
        .card {
            background: rgba(30, 30, 36, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.4s ease;
        }
        
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }
        
        .icon-container {
            transition: all 0.4s ease;
        }
        
        .arrive-icon {
            background: linear-gradient(135deg, #36d1dc, #5b86e5);
        }
        
        .leave-icon {
            background: linear-gradient(135deg, #ff9966, #ff5e62);
        }
        
        .card:hover .icon-container {
            transform: scale(1.1) rotate(5deg);
        }
        
        .title-container {
            background: rgba(22, 22, 26, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.4);
            }
            70% {
                box-shadow: 0 0 0 15px rgba(255, 255, 255, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0);
            }
        }
        
        .status-indicator {
            position: absolute;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            top: 18px;
            right: 18px;
        }
    </style>
</head>
<body class="flex flex-col items-center justify-center p-6">
    <!-- Header -->
    <div class="title-container w-auto mb-12 rounded-xl shadow-2xl px-10 py-5 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-white tracking-wider">Pengambilan Foto dengan Lokasi</h1>
        <p class="text-gray-400 mt-2 text-sm md:text-base">Silakan pilih jenis absensi yang akan dilakukan</p>
    </div>

    <!-- Cards Container -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full max-w-4xl px-4">
        <!-- Absen Datang Card -->
        <div class="card rounded-2xl overflow-hidden shadow-2xl relative">
            <span class="status-indicator bg-green-500 pulse"></span>
            <a href="{{ route('absen.datang') }}" class="block p-8">
                <div class="flex flex-col items-center">
                    <div class="icon-container arrive-icon w-24 h-24 rounded-full flex items-center justify-center mb-8 shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-semibold text-white mb-2">Absen Datang</h2>
                    <p class="text-gray-400 text-center">Rekam kehadiran Anda hari ini</p>
                    
                    <div class="mt-6 bg-opacity-20 bg-white rounded-lg px-4 py-2 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-gray-300 text-sm">Dengan lokasi saat ini</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Absen Pulang Card -->
        <div class="card rounded-2xl overflow-hidden shadow-2xl relative">
            <span class="status-indicator bg-yellow-500 pulse"></span>
            <a href="{{ route('absen.pulang') }}" class="block p-8">
                <div class="flex flex-col items-center">
                    <div class="icon-container leave-icon w-24 h-24 rounded-full flex items-center justify-center mb-8 shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-semibold text-white mb-2">Absen Pulang</h2>
                    <p class="text-gray-400 text-center">Catat kepulangan Anda</p>
                    
                    <div class="mt-6 bg-opacity-20 bg-white rounded-lg px-4 py-2 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-gray-300 text-sm">Dengan lokasi saat ini</span>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Footer -->
    <div class="mt-12 text-gray-500 text-sm text-center">
        <p>© 2025 • Sistem Absensi Digital</p>
    </div>
</body>
</html>