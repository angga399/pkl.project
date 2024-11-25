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
</div>
</body>
</html>
