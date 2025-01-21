{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip Waktu Shalat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Arsip Waktu Shalat</h1>

        <!-- Tabel Daftar Waktu Shalat yang Diarsipkan -->
        <div class="mt-5">
            <h2>Daftar Arsip Waktu Shalat</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tipe</th>
                        <th>Tanggal</th>
                        <th>Hari</th>
                        <th>Waktu</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dftrshalatsArsip as $shalat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $shalat->type }}</td>
                            <td>{{ $shalat->tanggal }}</td>
                            <td>{{ $shalat->hari }}</td>
                            <td>{{ $shalat->waktu }}</td>
                            <td>{{ $shalat->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ route('dftrshalats.index') }}" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
</body>
</html> --}}
