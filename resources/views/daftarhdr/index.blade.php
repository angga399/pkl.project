<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil</title>
</head>
<body>
    
    <h1 class="text-2xl font-semibold mb-4">Data Foto dengan Lokasi</h1>
    <a href="{{ route('daftarhdr.create') }}" class="btn btn-primary mb-4">Tambah Data</a>

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Foto</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->latitude }}</td>
                    <td>{{ $item->longitude }}</td>
                    <td><img src="{{ $item->image_data }}" alt="Foto" width="100"></td>
                    <td>{{ $item->notes }}</td>
                    <td>
                        <a href="{{ route('daftarhdr.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('daftarhdr.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>


