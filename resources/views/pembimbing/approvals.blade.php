<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengambilan Foto - Persetujuan</title>
</head>
<body>

    <h1>Halaman Persetujuan</h1>

    @if(session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

    <div>
        <!-- Filter Tanggal Mingguan -->
        <form method="GET" action="{{ route('pembimbing.approvals') }}">
            <label for="week">Pilih Minggu:</label>
            <input type="week" id="week" name="week" value="{{ request('week', \Carbon\Carbon::now()->format('Y-\WW')) }}">
            <button type="submit">Tampilkan</button>
        </form>
        <p>
            Menampilkan data dari {{ $startOfWeek->format('d M Y') }} hingga {{ $endOfWeek->format('d M Y') }}
        </p>
    </div>

    <div>
        <!-- Bagian Absen Datang -->
        <h2>Absen Datang</h2>
        <table>
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Tanggal</th>
                    <th>Hari</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarhdrs as $item)
                    @if ($item->tipe === 'datang')
                        <tr>
                            <td><img src="{{ $item->dataGambar }}" alt="Foto" width="50" height="50"></td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->hari }}</td>
                            <td>
                                @if ($item->status === 'Disetujui')
                                    Disetujui
                                @elseif ($item->status === 'Ditolak')
                                    Ditolak
                                @else
                                    pending
                                @endif
                            </td>
                            <td>
                                @if (strtolower(trim($item->status)) === 'pending') <!-- Pastikan pengecekan status benar -->
                                    <form action="{{ route('pembimbing.approve', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit">Setuju</button>
                                    </form>
                                    
                                    <form action="{{ route('pembimbing.reject', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit">Tolak</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <div>
        <!-- Bagian Absen Pulang -->
        <h2>Absen Pulang</h2>
        <table>
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Tanggal</th>
                    <th>Hari</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarhdrs as $item)
                    @if ($item->tipe === 'pulang')
                        <tr>
                            <td><img src="{{ $item->dataGambar }}" alt="Foto" width="50" height="50"></td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->hari }}</td>
                            <td>
                                @if ($item->status === 'Disetujui')
                                    Disetujui
                                @elseif ($item->status === 'Ditolak')
                                    Ditolak
                                @else
                                    Menunggu
                                @endif
                            </td>
                            <td>
                                @if (strtolower(trim($item->status)) === 'pending')
                                    <form action="{{ route('pembimbing.approve', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit">Setuju</button>
                                    </form>
                                    
                                    <form action="{{ route('pembimbing.reject', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit">Tolak</button>
                                    </form>
                                @else
                                    <p>Status: {{ $item->status }}</p>
                                @endif
                            </td>
                            
                            
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
