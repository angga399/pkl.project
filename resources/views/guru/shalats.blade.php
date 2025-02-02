<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Waktu Shalat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
<div class="container mx-auto mt-5">
    <h1 class="text-2xl font-bold mb-5 text-center">Daftar Waktu Shalat</h1>

    <!-- Pesan Sukses -->
    @if (session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-5 text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Waktu Shalat -->
    @php
        $shalatTypes = ['Duha', 'Dzuhur', 'Ashar'];
    @endphp

    @foreach ($shalatTypes as $type)
    <div class="mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Waktu Shalat {{ $type }}</h2>
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">No</th>
                    <th class="border border-gray-300 px-4 py-2">Jenis</th>
                    <th class="border border-gray-300 px-4 py-2">Tanggal</th>
                    <th class="border border-gray-300 px-4 py-2">Hari</th>
                    <th class="border border-gray-300 px-4 py-2">Waktu</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dftrshalats->where('jenis', $type) as $index => $shalat)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ ucfirst($shalat->jenis) }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $shalat->tanggal }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $shalat->hari }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $shalat->waktu }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ ucfirst($shalat->status) }}</td>
                    </tr>

                    <!-- Data untuk dikirim otomatis -->
                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const data = {
                                jenis: "{{ $shalat->jenis }}",
                                tanggal: "{{ $shalat->tanggal }}",
                                hari: "{{ $shalat->hari }}",
                                waktu: "{{ $shalat->waktu }}",
                                status: "{{ $shalat->status }}"
                            };

                            axios.post("{{ route('guru.shalats') }}", data)
                                .then(response => {
                                    console.log("Data berhasil dikirim:", response.data);
                                })
                                .catch(error => {
                                    console.error("Gagal mengirim data:", error);
                                });
                        });
                    </script>
                @endforeach
            </tbody>
        </table>
    </div>
    @endforeach
</div>
</body>
</html>
