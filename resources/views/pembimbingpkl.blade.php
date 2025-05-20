<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pembimbing</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-primary: #0f172a;
            --bg-secondary: #1e293b;
            --accent-color: #1e40af;
            --accent-hover: #3b82f6;
            --text-primary: #f8fafc;
            --text-secondary: #cbd5e1;
            --hover-color: #3b82f6;
            --card-gradient: linear-gradient(135deg, rgba(30, 41, 59, 0.95) 0%, rgba(15, 23, 42, 0.85) 100%);
            --card-border: rgba(59, 130, 246, 0.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-primary);
            color: var(--text-primary);
            min-height: 100vh;
            background-attachment: fixed;
            overflow-x: hidden;
            opacity: 0;
            animation: fadeIn 1.2s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }

        /* Page Entrance Animation */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Content Reveal Animation */
        .fade-in-up {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.9s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            70% {
                opacity: 1;
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Staggered Animation Delays */
        .delay-1 {
            animation-delay: 0.3s;
        }
        
        .delay-2 {
            animation-delay: 0.6s;
        }
        
        .delay-3 {
            animation-delay: 0.9s;
        }
        
        .delay-4 {
            animation-delay: 1.2s;
        }

        /* Animated Background Elements */
        .bg-circles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .bg-circles li {
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: rgba(59, 130, 246, 0.2); /* More subtle blue */
            animation: animate 30s linear infinite;
            bottom: -150px;
            border-radius: 50%;
            opacity: 0;
            animation: circleAppear 1.5s cubic-bezier(0.22, 1, 0.36, 1) forwards, animate 30s cubic-bezier(0.25, 0.1, 0.25, 1) infinite 1.5s;
        }

        @keyframes circleAppear {
            0% {
                opacity: 0;
                transform: scale(0.5);
            }
            100% {
                opacity: 0.3;
                transform: scale(1);
            }
        }

        .bg-circles li:nth-child(1) {
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0.3s;
        }

        .bg-circles li:nth-child(2) {
            left: 10%;
            width: 20px;
            height: 20px;
            animation-delay: 0.6s;
            animation-duration: 36s;
        }

        .bg-circles li:nth-child(3) {
            left: 70%;
            width: 20px;
            height: 20px;
            animation-delay: 0.9s;
        }

        .bg-circles li:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 1.2s;
            animation-duration: 42s;
        }

        .bg-circles li:nth-child(5) {
            left: 65%;
            width: 20px;
            height: 20px;
            animation-delay: 1.5s;
            animation-duration: 30s;
        }

        @keyframes animate {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 0.3;
                border-radius: 50%;
            }
            50% {
                opacity: 0.2;
                border-radius: 50%;
            }
            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
                border-radius: 50%;
            }
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            position: relative;
        }

        /* Welcome Section */
        .welcome-section {
            text-align: center;
            margin-bottom: 2rem;
            padding: 2rem;
            background: rgba(30, 41, 59, 0.8);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .welcome-section h3 {
            color: var(--text-primary);
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }

        .welcome-section p {
            color: var(--text-secondary);
        }

        .stats-container {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 2rem;
        }

        .stat-item {
            background: rgba(30, 41, 59, 0.7);
            padding: 1rem;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .stat-item h4 {
            font-size: 1.5rem;
            color: var(--text-primary);
        }

        .stat-item p {
            font-size: 0.9rem;
            color: var(--text-secondary);
        }

        .header {
            text-align: center;
            margin-bottom: 4rem;
            padding-top: 2rem;
            position: relative;
        }

        .header::after {
            content: '';
            display: block;
            width: 100px;
            height: 4px;
            background: var(--accent-color);
            margin: 1rem auto;
            border-radius: 2px;
        }

        .header h1 {
            font-size: 2.5rem;
            color: var(--text-primary);
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .header h2 {
            color: var(--text-secondary);
            font-size: 1rem;
            font-weight: 400;
        }

        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: 1rem;
        }

        .card {
            background: var(--card-gradient);
            border-radius: 20px;
            padding: 2rem;
            backdrop-filter: blur(10px);
            border: 1px solid var(--card-border);
            transition: all 0.5s cubic-bezier(0.22, 1, 0.36, 1);
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(59, 130, 246, 0.1), transparent);
            transform: translateX(-100%);
            transition: transform 0.8s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .card:hover::before {
            transform: translateX(100%);
        }

        .card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            border-color: var(--accent-color);
            transition: all 0.5s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .card-header {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .card-icon {
            width: 70px;
            height: 70px;
            margin-right: 1.5rem;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        .card-icon svg {
            width: 42px;
            height: 42px;
            position: relative;
            z-index: 2;
        }

        .card-icon::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            z-index: 1;
        }

        /* Custom icons background patterns */
        .attendance-icon::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(circle at 10% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 20%),
                            radial-gradient(circle at 80% 70%, rgba(255, 255, 255, 0.1) 0%, transparent 20%);
            z-index: 1;
        }

        .internship-icon::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.1) 25%, transparent 25%, transparent 50%, 
                              rgba(255, 255, 255, 0.1) 50%, rgba(255, 255, 255, 0.1) 75%, transparent 75%);
            background-size: 20px 20px;
            z-index: 1;
        }

        .prayer-icon::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(circle at 85% 15%, rgba(255, 255, 255, 0.15) 0%, transparent 25%),
                              radial-gradient(circle at 15% 85%, rgba(255, 255, 255, 0.15) 0%, transparent 25%);
            z-index: 1;
        }

        .card-title {
            color: var(--text-primary);
            font-size: 1.4rem;
            font-weight: 600;
        }

        .card-content p {
            color: var(--text-secondary);
            margin-bottom: 1.5rem;
            line-height: 1.6;
            font-size: 1.1rem;
        }

        .card-link {
            display: inline-flex;
            align-items: center;
            color: var(--accent-hover);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.4s cubic-bezier(0.22, 1, 0.36, 1);
            padding: 0.5rem 1rem;
            background: rgba(59, 130, 246, 0.1);
            border-radius: 8px;
        }

        .card-link:hover {
            color: var(--hover-color);
            transform: translateX(5px);
            background: rgba(59, 130, 246, 0.2);
        }

        .card-link i {
            margin-left: 0.5rem;
            font-size: 0.875rem;
        }

        /* Footer Section */
        .footer {
            text-align: center;
            margin-top: 4rem;
            padding: 2rem;
            background: rgba(30, 41, 59, 0.8);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .footer p {
            color: var(--text-secondary);
            margin-bottom: 1rem;
        }

        .quick-actions {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1rem;
        }

        .action-button {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.25rem;
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            border: none;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            transition: all 0.5s cubic-bezier(0.22, 1, 0.36, 1);
            font-weight: 500;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }
        
        .action-button::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transform: translateX(-100%);
            transition: transform 0.8s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .action-button:hover::after {
            transform: translateX(100%);
        }

        .action-button:hover {
            background: linear-gradient(135deg, #1e40af, #60a5fa);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.25);
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .cards-container {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 1.5rem;
            }

            .stats-container {
                flex-direction: column;
                align-items: center;
            }

            .stat-item {
                width: 100%;
                max-width: 300px;
            }
            
            .quick-actions {
                flex-direction: column;
                align-items: center;
            }
            
            .action-button {
                width: 100%;
                justify-content: center;
            }
        }

        /* Custom animations */
        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            25% { transform: translateY(-5px) rotate(1deg); }
            50% { transform: translateY(-10px) rotate(2deg); }
            75% { transform: translateY(-5px) rotate(1deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }

        .card-icon {
            animation: float 8s cubic-bezier(0.4, 0, 0.2, 1) infinite;
        }
    </style>
</head>
<body>
    <!-- Animated Background Circles -->
    <ul class="bg-circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>

    {{-- <x-bar></x-bar> --}}
    <div class="container">
        <!-- Welcome Section -->
        <div class="welcome-section fade-in-up delay-1">
            <h3>Selamat Datang, Pembimbing!</h3>
            <p>Dashboard monitoring kegiatan siswa PKL</p>
        </div>

        <header class="header fade-in-up delay-2">
            <h1>Halaman Pembimbing</h1>
            <h2>Mohon Isi Kegiatan Murid-murid PKL</h2>
        </header>

        <div class="cards-container">
            <!-- Absensi Kehadiran Card -->
            <div class="card fade-in-up delay-2">
                <div class="card-header">
                    <div class="card-icon attendance-icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" fill="white"/>
                            <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" fill="white"/>
                            <path d="M18 8H20" stroke="white" stroke-width="2" stroke-linecap="round"/>
                            <path d="M18 12H20" stroke="white" stroke-width="2" stroke-linecap="round"/>
                            <path d="M18 16H20" stroke="white" stroke-width="2" stroke-linecap="round"/>
                            <path d="M4 8H6" stroke="white" stroke-width="2" stroke-linecap="round"/>
                            <path d="M4 12H6" stroke="white" stroke-width="2" stroke-linecap="round"/>
                            <path d="M4 16H6" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h2 class="card-title">Absensi Kehadiran Siswa</h2>
                </div>
                <div class="card-content">
                    <p>Isi dan kelola absensi kehadiran siswa secara efisien</p>
                    <a href="{{ route('pembimbing.approvals') }}" class="card-link">
                        Buka Halaman <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- PKL Card -->
            <div class="card fade-in-up delay-3">
                <div class="card-header">
                    <div class="card-icon internship-icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 7H4C3.44772 7 3 7.44772 3 8V19C3 19.5523 3.44772 20 4 20H20C20.5523 20 21 19.5523 21 19V8C21 7.44772 20.5523 7 20 7Z" fill="white"/>
                            <path d="M16 7V5C16 3.89543 15.1046 3 14 3H10C8.89543 3 8 3.89543 8 5V7" stroke="white" stroke-width="2" stroke-linecap="round"/>
                            <path d="M12 12L9 15H15L12 12Z" fill="white"/>
                            <path d="M12 11V16" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h2 class="card-title">Praktik Kerja Lapangan</h2>
                </div>
                <div class="card-content">
                    <p>Pantau dan catat perkembangan kegiatan PKL siswa</p>
                    <a href="{{ route('pembimbing.journals') }}" class="card-link">
                        Buka Halaman <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Shalat Card -->
            <div class="card fade-in-up delay-4">
                <div class="card-header">
                    <div class="card-icon prayer-icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L14.5 7H9.5L12 2Z" fill="white"/>
                            <path d="M12 22V13M12 13C10.3431 13 9 11.6569 9 10V9C9 7.34315 10.3431 6 12 6C13.6569 6 15 7.34315 15 9V10C15 11.6569 13.6569 13 12 13Z" stroke="white" stroke-width="2" stroke-linecap="round"/>
                            <path d="M5 22H19" stroke="white" stroke-width="2" stroke-linecap="round"/>
                            <path d="M3 10H5M19 10H21" stroke="white" stroke-width="2" stroke-linecap="round"/>
                            <path d="M7 4L8 5M17 4L16 5" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h2 class="card-title">Absensi Shalat</h2>
                </div>
                <div class="card-content">
                    <p>Catat dan monitor kegiatan ibadah shalat siswa</p>
                    <a href="{{ route('pembimbing.shalat') }}" class="card-link">
                        Buka Halaman <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer Section -->
        <div class="footer fade-in-up delay-4">
            <p>Akses Cepat</p>
            <div class="quick-actions">
                <button class="action-button">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 14H14V21H21V14Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10 14H3V21H10V14Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M21 3H14V10H21V3Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10 3H3V10H10V3Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Laporan Harian
                </button>
                <button class="action-button">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="3" y="4" width="18" height="18" rx="2" stroke="white" stroke-width="2"/>
                        <path d="M16 2V6" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        <path d="M8 2V6" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        <path d="M3 10H21" stroke="white" stroke-width="2"/>
                        <path d="M8 14H10" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        <path d="M14 14H16" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        <path d="M8 18H10" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        <path d="M14 18H16" stroke="white" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    Jadwal
                </button>
                <button class="action-button">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 8C18 6.4087 17.3679 4.88258 16.2426 3.75736C15.1174 2.63214 13.5913 2 12 2C10.4087 2 8.88258 2.63214 7.75736 3.75736C6.63214 4.88258 6 6.4087 6 8C6 15 3 17 3 17H21C21 17 18 15 18 8Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13.73 21C13.5542 21.3031 13.3018 21.5547 12.9982 21.7295C12.6946 21.9044 12.3504 21.9965 12 21.9965C11.6496 21.9965 11.3054 21.9044 11.0018 21.7295C10.6982 21.5547 10.4458 21.3031 10.27 21" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="17" cy="5" r="3" fill="white"/>
                    </svg>
                    Notifikasi
                </button>
            </div>
        </div>
    </div>
     <x-footer></x-footer>

</body>
</html>