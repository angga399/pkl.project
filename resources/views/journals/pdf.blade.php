<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Jurnal Kegiatan</title>
    <style>
        body { font-family: 'Nunito', sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        th { background-color: #ddd; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Laporan Jurnal Kegiatan</h2>
    <p style="text-align: right;">Tanggal: {{ \Carbon\Carbon::now()->format('d F Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Uraian</th>
                <th>Jurusan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($journals as $journal)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $journal->nama }}</td>
                    <td>{{ $journal->tanggal }}</td>
                    <td>{{ $journal->uraian_konsentrasi }}</td>
                    <td>{{ $journal->kelas }}</td>
                    <td>{{ $journal->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>