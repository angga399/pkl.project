<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Absen</title>
</head>
<body>
    <h1>Edit Absen</h1>
    <form action="{{ route('daftarhdr.update', $daftarhdr->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="hari">Hari:</label>
            <input type="text" id="hari" name="hari" value="{{ $daftarhdr->hari }}">
        </div>
        <div>
            <label for="tanggal">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" value="{{ $daftarhdr->tanggal }}">
        </div>
        <div>
            <label for="jam_datang">Jam Datang:</label>
            <input type="time" id="jam_datang" name="jam_datang" value="{{ $daftarhdr->jam_datang }}">
        </div>
        <div>
            <label for="jam_pulang">Jam Pulang:</label>
            <input type="time" id="jam_pulang" name="jam_pulang" value="{{ $daftarhdr->jam_pulang }}">
        </div>
        <div>
            <label for="paraf_pembimbing">Paraf Pembimbing:</label>
            <input type="text" id="paraf_pembimbing" name="paraf_pembimbing" value="{{ $daftarhdr->paraf_pembimbing }}">
        </div>
        <button type="submit">Update</button>
    </form>
</body>
</html>
