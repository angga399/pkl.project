<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Waktu Shalat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Form Waktu Shalat: {{ ucfirst($type) }}</h1>
   

    <form action="{{ route('dftrshalats.store') }}" method="POST">
        @csrf
        <input type="hidden" name="type" value="{{ $type }}">

        <div class="form-group">
            <label>Tanggal</label>
            <input type="text" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" readonly>
        </div>
        <div class="form-group">
            <label>Hari</label>
            <input type="text" name="hari" class="form-control" value="{{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd') }}" readonly>
        </div>
        <div class="form-group">

    <label>Waktu</label>
    <input type="time" name="time" class="form-control" value="{{ \Carbon\Carbon::now('Asia/Jakarta')->format('H:i') }}" readonly>
</div>



            <label>Waktu</label>
            <!-- Gunakan readonly atau disabled -->
            <input type="time" name="waktu" class="form-control" value="{{ \Carbon\Carbon::now()->format('H:i') }}" readonly>
        </div>
        
        
        <div class="form-check">
            <input type="checkbox" name="checked" id="checked" class="form-check-input" required>
            <label for="checked" class="form-check-label">Centang untuk mencatat waktu {{ ucfirst($type) }}</label>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
</body>
</html>
