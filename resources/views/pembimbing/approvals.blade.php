<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengambilan Foto - Persetujuan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        :root {
            --bg-primary: #1a202e;
            --bg-secondary: #232836;
            --purple-primary: #9966cc;
            --purple-light: #b388ff;
            --blue-primary: #4dc4d2;
            --blue-light: #64dfdf;
            --pink-primary: #ff66b2;
            --text-primary: #ffffff;
            --text-secondary: #a0aec0;
            --accent-color: #4dc4d2;
            --accent-hover: #64dfdf;
        }

        body {
            background-color: var(--bg-primary);
            color: var(--text-primary);
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
        }

        /* Sidebar Styling */
        #sidebar {
            background-color: var(--bg-secondary);
            width: 60px;
            min-height: 100vh;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            overflow-x: hidden;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
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
            background-color: var(--bg-primary);
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
            background-color: var(--bg-secondary);
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        /* Table Styling */
        .table-custom {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background-color: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(5px);
            border-radius: 15px;
            overflow: hidden;
        }

        .table-custom th {
            background-color: rgba(77, 196, 210, 0.2);
            color: var(--text-primary);
            padding: 1rem;
            font-weight: 600;
        }

        .table-custom td {
            padding: 1rem;
            color: var(--text-primary);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .table-custom tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Form Controls */
        .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: var(--text-primary);
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
            background-color: var(--accent-color);
            color: var(--text-primary);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(77, 196, 210, 0.3);
        }

        .btn-success {
            background-color: #2ecc71;
            color: var(--text-primary);
        }

        .btn-danger {
            background-color: #e74c3c;
            color: var(--text-primary);
        }

        /* Status Badges */
        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 999px;
            font-weight: 500;
            font-size: 0.875rem;
        }

        .status-pending {
            background-color: rgba(241, 196, 15, 0.2);
            color: #f1c40f;
        }

        .status-approved {
            background-color: rgba(46, 204, 113, 0.2);
            color: #2ecc71;
        }

        .status-rejected {
            background-color: rgba(231, 76, 60, 0.2);
            color: #e74c3c;
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
            color: var(--accent-hover);
            text-decoration: underline;
        }
    </style>
</head>
<body>
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
                <h1 class="text-2xl font-bold mb-6">Daftar Pengambilan Foto - Persetujuan</h1>

                <!-- Filters -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <!-- Week Filter -->
                    <div class="form-group">
                        <form method="GET" action="{{ route('pembimbing.approvals') }}" class="flex items-center gap-4">
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
                        <form method="GET" action="{{ route('pembimbing.approvals') }}" class="flex items-center gap-4">
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

                <!-- Tables -->
                <div class="space-y-8">
                    <!-- Arrival Table -->
                    <div>
                        <h2 class="text-xl font-semibold mb-4">Absen Datang</h2>
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
                                    @if ($item->tipe === 'datang')
                                        <tr>
                                            <td>
                                                <img src="{{ $item->dataGambar }}" alt="Foto" class="photo-preview" onclick="showModal(this)" />
                                            </td>
                                            <td>{{ $item->hari }}</td>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->pt }}</td>
                                            <td>
                                                <a href="https://www.google.com/maps?q={{ $item->latitude }},{{ $item->longitude }}" 
                                                   target="_blank" 
                                                   class="location-link">
                                                    Lihat Lokasi
                                                </a>
                                            </td>
                                            <td>
                                                <span class="status-badge {{ $item->status === 'Disetujui' ? 'status-approved' : ($item->status === 'Ditolak' ? 'status-rejected' : 'status-pending') }}">
                                                    {{ $item->status }}
                                                </span>
                                            </td>
                                            <td>
                                                @if ($item->status === 'Menunggu Persetujuan')
                                                    <div class="flex gap-2">
                                                        <form action="{{ route('pembimbing.approve', $item->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success" onclick="return confirm('Setujui item ini?')">
                                                                Setujui
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('pembimbing.reject', $item->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tolak item ini?')">
                                                                Tolak
                                                            </button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Departure Table -->
                    <div>
                      <h2 class="text-xl font-semibold mb-4">Absen Pulang</h2>
                      <div class="overflow-x-auto">
                          <table class="table-custom">
                              <thead>
                                  <tr>
                                      <th>Foto</th>
                                      <th>Hari</th
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
                                                  <img src="{{ $item->dataGambar }}" alt="Foto" class="photo-preview" onclick="showModal(this)" />
                                              </td>
                                              <td>{{ $item->hari }}</td>
                                              <td>{{ $item->tanggal }}</td>
                                              <td>{{ $item->pt }}</td>
                                              <td>
                                                  <a href="https://www.google.com/maps?q={{ $item->latitude }},{{ $item->longitude }}" 
                                                     target="_blank" 
                                                     class="location-link">
                                                      Lihat Lokasi
                                                  </a>
                                              </td>
                                              <td>
                                                  <span class="status-badge {{ $item->status === 'Disetujui' ? 'status-approved' : ($item->status === 'Ditolak' ? 'status-rejected' : 'status-pending') }}">
                                                      {{ $item->status }}
                                                  </span>
                                              </td>
                                              <td>
                                                  @if ($item->status === 'Menunggu Persetujuan')
                                                      <div class="flex gap-2">
                                                          <form action="{{ route('pembimbing.approve', $item->id) }}" method="POST">
                                                              @csrf
                                                              <button type="submit" class="btn btn-success" onclick="return confirm('Setujui item ini?')">
                                                                  Setujui
                                                              </button>
                                                          </form>
                                                          <form action="{{ route('pembimbing.reject', $item->id) }}" method="POST">
                                                              @csrf
                                                              <button type="submit" class="btn btn-danger" onclick="return confirm('Tolak item ini?')">
                                                                  Tolak
                                                              </button>
                                                          </form>
                                                      </div>
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
          </div>
      </div>
  </div>

  <script>
      document.addEventListener('DOMContentLoaded', function() {
          // Get references to the sidebar and main content
          const sidebar = document.getElementById('sidebar');
          const toggleBtn = document.getElementById('toggleBtn');
          const mainContent = document.getElementById('mainContent');
          
          // Add click event listener to the toggle button
          toggleBtn.addEventListener('click', function() {
              // Toggle the 'expanded' class on the sidebar
              sidebar.classList.toggle('expanded');
              
              // Toggle the 'sidebar-expanded' class on the main content
              mainContent.classList.toggle('sidebar-expanded');
          });
      });
      
      // Function to show modal for image preview (placeholder - implement as needed)
      function showModal(img) {
          // You can implement a modal to show the image in larger size
          console.log('Show modal for image:', img.src);
          // For now, just open the image in a new tab
          window.open(img.src, '_blank');
      }
  </script>
</body>
</html>