<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Waktu Shalat - Persetujuan</title>
  <!-- Tailwind CSS -->
 
</head>
<body class="bg-gray-100">
  <div class="flex h-screen">
    <!-- Sidebar (selalu terlihat) -->
    <div class="w-64 bg-gray-800 text-white">
      @include('sideb')
    </div>
    
    <!-- Main Content -->
    <div class="flex-1 p-5 overflow-auto">
      <h1 class="text-2xl font-bold mb-5">Daftar Waktu Shalat - Persetujuan</h1>

      <!-- Flash Message -->
      @if (session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-5">
          {{ session('success') }}
        </div>
      @endif

      <!-- Filter Form: Pilih Minggu -->
      <div class="mb-4">
        <form method="GET" action="{{ route('pembimbing.shalat') }}" class="flex flex-col sm:flex-row items-start sm:items-center gap-2">
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

      <!-- Tabel Waktu Shalat Duha -->
      <h2 class="text-xl font-semibold text-gray-200 mb-4">Waktu Shalat Duha</h2>
      <div class="overflow-x-auto mb-8">
        <table class="table-custom">
          <thead>
            <tr>
              <th class="border border-gray-300 px-2 py-1 text-sm">No</th>
              <th class="border border-gray-300 px-2 py-1 text-sm">Tanggal</th>
              <th class="border border-gray-300 px-2 py-1 text-sm">Hari</th>
              <th class="border border-gray-300 px-2 py-1 text-sm">Waktu</th>
              <th class="border border-gray-300 px-2 py-1 text-sm">Status</th>
              <th class="border border-gray-300 px-2 py-1 text-sm">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($dftrshalats->where('jenis', 'Duha')->where('status', 'Menunggu') as $index => $shalat)
              <tr>
                <td class="border border-gray-300 px-2 py-1 text-sm">{{ $index + 1 }}</td>
                <td class="border border-gray-300 px-2 py-1 text-sm">{{ $shalat->tanggal }}</td>
                <td class="border border-gray-300 px-2 py-1 text-sm">{{ $shalat->hari }}</td>
                <td class="border border-gray-300 px-2 py-1 text-sm">{{ $shalat->waktu }}</td>
                <td class="border border-gray-300 px-2 py-1 text-sm">{{ ucfirst($shalat->status) }}</td>
                <td class="border border-gray-300 px-2 py-1 text-sm">
                  <!-- Tombol Aksi selalu muncul -->
                  <form action="{{ route('pembimbing.disetujui', $shalat->id) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600"
                      onclick="return confirm('Setujui waktu shalat ini?')">Setujui</button>
                  </form>
                  <form action="{{ route('pembimbing.ditolak', $shalat->id) }}" method="POST" class="inline ml-2">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600"
                      onclick="return confirm('Tolak waktu shalat ini?')">Tolak</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Tabel Waktu Shalat Dzuhur -->
      <h2 class="text-xl font-semibold text-gray-200 mb-4">Waktu Shalat Dzuhur</h2>
      <div class="overflow-x-auto mb-8">
        <table class="table-custom">
          <thead>
            <tr>
              <th class="border border-gray-300 px-2 py-1 text-sm">No</th>
              <th class="border border-gray-300 px-2 py-1 text-sm">Tanggal</th>
              <th class="border border-gray-300 px-2 py-1 text-sm">Hari</th>
              <th class="border border-gray-300 px-2 py-1 text-sm">Waktu</th>
              <th class="border border-gray-300 px-2 py-1 text-sm">Status</th>
              <th class="border border-gray-300 px-2 py-1 text-sm">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($dftrshalats->where('jenis', 'Dzuhur')->where('status', 'Menunggu') as $index => $shalat)
              <tr>
                <td class="border border-gray-300 px-2 py-1 text-sm">{{ $index + 1 }}</td>
                <td class="border border-gray-300 px-2 py-1 text-sm">{{ $shalat->tanggal }}</td>
                <td class="border border-gray-300 px-2 py-1 text-sm">{{ $shalat->hari }}</td>
                <td class="border border-gray-300 px-2 py-1 text-sm">{{ $shalat->waktu }}</td>
                <td class="border border-gray-300 px-2 py-1 text-sm">{{ ucfirst($shalat->status) }}</td>
                <td class="border border-gray-300 px-2 py-1 text-sm">
                  <form action="{{ route('pembimbing.disetujui', $shalat->id) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600"
                      onclick="return confirm('Setujui waktu shalat ini?')">Setujui</button>
                  </form>
                  <form action="{{ route('pembimbing.ditolak', $shalat->id) }}" method="POST" class="inline ml-2">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600"
                      onclick="return confirm('Tolak waktu shalat ini?')">Tolak</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Tabel Waktu Shalat Ashar -->
      <h2 class="text-xl font-semibold text-gray-200 mb-4">Waktu Shalat Ashar</h2>
      <div class="overflow-x-auto">
        <table class="table-custom">
          <thead>
            <tr>
              <th class="border border-gray-300 px-2 py-1 text-sm">No</th>
              <th class="border border-gray-300 px-2 py-1 text-sm">Tanggal</th>
              <th class="border border-gray-300 px-2 py-1 text-sm">Hari</th>
              <th class="border border-gray-300 px-2 py-1 text-sm">Waktu</th>
              <th class="border border-gray-300 px-2 py-1 text-sm">Status</th>
              <th class="border border-gray-300 px-2 py-1 text-sm">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($dftrshalats->where('jenis', 'Ashar')->where('status', 'Menunggu') as $index => $shalat)
              <tr>
                <td class="border border-gray-300 px-2 py-1 text-sm">{{ $index + 1 }}</td>
                <td class="border border-gray-300 px-2 py-1 text-sm">{{ $shalat->tanggal }}</td>
                <td class="border border-gray-300 px-2 py-1 text-sm">{{ $shalat->hari }}</td>
                <td class="border border-gray-300 px-2 py-1 text-sm">{{ $shalat->waktu }}</td>
                <td class="border border-gray-300 px-2 py-1 text-sm">{{ ucfirst($shalat->status) }}</td>
                <td class="border border-gray-300 px-2 py-1 text-sm">
                  <form action="{{ route('pembimbing.disetujui', $shalat->id) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600"
                      onclick="return confirm('Setujui waktu shalat ini?')">Setujui</button>
                  </form>
                  <form action="{{ route('pembimbing.ditolak', $shalat->id) }}" method="POST" class="inline ml-2">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600"
                      onclick="return confirm('Tolak waktu shalat ini?')">Tolak</button>
                  </form>
                </td>
              </tr>
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