<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login PKL</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
        }

        .welcome-header {
            text-align: center;
            padding: 40px 0;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        .info-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            transition: transform 0.3s ease;
            backdrop-filter: blur(5px);
        }

        .info-card:hover {
            transform: translateY(-5px);
        }

        .info-card h3 {
            color: #2c3e50;
            border-bottom: 2px solid #4e73df;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .regulation-list {
            list-style: none;
            padding-left: 0;
        }

        .regulation-list li {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
        }

        .regulation-list li:last-child {
            border-bottom: none;
        }

        .regulation-list i {
            color: #4e73df;
            margin-right: 15px;
            font-size: 1.2rem;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 5px; /* Reduced border-radius for a boxy look */
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            backdrop-filter: blur(5px);
            border: 1px solid #ddd; /* Added border for more definition */
        }

        .btn-login {
            background: #4e73df;
            border: none;
            border-radius: 5px; /* Reduced border-radius for a boxy look */
            padding: 12px;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: #3b5998;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .welcome-header {
                padding: 30px 15px;
            }
            
            .info-card {
                margin: 15px;
            }
        }
    </style>
</head>
<body class="bg-gradient-to-r from-teal-400 to-blue-500 text-white">

    <!-- Welcome Header -->
    <div class="welcome-header">
        <h1>Selamat Datang Peserta PKL</h1>
        <p class="lead">Sistem Informasi Praktek Kerja Lapangan</p>
    </div>

    <div class="container">
        <div class="row">
            <!-- Left Column: Introduction and Regulation Cards -->
            <div class="col-lg-5 mb-4">
                <!-- Introduction Card -->
                <div class="info-card">
                    <h3><i class="fas fa-info-circle"></i> Pendahuluan</h3>
                    <button class="btn btn-link" data-toggle="collapse" data-target="#introduction" aria-expanded="false" aria-controls="introduction">
                        <i class="fas fa-chevron-down"></i> Lihat Pendahuluan
                    </button>
                    <div class="collapse" id="introduction">
                        <p class="mt-3">Selamat datang di sistem informasi Praktek Kerja Lapangan (PKL). Sistem ini dirancang untuk membantu peserta PKL dalam mengelola kegiatan dan informasi terkait PKL. Pastikan untuk mematuhi semua peraturan yang telah ditetapkan.</p>
                    </div>
                </div>

                <!-- Regulation Card -->
                <div class="info-card">
                    <h3><i class="fas fa-scroll"></i> Peraturan PKL</h3>
                    <button class="btn btn-link" data-toggle="collapse" data-target="#regulationList" aria-expanded="false" aria-controls="regulationList">
                        <i class="fas fa-chevron-down"></i> Lihat Peraturan
                    </button>
                    <div class="collapse" id="regulationList">
                        <ul class="regulation-list">
                            <li><i class="fas fa-check-circle"></i>Wajib hadir tepat waktu</li>
                            <li><i class="fas fa-check-circle"></i>Menggunakan pakaian sopan dan rapi</li>
                            <li><i class="fas fa-check-circle"></i>Membawa perlengkapan kerja lengkap</li>
                            <li><i class="fas fa-check-circle"></i>Mematuhi tata tertib perusahaan</li>
                            <li><i class="fas fa-check-circle"></i>Lapor kepada pembimbing harian</li>
                            <li><i class="fas fa-check-circle"></i>Dilarang meninggalkan lokasi tanpa izin</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Right Column: Login Card -->
            <div class="col-lg-7">
                <div class="login-card">
                    <h2 class="text-center mb-4">Login Peserta</h2>
                    <form>
                        <div class="form-group">
                            <label>NIS/NIM</label>
                            <input type="text" 
                                   class="form-control" 
                                   placeholder="Masukkan NIS/NIM"
                                   required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" 
                                   class="form-control" 
                                   placeholder="Masukkan password"
                                   required>
                        </div>
                        <button class="btn btn-login btn-block text-white">
                            <i class="fas fa-sign-in-alt"></i> Masuk
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <br>
    <br>
    <br>
    <br>
    <br>

    <x-footer></x-footer>
</body>
</html>