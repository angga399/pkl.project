<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jurnal yang Menunggu Persetujuan</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --bg-primary: #0a192f;
      --bg-secondary: #172a45;
      --bg-card: #1a365d;
      --accent: #3182ce;
      --accent-hover: #2c5282;
      --text-primary: #e2e8f0;
      --text-secondary: #a0aec0;
      --border: #2d3748;
      --success: #48bb78;
      --warning: #ed8936;
      --danger: #f56565;
      --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.2), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: var(--bg-primary);
      color: var(--text-primary);
      margin: 0;
      padding: 0;
      min-height: 100vh;
    }

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
      border-right: 1px solid var(--border);
      box-shadow: var(--card-shadow);
      display: flex;
      flex-direction: column;
    }

    #sidebar.expanded {
      width: 240px;
    }

    #toggleBtn {
      background: transparent;
      border: none;
      color: var(--text-secondary);
      padding: 1rem;
      cursor: pointer;
      text-align: center;
      transition: all 0.3s ease;
    }

    #toggleBtn:hover {
      color: var(--accent);
    }

    #toggleBtn i {
      transition: transform 0.3s ease;
    }

    #sidebar.expanded #toggleBtn i {
      transform: rotate(180deg);
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
      text-decoration: none;
    }

    .sidebar-item:hover {
      background-color: rgba(49, 130, 206, 0.1);
      color: var(--accent-hover);
    }

    .sidebar-item.active {
      background-color: rgba(49, 130, 206, 0.2);
      color: var(--accent);
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

    .main-content {
      margin-left: 80px;
      padding: 2rem;
      transition: margin-left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    #sidebar.expanded ~ .main-content {
      margin-left: 240px;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
    }

    .page-title {
      font-size: 1.75rem;
      font-weight: 600;
      color: var(--text-primary);
      margin: 0;
    }

    .current-time {
      background-color: var(--bg-card);
      padding: 0.5rem 1rem;
      border-radius: 8px;
      font-size: 0.9rem;
      box-shadow: var(--card-shadow);
    }

    .filters {
      background-color: var(--bg-card);
      padding: 1.5rem;
      border-radius: 12px;
      margin-bottom: 2rem;
      box-shadow: var(--card-shadow);
    }

    .filter-form {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .filter-label {
      font-weight: 500;
      color: var(--text-secondary);
    }

    .week-input {
      background-color: var(--bg-secondary);
      border: 1px solid var(--border);
      color: var(--text-primary);
      padding: 0.5rem;
      border-radius: 6px;
      font-family: inherit;
    }

    .filter-btn {
      background-color: var(--accent);
      color: white;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .filter-btn:hover {
      background-color: var(--accent-hover);
    }

    .period-display {
      background-color: var(--bg-card);
      padding: 1rem;
      border-radius: 8px;
      margin-bottom: 1.5rem;
      text-align: center;
      font-weight: 500;
      box-shadow: var(--card-shadow);
    }

    .company-section {
      background-color: var(--bg-card);
      border-radius: 12px;
      margin-bottom: 2rem;
      overflow: hidden;
      box-shadow: var(--card-shadow);
    }

    .company-header {
      background-color: var(--accent);
      padding: 1rem 1.5rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .company-name {
      font-size: 1.25rem;
      font-weight: 600;
      margin: 0;
      color: white;
    }

    .journal-count {
      background-color: rgba(255, 255, 255, 0.2);
      padding: 0.25rem 0.75rem;
      border-radius: 20px;
      font-size: 0.9rem;
    }

    .journal-table {
      width: 100%;
      border-collapse: collapse;
    }

    .journal-table th {
      background-color: var(--bg-secondary);
      padding: 1rem;
      text-align: left;
      font-weight: 500;
      color: var(--text-secondary);
    }

    .journal-table td {
      padding: 1rem;
      border-bottom: 1px solid var(--border);
    }

    .journal-table tr:last-child td {
      border-bottom: none;
    }

    .journal-table tr:hover {
      background-color: rgba(49, 130, 206, 0.05);
    }

    .status {
      display: inline-block;
      padding: 0.25rem 0.75rem;
      border-radius: 20px;
      font-size: 0.85rem;
      font-weight: 500;
    }

    .status-waiting {
      background-color: rgba(237, 137, 54, 0.2);
      color: var(--warning);
    }

    .status-approved {
      background-color: rgba(72, 187, 120, 0.2);
      color: var(--success);
    }

    .status-rejected {
      background-color: rgba(245, 101, 101, 0.2);
      color: var(--danger);
    }

    .action-buttons {
      display: flex;
      gap: 0.5rem;
    }

    .btn {
      padding: 0.5rem 1rem;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-weight: 500;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
    }

    .btn-approve {
      background-color: var(--success);
      color: white;
    }

    .btn-approve:hover {
      background-color: #38a169;
    }

    .btn-reject {
      background-color: var(--danger);
      color: white;
    }

    .btn-reject:hover {
      background-color: #e53e3e;
    }

    .user-not-found {
      color: var(--danger) !important;
      font-style: italic;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .main-content {
        margin-left: 0;
        padding: 1rem;
      }
      
      #sidebar {
        transform: translateX(-100%);
      }
      
      #sidebar.expanded {
        transform: translateX(0);
        width: 280px;
      }
      
      .filter-form {
        flex-direction: column;
        align-items: flex-start;
      }
      
      .action-buttons {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
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
  <div class="main-content">
    <div class="header">
      <h1 class="page-title">Jurnal yang Menunggu Persetujuan</h1>
      <div class="current-time" id="current-time"></div>
    </div>

    <!-- Filters -->
    <div class="filters">
      <form method="GET" action="{{ route('pembimbing.journals') }}" class="filter-form">
        <label class="filter-label">Pilih Minggu:</label>
        <div>
          <input type="week" name="week" class="week-input" value="{{ request('week', \Carbon\Carbon::now()->format('Y-\WW')) }}">
          <button type="submit" class="filter-btn">
            <i class="fas fa-filter"></i> Filter
          </button>
        </div>
      </form>
    </div>

    <div class="period-display">
      Periode: {{ $startOfWeek->format('d M Y') }} - {{ $endOfWeek->format('d M Y') }}
    </div>
    
    <!-- Journal Table -->
    <div>
      @foreach($journals as $companyName => $companyJournals)
      <div class="company-section">
        <div class="company-header">
          <h3 class="company-name">Perusahaan: {{ $companyName }}</h3>
          <span class="journal-count">{{ $companyJournals->count() }} jurnal</span>
        </div>
        
        <div>
          <table class="journal-table">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Uraian</th>
                <th>Jurusan</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($companyJournals as $journal)
              <td style="text-align: center;">
    <div style="display: inline-block; padding: 5px; background: white; border-radius: 5px;">
        {!! QrCode::size(80)->generate('journal_'.$journal->id) !!}
        <div style="font-size: 0.8rem; margin-top: 5px; color: var(--text-secondary);">ID: {{ $journal->id }}</div>
    </div>
</td>
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  @if($journal->user)
                    {{ $journal->user->full_name }}
                  @else
                    <span class="user-not-found">User tidak ditemukan</span>
                  @endif
                </td>
                <td>{{ $journal->tanggal ?? '-' }}</td>
                <td>{{ $journal->uraian_konsentrasi ?? '-' }}</td>
                <td>{{ $journal->kelas ?? '-'}}</td>
                <td>
                  @if($journal->status === 'Menunggu')
                    <span class="status status-waiting">{{ $journal->status ?? '-' }}</span>
                  @elseif($journal->status === 'Disetujui')
                    <span class="status status-approved">{{ $journal->status ?? '-' }}</span>
                  @elseif($journal->status === 'Ditolak')
                    <span class="status status-rejected">{{ $journal->status ?? '-' }}</span>
                  @else
                    <span>{{ $journal->status ?? '-' }}</span>
                  @endif
                </td>
                <td>
                  @if($journal->status === 'Menunggu')
                  <div class="action-buttons">
                    <form action="{{ route('pembimbing.setuju', $journal->id) }}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-approve">
                        <i class="fas fa-check"></i> Setujui
                      </button>
                    </form>
                    <form action="{{ route('pembimbing.tolak', $journal->id) }}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-reject">
                        <i class="fas fa-times"></i> Tolak
                      </button>
                    </form>
                  </div>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      @endforeach
    </div>
  </div>
<!-- QR Code Scanner Section -->
<div class="scanner-section" style="background-color: var(--bg-card); padding: 1.5rem; border-radius: 12px; margin-bottom: 2rem; box-shadow: var(--card-shadow);">
    <h3 style="color: var(--text-primary); margin-bottom: 1rem; font-size: 1.25rem; font-weight: 600;">
        <i class="fas fa-qrcode"></i> Persetujuan Cepat dengan QR Code
    </h3>
    
    <div id="reader" style="width: 100%; max-width: 500px; margin: 0 auto;"></div>
    
    <div id="scanner-result" style="margin-top: 1rem; text-align: center; min-height: 40px;"></div>
</div>

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    // Fungsi ketika scan berhasil
    function onScanSuccess(decodedText, decodedResult) {
        // Cek format QR code (journal_id)
        if (decodedText.startsWith('journal_')) {
            const journalId = decodedText.split('_')[1];
            const resultDiv = document.getElementById('scanner-result');
            
            // Tampilkan loading
            resultDiv.innerHTML = `
                <div style="color: var(--accent);">
                    <i class="fas fa-spinner fa-spin"></i> Memproses persetujuan jurnal...
                </div>
            `;
            
            // Kirim permintaan persetujuan ke server
            fetch(`/pembimbing/setuju/${journalId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    resultDiv.innerHTML = `
                        <div style="color: var(--success); font-weight: 500;">
                            <i class="fas fa-check-circle"></i> Jurnal berhasil disetujui!
                        </div>
                    `;
                    
                    // Refresh halaman setelah 1.5 detik
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                } else {
                    resultDiv.innerHTML = `
                        <div style="color: var(--danger);">
                            <i class="fas fa-exclamation-triangle"></i> ${data.message}
                        </div>
                    `;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                resultDiv.innerHTML = `
                    <div style="color: var(--danger);">
                        <i class="fas fa-exclamation-triangle"></i> Terjadi kesalahan saat memproses
                    </div>
                `;
            });
        } else {
            document.getElementById('scanner-result').innerHTML = `
                <div style="color: var(--danger);">
                    <i class="fas fa-exclamation-triangle"></i> QR Code tidak valid untuk persetujuan jurnal
                </div>
            `;
        }
    }

    // Fungsi ketika scan gagal
    function onScanFailure(error) {
        // Bisa diabaikan atau tampilkan pesan error
        // console.warn(`Scan gagal: ${error}`);
    }

    // Inisialisasi scanner saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        const html5QrcodeScanner = new Html5QrcodeScanner(
            "reader",
            { fps: 10, qrbox: {width: 250, height: 250} },
            false
        );
        
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    });

 
    document.addEventListener('DOMContentLoaded', function() {
      // Toggle sidebar
      const sidebar = document.getElementById('sidebar');
      const toggleBtn = document.getElementById('toggleBtn');
      
      toggleBtn.addEventListener('click', function() {
        sidebar.classList.toggle('expanded');
      });

      // Real-time Clock
      function updateClock() {
        const now = new Date();
        const options = { 
          weekday: 'long', 
          day: 'numeric', 
          month: 'long', 
          year: 'numeric',
          hour: '2-digit',
          minute: '2-digit',
          second: '2-digit'
        };
        document.getElementById('current-time').textContent = now.toLocaleDateString('id-ID', options);
      }
      updateClock();
      setInterval(updateClock, 1000);
    });
  </script>
</body>
</html>