<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Waktu Shalat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-5">
    <x-navigasi></x-navigasi>
    <h1>Daftar Waktu Shalat</h1>
    <a href="{{ route('dftrshalats.create') }}" class="btn btn-primary mb-3">Tambah Waktu Shalat</a>
    <x-back></x-back>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Hari</th>
                <th>Tanggal</th>
                <th>Duha</th>
                <th>Dzuhur</th>
                <th>Ashar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dftrshalats as $dftrshalat)
                <tr>
                    <td>{{ $dftrshalat->hari }}</td>
                    <td>{{ $dftrshalat->tanggal }}</td>
                    <td>{{ $dftrshalat->duha }}</td>
                    <td>{{ $dftrshalat->dzuhur }}</td>
                    <td>{{ $dftrshalat->ashar }}</td>
                    <td>
                        <a href="{{ route('dftrshalats.edit', $dftrshalat->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('dftrshalats.destroy', $dftrshalat->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
