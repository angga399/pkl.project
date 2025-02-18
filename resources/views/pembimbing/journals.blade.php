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

  <!-- Konten utama -->
  <div class="flex-1 p-5 overflow-auto">
    <h1 class="text-2xl font-bold mb-5">JURNAL YANG MENUNGGU PERSETUJUAN</h1>

    <!-- Filter Form -->
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

<!-- Form Pencarian Berdasarkan Perusahaan -->
<div class="mb-4">
  <form method="GET" action="{{ route('pembimbing.journals') }}" class="flex flex-col sm:flex-row items-start sm:items-center gap-2">
    <!-- Hidden input untuk menyimpan minggu yang dipilih -->
    <input type="hidden" name="week" value="{{ request('week', $selectedWeek) }}">
    
    <label for="PT" class="font-semibold text-white">Pilih Perusahaan:</label>
    <select name="PT" id="PT" class="border rounded-lg p-2 text-black">
      <option value="" disabled {{ request('PT') == '' ? 'selected' : '' }}>Pilih Perusahaan</option>
      <option value="Perusahaan A" {{ request('PT') == 'Perusahaan A' ? 'selected' : '' }}>Perusahaan A</option>
      <option value="Perusahaan B" {{ request('PT') == 'Perusahaan B' ? 'selected' : '' }}>Perusahaan B</option>
      <option value="Perusahaan C" {{ request('PT') == 'Perusahaan C' ? 'selected' : '' }}>Perusahaan C</option>
      <option value="Perusahaan D" {{ request('PT') == 'Perusahaan D' ? 'selected' : '' }}>Perusahaan D</option>
    </select>
    <button type="submit" class="ml-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
      Cari
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
            <th>Perusahaan</th>
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
              <td>{{ $journal->PT }}</td>
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

<!-- Bootstrap JavaScript Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
