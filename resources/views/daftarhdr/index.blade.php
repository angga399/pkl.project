<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar hadir List</title>
</head>
<body>
    <h1>Daftar hadir List</h1>
    <a href="{{ route('daftarhdr.create') }}">Daftar hadir</a>
    <table border="1">
        <thead>
            <tr>
                <th>Hari</th>
                <th>Tanggal</th>
                <th>Jam Datang</th>
                <th>Jam Pulang</th>
                <th>Paraf Pembimbing</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daftarhdrs as $daftarhdr)
                <tr>
                    <td>{{ $daftarhdr->hari }}</td>
                    <td>{{ $daftarhdr->tanggal }}</td>
                    <td>{{ $daftarhdr->jam_datang }}</td>
                    <td>{{ $daftarhdr->jam_pulang }}</td>
                    <td>{{ $daftarhdr->paraf_pembimbing }}</td>
                    <td>
                        <a href="{{ route('daftarhdr.edit', $daftarhdr->id) }}">Edit</a>
                        <form action="{{ route('daftarhdr.destroy', $daftarhdr->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
