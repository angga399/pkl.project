<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Tanggal</th>
            <th>Hari</th>
            <th>Waktu</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dftrshalats as $shalat)
            <tr>
                <td>{{ $shalat->id }}</td>
                <td>{{ $shalat->type }}</td>
                <td>{{ $shalat->tanggal }}</td>
                <td>{{ $shalat->hari }}</td>
                <td>{{ $shalat->waktu }}</td>
                <td>{{ $shalat->status }}</td>
                <td>
                    <form action="{{ route('pembimbing.shalat.disetujui', $shalat->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit">Setujui</button>
                    </form>
                    <form action="{{ route('pembimbing.shalat.ditolak', $shalat->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit">Tolak</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
