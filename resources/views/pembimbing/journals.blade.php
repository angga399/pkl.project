<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jurnal yang Menunggu Persetujuan</title>
</head>
<body>
  <div>
    <!-- Sidebar -->
    <div>
      <button id="toggleBtn">Toggle</button>
      
      <div>
        <a href="{{ route('pembimbing.approvals') }}">Absensi</a>
        <a href="{{ route('pembimbing.journals') }}" class="active">Jurnal</a>
        <a href="{{ route('pembimbing.shalat') }}">Shalat</a>
        <a href="{{ route('pembimbingpkl') }}">Home</a>
      </div>
    </div>

    <!-- Main Content -->
    <div>
      <div>
        <h1>Jurnal yang Menunggu Persetujuan</h1>
        <div>
          <span id="current-time"></span>
        </div>
      </div>

      <!-- Filters -->
      <div>
        <div>
          <form method="GET" action="{{ route('pembimbing.journals') }}">
            <label>Pilih Minggu:</label>
            <div>
              <input type="week" name="week" value="{{ request('week', \Carbon\Carbon::now()->format('Y-\WW')) }}">
              <button type="submit">Filter</button>
            </div>
          </form>
        </div>
        
        <div>
          <form method="GET" action="{{ route('pembimbing.journals') }}">
            <input type="hidden" name="week" value="{{ request('week', $selectedWeek) }}">
            <label>Cari Perusahaan:</label>
            <div>
              <div>
                <input type="text" name="PT" id="companySearch" placeholder="Ketik nama perusahaan..." value="{{ request('PT') }}">
                <div id="searchResults"></div>
              </div>
              <button type="submit">Cari</button>
            </div>
          </form>
        </div>
      </div>

      <div>
        Periode: {{ $startOfWeek->format('d M Y') }} - {{ $endOfWeek->format('d M Y') }}
      </div>
      
    

      <!-- Journal Table -->
      <div>
        @foreach($journals as $companyName => $companyJournals)
        <div>
          <h3>Perusahaan: {{ $companyName }} ({{ $companyJournals->count() }} jurnal)</h3>
          
          <div>
            <table>
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
                <tr>
                  <td>{{ $loop->iteration }}</td>
            <td>
  @if($journal->user)
    {{ $journal->user->full_name }}
  @else
    <span style="color: red;">User tidak ditemukan</span>
  @endif
</td>

            

                  <td>{{ $journal->tanggal ?? '-' }}</td>
                  <td>{{ $journal->uraian_konsentrasi ?? '-' }}</td>
                  <td>{{ $journal->kelas ?? '-'}}</td>
                  <td>
                    <span>{{ $journal->status ?? '-' }}</span>
                  </td>
                  <td>
                    @if($journal->status ?? '-'=== 'Menunggu')
                    <div>
                      <form action="{{ route('pembimbing.setuju', $journal->id) }}" method="POST">
                        @csrf
                        <button type="submit">Setujui</button>
                      </form>
                      <form action="{{ route('pembimbing.tolak', $journal->id) }}" method="POST">
                        @csrf
                        <button type="submit">Tolak</button>
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
  </div>

  <!-- Modal -->
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Real-time Clock
      function updateClock() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('id-ID');
        const dateString = now.toLocaleDateString('id-ID');
        document.getElementById('current-time').textContent = `${dateString}, ${timeString}`;
      }
      updateClock();
      setInterval(updateClock, 1000);

      // Approve All Button
      const approveAllBtn = document.getElementById('approveAllBtn');
      const approveAllModal = document.getElementById('approveAllModal');
      const confirmApproveAll = document.getElementById('confirmApproveAll');

      approveAllBtn?.addEventListener('click', function() {
        approveAllModal.style.display = 'block';
      });

      window.hideApproveAllModal = function() {
        approveAllModal.style.display = 'none';
      };

      confirmApproveAll?.addEventListener('click', function() {
        // Approve logic here
        hideApproveAllModal();
      });
    });
  </script>
</body>
</html>