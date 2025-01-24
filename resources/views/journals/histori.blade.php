{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Jurnal</title>
    @vite('resources/css/app.css') <!-- Pastikan Anda menggunakan Vite untuk mengelola CSS -->
</head>
<body class="bg-gray-100">

    <div class="container mx-auto mt-5">
        <h1 class="text-center text-3xl font-medium title-font mb-4 text-gray-900">Histori Jurnal: {{ $journal->nama }}</h1>

        <div class="mb-4">
            <input type="text" id="searchInput" placeholder="Cari..." class="border rounded p-2">
        </div>

                
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b">#</th>
                                    <th class="py-2 px-4 border-b">Aksi</th>
                                    <th class="py-2 px-4 border-b">Perubahan</th>
                                    <th class="py-2 px-4 border-b">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($histories->isEmpty())
                                    <tr>
                                        <td colspan="4" class="text-center py-4">Tidak ada histori untuk minggu ini.</td>
                                    </tr>
                                @else
                                    @foreach ($histories as $history)
                                        <tr>
                                            <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                                            <td class="py-2 px-4 border-b">{{ ucfirst($history->action) }}</td>
                                            <td class="py-2 px-4 border-b">
                                                @php
                                                    $changes = json_decode($history->changes, true);
                                                @endphp
                                                <ul>
                                                    @foreach ($changes as $key => $value)
                                                        <li><strong>{{ ucfirst($key) }}:</strong> {{ $value }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td class="py-2 px-4 border-b">{{ $history->created_at->format('d-m-Y H:i:s') }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                
                    <div class="mt-6 text-center">
                        <a href="{{ route('journals.index') }}" class="text-indigo-500 hover:text-indigo-700">Kembali ke Daftar Jurnal</a>
                    </div>
                </div>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr:not(:first-child)');
            rows.forEach(row => {
                const cells = row.getElementsByTagName('td');
                let found = false;
                for (let i = 0; i < cells.length; i++) {
                    if (cells[i].textContent.toLowerCase().includes(filter)) {
                        found = true;
                        break;
                    }
                }
                row.style.display = found ? '' : 'none';
            });
        });
    </script>
</body>
</html> --}}