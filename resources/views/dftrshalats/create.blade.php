<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Waktu Shalat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Tambah Waktu Shalat</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dftrshalats.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="hari">Hari</label>
            <input type="text" name="hari" class="form-control" value="{{ old('hari') }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
        </div>
        <div class="form-group">
            <label for="duha">Duha</label>
            <input type="time" name="duha" class="form-control" value="{{ old('duha') }}" required>
        </div>
        <div class="form-group">
            <label for="dzuhur">Dzuhur</label>
            <input type="time" name="dzuhur" class="form-control" value="{{ old('dzuhur') }}" required>
        </div>
        <div class="form-group">
            <label for="ashar">Ashar</label>
            <input type="time" name="ashar" class="form-control" value="{{ old('ashar') }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
</body>
</html>
