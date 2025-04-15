<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Waktu Shalat - Persetujuan</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
      /* Custom Styles */
      :root {
          --bg-primary: #ffffff;
          --bg-secondary: #f0f4f8;
          --accent-color: #1e3a8a;
          --accent-hover: #3b82f6;
          --text-primary: #1e293b;
          --text-secondary: #64748b;
      }

      body {
        background-color: var(--bg-primary);
            color: var(--text-primary);
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            position: relative;
        }

         /* Fixed Sidebar */
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

        /* Fixed Square Icon Containers */
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

        /* Active state for sidebar icons */
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

        /* Main Content - Fixed positioning */
        .main-content {
            padding-left: 64px; /* Initial sidebar width */
            transition: padding-left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            width: 100%;
            box-sizing: border-box;
            min-height: 100vh;
        }

        .main-content.sidebar-expanded {
            padding-left: 220px; /* Expanded sidebar width */
        }

        /* Content Container */
        .content-wrapper {
            padding: 24px;
        }

        /* Enhanced Tab Buttons */
        .btn-tab {
            padding: 0.65rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            background-color: rgba(0, 0, 0, 0.05);
            color: var(--text-secondary);
            border: 1px solid rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .btn-tab:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background: linear-gradient(90deg, var(--accent-color), var(--accent-hover));
            opacity: 0;
            z-index: -1;
            transition: opacity 0.3s ease;
        }

        .btn-tab:hover {
            transform: translateY(-2px);
            color: var(--text-primary);
            border-color: var(--accent-color);
        }

        .btn-tab.active {
            background-color: transparent;
            color: var(--text-primary);
            border-color: var(--accent-color);
            box-shadow: 0 4px 12px rgba(30, 58, 138, 0.2);
        }

        .btn-tab.active:before {
            opacity: 0.15;
        }

          /* Modern Card Style */
          .content-card {
            background-color: var(--bg-secondary);
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        /* Improved Table Styling */
        .table-custom {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background-color: rgba(255, 255, 255, 0.02);
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
            padding: 1rem;
            color: white;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1.2rem 1rem;
            color: var(--text-primary);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .table-custom tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }

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

        /* Enhanced Form Controls */
        .form-control {
          background-color: rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.1);
            color: var(--text-primary);
            padding: 0.65rem 1rem;
            border-radius: 8px;
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--accent-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.2);
        }

        .form-control:hover {
            border-color: rgba(0, 0, 0, 0.2);
        }

          /* Enhanced Buttons */
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

        .btn i {
            margin-right: 6px;
        }

        .btn-primary {
          background-color: var(--accent-color);
            color: var(--bg-primary);
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

           /* Smooth Transition for Tables */
           .table-container {
            opacity: 1;
            transition: all 0.4s ease;
            transform: translateY(0);
        }

        .table-container.hidden {
            opacity: 0;
            transform: translateY(10px);
            pointer-events: none;
            position: absolute;
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

         /* Animations for page load */
         @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .content-card {
            animation: fadeIn 0.5s ease forwards;
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

        /* Search dropdown styles */
        .search-container {
            position: relative;
            width: 100%;
        }
        
        .search-input {
            width: 100%;
            padding: 0.65rem 1rem;
            border-radius: 8px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            background-color: rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .search-input:focus {
            border-color: var(--accent-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.2);
        }
        
        .search-results {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 100;
            max-height: 200px;
            overflow-y: auto;
            display: none;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }
        
        .search-result-item {
            padding: 0.75rem 1rem;
            cursor: pointer;
            transition: all 0.2s ease;
            color: var(--text-primary);
        }
        
        .search-result-item:hover {
            background-color: rgba(30, 58, 138, 0.1);
        }
        
        .search-result-item.active {
            background-color: rgba(30, 58, 138, 0.2);
        }
        
        .no-results {
            padding: 0.75rem 1rem;
            color: var(--text-secondary);
            font-style: italic;
        }
      </style>
    </style>
</head>
<body>
  <div class="flex h-screen">
    <!-- Enhanced Sidebar -->
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
                    <div class="sidebar-icon">
                        <i class="fas fa-book text-lg"></i>
                    </div>
                    <span class="ml-3 sidebar-text">Jurnal</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pembimbing.shalat') }}" class="flex items-center p-3 hover:bg-transparent transition-all">
                    <div class="sidebar-icon active">
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
          <!-- Main Content -->
          <div id="mainContent" class="main-content p-6 overflow-auto">
            <div class="content-card">
                <h1 class="text-2xl font-bold mb-8">Daftar Waktu Shalat - Persetujuan</h1>

                <!-- Filters -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <!-- Week Filter -->
                    <div class="form-group">
                        <form method="GET" action="{{ route('pembimbing.shalat') }}" class="flex items-center gap-4">
                            <label class="font-semibold">Pilih Minggu:</label>
                            <input type="week" name="week" class="form-control" 
                                   value="{{ request('week', \Carbon\Carbon::now()->format('Y-\WW')) }}">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-filter"></i> Tampilkan
                            </button>
                        </form>
                    </div>
                      <!-- Company Filter - Updated with search engine style -->
                      <div class="form-group">
                        <form method="GET" action="{{ route('pembimbing.shalat') }}" class="flex items-center gap-4">
                            <input type="hidden" name="week" value="{{ request('week', $selectedWeek) }}">
                            <label class="font-semibold">Cari Perusahaan:</label>
                            <div class="search-container" style="flex-grow: 1;">
                                <input type="text" 
                                       name="PT" 
                                       id="companySearch" 
                                       class="search-input" 
                                       placeholder="Ketik nama perusahaan..."
                                       value="{{ request('PT') }}"
                                       autocomplete="off">
                                <div class="search-results" id="searchResults">
                                    <!-- Results will be populated by JavaScript -->
                                </div>
                            </div>
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

                <!-- Enhanced Tab Buttons -->
                <div class="flex space-x-4 mb-8">
                    <button id="duhaBtn" class="btn-tab active">
                        <i class="fas fa-sun mr-2"></i> Duha
                    </button>
                    <button id="dzuhurBtn" class="btn-tab">
                        <i class="fas fa-sun mr-2"></i> Dzuhur
                    </button>
                    <button id="asharBtn" class="btn-tab">
                        <i class="fas fa-sun mr-2"></i> Ashar
                    </button>
                </div>

                <!-- Tabel Waktu Shalat Duha -->
                <div id="duhaTable" class="table-container">
                    <h2 class="text-xl font-semibold mb-6">Waktu Shalat Duha</h2>
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
                                                        <i class="fas fa-check"></i> Setujui
                                                    </button>
                                                </form>
                                                <form action="{{ route('pembimbing.ditolak', $shalat->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tolak waktu shalat ini?')">
                                                        <i class="fas fa-times"></i> Tolak
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

                  <!-- Tabel Waktu Shalat Dzuhur -->
                  <div id="dzuhurTable" class="table-container hidden">
                      <h2 class="text-xl font-semibold mb-6">Waktu Shalat Dzuhur</h2>
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
                                                          <i class="fas fa-check"></i> Setujui
                                                      </button>
                                                  </form>
                                                  <form action="{{ route('pembimbing.ditolak', $shalat->id) }}" method="POST">
                                                      @csrf
                                                      <button type="submit" class="btn btn-danger" onclick="return confirm('Tolak waktu shalat ini?')">
                                                          <i class="fas fa-times"></i> Tolak
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
  
                  <!-- Tabel Waktu Shalat Ashar -->
                  <div id="asharTable" class="table-container hidden">
                      <h2 class="text-xl font-semibold mb-6">Waktu Shalat Ashar</h2>
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
                                                          <i class="fas fa-check"></i> Setujui
                                                      </button>
                                                  </form>
                                                  <form action="{{ route('pembimbing.ditolak', $shalat->id) }}" method="POST">
                                                      @csrf
                                                      <button type="submit" class="btn btn-danger" onclick="return confirm('Tolak waktu shalat ini?')">
                                                          <i class="fas fa-times"></i> Tolak
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
        </div>
        <script>
          document.addEventListener('DOMContentLoaded', function() {
              const sidebar = document.getElementById('sidebar');
              const toggleBtn = document.getElementById('toggleBtn');
              const mainContent = document.getElementById('mainContent');
  
              // Toggle sidebar
              toggleBtn.addEventListener('click', function() {
                  sidebar.classList.toggle('expanded');
                  mainContent.classList.toggle('sidebar-expanded');
              });
  
              // Toggle between Duha, Dzuhur, and Ashar tables
              const duhaBtn = document.getElementById('duhaBtn');
              const dzuhurBtn = document.getElementById('dzuhurBtn');
              const asharBtn = document.getElementById('asharBtn');
              const duhaTable = document.getElementById('duhaTable');
              const dzuhurTable = document.getElementById('dzuhurTable');
              const asharTable = document.getElementById('asharTable');
  
              duhaBtn.addEventListener('click', function() {
                  duhaTable.classList.remove('hidden');
                  dzuhurTable.classList.add('hidden');
                  asharTable.classList.add('hidden');
                  duhaBtn.classList.add('active');
                  dzuhurBtn.classList.remove('active');
                  asharBtn.classList.remove('active');
              });
  
              dzuhurBtn.addEventListener('click', function() {
                  dzuhurTable.classList.remove('hidden');
                  duhaTable.classList.add('hidden');
                  asharTable.classList.add('hidden');
                  dzuhurBtn.classList.add('active');
                  duhaBtn.classList.remove('active');
                  asharBtn.classList.remove('active');
              });
  
              asharBtn.addEventListener('click', function() {
                  asharTable.classList.remove('hidden');
                  duhaTable.classList.add('hidden');
                  dzuhurTable.classList.add('hidden');
                  asharBtn.classList.add('active');
                  duhaBtn.classList.remove('active');
                  dzuhurBtn.classList.remove('active');
              });
  
              // Company search functionality
              const companySearch = document.getElementById('companySearch');
              const searchResults = document.getElementById('searchResults');
              
              // Sample company data - in a real app, you might fetch this from your backend
              const companies = [
                  'Perusahaan A',
                  'Perusahaan B',
                  'Perusahaan C',
                  'Perusahaan D',
                  'PT Maju Jaya',
                  'PT Sejahtera Abadi',
                  'CV Kreatif Mandiri'
              ];
              
              companySearch.addEventListener('input', function() {
                  const searchTerm = this.value.toLowerCase();
                  const filteredCompanies = companies.filter(company => 
                      company.toLowerCase().includes(searchTerm))
                      .sort();
                  
                  // Clear previous results
                  searchResults.innerHTML = '';
                  
                  if (searchTerm.length > 0) {
                      if (filteredCompanies.length > 0) {
                          filteredCompanies.forEach(company => {
                              const div = document.createElement('div');
                              div.className = 'search-result-item';
                              div.textContent = company;
                              div.addEventListener('click', function() {
                                  companySearch.value = company;
                                  searchResults.style.display = 'none';
                              });
                              searchResults.appendChild(div);
                          });
                      } else {
                          const div = document.createElement('div');
                          div.className = 'no-results';
                          div.textContent = 'Tidak ditemukan perusahaan yang cocok';
                          searchResults.appendChild(div);
                      }
                      searchResults.style.display = 'block';
                  } else {
                      searchResults.style.display = 'none';
                  }
              });
              
              // Close dropdown when clicking outside
              document.addEventListener('click', function(e) {
                  if (!companySearch.contains(e.target) && !searchResults.contains(e.target)) {
                      searchResults.style.display = 'none';
                  }
              });
              
              // Highlight item on hover
              searchResults.addEventListener('mouseover', function(e) {
                  if (e.target.classList.contains('search-result-item')) {
                      const items = document.querySelectorAll('.search-result-item');
                      items.forEach(item => item.classList.remove('active'));
                      e.target.classList.add('active');
                  }
              });
              
              // Navigate with keyboard
              companySearch.addEventListener('keydown', function(e) {
                  if (e.key === 'ArrowDown' || e.key === 'ArrowUp') {
                      e.preventDefault();
                      const items = document.querySelectorAll('.search-result-item');
                      if (items.length === 0) return;
                      
                      let activeIndex = -1;
                      items.forEach((item, index) => {
                          if (item.classList.contains('active')) {
                              activeIndex = index;
                          }
                      });
                      
                      if (e.key === 'ArrowDown') {
                          if (activeIndex < items.length - 1) {
                              items.forEach(item => item.classList.remove('active'));
                              items[activeIndex + 1].classList.add('active');
                          } else if (activeIndex === -1) {
                              items[0].classList.add('active');
                          }
                      } else if (e.key === 'ArrowUp') {
                          if (activeIndex > 0) {
                              items.forEach(item => item.classList.remove('active'));
                              items[activeIndex - 1].classList.add('active');
                          }
                      }
                  } else if (e.key === 'Enter') {
                      const activeItem = document.querySelector('.search-result-item.active');
                      if (activeItem) {
                          e.preventDefault();
                          companySearch.value = activeItem.textContent;
                          searchResults.style.display = 'none';
                      }
                  }
              });

              // Set default to show Duha table
              duhaBtn.click();
          });
      </script>
  </body>
  </html>