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
        <a href="{{ route('dftrshalats.create', ['type' => 'duha']) }}" class="btn btn-primary">Tambah Duha</a>
        <a href="{{ route('dftrshalats.create', ['type' => 'dzuhur']) }}" class="btn btn-success">Tambah Dzuhur</a>
        <a href="{{ route('dftrshalats.create', ['type' => 'ashar']) }}" class="btn btn-warning">Tambah Ashar</a>

        <!-- Pesan sukses jika ada -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <!-- Tabel Daftar Waktu Shalat -->
        <div class="mt-5">
            <h2>Daftar Waktu Shalat</h2>
            <table class="table">
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
                                <a href="{{ route('dftrshalats.edit', ['dftrshalat' => $shalat->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                
                                <!-- Tombol Delete -->
                                <form action="{{ route('dftrshalats.destroy', ['dftrshalat' => $shalat->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
