<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Waktu Shalat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Beranda Waktu Shalat</h1>
        
        <!-- Link untuk mengakses form pembuatan waktu shalat -->
        <div class="mb-3 text-center" id="buttons-container">
            <!-- Tombol akan ditambahkan di sini oleh JavaScript -->
        </div>

        <!-- Pesan sukses jika ada -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <!-- Tabel Daftar Waktu Shalat -->
        <div class="mt-5">
            <h2>Daftar Waktu Shalat</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tipe</th>
                        <th>Tanggal</th>
                        <th>Hari</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($dftrshalats->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data waktu shalat.</td>
                        </tr>
                    @else
                        @foreach ($dftrshalats as $shalat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $shalat->type }}</td>
                                <td>{{ $shalat->tanggal }}</td>
                                <td>{{ $shalat->hari }}</td>
                                <td>{{ $shalat->waktu }}</td>
                                <td>{{ $shalat->status }}</td>
                                <td>
                                    <!-- Tombol Edit -->
                                    {{-- <a href="{{ route('dftrshalats.edit', ['dftrshalat' => $shalat->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <!-- Tombol Delete --> --}}
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $shalat->id }}').submit();" class="btn btn-danger btn-sm">Hapus</a>

                                    <form id="delete-form-{{ $shalat->id }}" action="{{ route('dftrshalats.destroy', $shalat->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Fungsi untuk menampilkan tombol berdasarkan waktu
        function showButtonsBasedOnTime() {
            const now = new Date();
            const currentHour = now.getHours();

            const buttonsContainer = document.getElementById('buttons-container');

            if (currentHour >= 4 && currentHour < 1) { // Pagi (04:00 - 10:59)
                buttonsContainer.innerHTML += '<a href="{{ route("dftrshalats.create", ["type" => "duha"]) }}" class="btn btn-primary">Tambah Duha</a>';
            }
            if (currentHour >= 11 && currentHour < 15) { // Siang (11:00 - 14:59)
                buttonsContainer.innerHTML += '<a href="{{ route("dftrshalats.create", ["type" => "dzuhur"]) }}" class="btn btn-success">Tambah Dzuhur</a>';
            }
            if (currentHour >= 15 && currentHour < 18) { // Sore (15:00 - 17:59)
                buttonsContainer.innerHTML += '<a href="{{ route("dftrshalats.create", ["type" => "ashar"]) }}" class="btn btn-warning">Tambah Ashar</a>';
            }
        }

        // Panggil fungsi saat halaman dimuat
        window.onload = showButtonsBasedOnTime;
    </script>
</body>
</html>