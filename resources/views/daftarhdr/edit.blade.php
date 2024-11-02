<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>
    
<h1 class="text-2xl font-semibold mb-4">Edit Data Foto</h1>

<form action="{{ route('daftarhdr.update', $daftarhdr->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Latitude:</label>
    <input type="text" name="latitude" value="{{ $daftarhdr->latitude }}" required>

    <label>Longitude:</label>
    <input type="text" name="longitude" value="{{ $daftarhdr->longitude }}" required>

    <label>Catatan:</label>
    <textarea name="notes">{{ $daftarhdr->notes }}</textarea>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>


</body>
</html>