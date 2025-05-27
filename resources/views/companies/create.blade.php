<h1>Tambah Perusahaan</h1>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<form action="{{ route('companies.store') }}" method="POST">
    @csrf
    <label>Nama Perusahaan</label>
    <input type="text" name="name" required><br>

    <label>Alamat</label>
    <textarea name="address" required></textarea><br>

    <label>Telepon</label>
    <input type="text" name="phone" required><br>

    <button type="submit">Simpan</button>
</form>
