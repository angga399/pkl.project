<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jurnal yang Menunggu Persetujuan</title>
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

  <style>
      :root {
      --bg-primary: #ffffff; /* Warna latar belakang putih */
      --bg-secondary: #f0f4f8; /* Warna card abu-abu muda */
      --accent-color: #1e3a8a; /* Warna aksen biru tua */
      --accent-hover: #3b82f6; /* Warna aksen biru muda */
      --text-primary: #1e293b; /* Warna teks utama gelap */
      --text-secondary: #64748b; /* Warna teks sekunder abu-abu */
    }

    body {
      background-color: var(--bg-primary);
      color: var(--text-primary);
      font-family: 'Inter', sans-serif;
      min-height: 100vh;
      position: relative;
    }

    /* Sidebar */
    #sidebar {
      background-color: var(--bg-secondary);
      width: 64px;
      height: 100vh;
      transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      position: fixed;
      left: 0;
      top: 0;
      z-index: 1000;
      overflow-x: hidden;
      border-right: 1px solid rgba(0, 0, 0, 0.05);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
    }

    #sidebar.expanded {
      width: 220px;
    }

    .sidebar-icon-container {
      display: flex;
      align-items: center;
      padding: 12px;
      transition: all 0.3s ease;
    }

    .sidebar-icon-container:hover {
      background-color: rgba(0, 0, 0, 0.05);
    }

    .sidebar-icon {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 36px;
      height: 36px;
      border-radius: 8px;
      background-color: rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      flex-shrink: 0;
    }

    .sidebar-icon:hover {
      background-color: rgba(30, 58, 138, 0.2);
    }

    .sidebar-icon.active {
      background-color: var(--accent-color);
      box-shadow: 0 4px 8px rgba(30, 58, 138, 0.3);
    }

    .sidebar-icon.active i {
      color: var(--bg-primary);
    }

    .sidebar-text {
      opacity: 0;
      transform: translateX(-10px);
      transition: all 0.4s ease;
      white-space: nowrap;
      color: var(--text-primary);
      font-weight: 500;
      margin-left: 12px;
    }

    #sidebar.expanded .sidebar-text {
      opacity: 1;
      transform: translateX(0);
    }

     /* Main Content */
     .main-content {
      padding-left: 64px; /* Sesuaikan dengan lebar sidebar */
      transition: padding-left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      width: 100%;
      box-sizing: border-box;
      min-height: 100vh;
    }

    .main-content.sidebar-expanded {
      padding-left: 220px; /* Sesuaikan dengan lebar sidebar yang diperluas */
    }

    /* Content Card */
    .content-card {
      background-color: var(--bg-secondary);
      border-radius: 16px;
      padding: 2rem;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(0, 0, 0, 0.05);
      animation: fadeIn 0.5s ease forwards;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Table */
    .table-custom {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
      background-color: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(5px);
      border-radius: 12px;
      overflow: hidden;
      margin-top: 1rem;
    }

    .table-custom th {
      background-color: rgba(30, 58, 138, 0.15);
      color: var(--text-primary);
      padding: 1.2rem 1rem;
      font-weight: 600;
      text-transform: uppercase;
      font-size: 0.8rem;
      letter-spacing: 0.05em;
    }

    .table-custom td {
      padding: 1.2rem 1rem;
      color: var(--text-primary);
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
    }

    .table-custom tbody tr:hover {
      background-color: rgba(0, 0, 0, 0.05);
    }

    /* Status Badges */
    .status-badge {
      padding: 0.35rem 0.85rem;
      border-radius: 999px;
      font-weight: 500;
      font-size: 0.8rem;
      letter-spacing: 0.03em;
      display: inline-flex;
      align-items: center;
    }

    .status-badge i {
      margin-right: 4px;
      font-size: 0.75rem;
    }

    .status-pending {
      background-color: rgba(234, 179, 8, 0.2);
      color: #eab308;
      border: 1px solid rgba(234, 179, 8, 0.3);
    }

    .status-approved {
      background-color: rgba(34, 197, 94, 0.2);
      color: #22c55e;
      border: 1px solid rgba(34, 197, 94, 0.3);
    }

    .status-rejected {
      background-color: rgba(239, 68, 68, 0.2);
      color: #ef4444;
      border: 1px solid rgba(239, 68, 68, 0.3);
    }

    /* Buttons */
    .btn {
      padding: 0.65rem 1.25rem;
      border-radius: 8px;
      transition: all 0.3s ease;
      border: none;
      cursor: pointer;
      font-weight: 500;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
    }

    .btn:after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0));
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .btn:hover:after {
      opacity: 1;
    }

    .btn-primary {
      background-color: var(--accent-color);
      color: white;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(30, 58, 138, 0.3);
    }

    .btn-success {
      background-color: #22c55e;
      color: white;
    }

    .btn-success:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
    }

    .btn-danger {
      background-color: #ef4444;
      color: white;
    }

    .btn-danger:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    }

    /* Date range indicator */
    .date-range {
      display: inline-block;
      padding: 0.5rem 1rem;
      background-color: rgba(30, 58, 138, 0.1);
      border-radius: 8px;
      border: 1px solid rgba(30, 58, 138, 0.2);
      font-size: 0.9rem;
    }

    /* Heading with accent */
    h1, h2 {
      position: relative;
      display: inline-block;
    }

    h1:after, h2:after {
      content: '';
      position: absolute;
      left: 0;
      bottom: -6px;
      width: 40%;
      height: 3px;
      background: linear-gradient(90deg, var(--accent-color), transparent);
      border-radius: 2px;
    }
  </style>
</head>
<body>
  <div class="flex h-screen">
    <!-- Sidebar -->
    <div id="sidebar" class="flex-none flex flex-col items-center">
      <button id="toggleBtn" class="p-4 w-full flex justify-center cursor-pointer hover:bg-gray-200 transition-colors my-2">
        <i class="fas fa-bars text-blue-900 text-xl transition-transform"></i>
      </button>
      <ul class="sidebar-nav space-y-8 mt-10 w-full px-2">
        <li>
          <a href="{{ route('pembimbing.approvals') }}" class="flex items-center p-3 hover:bg-transparent transition-all">
            <div class="sidebar-icon">
              <i class="fas fa-eye text-lg"></i>
            </div>
            <span class="ml-3 sidebar-text">Absensi</span>
          </a>
        </li>
        <li>
          <a href="{{ route('pembimbing.journals') }}" class="flex items-center p-3 hover:bg-transparent transition-all">
            <div class="sidebar-icon active">
              <i class="fas fa-book text-lg"></i>
            </div>
            <span class="ml-3 sidebar-text">Jurnal</span>
          </a>
        </li>
        <li>
          <a href="{{ route('pembimbing.shalat') }}" class="flex items-center p-3 hover:bg-transparent transition-all">
            <div class="sidebar-icon">
              <i class="fas fa-mosque text-lg"></i>
            </div>
            <span class="ml-3 sidebar-text">Shalat</span>
          </a>
        </li>
      </ul>

      <!-- Menu Home di Paling Bawah -->
      <div class="mt-auto w-full">
        <a href="{{ route('pembimbingpkl') }}" class="flex items-center p-3 hover:bg-transparent transition-all">
          <div class="sidebar-icon">
            <i class="fas fa-home text-lg"></i>
          </div>
          <span class="ml-3 sidebar-text">Home</span>
        </a>
      </div>
    </div>
    <div id="mainContent" class="main-content p-6 overflow-auto">
      <div class="content-card">
        <h1 class="text-2xl font-bold mb-8">Jurnal yang Menunggu Persetujuan</h1>

        <!-- Filters -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
          <!-- Week Filter -->
          <div class="form-group">
            <form method="GET" action="{{ route('pembimbing.journals') }}" class="flex items-center gap-4">
              <label class="font-semibold">Pilih Minggu:</label>
              <input type="week" name="week" class="form-control bg-white border border-gray-300 rounded-lg px-3 py-2 text-black" 
              value="{{ request('week', \Carbon\Carbon::now()->format('Y-\WW')) }}">
       <button type="submit" class="btn btn-primary">
        <i class="fas fa-filter"></i> Tampilkan
              </button>
            </form>
          </div>

          <!-- Company Filter -->
          <div class="form-group">
            <form method="GET" action="{{ route('pembimbing.journals') }}" class="flex items-center gap-4">
              <input type="hidden" name="week" value="{{ request('week', $selectedWeek) }}">
              <label class="font-semibold">Pilih Perusahaan:</label>
              <select name="PT" class="form-control bg-white border border-gray-300 rounded-lg px-3 py-2 text-black">
                <option value="" disabled {{ request('PT') == '' ? 'selected' : '' }}>Pilih Perusahaan</option>
                <option value="Perusahaan A" {{ request('PT') == 'Perusahaan A' ? 'selected' : '' }}>Perusahaan A</option>
                <option value="Perusahaan B" {{ request('PT') == 'Perusahaan B' ? 'selected' : '' }}>Perusahaan B</option>
                <option value="Perusahaan C" {{ request('PT') == 'Perusahaan C' ? 'selected' : '' }}>Perusahaan C</option>
                <option value="Perusahaan D" {{ request('PT') == 'Perusahaan D' ? 'selected' : '' }}>Perusahaan D</option>
              </select>
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i> Cari
              </button>
            </form>
          </div>
        </div>
        <div class="date-range mb-6">
          <i class="far fa-calendar-alt mr-2"></i>
          Periode: {{ $startOfWeek->format('d M Y') }} - {{ $endOfWeek->format('d M Y') }}
        </div>

        <!-- Tabel Jurnal -->
        <div class="overflow-x-auto">
          <table class="table-custom">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Uraian</th>
                <th>Jurusan</th>
                <th>Perusahaan</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($journals as $journal)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $journal->nama }}</td>
                  <td>{{ $journal->tanggal }}</td>
                  <td>{{ $journal->uraian_konsentrasi }}</td>
                  <td>{{ $journal->kelas }}</td>
                  <td>{{ $journal->PT }}</td>
                  <td>
                    <span class="status-badge {{ $journal->status === 'Disetujui' ? 'status-approved' : ($journal->status === 'Ditolak' ? 'status-rejected' : 'status-pending') }}">
                      {{ $journal->status }}
                    </span>
                  </td>
                  <td>
                    @if($journal->status === 'Menunggu')
                      <div class="flex gap-2">
                        <form action="{{ route('pembimbing.setuju', $journal->id) }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-success" onclick="return confirm('Setujui jurnal ini?')">
                            <i class="fas fa-check"></i> Setujui
                          </button>
                        </form>
                        <form action="{{ route('pembimbing.tolak', $journal->id) }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Tolak jurnal ini?')">
                            <i class="fas fa-times"></i> Tolak
                          </button>
                        </form>
                      </div>
                      @endif
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="8" class="text-center py-4">Tidak ada jurnal yang menunggu persetujuan.</td>
                  </tr>
                @endforelse
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