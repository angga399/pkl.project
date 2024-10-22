<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absen Hadir</title>
</head>
<body>
    <h1>Absen Hadir</h1>
    <form action="{{ route('daftarhdr.store') }}" method="POST">
        @csrf
        <div>
            <label for="hari">Hari:</label>
            <input type="text" id="hari" name="hari">
        </div>
        <div>
            <label for="tanggal">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal">
        </div>
        <div>
            <label for="jam_datang">Jam Datang:</label>
            <input type="time" id="jam_datang" name="jam_datang">
        </div>
        <div>
            <label for="jam_pulang">Jam Pulang:</label>
            <input type="time" id="jam_pulang" name="jam_pulang">
        </div>
        <div>
            <label for="paraf_pembimbing">Paraf Pembimbing:</label>
            <input type="text" id="paraf_pembimbing" name="paraf_pembimbing">
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
