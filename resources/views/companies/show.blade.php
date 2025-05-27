<!-- resources/views/companies/show.blade.php -->
<h1>Perusahaan: {{ $company->name }}</h1>

<h2>Alamat: {{ $company->address }}</h2>
<h3>Telepon: {{ $company->phone }}</h3>

<h2>Daftar Siswa</h2>
<ul>
    @forelse($students as $student)
        <li>{{ $student->full_name }} - {{ $student->major }}</li>
    @empty
        <li>Tidak ada siswa</li>
    @endforelse
</ul>

<h2>Daftar Pembimbing</h2>
<ul>
    @forelse($supervisors as $supervisor)
        <li>{{ $supervisor->full_name }} - {{ $supervisor->nip }}</li>
    @empty
        <li>Tidak ada pembimbing</li>
    @endforelse
</ul>
