<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Waktu Shalat - Persetujuan</title>
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
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
            margin-bottom: 2rem;
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
    <div id="mainContent" class="main-content p-8 overflow-auto">
      <div class="content-card">
        <h1 class="text-2xl font-bold mb-6">Daftar Waktu Shalat - Persetujuan</h1>

        <!-- Filters -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
          <!-- Week Filter -->
          <div class="form-group">
            <form method="GET" action="{{ route('pembimbing.shalat') }}" class="flex items-center gap-4">
              <label class="font-semibold">Pilih Minggu:</label>
              <input type="week" name="week" class="form-control" 
                     value="{{ request('week', \Carbon\Carbon::now()->format('Y-\WW')) }}">
              <button type="submit" class="btn btn-primary">
                Tampilkan
              </button>
            </form>
          </div>

          <!-- Company Filter -->
          <div class="form-group">
            <form method="GET" action="{{ route('pembimbing.shalat') }}" class="flex items-center gap-4">
              <input type="hidden" name="week" value="{{ request('week', $selectedWeek) }}">
              <label class="font-semibold">Pilih Perusahaan:</label>
              <select name="PT" class="form-control">
                <option value="" disabled {{ request('PT') == '' ? 'selected' : '' }}>Pilih Perusahaan</option>
                <option value="Perusahaan A" {{ request('PT') == 'Perusahaan A' ? 'selected' : '' }}>Perusahaan A</option>
                <option value="Perusahaan B" {{ request('PT') == 'Perusahaan B' ? 'selected' : '' }}>Perusahaan B</option>
                <option value="Perusahaan C" {{ request('PT') == 'Perusahaan C' ? 'selected' : '' }}>Perusahaan C</option>
                <option value="Perusahaan D" {{ request('PT') == 'Perusahaan D' ? 'selected' : '' }}>Perusahaan D</option>
              </select>
              <button type="submit" class="btn btn-primary">
                Cari
              </button>
            </form>
          </div>
        </div>

        <p class="text-sm opacity-80 mb-6">
          Menampilkan data dari {{ $startOfWeek->format('d M Y') }} hingga {{ $endOfWeek->format('d M Y') }}
        </p>

        <!-- Tabel Waktu Shalat Duha -->
        <h2 class="text-xl font-semibold mb-4">Waktu Shalat Duha</h2>
        <div class="overflow-x-auto">
          <table class="table-custom">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Hari</th>
                <th>Waktu</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dftrshalats->where('jenis', 'Duha')->where('status', 'Menunggu') as $index => $shalat)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $shalat->tanggal }}</td>
                  <td>{{ $shalat->hari }}</td>
                  <td>{{ $shalat->waktu }}</td>
                  <td>
                    <span class="status-badge {{ $shalat->status === 'Disetujui' ? 'status-approved' : ($shalat->status === 'Ditolak' ? 'status-rejected' : 'status-pending') }}">
                      {{ $shalat->status }}
                    </span>
                  </td>
                  <td>
                    <div class="flex gap-2">
                      <form action="{{ route('pembimbing.disetujui', $shalat->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success" onclick="return confirm('Setujui waktu shalat ini?')">
                          Setujui
                        </button>
                      </form>
                      <form action="{{ route('pembimbing.ditolak', $shalat->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tolak waktu shalat ini?')">
                          Tolak
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- Tabel Waktu Shalat Dzuhur -->
        <h2 class="text-xl font-semibold mb-4">Waktu Shalat Dzuhur</h2>
        <div class="overflow-x-auto">
          <table class="table-custom">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Hari</th>
                <th>Waktu</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dftrshalats->where('jenis', 'Dzuhur')->where('status', 'Menunggu') as $index => $shalat)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $shalat->tanggal }}</td>
                  <td>{{ $shalat->hari }}</td>
                  <td>{{ $shalat->waktu }}</td>
                  <td>
                    <span class="status-badge {{ $shalat->status === 'Disetujui' ? 'status-approved' : ($shalat->status === 'Ditolak' ? 'status-rejected' : 'status-pending') }}">
                      {{ $shalat->status }}
                    </span>
                  </td>
                  <td>
                    <div class="flex gap-2">
                      <form action="{{ route('pembimbing.disetujui', $shalat->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success" onclick="return confirm('Setujui waktu shalat ini?')">
                          Setujui
                        </button>
                      </form>
                      <form action="{{ route('pembimbing.ditolak', $shalat->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tolak waktu shalat ini?')">
                          Tolak
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- Tabel Waktu Shalat Ashar -->
        <h2 class="text-xl font-semibold mb-4">Waktu Shalat Ashar</h2>
        <div class="overflow-x-auto">
          <table class="table-custom">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Hari</th>
                <th>Waktu</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dftrshalats->where('jenis', 'Ashar')->where('status', 'Menunggu') as $index => $shalat)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $shalat->tanggal }}</td>
                  <td>{{ $shalat->hari }}</td>
                  <td>{{ $shalat->waktu }}</td>
                  <td>
                    <span class="status-badge {{ $shalat->status === 'Disetujui' ? 'status-approved' : ($shalat->status === 'Ditolak' ? 'status-rejected' : 'status-pending') }}">
                      {{ $shalat->status }}
                    </span>
                  </td>
                  <td>
                    <div class="flex gap-2">
                      <form action="{{ route('pembimbing.disetujui', $shalat->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success" onclick="return confirm('Setujui waktu shalat ini?')">
                          Setujui
                        </button>
                      </form>
                      <form action="{{ route('pembimbing.ditolak', $shalat->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tolak waktu shalat ini?')">
                          Tolak
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const sidebar = document.getElementById('sidebar');
      const toggleBtn = document.getElementById('toggleBtn');
      const mainContent = document.getElementById('mainContent');
      
      toggleBtn.addEventListener('click', function() {
        sidebar.classList.toggle('expanded');
        mainContent.classList.toggle('sidebar-expanded');
      });
    });
  </script>
</body>
</html>