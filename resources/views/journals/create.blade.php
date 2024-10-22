<!DOCTYPE html>
<html>
<head>
    <title>Tambah Jurnal</title>
</head>
<body>
    <h1>Tambah Jurnal</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('journals.store') }}" method="POST">
        @csrf
        <label for="judul_jurnal">Judul Jurnal:</label><br>
        <input type="text" id="judul_jurnal" name="judul_jurnal" required><br><br>

        <label for="tanggal">Tanggal:</label><br>
        <input type="date" id="tanggal" name="tanggal" required><br><br>

        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="paraf">Paraf:</label><br>
        <input type="text" id="paraf" name="paraf" required><br><br>

        <label for="keterangan">Keterangan:</label><br>
        <textarea id="keterangan" name="keterangan"></textarea><br><br>

        <button type="submit">Simpan</button>
        <a href="{{ route('journals.index') }}">Kembali</a>
    </form>
</body>
</html>
