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
                background-color: #111827;
                color: #e0e0e0;
            }
    
            .main-content {
                flex: 1;
                background: #1f2937;
            }
    
            .card-hover {
                transition: all 0.3s ease;
            }
    
            .card-hover:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0,0,0,0.3);
            }
    
            .table-container {
                background: rgba(31, 41, 55, 0.9);
                backdrop-filter: blur(10px);
                border-radius: 15px;
                overflow: hidden;
                border: 1px solid #374151;
            }
    
            .custom-button {
                background: linear-gradient(45deg, #4f46e5, #7c3aed);
                transition: all 0.3s ease;
            }
    
            .custom-button:hover {
                background: linear-gradient(45deg, #7c3aed, #4f46e5);
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(124, 58, 237, 0.4);
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
            
            .sidebar {
                width: 250px;
                height: 100vh;
                position: fixed;
                top: 0;
                left: 0;
                background-color: #0f172a;
                color: #e0e0e0;
                z-index: 1000;
                border-right: 1px solid #334155;
            }
            
            table thead tr {
                background: linear-gradient(45deg, #4f46e5, #7c3aed);
            }
            
            table tbody tr {
                border-bottom: 1px solid #374151;
            }
            
            table tbody tr:hover {
                background-color: #2d3748;
            }
            
            .section-header {
                border-bottom: 2px solid #4f46e5;
                padding-bottom: 0.5rem;
                display: inline-block;
            }
            
            .footer {
                background-color: #111827;
                border-top: 1px solid #374151;
            }
            
            input, select {
                background-color: #1f2937;
                border: 1px solid #4b5563;
                color: #e0e0e0;
            }
            
            input:focus, select:focus {
                border-color: #4f46e5;
                box-shadow: 0 0 0 2px rgba(124, 58, 237, 0.2);
            }
        </style>
    </head>
    <body class="bg-gray-900 text-gray-100">
        <div class="flex h-screen">
            @include('sidebar')
            <!-- Main Content -->
            <div class="main-content">
                <!-- Notifications -->
                <div class="p-4">
                    @if (session('error'))
                        <div class="alert bg-red-900 border-l-4 border-red-500 text-red-100 p-4 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                {{ session('error') }}
                            </div>
                        </div>
                    @endif
    
                    @if (session('success'))
                        <div class="alert bg-green-900 border-l-4 border-green-500 text-green-100 p-4 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif
                </div>
    
                <!-- Header -->
                <div class="bg-gray-800 shadow-md p-6 border-b border-gray-700">
                    <div class="flex justify-between items-center">
                        <button class="md:hidden text-gray-300 hover:text-white" onclick="toggleSidebar()">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <h1 class="text-2xl font-bold text-white text-center flex-1 tracking-wider">JOURNAL KEGIATAN</h1>
                    </div>
                </div>
    
                <!-- Action Buttons and Filters -->
                <div class="p-6 bg-gray-800 shadow-lg mt-4 rounded-xl mx-4 border border-gray-700">
                    <div class="flex flex-col md:flex-row items-center gap-4">
                        <a href="{{ route('journals.create') }}" class="custom-button text-white px-6 py-3 rounded-lg flex items-center">
                            <i class="fas fa-plus-circle mr-2"></i>
                            Tambah Jurnal
                        </a>
                        <form method="GET" action="{{ route('journals.index') }}" class="flex flex-wrap items-center gap-4">
                            <input type="week" id="week" name="week" 
                                   class="bg-gray-700 border border-gray-600 rounded-lg p-2 text-white focus:ring-2 focus:ring-purple-400 focus:border-purple-400" 
                                   value="{{ request('week', \Carbon\Carbon::now()->format('Y-\WW')) }}">
                            <button type="submit" class="custom-button text-white px-6 py-3 rounded-lg flex items-center">
                                <i class="fas fa-filter mr-2"></i>
                                Tampilkan
                            </button>
                        </form>
                        <span class="text-gray-300 font-medium">Histori Perminggu</span>
                    </div>
                </div>
    
                <!-- Journal Table -->
                <div class="p-6">
                    <div class="table-container shadow-xl">
                        <table class="w-full">
                            <thead>
                                <tr class="text-white">
                                    <th class="px-6 py-4 text-left">No</th>
                                    <th class="px-6 py-4 text-left">Nama</th>
                                    <th class="px-6 py-4 text-left">Tanggal</th>
                                    <th class="px-6 py-4 text-left">Uraian</th>
                                    <th class="px-6 py-4 text-left">Jurusan</th>
                                    <th class="px-6 py-4 text-left">Perusahaan</th>
                                    <th class="px-6 py-4 text-left">Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-300">
                                @forelse ($journals as $journal)
                                    <tr>
                                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4">{{ $journal->nama }}</td>
                                        <td class="px-6 py-4">{{ $journal->tanggal }}</td>
                                        <td class="px-6 py-4">{{ $journal->uraian_konsentrasi }}</td>
                                        <td class="px-6 py-4">{{ $journal->kelas }}</td>
                                        <td class="px-6 py-4">{{ $journal->PT }}</td>
                                        <td class="px-6 py-4">
                                            <span class="px-3 py-1 rounded-full text-sm 
                                                {{ $journal->status === 'Approved' ? 'bg-green-900 text-green-100' : 
                                                   ($journal->status === 'Pending' ? 'bg-yellow-900 text-yellow-100' : 
                                                    'bg-red-900 text-red-100') }}">
                                                {{ $journal->status }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-6 py-8 text-center text-gray-400">
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
                    <div class="bg-gray-800 rounded-xl shadow-xl p-6 border border-gray-700">
                        <h2 class="text-2xl font-bold text-white mb-6 section-header">Histori Jurnal</h2>
                        <div class="table-container mt-6">
                            <table class="w-full">
                                <thead>
                                    <tr class="text-white">
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
                                <tbody class="text-gray-300">
                                    @forelse ($histories as $history)
                                        @php $changes = json_decode($history->changes); @endphp
                                        <tr>
                                            <td class="px-6 py-4">{{ $history->journal_id }}</td>
                                            <td class="px-6 py-4">{{ Auth::user()->full_name }}</td>
                                            <td class="px-6 py-4">{{ $changes->tanggal }}</td>
                                            <td class="px-6 py-4">{{ $changes->uraian_konsentrasi }}</td>
                                            <td class="px-6 py-4">{{ Auth::user()->major }}</td>
                                            <td class="px-6 py-4">{{ $changes->PT }}</td>
                                            <td class="px-6 py-4">{{ $history->created_at }}</td>
                                            <td class="px-6 py-4">
                                                <span class="px-3 py-1 rounded-full text-sm 
                                                    {{ $journal->status === 'Approved' ? 'bg-green-900 text-green-100' : 
                                                       ($journal->status === 'Pending' ? 'bg-yellow-900 text-yellow-100' : 
                                                        'bg-red-900 text-red-100') }}">
                                                    {{ $journal->status }}
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="px-6 py-8 text-center text-gray-400">
                                                <i class="fas fa-history text-4xl mb-4"></i>
                                                <p>Tidak ada histori jurnal.</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                       <div class="mt-6 flex gap-4">
    <!-- Tombol PDF -->
    <a href="{{ route('journals.exportPdf', ['week' => $week]) }}" 
       class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg inline-flex items-center">
        <i class="fas fa-file-pdf mr-2"></i> Ekspor PDF
    </a>

    <!-- Tombol Excel (Hanya aktif jika ada data) -->
    @if($journals->isNotEmpty())
        <a href="{{ route('journals.exportExcel', ['week' => $week]) }}" 
           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg inline-flex items-center">
            <i class="fas fa-file-excel mr-2"></i> Ekspor Excel
        </a>
    @else
        <button class="bg-gray-500 text-white px-4 py-2 rounded-lg inline-flex items-center cursor-not-allowed" disabled>
            <i class="fas fa-file-excel mr-2"></i> Ekspor Excel
        </button>
    @endif
</div>
                </div>
    
                <!-- Footer -->
                <footer class="footer py-6 mt-8">
                    <div class="text-center text-gray-400">
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