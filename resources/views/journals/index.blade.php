<!DOCTYPE html>
<html>
<head>
    <title>Daftar Jurnal</title>
</head>
<body>
    <h1>Daftar Jurnal</h1>
    <a href="{{ route('journals.create') }}">Tambah Jurnal</a>
    <table>
        <tr>
            <th>Judul Jurnal</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Paraf</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        @foreach ($journals as $journal)
        <tr>
            <td>{{ $journal->judul_jurnal }}</td>
            <td>{{ $journal->tanggal }}</td>
            <td>{{ $journal->nama }}</td>
            <td>{{ $journal->paraf }}</td>
            <td>{{ $journal->keterangan }}</td>
            <td>
                <a href="{{ route('journals.edit', $journal->id) }}">Edit</a>
                <form action="{{ route('journals.destroy', $journal->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
