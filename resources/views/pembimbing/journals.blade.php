<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jurnal yang Menunggu Persetujuan</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
      :root {
          --bg-primary: #f8fafc;
          --bg-secondary: #ffffff;
          --accent-color: #1e3a8a;
          --accent-hover: #6366f1;
          --text-primary: #1e293b;
          --text-secondary: #64748b;
          --card-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.025);
      }

      body {
          background-color: var(--bg-primary);
          color: var(--text-primary);
          font-family: 'Poppins', sans-serif;
          min-height: 100vh;
      }

      /* Modern Sidebar */
      #sidebar {
          background-color: var(--bg-secondary);
          width: 80px;
          height: 100vh;
          transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
          position: fixed;
          left: 0;
          top: 0;
          z-index: 1000;
          overflow-x: hidden;
          border-right: 1px solid rgba(0, 0, 0, 0.05);
          box-shadow: var(--card-shadow);
          display: flex;
          flex-direction: column;
      }

      #sidebar.expanded {
          width: 240px;
      }

      .sidebar-nav {
          flex: 1;
          display: flex;
          flex-direction: column;
          padding: 1rem 0;
      }

      .sidebar-item {
          display: flex;
          align-items: center;
          padding: 0.75rem 1.5rem;
          margin: 0.25rem 0.5rem;
          border-radius: 8px;
          transition: all 0.3s ease;
          color: var(--text-secondary);
      }

      .sidebar-item:hover {
          background-color: rgba(79, 70, 229, 0.05);
          color: var(--accent-color);
      }

      .sidebar-item.active {
          background-color: rgba(79, 70, 229, 0.1);
          color: var(--accent-color);
          font-weight: 500;
      }

      .sidebar-icon {
          width: 24px;
          height: 24px;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-right: 12px;
          flex-shrink: 0;
      }

      .sidebar-text {
          white-space: nowrap;
          opacity: 0;
          transform: translateX(-10px);
          transition: all 0.4s ease;
      }

      #sidebar.expanded .sidebar-text {
          opacity: 1;
          transform: translateX(0);
      }

      /* Main Content */
      .main-content {
          padding-left: 80px;
          transition: padding-left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
          width: 100%;
          min-height: 100vh;
      }

      .main-content.sidebar-expanded {
          padding-left: 240px;
      }

      /* Content Card */
      .content-card {
          background-color: var(--bg-secondary);
          border-radius: 12px;
          padding: 2rem;
          box-shadow: var(--card-shadow);
          margin: 1.5rem;
          border: 1px solid rgba(0, 0, 0, 0.05);
      }

      /* Header */
      .page-header {
          display: flex;
          justify-content: space-between;
          align-items: center;
          margin-bottom: 2rem;
      }

      .page-title {
          font-size: 1.75rem;
          font-weight: 600;
          color: var(--text-primary);
          position: relative;
          padding-bottom: 0.5rem;
      }

      .page-title:after {
          content: '';
          position: absolute;
          left: 0;
          bottom: 0;
          width: 50px;
          height: 3px;
          background: linear-gradient(90deg, var(--accent-color), transparent);
          border-radius: 3px;
      }

      /* Real-time Clock */
      .realtime-clock {
          background: linear-gradient(135deg, var(--accent-color), var(--accent-hover));
          color: white;
          padding: 0.5rem 1rem;
          border-radius: 8px;
          font-weight: 500;
          display: inline-flex;
          align-items: center;
          box-shadow: 0 4px 6px rgba(79, 70, 229, 0.2);
      }

      .realtime-clock i {
          margin-right: 8px;
      }

      /* Filter Section */
      .filter-section {
          display: grid;
          grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
          gap: 1.5rem;
          margin-bottom: 2rem;
      }

      .filter-card {
          background-color: var(--bg-secondary);
          border-radius: 10px;
          padding: 1.25rem;
          box-shadow: var(--card-shadow);
          border: 1px solid rgba(0, 0, 0, 0.05);
      }

      .filter-label {
          display: block;
          margin-bottom: 0.5rem;
          font-weight: 500;
          color: var(--text-primary);
      }

      .filter-input {
          width: 100%;
          padding: 0.65rem 1rem;
          border-radius: 8px;
          border: 1px solid #e2e8f0;
          background-color: #f8fafc;
          transition: all 0.3s ease;
          font-family: 'Poppins', sans-serif;
      }

      .filter-input:focus {
          border-color: var(--accent-color);
          outline: none;
          box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
          background-color: white;
      }

      /* Date Range */
      .date-range {
          display: inline-flex;
          align-items: center;
          padding: 0.5rem 1rem;
          background-color: rgba(79, 70, 229, 0.05);
          border-radius: 8px;
          border: 1px solid rgba(79, 70, 229, 0.1);
          font-size: 0.9rem;
          margin-bottom: 1.5rem;
      }

      .date-range i {
          margin-right: 8px;
          color: var(--accent-color);
      }

      /* Table Styles */
      .table-container {
          overflow-x: auto;
          border-radius: 10px;
          box-shadow: var(--card-shadow);
          background-color: white;
          margin-bottom: 2rem;
          transition: all 0.3s ease;
      }

      .table-custom {
          width: 100%;
          border-collapse: separate;
          border-spacing: 0;
          min-width: 1000px;
      }

      .table-custom th {
          background-color: #f8fafc;
          color: var(--text-primary);
          padding: 1rem 1.25rem;
          font-weight: 600;
          text-transform: uppercase;
          font-size: 0.75rem;
          letter-spacing: 0.05em;
          text-align: left;
          border-bottom: 1px solid #e2e8f0;
      }

      .table-custom td {
          padding: 1rem 1.25rem;
          color: var(--text-primary);
          border-bottom: 1px solid #e2e8f0;
          transition: all 0.2s ease;
      }

      .table-custom tbody tr:last-child td {
          border-bottom: none;
      }

      .table-custom tbody tr:hover {
          background-color: #f8fafc;
      }

      /* Status Badges */
      .status-badge {
          padding: 0.35rem 0.85rem;
          border-radius: 999px;
          font-weight: 500;
          font-size: 0.75rem;
          display: inline-flex;
          align-items: center;
          white-space: nowrap;
      }

      .status-badge i {
          margin-right: 4px;
          font-size: 0.6rem;
      }

      .status-pending {
          background-color: rgba(234, 179, 8, 0.1);
          color: #d97706;
      }

      .status-approved {
          background-color: rgba(34, 197, 94, 0.1);
          color: #059669;
      }

      .status-rejected {
          background-color: rgba(239, 68, 68, 0.1);
          color: #dc2626;
      }

      /* Action Buttons */
      .action-btns {
          display: flex;
          gap: 0.5rem;
      }

      .btn {
          padding: 0.5rem 1rem;
          border-radius: 6px;
          font-weight: 500;
          font-size: 0.85rem;
          transition: all 0.3s ease;
          display: inline-flex;
          align-items: center;
          justify-content: center;
          cursor: pointer;
          border: none;
      }

      .btn i {
          margin-right: 6px;
          font-size: 0.8rem;
      }

      .btn-sm {
          padding: 0.4rem 0.8rem;
          font-size: 0.8rem;
      }

      .btn-primary {
          background-color: var(--accent-color);
          color: white;
      }

      .btn-primary:hover {
          background-color: var(--accent-hover);
          transform: translateY(-1px);
          box-shadow: 0 2px 8px rgba(79, 70, 229, 0.3);
      }

      .btn-success {
          background-color: #10b981;
          color: white;
      }

      .btn-success:hover {
          background-color: #059669;
          transform: translateY(-1px);
          box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
      }

      .btn-danger {
          background-color: #ef4444;
          color: white;
      }

      .btn-danger:hover {
          background-color: #dc2626;
          transform: translateY(-1px);
          box-shadow: 0 2px 8px rgba(239, 68, 68, 0.3);
      }

      /* Search Dropdown */
      .search-container {
          position: relative;
      }

      .search-results {
          position: absolute;
          top: 100%;
          left: 0;
          right: 0;
          background-color: white;
          border-radius: 8px;
          box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
          z-index: 100;
          max-height: 200px;
          overflow-y: auto;
          display: none;
          border: 1px solid #e2e8f0;
      }

      .search-result-item {
          padding: 0.75rem 1rem;
          cursor: pointer;
          transition: all 0.2s ease;
          color: var(--text-primary);
      }

      .search-result-item:hover {
          background-color: #f8fafc;
      }

      .search-result-item.active {
          background-color: rgba(79, 70, 229, 0.1);
          color: var(--accent-color);
      }

      .no-results {
          padding: 0.75rem 1rem;
          color: var(--text-secondary);
          font-style: italic;
      }

      /* Animation */
      @keyframes fadeIn {
          from { opacity: 0; transform: translateY(10px); }
          to { opacity: 1; transform: translateY(0); }
      }

      .content-card {
          animation: fadeIn 0.4s ease forwards;
      }

      /* Responsive Adjustments */
      @media (max-width: 768px) {
          .filter-section {
              grid-template-columns: 1fr;
          }
      }

      /* Toggle Button */
      #toggleBtn {
          padding: 1.25rem;
          display: flex;
          justify-content: center;
          align-items: center;
          cursor: pointer;
          transition: all 0.3s ease;
          color: var(--text-primary);
      }

      #toggleBtn:hover {
          color: var(--accent-color);
      }

      #toggleBtn i {
          transition: transform 0.3s ease;
      }

      #sidebar.expanded #toggleBtn i {
          transform: rotate(180deg);
      }

      /* Uraian Text */
      .uraian-text {
          max-width: 300px;
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
      }

      .uraian-text:hover {
          white-space: normal;
          overflow: visible;
          position: absolute;
          background: white;
          padding: 0.5rem;
          border-radius: 8px;
          box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
          z-index: 10;
          max-width: 400px;
      }
  </style>
</head>
<body>
  <div class="flex">
    <!-- Modern Sidebar -->
    <div id="sidebar">
        <button id="toggleBtn" class="w-full">
            <i class="fas fa-chevron-right"></i>
        </button>
        
        <div class="sidebar-nav">
            <a href="{{ route('pembimbing.approvals') }}" class="sidebar-item">
                <div class="sidebar-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <span class="sidebar-text">Absensi</span>
            </a>
            <a href="{{ route('pembimbing.journals') }}" class="sidebar-item active">
                <div class="sidebar-icon">
                    <i class="fas fa-book"></i>
                </div>
                <span class="sidebar-text">Jurnal</span>
            </a>
            <a href="{{ route('pembimbing.shalat') }}" class="sidebar-item">
                <div class="sidebar-icon">
                    <i class="fas fa-mosque"></i>
                </div>
                <span class="sidebar-text">Shalat</span>
            </a>
        </div>

        <div class="mt-auto">
            <a href="{{ route('pembimbingpkl') }}" class="sidebar-item">
                <div class="sidebar-icon">
                    <i class="fas fa-home"></i>
                </div>
                <span class="sidebar-text">Home</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div id="mainContent" class="main-content">
        <div class="content-card">
            <div class="page-header">
                <h1 class="page-title">Jurnal yang Menunggu Persetujuan</h1>
                <div class="realtime-clock">
                    <i class="far fa-clock"></i>
                    <span id="current-time"></span>
                </div>
            </div>

            <!-- Filters -->
            <div class="filter-section">
                <div class="filter-card">
                    <form method="GET" action="{{ route('pembimbing.journals') }}" class="space-y-2">
                        <label class="filter-label">Pilih Minggu:</label>
                        <div class="flex gap-2">
                            <input type="week" name="week" class="filter-input" 
                                   value="{{ request('week', \Carbon\Carbon::now()->format('Y-\WW')) }}">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-filter"></i> Filter
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="filter-card">
                    <form method="GET" action="{{ route('pembimbing.journals') }}" class="space-y-2">
                        <input type="hidden" name="week" value="{{ request('week', $selectedWeek) }}">
                        <label class="filter-label">Cari Perusahaan:</label>
                        <div class="flex gap-2">
                            <div class="search-container flex-grow">
                                <input type="text" 
                                       name="PT" 
                                       id="companySearch" 
                                       class="filter-input" 
                                       placeholder="Ketik nama perusahaan..."
                                       value="{{ request('PT') }}"
                                       autocomplete="off">
                                <div class="search-results" id="searchResults"></div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i> Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="date-range">
                <i class="far fa-calendar-alt"></i>
                Periode: {{ $startOfWeek->format('d M Y') }} - {{ $endOfWeek->format('d M Y') }}
            </div>

            <!-- Journal Table -->
            <div class="table-container">
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
                                <td class="uraian-text" title="{{ $journal->uraian_konsentrasi }}">
                                    {{ $journal->uraian_konsentrasi }}
                                </td>
                                <td>{{ $journal->kelas }}</td>
                                <td>{{ $journal->PT }}</td>
                                <td>
                                    <span class="status-badge {{ $journal->status === 'Disetujui' ? 'status-approved' : ($journal->status === 'Ditolak' ? 'status-rejected' : 'status-pending') }}">
                                        <i class="fas {{ $journal->status === 'Disetujui' ? 'fa-check' : ($journal->status === 'Ditolak' ? 'fa-times' : 'fa-clock') }}"></i>
                                        {{ $journal->status }}
                                    </span>
                                </td>
                                <td>
                                    @if($journal->status === 'Menunggu')
                                        <div class="action-btns">
                                            <form action="{{ route('pembimbing.setuju', $journal->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Setujui jurnal ini?')">
                                                    <i class="fas fa-check"></i> Setujui
                                                </button>
                                            </form>
                                            <form action="{{ route('pembimbing.tolak', $journal->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tolak jurnal ini?')">
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
          // Sidebar Toggle
          const sidebar = document.getElementById('sidebar');
          const toggleBtn = document.getElementById('toggleBtn');
          const mainContent = document.getElementById('mainContent');

          toggleBtn.addEventListener('click', function() {
              sidebar.classList.toggle('expanded');
              mainContent.classList.toggle('sidebar-expanded');
          });

          // Real-time Clock
          function updateClock() {
              const now = new Date();
              const timeString = now.toLocaleTimeString('id-ID', {
                  hour: '2-digit',
                  minute: '2-digit',
                  second: '2-digit'
              });
              const dateString = now.toLocaleDateString('id-ID', {
                  weekday: 'long',
                  day: 'numeric',
                  month: 'long',
                  year: 'numeric'
              });
              document.getElementById('current-time').textContent = `${dateString}, ${timeString}`;
          }
          updateClock();
          setInterval(updateClock, 1000);

          // Company Search
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
              'CV Kreatif Mandiri',
              'PT Teknologi Inovasi',
              'CV Sumber Rejeki',
              'PT Global Solusi'
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

          // Uraian text hover effect
          const uraianCells = document.querySelectorAll('.uraian-text');
          uraianCells.forEach(cell => {
              cell.addEventListener('mouseenter', function() {
                  this.style.whiteSpace = 'normal';
                  this.style.overflow = 'visible';
                  this.style.position = 'absolute';
                  this.style.background = 'white';
                  this.style.padding = '0.5rem';
                  this.style.borderRadius = '8px';
                  this.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.1)';
                  this.style.zIndex = '10';
                  this.style.maxWidth = '400px';
              });
              
              cell.addEventListener('mouseleave', function() {
                  this.style.whiteSpace = 'nowrap';
                  this.style.overflow = 'hidden';
                  this.style.position = 'static';
                  this.style.background = 'transparent';
                  this.style.padding = '0';
                  this.style.boxShadow = 'none';
                  this.style.zIndex = 'auto';
                  this.style.maxWidth = '300px';
              });
          });
      });
  </script>
</body>
</html>