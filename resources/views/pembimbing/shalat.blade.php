
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

@vite('resources/css/app.css')
<table class="min-w-full table-auto border-collapse border border-gray-200">
    <thead>
        <tr class="bg-gray-100 text-gray-700">
            <th class="py-2 px-4 border-b">ID</th>
            <th class="py-2 px-4 border-b">Type</th>
            <th class="py-2 px-4 border-b">Tanggal</th>
            <th class="py-2 px-4 border-b">Hari</th>
            <th class="py-2 px-4 border-b">Waktu</th>
            <th class="py-2 px-4 border-b">Status</th>
            <th class="py-2 px-4 border-b">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <!-- Pesan sukses jika ada -->
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

        <tbody>
            @foreach ($dftrshalats as $shalat)
                @if ($shalat->status == 'Menunggu') <!-- Hanya menampilkan data dengan status 'Menunggu' -->
                    <tr class="bg-white hover:bg-gray-50">
                        <td class="py-2 px-4 border-b">{{ $shalat->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $shalat->type }}</td>
                        <td class="py-2 px-4 border-b">{{ $shalat->tanggal }}</td>
                        <td class="py-2 px-4 border-b">{{ $shalat->hari }}</td>
                        <td class="py-2 px-4 border-b">{{ $shalat->waktu }}</td>
                        <td class="py-2 px-4 border-b">
                            <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full 
                                        {{ $shalat->status == 'Disetujui' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $shalat->status }}
                            </span>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <form action="{{ route('pembimbing.disetujui', $shalat->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-200">Setujui</button>
                            </form>
                            <form action="{{ route('pembimbing.ditolak', $shalat->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-200">Tolak</button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>

    </tbody>
</table>
