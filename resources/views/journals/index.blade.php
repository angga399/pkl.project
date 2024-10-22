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
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Uraian Konsentrasi</th>
            <th>Aksi</th>
        </tr>
        @foreach ($journals as $journal)
        <tr>
            <td>{{ $journal->tanggal }}</td>
            <td>{{ $journal->nama }}</td>
            <td>{{ $journal->uraian_konsentrasi }}</td>
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
