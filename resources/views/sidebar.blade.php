<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PKL Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        .sidebar {
            transition: all 0.3s ease;
            overflow-x: hidden;
            min-height: 100vh;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
        }

        .nav-link {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 2px;
            width: 0;
            background-color: #60A5FA;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .main-content {
            transition: margin-left 0.3s ease;
        }

        .rotate-180 {
            transform: rotate(180deg);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #1e3a8a;
        }

        ::-webkit-scrollbar-thumb {
            background: #60A5FA;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #3b82f6;
        }

        /* Gradient animation */
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

        .menu-item {
            position: relative;
        }

        .menu-tooltip {
            position: absolute;
            left: 100%;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 14px;
            white-space: nowrap;
            z-index: 1000;
            margin-left: 10px;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .sidebar-collapsed .menu-item:hover .menu-tooltip {
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>
<body class="bg-gray-100" x-data="{ isSidebarOpen: true }">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="sidebar bg-gradient-to-b from-blue-900 via-indigo-800 to-blue-900"
               :class="{ 'w-64': isSidebarOpen, 'w-16': !isSidebarOpen }">
            
            <!-- Brand -->
            <div class="px-4 py-6 flex items-center justify-between">
                <a href="/welcome" class="flex items-center space-x-3" 
                   :class="{ 'justify-center': !isSidebarOpen }">
                    <i class="fas fa-school text-2xl text-white"></i>
                    <span class="text-white font-bold text-lg transition-opacity duration-300"
                          :class="{ 'opacity-0 hidden': !isSidebarOpen }">PKL Siswa</span>
                </a>
            </div>

            <hr class="border-blue-700 mx-4">

            <!-- Navigation -->
            <nav class="px-4 py-4">
                <!-- Journal -->
                <div class="menu-item mb-3">
                    <a href="{{ route('journals.index') }}" 
                       class="nav-link flex items-center p-3 text-gray-200 rounded-lg hover:bg-blue-700/50">
                        <i class="fas fa-book-open w-6 text-xl"></i>
                        <span class="ml-3 transition-opacity duration-300"
                              :class="{ 'opacity-0 hidden': !isSidebarOpen }">Journal</span>
                    </a>
                    <div class="menu-tooltip">Journal</div>
                </div>

                <!-- Absensi -->
                <div class="menu-item mb-3">
                    <a href="{{ route('daftarhdr.index') }}" 
                       class="nav-link flex items-center p-3 text-gray-200 rounded-lg hover:bg-blue-700/50">
                        <i class="fas fa-user-check w-6 text-xl"></i>
                        <span class="ml-3 transition-opacity duration-300"
                              :class="{ 'opacity-0 hidden': !isSidebarOpen }">Absensi</span>
                    </a>
                    <div class="menu-tooltip">Absensi</div>
                </div>

                <!-- Absen Shalat -->
                <div class="menu-item mb-3">
                    <a href="{{ route('dftrshalats.index') }}" 
                       class="nav-link flex items-center p-3 text-gray-200 rounded-lg hover:bg-blue-700/50">
                        <i class="fas fa-mosque w-6 text-xl"></i>
                        <span class="ml-3 transition-opacity duration-300"
                              :class="{ 'opacity-0 hidden': !isSidebarOpen }">Absen Shalat</span>
                    </a>
                    <div class="menu-tooltip">Absen Shalat</div>
                </div>

                <hr class="border-blue-700 my-4">

                <!-- Reports Section -->
                <div class="menu-item mb-3">
                    <a href="charts.html" 
                       class="nav-link flex items-center p-3 text-gray-200 rounded-lg hover:bg-blue-700/50">
                        <i class="fas fa-chart-bar w-6 text-xl"></i>
                        <span class="ml-3 transition-opacity duration-300"
                              :class="{ 'opacity-0 hidden': !isSidebarOpen }">Charts</span>
                    </a>
                    <div class="menu-tooltip">Charts</div>
                </div>

                <div class="menu-item mb-3">
                    <a href="tables.html" 
                       class="nav-link flex items-center p-3 text-gray-200 rounded-lg hover:bg-blue-700/50">
                        <i class="fas fa-table w-6 text-xl"></i>
                        <span class="ml-3 transition-opacity duration-300"
                              :class="{ 'opacity-0 hidden': !isSidebarOpen }">Tables</span>
                    </a>
                    <div class="menu-tooltip">Tables</div>
                </div>
            </nav>

            <!-- Toggle Button -->
            <div class="absolute bottom-4 w-full flex justify-center">
                <button @click="isSidebarOpen = !isSidebarOpen" 
                        class="p-2 rounded-full bg-blue-800 hover:bg-blue-700 text-white transition-all duration-300"
                        :class="{ 'rotate-180': !isSidebarOpen }">
                    <i class="fas fa-chevron-left"></i>
                </button>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 transition-all duration-300"
              :class="{ 'ml-64': isSidebarOpen, 'ml-16': !isSidebarOpen }">
            
            <!-- Header -->
            <header class="bg-white shadow-md p-4">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
                    <div class="flex items-center space-x-4">
                        <button class="p-2 rounded-full hover:bg-gray-100">
                            <i class="fas fa-bell text-gray-600"></i>
                        </button>
                        <button class="p-2 rounded-full hover:bg-gray-100">
                            <i class="fas fa-user text-gray-600"></i>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-6">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        // Save sidebar state
        document.addEventListener('alpine:init', () => {
            Alpine.data('sidebarState', () => ({
                init() {
                    const savedState = localStorage.getItem('sidebarOpen');
                    if (savedState !== null) {
                        this.isSidebarOpen = JSON.parse(savedState);
                    }

                    this.$watch('isSidebarOpen', (value) => {
                        localStorage.setItem('sidebarOpen', JSON.stringify(value));
                    });
                }
            }));
        });
    </script>
</body>
</html>