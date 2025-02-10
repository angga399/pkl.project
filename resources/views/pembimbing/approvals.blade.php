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
    /* Background halaman: gradasi dari biru tua ke hitam */
    body {
      background: linear-gradient(to right, #0a192f, #1c1c1c);
      color: white;
    }
    /* Sidebar styling agar selalu terlihat */
    #sideb {
      width: 250px;
      background: linear-gradient(135deg, #0a192f, #001b42);
      color: white;
    }
    /* Styling sidebar brand & navigation */
    .sidebar-brand {
      padding: 1.5rem;
      font-size: 1.75rem;
      font-weight: bold;
      display: flex;
      align-items: center;
      justify-content: center;
      border-bottom: 2px solid #00f2ff;
    }
    .sidebar-nav li a {
      padding: 0.75rem 1.5rem;
      display: block;
      transition: background 0.3s;
    }
    .sidebar-nav li a:hover {
      background: rgba(0, 242, 255, 0.1);
    }
    /* Tabel custom styling sesuai tema */
    .table-custom {
      width: 100%;
      border-collapse: collapse;
    }
    .table-custom th,
    .table-custom td {
      border: 2px solid #00f2ff !important;
      padding: 0.75rem 1rem;
      text-align: center;
      color: white;
    }
    .table-custom thead {
      background-color: #001b42;
    }
    .table-custom tbody tr:hover {
      background: rgba(0, 242, 255, 0.1);
    }
    /* Modal untuk Zoom Gambar */
    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      justify-content: center;
      align-items: center;
      z-index: 50;
      background-color: rgba(0, 0, 0, 0.5);
    }
    .modal img {
      max-width: 95%;
      max-height: 95%;
      border-radius: 0.5rem;
    }
  </style>
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
  </script>
</head>
<body>
  <div class="flex h-screen">
    <!-- Sidebar Always Visible -->
    <div id="sideb">
      <!-- Sidebar Brand -->
      <div class="sidebar-brand">
        <i class="fas fa-laugh-wink text-cyan-400"></i>
        <span class="ml-2">PKL Siswa</span>
      </div>
      <!-- Sidebar Navigation -->
      <ul class="sidebar-nav">
        <li>
          <a href="{{ route('pembimbing.journals') }}">
            <i class="fa-solid fa-address-book text-cyan-400"></i>
            <span class="ml-2">Journal</span>
          </a>
        </li>
        <li>
          <a href="{{ route('pembimbing.approvals') }}">
            <i class="fa-solid fa-eye text-cyan-400"></i>
            <span class="ml-2">Absensi</span>
          </a>
        </li>
        <li>
          <a href="{{ route('pembimbing.shalat') }}">
            <i class="fa-solid fa-mosque text-cyan-400"></i>
            <span class="ml-2">Absen Shalat</span>
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
  <div id="imageModal" class="modal flex">
    <span class="absolute top-4 right-4 text-white text-3xl cursor-pointer" onclick="hideModal()">&times;</span>
    <img id="modalImage" src="" alt="Zoomed Foto" />
  </div>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>