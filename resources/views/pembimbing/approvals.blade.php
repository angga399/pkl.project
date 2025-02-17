<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar Pengambilan Foto - Persetujuan</title>
  <!-- Tailwind CSS (via CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  @vite('resources/css/app.css')
  <style>
       /* Background halaman */
       body {
      background: linear-gradient(to right, #0a192f, #1c1c1c);
      color: white;
    }

    /* Sidebar */
    #sidebar {
      width: 60px;
      min-height: 100vh;
      background-color: #111827;
      transition: width 0.3s;
      position: relative;
    }

    /* Saat sidebar terbuka */
    #sidebar.open {
      width: 200px;
    }

    /* Tombol toggle */
    .toggle-btn {
      position: absolute;
      top: 10px;
      right: -15px;
      background: #1f2937;
      color: white;
      border-radius: 50%;
      padding: 5px;
      cursor: pointer;
      z-index: 10;
    }

    /* Styling menu sidebar */
    .sidebar-nav li a {
      padding: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;

      color: white;
      transition: background 0.3s;
    }

    /* Saat sidebar terbuka, ikon dan teks sejajar */
    #sidebar.open .sidebar-nav li a {
      justify-content: flex-start;
      padding-left: 20px;
    }

    /* Hover effect */
    .sidebar-nav li a:hover {
      background: rgba(0, 242, 255, 0.1);
    }

    /* Animasi sidebar */
    .sidebar-nav li a span {
      display: none;
    }

    #sidebar.open .sidebar-nav li a span {
      display: inline;
      margin-left: 10px;
    }

    /* Tabel custom styling */
    .table-custom {
      width: 100%;
      border-collapse: collapse;
    }
    .table-custom th, .table-custom td {
      border: 2px solid #00f2ff !important;
      padding: 0.5rem 1rem;
      text-align: center;
    }
    .table-custom thead {
      background-color: #001b42;
    }
    .table-custom tbody tr:hover {
      background: rgba(0, 242, 255, 0.1);
    }
  </style>
  <script>
    function toggleSidebar() {
      document.getElementById('sidebar').classList.toggle('open');
    }
  </script>
</head>
<body>
    <div class="flex h-screen">
  
        <!-- Sidebar -->
        <div id="sidebar" class="flex-none flex flex-col items-center">
          <button onclick="toggleSidebar()" class="toggle-btn">
            <i class="fas fa-bars"></i>
          </button>
      
          <ul class="sidebar-nav space-y-4 mt-10">
            <li>
              <a href="{{ route('pembimbing.approvals') }}">
                <i class="fas fa-eye text-xl"></i>
                <span class="ml-2">Absensi</span>
              </a>
            </li>
            <li>
              <a href="{{ route('pembimbing.journals') }}">
                <i class="fas fa-book text-xl"></i>
                <span class="ml-2">Jurnal</span>
              </a>
            </li>
            <li>
              <a href="{{ route('pembimbing.shalat') }}">
                <i class="fas fa-mosque text-xl"></i>
                <span class="ml-2">shalat</span>
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
      
      <!-- Tabel Absen Datang -->
      <h2 class="text-xl font-semibold text-gray-200 mb-4">Absen Datang</h2>
      <div class="overflow-x-auto mb-8">
        <table class="table-custom">
          <thead>
            <tr>
              <th>Foto</th>
              <th>Hari</th>
              <th>Tanggal</th>
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
</html>