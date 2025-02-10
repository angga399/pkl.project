<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jurnal yang Menunggu Persetujuan</title>
<!-- Tailwind CSS -->
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
  /* Sidebar styling agar selalu tampak */
  #sideb {
  width: 250px; /* Pastikan sidebar memiliki ukuran tetap */
  min-height: 100vh; /* Agar sidebar selalu penuh */
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
  /* Tabel custom styling */
  .table-custom {
    width: 100%;
    border-collapse: collapse;
  }
  .table-custom th,
  .table-custom td {
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
<body class="bg-gray-100">
<div class="flex h-screen">
    <div class="flex h-screen">
        <!-- Sidebar (ukuran tetap) -->
        <div id="sideb" class="w-64 h-full bg-gray-800 text-white flex-none">
          @include('sideb')
        </div>
      
        <!-- Konten utama (menggunakan flex-grow agar mengisi ruang yang tersedia) -->
        <div class="flex-1 p-5 overflow-auto">
          <h1 class="text-2xl font-bold mb-5">JURNAL YANG MENUNGGU PERSETUJUAN</h1>
          
          <!-- Filter Form -->
          <div class="mb-4">
            <form method="GET" action="{{ route('pembimbing.journals') }}" class="flex flex-col sm:flex-row items-start sm:items-center gap-2">
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
                  <th>NIK</th>
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
                    <td>{{ $journal->nik }}</td>
                    <td>
                      @if($journal->status == 'Disetujui')
                        <span class="text-green-500 font-bold">Disetujui</span>
                      @elseif($journal->status == 'Ditolak')
                        <span class="text-red-500 font-bold">Ditolak</span>
                      @else
                        <span class="text-yellow-500 font-bold">Menunggu</span>
                      @endif
                    </td>
                    <td>
                      @if($journal->status == 'Menunggu')
                        <form action="{{ route('pembimbing.setuju', $journal->id) }}" method="POST" class="inline-block">
                          @csrf
                          <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600"
                                  onclick="return confirm('Apakah Anda yakin ingin menyetujui jurnal ini?')">
                            Setuju
                          </button>
                        </form>
                        <form action="{{ route('pembimbing.tolak', $journal->id) }}" method="POST" class="inline-block ml-2">
                          @csrf
                          <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600"
                                  onclick="return confirm('Apakah Anda yakin ingin menolak jurnal ini?')">
                            Tolak
                          </button>
                        </form>
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
      
  
  <!-- Komponen Navigasi Kembali -->

  <!-- Bootstrap JavaScript Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>