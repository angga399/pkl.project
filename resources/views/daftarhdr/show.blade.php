<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Attendance</title>
</head>
<body>
    <h1>Attendance Details</h1>
    <p><strong>Hari:</strong> {{ $daftarhdr->hari }}</p>
    <p><strong>Tanggal:</strong> {{ $daftarhdr->tanggal }}</p>
    <p><strong>Jam Datang:</strong> {{ $daftarhdr->jam_datang }}</p>
    <p><strong>Jam Pulang:</strong> {{ $daftarhdr->jam_pulang }}</p>
    <p><strong>Paraf Pembimbing:</strong> {{ $daftarhdr->paraf_pembimbing }}</p>
    <a href="{{ route('daftarhdr.index') }}">Back to List</a>
</body>
</html>
