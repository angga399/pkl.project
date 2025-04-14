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

    #sidebar.expanded + .main-content {
      margin-left: 200px;
      width: calc(100% - 200px);
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

    .form-group{
      color: black
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
        <h1 class="text-2xl font-bold mb-6">Jurnal yang Menunggu Persetujuan</h1>

        <!-- Filters -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
          <!-- Week Filter -->
          <div class="form-group">
            <form method="GET" action="{{ route('pembimbing.journals') }}" class="flex items-center gap-4">
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
            <form method="GET" action="{{ route('pembimbing.journals') }}" class="flex items-center gap-4">
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
                            Setujui
                          </button>
                        </form>
                        <form action="{{ route('pembimbing.tolak', $journal->id) }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Tolak jurnal ini?')">
                            Tolak
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