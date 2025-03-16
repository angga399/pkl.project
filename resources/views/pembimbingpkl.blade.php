<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pembimbing</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%);
            --card-gradient: linear-gradient(135deg, rgba(255,255,255,0.9) 0%, rgba(255,255,255,0.7) 100%);
            --text-primary: #1a5f7a;
            --text-secondary: #2d6d86;
            --hover-color: #20b2aa;
            --accent-color: #00c2cb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: var(--primary-gradient);
            color: white;
            min-height: 100vh;
            background-attachment: fixed;
            overflow-x: hidden;
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
            background: rgba(255, 255, 255, 0.2);
            animation: animate 25s linear infinite;
            bottom: -150px;
            border-radius: 50%;
        }

        .bg-circles li:nth-child(1) {
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }

        .bg-circles li:nth-child(2) {
            left: 10%;
            width: 20px;
            height: 20px;
            animation-delay: 2s;
            animation-duration: 12s;
        }

        .bg-circles li:nth-child(3) {
            left: 70%;
            width: 20px;
            height: 20px;
            animation-delay: 4s;
        }

        .bg-circles li:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 18s;
        }

        .bg-circles li:nth-child(5) {
            left: 65%;
            width: 20px;
            height: 20px;
            animation-delay: 0s;
        }

        @keyframes animate {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
                border-radius: 0;
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
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            backdrop-filter: blur(10px);
        }

        .welcome-section h3 {
            color: white;
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }

        .stats-container {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 2rem;
        }

        .stat-item {
            background: rgba(255, 255, 255, 0.2);
            padding: 1rem;
            border-radius: 10px;
            text-align: center;
        }

        .stat-item h4 {
            font-size: 1.5rem;
            color: white;
        }

        .stat-item p {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
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
            background: rgba(255, 255, 255, 0.3);
            margin: 1rem auto;
            border-radius: 2px;
        }

        .header h1 {
            font-size: 2.5rem;
            color: white;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header h2 {
            color: rgba(255, 255, 255, 0.9);
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
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transform: translateX(-100%);
            transition: 0.6s;
        }

        .card:hover::before {
            transform: translateX(100%);
        }

        .card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            border-color: var(--accent-color);
        }

        .card-header {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .card-icon {
            width: 60px;
            height: 60px;
            margin-right: 1rem;
            background: linear-gradient(135deg, var(--accent-color), var(--hover-color));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-icon i {
            font-size: 1.75rem;
            color: white;
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
            color: var(--accent-color);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            background: rgba(0, 194, 203, 0.1);
            border-radius: 8px;
        }

        .card-link:hover {
            color: var(--hover-color);
            transform: translateX(5px);
            background: rgba(0, 194, 203, 0.2);
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
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            backdrop-filter: blur(10px);
        }

        .footer p {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 1rem;
        }

        .quick-actions {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1rem;
        }

        .action-button {
            padding: 0.5rem 1rem;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .action-button:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
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
        }

        /* Custom animations */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        .card-icon {
            animation: float 3s ease-in-out infinite;
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

    <div class="container">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <h3>Selamat Datang, Pembimbing!</h3>
            <p>Dashboard monitoring kegiatan siswa PKL</p>
            
        
           
        </div>

        <header class="header">
            <h1>Halaman Pembimbing</h1>
            <h2>Mohon Isi Kegiatan Murid-murid PKL</h2>
        </header>

        <div class="cards-container">
            <!-- Absensi Kehadiran Card -->
            <div class="card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <h2 class="card-title">Absensi Kehadiran Siswa</h2>
                </div>
                <div class="card-content">
                    <p>Isi dan kelola absensi kehadiran siswa secara efisien/p>
                    <a href="{{ route('pembimbing.approvals') }}" class="card-link">
                        Buka Halaman <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- PKL Card -->
            <div class="card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-briefcase"></i>
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
            <div class="card">
                <div class="card-header">
                    <div class="card-icon">
                        <i class="fas fa-pray"></i>
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
        <div class="footer">
            <p>Akses Cepat</p>
            <div class="quick-actions">
                <button class="action-button"><i class="fas fa-file-alt"></i> Laporan Harian</button>
                <button class="action-button"><i class="fas fa-calendar"></i> Jadwal</button>
                <button class="action-button"><i class="fas fa-bell"></i> Notifikasi</button>
            </div>
        </div>
    </div>
</body>
</html>