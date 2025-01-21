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

        <!-- Pesan sukses jika ada -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol pilihan -->
        <div class="row mt-5">
            <div class="col-md-4 text-center">
                <a href="{{ route('dftrshalats.create', ['type' => 'duha']) }}" class="btn btn-primary btn-lg">Duha</a>
            </div>
            <div class="col-md-4 text-center">
                <a href="{{ route('dftrshalats.create', ['type' => 'dzuhur']) }}" class="btn btn-success btn-lg">Dzuhur</a>
            </div>
            <div class="col-md-4 text-center">
                <a href="{{ route('dftrshalats.create', ['type' => 'ashar']) }}" class="btn btn-warning btn-lg">Ashar</a>
            </div>
        </div>

        <table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Type</th>
            <th>Tanggal</th>
            <th>Hari</th>
            <th>Waktu</th>
        </tr>
    </thead>
    <tbody>
        @forelse($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->type }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->hari }}</td>
                <td>{{ $item->waktu }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data</td>
            </tr>
        @endforelse
    </tbody>
</table>

     
</body>
</html>
