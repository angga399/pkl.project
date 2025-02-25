<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal Kegiatan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .sidebar {
            width: 250px;
            background: linear-gradient(to bottom, #1a237e, #283593);
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            transition: all 0.3s ease;
        }

        .main-content {
            margin-left: 250px;
            flex: 1;
            background: #f3f4f6;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .table-container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            overflow: hidden;
        }

        .custom-button {
            background: linear-gradient(45deg, #3949ab, #1e88e5);
            transition: all 0.3s ease;
        }

        .custom-button:hover {
            background: linear-gradient(45deg, #1e88e5, #3949ab);
            transform: translateY(-2px);
        }

        .alert {
            border-radius: 10px;
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-100 to-gray-200">
    <div class="flex h-screen">
        <div class="sidebar shadow-xl" id="sidebar">
            @include('sidebar')
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Notifications -->
            <div class="p-4">
                @if (session('error'))
                    <div class="alert bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            {{ session('error') }}
                        </div>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle mr-2"></i>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
            </div>

            <!-- Header -->
            <div class="bg-white shadow-md p-6">
                <div class="flex justify-between items-center">
                    <button class="md:hidden text-gray-700 hover:text-gray-900" onclick="toggleSidebar()">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 class="text-2xl font-bold text-gray-800 text-center flex-1">JOURNAL KEGIATAN</h1>
                </div>
            </div>

            <!-- Action Buttons and Filters -->
            <div class="p-6 bg-white shadow-sm mt-4 rounded-lg mx-4">
                <div class="flex flex-col md:flex-row items-center gap-4">
                    <a href="{{ route('journals.create') }}" class="custom-button text-white px-6 py-3 rounded-lg flex items-center">
                        <i class="fas fa-plus-circle mr-2"></i>
                        Tambah Jurnal
                    </a>
                    <form method="GET" action="{{ route('journals.index') }}" class="flex flex-wrap items-center gap-4">
                        <input type="week" id="week" name="week" 
                               class="border rounded-lg p-2 focus:ring-2 focus:ring-blue-400 focus:border-blue-400" 
                               value="{{ request('week', \Carbon\Carbon::now()->format('Y-\WW')) }}">
                        <button type="submit" class="custom-button text-white px-6 py-3 rounded-lg flex items-center">
                            <i class="fas fa-filter mr-2"></i>
                            Tampilkan
                        </button>
                    </form>
                    <span class="text-gray-600 font-medium">Histori Perminggu</span>
                </div>
            </div>

            <!-- Journal Table -->
            <div class="p-6">
                <div class="table-container shadow-lg">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gradient-to-r from-blue-900 to-blue-700 text-white">
                                <th class="px-6 py-4 text-left">No</th>
                                <th class="px-6 py-4 text-left">Nama</th>
                                <th class="px-6 py-4 text-left">Tanggal</th>
                                <th class="px-6 py-4 text-left">Uraian</th>
                                <th class="px-6 py-4 text-left">Jurusan</th>
                                <th class="px-6 py-4 text-left">Perusahaan</th>

                                <th class="px-6 py-4 text-left">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($journals as $journal)
                                <tr class="hover:bg-gray-50 border-b border-gray-200">
                                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4">{{ $journal->nama }}</td>
                                    <td class="px-6 py-4">{{ $journal->tanggal }}</td>
                                    <td class="px-6 py-4">{{ $journal->uraian_konsentrasi }}</td>
                                    <td class="px-6 py-4">{{ $journal->kelas }}</td>
                                    <td class="px-6 py-4">{{ $journal->PT }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 rounded-full text-sm 
                                            {{ $journal->status === 'Approved' ? 'bg-green-100 text-green-800' : 
                                               ($journal->status === 'Pending' ? 'bg-yellow-100 text-yellow-800' : 
                                                'bg-red-100 text-red-800') }}">
                                            {{ $journal->status }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-6 py-8 text-center text-gray-500">
                                        <i class="fas fa-folder-open text-4xl mb-4"></i>
                                        <p>Tidak ada data jurnal.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- History Section -->
            <div class="p-6">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Histori Jurnal</h2>
                    <div class="table-container">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gradient-to-r from-blue-900 to-blue-700 text-white">
                                    <th class="px-6 py-4 text-left">No</th>
                                    <th class="px-6 py-4 text-left">Nama</th>
                                    <th class="px-6 py-4 text-left">Tanggal</th>
                                    <th class="px-6 py-4 text-left">Uraian</th>
                                    <th class="px-6 py-4 text-left">Jurusan</th>
                                    <th class="px-6 py-4 text-left">Perusahaan</th>
                                    <th class="px-6 py-4 text-left">Tanggal Lengkap</th>
                                    <th class="px-6 py-4 text-left">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($histories as $history)
                                    @php $changes = json_decode($history->changes); @endphp
                                    <tr class="hover:bg-gray-50 border-b border-gray-200">
                                        <td class="px-6 py-4">{{ $history->journal_id }}</td>
                                        <td class="px-6 py-4">{{ Auth::user()->full_name }}</td>
                                        <td class="px-6 py-4">{{ $changes->tanggal }}</td>
                                        <td class="px-6 py-4">{{ $changes->uraian_konsentrasi }}</td>
                                        <td class="px-6 py-4">{{ Auth::user()->major }}</td>
                                    <td class="px-6 py-4">{{ $changes->PT }}</td>
                                        <td class="px-6 py-4">{{ $history->created_at }}</td>
                                        <td class="px-6 py-4">
                                            <span class="px-3 py-1 rounded-full text-sm 
                                                {{ $journal->status === 'Approved' ? 'bg-green-100 text-green-800' : 
                                                   ($journal->status === 'Pending' ? 'bg-yellow-100 text-yellow-800' : 
                                                    'bg-red-100 text-red-800') }}">
                                                {{ $journal->status }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-6 py-8 text-center text-gray-500">
                                            <i class="fas fa-history text-4xl mb-4"></i>
                                            <p>Tidak ada histori jurnal.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('journals.exportPdf', ['week' => $week]) }}" 
                           target="_blank" 
                           class="custom-button text-white px-6 py-3 rounded-lg inline-flex items-center">
                            <i class="fas fa-file-pdf mr-2"></i>
                            Ekspor ke PDF
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="bg-white shadow-lg mt-8 py-6">
                <div class="text-center text-gray-600">
                    &copy; {{ date('Y') }} Journal Kegiatan. All rights reserved.
                </div>
            </footer>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }
    </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>