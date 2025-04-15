*<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengambilan Foto - Persetujuan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%);
            --card-gradient: linear-gradient(135deg, rgba(255,255,255,0.9) 0%, rgba(255,255,255,0.7) 100%);
            --text-primary: #1a5f7a;
            --accent-color: #00c2cb;
        }

        body {
            background: var(--primary-gradient);
            color: white;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
        }

        /* Animated Background */
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

        @keyframes animate {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
            }
        }

         /* Sidebar Styling */
    #sidebar {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-right: 1px solid rgba(255, 255, 255, 0.2);
        width: 60px;
        min-height: 100vh;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: fixed;
        left: 0;
        top: 0;
        z-index: 1000;
        overflow-x: hidden;
    }

    #sidebar.expanded {
        width: 200px;
    }

    .sidebar-text {
        opacity: 0;
        transform: translateX(-10px);
        transition: all 0.3s ease;
        white-space: nowrap;
    }

    #sidebar.expanded .sidebar-text {
        opacity: 1;
        transform: translateX(0);
    }

    /* Main Content Styling */
    .main-content {
        margin-left: 60px;
        transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        width: calc(100% - 60px);
        position: relative;
    }

    .main-content.sidebar-expanded {
        margin-left: 200px;
        width: calc(100% - 200px);
    }

    /* Add animations for sidebar items */
    #sidebar .sidebar-nav li {
        transition: transform 0.2s ease;
    }

    #sidebar .sidebar-nav li:hover {
        transform: translateX(5px);
    }

    #sidebar .sidebar-nav i {
        transition: all 0.3s ease;
    }

    #sidebar .sidebar-nav li:hover i {
        color: var(--accent-color);
    }

    /* Button animation */
    #toggleBtn {
        transition: all 0.3s ease;
    }

    #toggleBtn:hover {
        background: rgba(255, 255, 255, 0.1);
    }

    #toggleBtn i {
        transition: transform 0.3s ease;
    }

    #sidebar.expanded #toggleBtn i {
        transform: rotate(90deg);
    }

        /* Content Card Styling */
        .content-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 2rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        /* Table Styling */
        .table-custom {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border-radius: 15px;
            overflow: hidden;
        }

        .table-custom th {
            background: rgba(0, 194, 203, 0.2);
            color: white;
            padding: 1rem;
            font-weight: 600;
        }

        .table-custom td {
            padding: 1rem;
            color: white;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .table-custom tbody tr:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        /* Form Controls */
        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            backdrop-filter: blur(5px);
        }

        .form-control:focus {
            border-color: var(--accent-color);
            outline: none;
        }

        /* Buttons */
        .btn {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--accent-color);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 194, 203, 0.3);
        }

        .btn-success {
            background: #10B981;
            color: white;
        }

        .btn-danger {
            background: #EF4444;
            color: white;
        }

        /* Status Badges */
        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 999px;
            font-weight: 500;
            font-size: 0.875rem;
        }

        .status-pending {
            background: rgba(234, 179, 8, 0.2);
            color: #FCD34D;
        }

        .status-approved {
            background: rgba(16, 185, 129, 0.2);
            color: #6EE7B7;
        }

        .status-rejected {
            background: rgba(239, 68, 68, 0.2);
            color: #FCA5A5;
        }

        /* Images */
        .photo-preview {
            width: 64px;
            height: 64px;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .photo-preview:hover {
            transform: scale(1.1);
        }

        /* Location Link */
        .location-link {
            color: var(--accent-color);
            text-decoration: none;
            transition: all 0.3s;
        }

        .location-link:hover {
            color: #6dd5ed;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Animated Background -->
    <ul class="bg-circles">
        <li></li>
        <li></li>
        <li></li>
    </ul>

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="flex-none flex flex-col items-center">
            <button id="toggleBtn" class="p-4 w-full flex justify-center cursor-pointer">
                <i class="fas fa-bars text-white text-xl"></i>
            </button>
            
            <ul class="sidebar-nav space-y-8 mt-10 w-full">
                <li>
                    <a href="{{ route('pembimbing.approvals') }}" class="flex items-center p-3 text-white">
                        <i class="fas fa-eye text-xl"></i>
                        <span class="ml-3 sidebar-text">Absensi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pembimbing.journals') }}" class="flex items-center p-3 text-white">
                        <i class="fas fa-book text-xl"></i>
                        <span class="ml-3 sidebar-text">Jurnal</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pembimbing.shalat') }}" class="flex items-center p-3 text-white">
                        <i class="fas fa-mosque text-xl"></i>
                        <span class="ml-3 sidebar-text">Shalat</span>
                    </a>
                </li>
            </ul>
        </div>
    
    <!-- Main Content -->
    <div class="flex-1 p-5 overflow-auto">
      <h1 class="text-2xl font-bold mb-5">Daftar Pengambilan Foto - Persetujuan</h1>
      
      <!-- Filter Form: Pilih Minggu -->
      <div class="mb-4">
        <form method="GET" action="{{ route('pembimbing.approvals') }}" class="flex flex-col sm:flex-row items-start sm:items-center gap-2">
          <label for="week" class="font-semibold text-white">Pilih Minggu:</label>
          <input type="week" id="week" name="week" class="border rounded-lg p-2 text-black"
                 value="{{ request('week', \Carbon\Carbon::now()->format('Y-\WW')) }}">
          <button type="submit" class="ml-4 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
            Tampilkan
          </button>
        </form>
        <p class="mt-2 text-gray-300">
          Menampilkan data dari {{ $startOfWeek->format('d M Y') }} hingga {{ $endOfWeek->format('d M Y') }}
        </p>
      </div>
      
      <!-- Form Pencarian Berdasarkan Perusahaan -->
      <div class="mb-4">
        <form method="GET" action="{{ route('pembimbing.approvals') }}" class="flex flex-col sm:flex-row items-start sm:items-center gap-2">
          <!-- Hidden input untuk menyimpan minggu yang dipilih -->
          <input type="hidden" name="week" value="{{ request('week', $selectedWeek) }}">
          
          <label for="PT" class="font-semibold text-white">Pilih Perusahaan:</label>
          <select name="PT" id="PT" class="border rounded-lg p-2 text-black">
            <option value="" disabled {{ request('PT') == '' ? 'selected' : '' }}>Pilih Perusahaan</option>
            <option value="Perusahaan A" {{ request('PT') == 'Perusahaan A' ? 'selected' : '' }}>Perusahaan A</option>
            <option value="Perusahaan B" {{ request('PT') == 'Perusahaan B' ? 'selected' : '' }}>Perusahaan B</option>
            <option value="Perusahaan C" {{ request('PT') == 'Perusahaan C' ? 'selected' : '' }}>Perusahaan C</option>
            <option value="Perusahaan D" {{ request('PT') == 'Perusahaan D' ? 'selected' : '' }}>Perusahaan D</option>
          </select>
          <button type="submit" class="ml-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            Cari
          </button>
        </form>
        <p class="mt-2 text-gray-300">
          Menampilkan data dari {{ $startOfWeek->format('d M Y') }} hingga {{ $endOfWeek->format('d M Y') }}
        </p>
      </div>
      
      
      <!-- Tabel Absen Datang -->
      <h2 class="text-xl font-semibold text-gray-200 mb-4">Absen Datang</h2>
      <div class="overflow-x-auto mb-8">
        <table class="table-custom">
          <thead>
            <tr>
              <th>Foto</th>
              <th>Hari</th>
              <th>Tanggal</th>
              <th>Perusahaan</th>
              <th>Lokasi</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($daftarhdrs as $item)
              @if ($item->tipe === 'datang')
                <tr>
                  <td>
                    <img src="{{ $item->dataGambar }}" alt="Foto" class="w-16 h-16 object-cover rounded-md cursor-pointer" onclick="showModal(this)" />
                  </td>
                  <td>{{ $item->hari }}</td>
                  <td>{{ $item->tanggal }}</td>
                  <td>{{ $item->pt }}</td>
                  <td>
                    <a href="https://www.google.com/maps?q={{ $item->latitude }},{{ $item->longitude }}" target="_blank" class="text-blue-500 underline">
                      Lihat Lokasi
                    </a>
                  </td>
                  <td>
                    @if ($item->status === 'Disetujui')
                      <span class="text-green-500 font-bold">Disetujui</span>
                    @elseif ($item->status === 'Ditolak')
                      <span class="text-red-500 font-bold">Ditolak</span>
                    @else
                      <span class="text-yellow-500 font-bold">Menunggu Persetujuan</span>
                    @endif
                  </td>
                  <td>
                    @if ($item->status === 'Menunggu Persetujuan')
                      <form action="{{ route('pembimbing.approve', $item->id) }}" method="POST" class="inline-block">
                        @csrf
                        <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600" onclick="return confirm('Setujui item ini?')">
                          Setujui
                        </button>
                      </form>
                      <form action="{{ route('pembimbing.reject', $item->id) }}" method="POST" class="inline-block ml-2">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" onclick="return confirm('Tolak item ini?')">
                          Tolak
                        </button>
                      </form>
                    @endif
                  </td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
      </div>
      
      <!-- Tabel Absen Pulang -->
      <h2 class="text-xl font-semibold text-gray-200 mb-4">Absen Pulang</h2>
      <div class="overflow-x-auto">
        <table class="table-custom">
          <thead>
            <tr>
              <th>Foto</th>
              <th>Hari</th>
              <th>Tanggal</th>
              <th>Perusahaan</th>
              <th>Lokasi</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($daftarhdrs as $item)
              @if ($item->tipe === 'pulang')
                <tr>
                  <td>
                    <img src="{{ $item->dataGambar }}" alt="Foto" class="w-16 h-16 object-cover rounded-md cursor-pointer" onclick="showModal(this)" />
                  </td>
                  <td>{{ $item->hari }}</td>
                  <td>{{ $item->tanggal }}</td>
                  <td>{{ $item->pt }}</td>
                  <td>
                    <a href="https://www.google.com/maps?q={{ $item->latitude }},{{ $item->longitude }}" target="_blank" class="text-blue-500 underline">
                      Lihat Lokasi
                    </a>
                  </td>
                  <td>
                    @if ($item->status === 'Disetujui')
                      <span class="text-green-500 font-bold">Disetujui</span>
                    @elseif ($item->status === 'Ditolak')
                      <span class="text-red-500 font-bold">Ditolak</span>
                    @else
                      <span class="text-yellow-500 font-bold">Menunggu Persetujuan</span>
                    @endif
                  </td>
                  <td>
                    @if ($item->status === 'Menunggu Persetujuan')
                      <form action="{{ route('pembimbing.approve', $item->id) }}" method="POST" class="inline-block">
                        @csrf
                        <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600" onclick="return confirm('Setujui item ini?')">
                          Setujui
                        </button>
                      </form>
                      <form action="{{ route('pembimbing.reject', $item->id) }}" method="POST" class="inline-block ml-2">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" onclick="return confirm('Tolak item ini?')">
                          Tolak
                        </button>
                      </form>
                    @endif
                  </td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
  <!-- Modal untuk Zoom Gambar -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>*