<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengambilan Foto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #121212;
            color: #e0e0e0;
            margin: 0;
            padding: 0;
        }

        .content-wrapper {
            padding: 20px;
            transition: all 0.3s ease;
        }

        .card {
            background-color: #1e1e2d;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            margin-bottom: 24px;
            border: 1px solid #2d2d3a;
            overflow: hidden;
        }

        .table-header {
            background-color: #252536;
            padding: 15px 20px;
            border-bottom: 1px solid #2d2d3a;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
        }

        table th {
            background-color: #212130;
            color: #a7a7c5;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            padding: 12px 16px;
            text-align: left;
            letter-spacing: 0.5px;
            border-bottom: 1px solid #2d2d3a;
        }

        table td {
            padding: 12px 16px;
            border-bottom: 1px solid #2d2d3a;
            color: #e0e0e0;
            vertical-align: middle;
        }

        table tr:hover {
            background-color: #252536;
        }

        .success-alert {
            background-color: rgba(16, 185, 129, 0.15);
            border-left: 4px solid #10b981;
            color: #a7f3d0;
        }

        .profile-img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 8px;
            transition: transform 0.2s;
            border: 2px solid #3d3d5c;
        }

        .profile-img:hover {
            transform: scale(1.1);
            box-shadow: 0 0 10px rgba(79, 70, 229, 0.6);
        }

        .location-link {
            color: #6366f1;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
            padding: 4px 8px;
            border-radius: 6px;
            background-color: rgba(99, 102, 241, 0.1);
        }

        .location-link:hover {
            background-color: rgba(99, 102, 241, 0.2);
            color: #818cf8;
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
        }

        .status-hadir {
            background-color: rgba(16, 185, 129, 0.15);
            color: #6ee7b7;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }

        .status-terlambat {
            background-color: rgba(239, 68, 68, 0.15);
            color: #fca5a5;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.85);
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(5px);
        }

        .modal-close {
            position: absolute;
            top: 25px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.3);
        }

        .modal-close:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        #modalImage {
            max-width: 90%;
            max-height: 90vh;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            border: 2px solid rgba(255, 255, 255, 0.1);
        }

        input[type="week"] {
            background-color: #252536;
            border: 1px solid #2d2d3a;
            color: #e0e0e0;
            padding: 8px 12px;
            border-radius: 6px;
            outline: none;
        }

        input[type="week"]:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.25);
        }

        .btn-primary {
            background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%);
            border: none;
            box-shadow: 0 4px 10px rgba(79, 70, 229, 0.3);
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #4338ca 0%, #4f46e5 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(79, 70, 229, 0.4);
        }

        .btn-success {
            background: linear-gradient(135deg, #059669 0%, #10b981 100%);
            border: none;
            box-shadow: 0 4px 10px rgba(16, 185, 129, 0.3);
            transition: all 0.3s;
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #047857 0%, #059669 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(16, 185, 129, 0.4);
        }

        header {
            background: linear-gradient(135deg, #1e1e2d 0%, #252536 100%);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid #2d2d3a;
        }

        header button:hover {
            background-color: rgba(99, 102, 241, 0.2);
        }
        
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #1e1e2d;
            color: #e0e0e0;
            z-index: 1000;
        }

        /* Tabs Styling */
        .tab-buttons {
            display: flex;
            border-bottom: 1px solid #2d2d3a;
            margin-bottom: 0;
        }

        .tab-button {
            padding: 15px 24px;
            background: transparent;
            border: none;
            color: #a7a7c5;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 0.95rem;
            position: relative;
        }

        .tab-button:hover {
            color: #e0e0e0;
            background-color: rgba(255, 255, 255, 0.03);
        }

        .tab-button.active {
            color: #6366f1;
            background-color: #252536;
        }

        .tab-button.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%);
            border-radius: 3px 3px 0 0;
        }

        .tab-button i {
            margin-right: 10px;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .tab-icon-datang {
            color: #10b981;
        }

        .tab-icon-pulang {
            color: #ef4444;
        }
    </style>
</head>
<body class="bg-gray-900">
    
    @include('sidebar')
    <!-- Main Content -->
    <div class="content-wrapper" id="content">
        <!-- Page Content -->
        <div class="p-6">
            <!-- Pesan Sukses -->
            @if (session('success'))
                <div class="success-alert p-4 rounded mb-5 flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tombol dan Filter -->
            <div class="flex flex-wrap justify-between items-center mb-6 gap-4">
                <a href="{{ route('daftarhdr.create') }}" class="btn btn-primary px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-plus-circle mr-2"></i>
                    Ambil Foto Baru
                </a>
                
                <form method="GET" action="{{ route('daftarhdr.index') }}" class="flex flex-wrap items-center gap-3">
                    <label for="week" class="font-semibold text-gray-400">Pilih Minggu:</label>
                    <input type="week" id="week" name="week" value="{{ request('week', \Carbon\Carbon::now()->format('Y-\WW')) }}" class="focus:ring-indigo-500">
                    <button type="submit" class="btn btn-success px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-filter mr-2"></i>
                        Tampilkan
                    </button>
                </form>
            </div>
            
            <p class="text-gray-400 mb-6">
                <i class="far fa-calendar-alt mr-2 text-indigo-400"></i>
                Menampilkan data dari <span class="font-semibold text-indigo-300">{{ $startOfWeek->format('d M Y') }}</span> hingga <span class="font-semibold text-indigo-300">{{ $endOfWeek->format('d M Y') }}</span>
            </p>

            <!-- Tabs Container -->
            <div class="card">
                <!-- Tab Navigation -->
                <div class="tab-buttons">
                    <button class="tab-button active" onclick="openTab('absenDatang')">
                        <i class="fas fa-sign-in-alt tab-icon-datang"></i>Absen Datang
                    </button>
                    <button class="tab-button" onclick="openTab('absenPulang')">
                        <i class="fas fa-sign-out-alt tab-icon-pulang"></i>Absen Pulang
                    </button>
                </div>
                
                <!-- Tab Content - Absen Datang -->
                <div id="absenDatang" class="tab-content active">
                    <div class="table-container">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Hari</th>
                                    <th>Nama</th>
                                    <th>Perusahaan</th>
                                    <th>Tanggal</th>
                                    <th>Lokasi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($daftarhdrs as $item)
                                    @if ($item->tipe === 'datang')
                                    <tr>
                                        <td>
                                            <img src="{{ $item->dataGambar }}"   alt="Foto" class="profile-img cursor-pointer" onclick="showModal(this)">
                                        </td>
                                        <td>{{ $item->hari }}</td>
                                        <td class="font-medium">{{ $item->nama }}</td>
                                        <td>{{ $item->pt }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>
                                            <a href="https://www.google.com/maps?q={{ $item->latitude }},{{ $item->longitude }}" target="_blank" class="location-link">
                                                <i class="fas fa-map-marker-alt mr-1"></i> Lihat
                                            </a>
                                        </td>
                                        <td>
                                            <span class="status-badge {{ $item->status == 'Hadir' ? 'status-hadir' : 'status-terlambat' }}">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Tab Content - Absen Pulang -->
                <div id="absenPulang" class="tab-content">
                    <div class="table-container">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Hari</th>
                                    <th>Nama</th>
                                    <th>Perusahaan</th>
                                    <th>Tanggal</th>
                                    <th>Lokasi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($daftarhdrs as $item)
                                    @if ($item->tipe === 'pulang')
                                    <tr>
                                        <td>
                                            <img src="{{ $item->dataGambar }}" alt="Foto" class="profile-img cursor-pointer" onclick="showModal(this)">
                                        </td>
                                        <td>{{ $item->hari }}</td>
                                        <td class="font-medium">{{ $item->nama }}</td>
                                        <td>{{ $item->pt }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>
                                            <a href="https://www.google.com/maps?q={{ $item->latitude }},{{ $item->longitude }}" target="_blank" class="location-link">
                                                <i class="fas fa-map-marker-alt mr-1"></i> Lihat
                                            </a>
                                        </td>
                                        <td>
                                            <span class="status-badge {{ $item->status == 'Hadir' ? 'status-hadir' : 'status-terlambat' }}">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Zoom Gambar -->
    <div id="imageModal" class="modal">
        <span class="modal-close" onclick="hideModal()">&times;</span>
        <img id="modalImage" src="" alt="Zoomed Foto">
    </div>

    <script>
        function showModal(img) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            modalImage.src = img.src;
            modal.style.display = 'flex';
        }

        function hideModal() {
            const modal = document.getElementById('imageModal');
            modal.style.display = 'none';
        }

        function openTab(tabName) {
            // Hide all tab contents
            const tabContents = document.getElementsByClassName('tab-content');
            for (let i = 0; i < tabContents.length; i++) {
                tabContents[i].classList.remove('active');
            }
            
            // Remove active class from all tab buttons
            const tabButtons = document.getElementsByClassName('tab-button');
            for (let i = 0; i < tabButtons.length; i++) {
                tabButtons[i].classList.remove('active');
            }
            
            // Show the selected tab content and mark the button as active
            document.getElementById(tabName).classList.add('active');
            event.currentTarget.classList.add('active');
        }
    </script>
</body>
</html>