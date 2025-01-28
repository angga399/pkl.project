<!-- Flash Message -->
@if (session('success'))
<div class="alert alert-success mb-4 p-4 bg-green-100 text-green-800 rounded">
    {{ session('success') }}
</div>
@endif

<table class="min-w-full table-auto border-collapse border border-gray-200">
    <thead>
        <tr class="bg-gray-100 text-gray-700">
            <th class="py-2 px-4 border-b">ID</th>
            <th class="py-2 px-4 border-b">Jenis</th>
            <th class="py-2 px-4 border-b">Tanggal</th>
            <th class="py-2 px-4 border-b">Hari</th>
            <th class="py-2 px-4 border-b">Waktu</th>
            <th class="py-2 px-4 border-b">Status</th>
            <th class="py-2 px-4 border-b">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dftrshalats as $shalat)
            @if ($shalat->status == 'Menunggu')
            <tr class="{{ $shalat->status == 'Menunggu' ? 'bg-yellow-50' : '' }}">
                <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                <td class="py-2 px-4 border-b">{{ $shalat->jenis }}</td>
                <td class="py-2 px-4 border-b">{{ $shalat->tanggal }}</td>
                <td class="py-2 px-4 border-b">{{ $shalat->hari }}</td>
                <td class="py-2 px-4 border-b">{{ $shalat->waktu }}</td>
                <td class="py-2 px-4 border-b">
                    <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full 
                        {{ $shalat->status == 'Disetujui' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                        {{ $shalat->status }}
                    </span>
                </td>
                <td class="py-2 px-4 border-b">
                    <!-- Tombol Setujui -->
                    <form action="{{ route('pembimbing.disetujui', $shalat->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-200">Setujui</button>
                    </form>

                    <!-- Tombol Tolak -->
                    <form action="{{ route('pembimbing.ditolak', $shalat->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-200">Tolak</button>
                    </form>
                </td>
            </tr>
            @endif
        @endforeach
    </tbody>
</table>
