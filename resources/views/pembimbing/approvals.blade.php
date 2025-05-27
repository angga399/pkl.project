<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengambilan Foto - Persetujuan</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-primary: #0f172a;
            --bg-secondary: #1e293b;
            --accent-color: #1e40af;
            --accent-hover: #3b82f6;
            --text-primary: #f8fafc;
            --text-secondary: #cbd5e1;
            --card-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.2), 0 4px 6px -2px rgba(0, 0, 0, 0.1);
            --card-gradient: linear-gradient(135deg, rgba(30, 41, 59, 0.95) 0%, rgba(15, 23, 42, 0.85) 100%);
        }

        body {
            background-color: var(--bg-primary);
            color: var(--text-primary);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
        }

        /* Modern Sidebar */
        #sidebar {
            background-color: var(--bg-secondary);
            width: 80px;
            height: 100vh;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            overflow-x: hidden;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: var(--card-shadow);
            display: flex;
            flex-direction: column;
        }

        #sidebar.expanded {
            width: 240px;
        }

        .sidebar-nav {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 1rem 0;
        }

        .sidebar-item {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            margin: 0.25rem 0.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            color: var(--text-secondary);
        }

        .sidebar-item:hover {
            background-color: rgba(59, 130, 246, 0.1);
            color: var(--accent-hover);
        }

        .sidebar-item.active {
            background-color: rgba(59, 130, 246, 0.2);
            color: var(--accent-hover);
            font-weight: 500;
        }

        .sidebar-icon {
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .sidebar-text {
            white-space: nowrap;
            opacity: 0;
            transform: translateX(-10px);
            transition: all 0.4s ease;
        }

        #sidebar.expanded .sidebar-text {
            opacity: 1;
            transform: translateX(0);
        }

        /* Main Content */
        .main-content {
            padding-left: 80px;
            transition: padding-left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            width: 100%;
            min-height: 100vh;
        }

        .main-content.sidebar-expanded {
            padding-left: 240px;
        }

        /* Content Card */
        .content-card {
            background: var(--card-gradient);
            border-radius: 12px;
            padding: 2rem;
            box-shadow: var(--card-shadow);
            margin: 1.5rem;
            border: 1px solid rgba(59, 130, 246, 0.2);
            backdrop-filter: blur(10px);
        }

        /* Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 1.75rem;
            font-weight: 600;
            color: var(--text-primary);
            position: relative;
            padding-bottom: 0.5rem;
        }

        .page-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(90deg, var(--accent-color), transparent);
            border-radius: 3px;
        }

        /* Real-time Clock */
        .realtime-clock {
            background: linear-gradient(135deg, var(--accent-color), var(--accent-hover));
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            box-shadow: 0 4px 6px rgba(59, 130, 246, 0.2);
        }

        .realtime-clock i {
            margin-right: 8px;
        }

        /* Filter Section */
        .filter-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .filter-card {
            background: var(--card-gradient);
            border-radius: 10px;
            padding: 1.25rem;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .filter-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-primary);
        }

        .filter-input {
            width: 100%;
            padding: 0.65rem 1rem;
            border-radius: 8px;
            border: 1px solid rgba(59, 130, 246, 0.3);
            background-color: rgba(15, 23, 42, 0.5);
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
            color: var(--text-primary);
        }

        .filter-input:focus {
            border-color: var(--accent-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            background-color: rgba(15, 23, 42, 0.7);
        }

        /* Date Range */
        .date-range {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            background-color: rgba(59, 130, 246, 0.1);
            border-radius: 8px;
            border: 1px solid rgba(59, 130, 246, 0.2);
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
            color: var(--text-primary);
        }

        .date-range i {
            margin-right: 8px;
            color: var(--accent-hover);
        }

        /* Tab Navigation */
        .tab-nav {
            display: flex;
            gap: 0.75rem;
            margin-bottom: 2rem;
            border-bottom: 1px solid rgba(59, 130, 246, 0.3);
            padding-bottom: 0.5rem;
        }

        .tab-btn {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            background-color: transparent;
            color: var(--text-secondary);
            border: none;
            cursor: pointer;
            position: relative;
            display: flex;
            align-items: center;
        }

        .tab-btn i {
            margin-right: 8px;
        }

        .tab-btn:hover {
            color: var(--accent-hover);
            background-color: rgba(59, 130, 246, 0.1);
        }

        .tab-btn.active {
            color: var(--accent-hover);
            background-color: rgba(59, 130, 246, 0.2);
        }

        .tab-btn.active:after {
            content: '';
            position: absolute;
            bottom: -0.5rem;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: var(--accent-hover);
            border-radius: 2px;
        }

        /* Table Styles */
        .table-container {
            overflow-x: auto;
            border-radius: 10px;
            box-shadow: var(--card-shadow);
            background: var(--card-gradient);
            margin-bottom: 2rem;
            transition: all 0.3s ease;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .table-custom {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            min-width: 1000px;
        }

        .table-custom th {
            background-color: rgba(15, 23, 42, 0.7);
            color: var(--text-primary);
            padding: 1rem 1.25rem;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            text-align: left;
            border-bottom: 1px solid rgba(59, 130, 246, 0.3);
        }

        .table-custom td {
            padding: 1rem 1.25rem;
            color: var(--text-primary);
            border-bottom: 1px solid rgba(59, 130, 246, 0.2);
            transition: all 0.2s ease;
        }

        .table-custom tbody tr:last-child td {
            border-bottom: none;
        }

        .table-custom tbody tr:hover {
            background-color: rgba(59, 130, 246, 0.1);
        }

        /* Photo Preview */
        .photo-preview {
            width: 64px;
            height: 64px;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            border: 2px solid rgba(59, 130, 246, 0.3);
        }

        .photo-preview:hover {
            transform: scale(1.1);
            border-color: var(--accent-hover);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        /* Location Link */
        .location-link {
            color: var(--accent-hover);
            text-decoration: none;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            font-weight: 500;
        }

        .location-link:hover {
            color: var(--hover-color);
            transform: translateY(-1px);
        }

        .location-link i {
            margin-right: 4px;
        }

        /* Status Badges */
        .status-badge {
            padding: 0.35rem 0.85rem;
            border-radius: 999px;
            font-weight: 500;
            font-size: 0.75rem;
            display: inline-flex;
            align-items: center;
            white-space: nowrap;
        }

        .status-badge i {
            margin-right: 4px;
            font-size: 0.6rem;
        }

        .status-pending {
            background-color: rgba(234, 179, 8, 0.1);
            color: #f59e0b;
        }

        .status-approved {
            background-color: rgba(34, 197, 94, 0.1);
            color: #10b981;
        }

        .status-rejected {
            background-color: rgba(239, 68, 68, 0.1);
            color: #ef4444;
        }

        /* Action Buttons */
        .action-btns {
            display: flex;
            gap: 0.5rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: none;
        }

        .btn i {
            margin-right: 6px;
            font-size: 0.8rem;
        }

        .btn-sm {
            padding: 0.4rem 0.8rem;
            font-size: 0.8rem;
        }

        .btn-primary {
            background-color: var(--accent-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--accent-hover);
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);
        }

        .btn-success {
            background-color: #10b981;
            color: white;
        }

        .btn-success:hover {
            background-color: #059669;
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
        }

        .btn-danger {
            background-color: #ef4444;
            color: white;
        }

        .btn-danger:hover {
            background-color: #dc2626;
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(239, 68, 68, 0.3);
        }

        /* Modal Styles */
        .modal {
            position: fixed;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            background-color: rgba(0, 0, 0, 0.75);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .modal.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            background: var(--card-gradient);
            border-radius: 12px;
            padding: 2rem;
            position: relative;
            max-width: 80%;
            max-height: 90vh;
            overflow: auto;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
            transform: scale(0.95);
            transition: transform 0.3s ease;
            border: 1px solid rgba(59, 130, 246, 0.3);
        }

        .modal.active .modal-content {
            transform: scale(1);
        }

        .modal-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-secondary);
            transition: color 0.3s;
        }

        .modal-close:hover {
            color: var(--accent-hover);
        }

        /* Rejection Modal */
        #rejectionModal .modal-content {
            max-width: 500px;
        }

        #rejectionModal h3 {
            color: var(--text-primary);
            margin-bottom: 1rem;
            font-size: 1.25rem;
            font-weight: 600;
        }

        #rejectionReason {
            width: 100%;
            min-height: 120px;
            padding: 0.75rem;
            border-radius: 8px;
            border: 1px solid rgba(59, 130, 246, 0.3);
            background-color: rgba(15, 23, 42, 0.5);
            color: var(--text-primary);
            resize: vertical;
            font-family: 'Poppins', sans-serif;
        }

        #rejectionReason:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            background-color: rgba(15, 23, 42, 0.7);
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 0.75rem;
            margin-top: 1rem;
        }
        
        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .content-card {
            animation: fadeIn 0.4s ease forwards;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .filter-section {
                grid-template-columns: 1fr;
            }
            
            .tab-nav {
                overflow-x: auto;
                padding-bottom: 0;
            }
            
            .tab-btn {
                white-space: nowrap;
            }
        }

        /* Toggle Button */
        #toggleBtn {
            padding: 1.25rem;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s ease;
            color: var(--text-primary);
        }

        #toggleBtn:hover {
            color: var(--accent-hover);
        }

        #toggleBtn i {
            transition: transform 0.3s ease;
        }

        #sidebar.expanded #toggleBtn i {
            transform: rotate(180deg);
        }

        /* Approve All Button */
        .btn-lg {
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
        }

        #approveAllBtn {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background-color: #10b981;
            box-shadow: 0 4px 6px rgba(16, 185, 129, 0.2);
            transition: all 0.3s ease;
            animation: pulseApproveBtn 2s infinite;
        }
        
        #approveAllBtn:hover {
            background-color: #059669;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(16, 185, 129, 0.3);
        }
        
        @keyframes pulseApproveBtn {
            0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(16, 185, 129, 0); }
            100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
        }
        
        /* Toast Notification */
        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            color: white;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transform: translateY(-10px);
            opacity: 0;
            transition: all 0.3s ease;
            z-index: 9999;
        }
        
        .toast.show {
            transform: translateY(0);
            opacity: 1;
        }
        
        .toast-success {
            background-color: #10b981;
        }
        
        .toast-error {
            background-color: #ef4444;
        }

        /* Tambahkan di CSS */
.status-update {
    transition: all 0.3s ease;
    transform: scale(1.05);
    opacity: 0;
}

@keyframes fadeInScale {
    0% { opacity: 0; transform: scale(0.9); }
    100% { opacity: 1; transform: scale(1); }
}

/* Tambahkan di bagian CSS */
.approval-checkbox {
    transform: scale(1.3);
    cursor: pointer;
    accent-color: var(--accent-color);
}

.approval-checkbox:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

#selectAllCheckbox {
    transform: scale(1.3);
    cursor: pointer;
    accent-color: var(--accent-hover);
}

.status-updated {
    animation: fadeInScale 0.3s ease forwards;
}/* Hapus styling untuk checkbox disabled karena kita akan menghilangkannya */
.approval-checkbox {
    transform: scale(1.3);
    cursor: pointer;
    accent-color: var(--accent-color);
}

#selectAllCheckbox {
    transform: scale(1.3);
    cursor: pointer;
    accent-color: var(--accent-hover);
}

/* Style untuk placeholder */
td span.text-gray-400 {
    padding-left: 8px;
}
    </style>
</head>
<body>
    <div class="flex">
        <!-- Modern Sidebar -->
        <div id="sidebar">
            <button id="toggleBtn" class="w-full">
                <i class="fas fa-chevron-right"></i>
            </button>
            
            <div class="sidebar-nav">
                <a href="{{ route('pembimbing.approvals') }}" class="sidebar-item active">
                    <div class="sidebar-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <span class="sidebar-text">Absensi</span>
                </a>
                <a href="{{ route('pembimbing.journals') }}" class="sidebar-item">
                    <div class="sidebar-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <span class="sidebar-text">Jurnal</span>
                </a>
                <a href="{{ route('pembimbing.shalat') }}" class="sidebar-item">
                    <div class="sidebar-icon">
                        <i class="fas fa-mosque"></i>
                    </div>
                    <span class="sidebar-text">Shalat</span>
                </a>
            </div>

            <div class="mt-auto">
                <a href="{{ route('pembimbingpkl') }}" class="sidebar-item">
                    <div class="sidebar-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <span class="sidebar-text">Home</span>
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div id="mainContent" class="main-content">
            <div class="content-card">
                <div class="page-header">
                    <h1 class="page-title">Daftar Pengambilan Foto - Persetujuan</h1>
                    <div class="realtime-clock">
                        <i class="far fa-clock"></i>
                        <span id="current-time"></span>
                    </div>
                </div>

                <!-- Filters -->
                <div class="filter-section">
                    <div class="filter-card">
                        <form method="GET" action="{{ route('pembimbing.approvals') }}" class="space-y-2">
                            <label class="filter-label">Pilih Minggu:</label>
                            <div class="flex gap-2">
                                <input type="week" name="week" class="filter-input" 
                                       value="{{ request('week', \Carbon\Carbon::now()->format('Y-\WW')) }}">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-filter"></i> Filter
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="filter-card">
                        <form method="GET" action="{{ route('pembimbing.approvals') }}" class="space-y-2">
                            <input type="hidden" name="week" value="{{ request('week', $selectedWeek) }}">
                            <label class="filter-label">Cari Perusahaan:</label>
                            <div class="flex gap-2">
                                <div class="search-container flex-grow">
                                    <input type="text" 
                                           name="PT" 
                                           id="companySearch" 
                                           class="filter-input" 
                                           placeholder="Ketik nama perusahaan..."
                                           value="{{ request('PT') }}"
                                           autocomplete="off">
                                    <div class="search-results" id="searchResults"></div>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i> Cari
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            
                <div class="date-range">
                    <i class="far fa-calendar-alt"></i>
                    Periode: {{ $startOfWeek->format('d M Y') }} - {{ $endOfWeek->format('d M Y') }}
                </div>

                <div class="flex justify-between items-center mb-4">
                    <div class="tab-nav">
                        <button id="datangBtn" class="tab-btn active">
                            <i class="fas fa-sign-in-alt"></i> Absen Datang
                        </button>
                        <button id="pulangBtn" class="tab-btn">
                            <i class="fas fa-sign-out-alt"></i> Absen Pulang
                        </button>
                    </div>
                    <button id="approveAllBtn" class="btn btn-success btn-lg">
                        <i class="fas fa-check-double"></i> Setujui Semua
                    </button>
                </div>

                <!-- Tabel Absen Datang -->
                <div id="datangTable" class="table-container">
                    <table class="table-custom">
                        <thead>
                            <tr>
                                 <th>
    @if($daftarhdrs->where('status', 'Menunggu Persetujuan')->count() > 0)
        <input type="checkbox" id="selectAllCheckbox">
    @else
        <span class="text-gray-400">-</span>
    @endif
</th>
                                <th>Foto</th>
                                <th>Hari</th>
                                <th>Tanggal</th>
                                <th>Perusahaan</th>
                                <th>Lokasi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($daftarhdrs as $item)
                                @if ($item->tipe === 'datang')
                                    <tr>
                                        <td>
                @if($item->status === 'Menunggu Persetujuan')
                    <input type="checkbox" class="approval-checkbox" data-id="{{ $item->id }}">
                @else
                    <span class="text-gray-400">-</span>
                @endif
            </td>
                                        <td>
                                            <img src="{{ $item->dataGambar }}" alt="Foto" class="photo-preview" onclick="showModal(this)" />
                                        </td>
                                        <td>{{ $item->hari }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{{ $item->pt }}</td>
                                        <td>
                                            <a href="https://www.google.com/maps?q={{ $item->latitude }},{{ $item->longitude }}" 
                                               target="_blank" 
                                               class="location-link">
                                                <i class="fas fa-map-marker-alt"></i> Lihat Lokasi
                                            </a>
                                        </td>
                                        <td>
                                            <span class="status-badge {{ $item->status === 'Disetujui' ? 'status-approved' : ($item->status === 'Ditolak' ? 'status-rejected' : 'status-pending') }}">
                                                <i class="fas {{ $item->status === 'Disetujui' ? 'fa-check-circle' : ($item->status === 'Ditolak' ? 'fa-times-circle' : 'fa-clock') }}"></i>
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($item->status === 'Menunggu Persetujuan')
                                                <div class="action-btns">
                                                    <form action="{{ route('pembimbing.approve', $item->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Setujui absensi ini?')">
                                                            <i class="fas fa-check"></i> Setujui
                                                        </button>
                                                    </form>
                                                    <button type="button" 
                                                            onclick="showRejectionModal('{{ route('pembimbing.reject', ['id' => '__ID__']) }}', '{{ $item->id }}')" 
                                                            class="btn btn-danger btn-sm">
                                                        <i class="fas fa-times"></i> Tolak
                                                    </button>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Tabel Absen Pulang -->
                <div id="pulangTable" class="table-container hidden">
                    <table class="table-custom">
                        <thead>
                            <tr>
                                 <th>
            @if($daftarhdrs->where('tipe', 'pulang')->where('status', 'Menunggu Persetujuan')->count() > 0)
                <input type="checkbox" id="selectAllCheckboxPulang">
            @else
                <span class="text-gray-400">-</span>
            @endif
        </th>
                                <th>Foto</th>
                                <th>Hari</th>
                                <th>Tanggal</th>
                                <th>Perusahaan</th>
                                <th>Lokasi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($daftarhdrs as $item)
                                @if ($item->tipe === 'pulang')
                                    <tr>
                                          <td>
                    @if($item->status === 'Menunggu Persetujuan')
                        <input type="checkbox" class="approval-checkbox" data-id="{{ $item->id }}">
                    @else
                        <span class="text-gray-400">-</span>
                    @endif
                </td>
                                        <td>
                                            <img src="{{ $item->dataGambar }}" alt="Foto" class="photo-preview" onclick="showModal(this)" />
                                        </td>
                                        <td>{{ $item->hari }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{{ $item->pt }}</td>
                                        <td>
                                            <a href="https://www.google.com/maps?q={{ $item->latitude }},{{ $item->longitude }}" 
                                               target="_blank" 
                                               class="location-link">
                                                <i class="fas fa-map-marker-alt"></i> Lihat Lokasi
                                            </a>
                                        </td>
                                        <td>
                                            <span class="status-badge {{ $item->status === 'Disetujui' ? 'status-approved' : ($item->status === 'Ditolak' ? 'status-rejected' : 'status-pending') }}">
                                                <i class="fas {{ $item->status === 'Disetujui' ? 'fa-check-circle' : ($item->status === 'Ditolak' ? 'fa-times-circle' : 'fa-clock') }}"></i>
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($item->status === 'Menunggu Persetujuan')
                                                <div class="action-btns">
                                                    <form action="{{ route('pembimbing.approve', $item->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Setujui absensi ini?')">
                                                            <i class="fas fa-check"></i> Setujui
                                                        </button>
                                                    </form>
                                                    <button type="button" 
                                                            onclick="showRejectionModal('{{ route('pembimbing.reject', ['id' => '__ID__']) }}', '{{ $item->id }}')" 
                                                            class="btn btn-danger btn-sm">
                                                        <i class="fas fa-times"></i> Tolak
                                                    </button>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div id="imageModal" class="modal">
        <div class="modal-content">
            <button class="modal-close" onclick="hideModal()">
                <i class="fas fa-times"></i>
            </button>
            <img id="modalImage" class="w-full h-auto rounded-lg" src="" alt="Preview Foto">
        </div>
    </div>

    <!-- Approve All Modal -->
    <div id="approveAllModal" class="modal">
        <div class="modal-content" style="max-width: 500px;">
            <button class="modal-close" onclick="hideApproveAllModal()">
                <i class="fas fa-times"></i>
            </button>
            <h3 class="text-xl font-semibold mb-4">Konfirmasi Setujui Semua</h3>
            <p class="mb-6">Anda akan menyetujui semua absensi yang masih menunggu persetujuan pada tab yang aktif saat ini. Lanjutkan?</p>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="hideApproveAllModal()">Batal</button>
                <button type="button" class="btn btn-success" id="confirmApproveAll">
                    <i class="fas fa-check-double"></i> Ya, Setujui Semua
                </button>
            </div>
        </div>
    </div>

    <!-- Rejection Modal -->
    <div id="rejectionModal" class="modal">
        <div class="modal-content">
            <button class="modal-close" onclick="hideRejectionModal()">
                <i class="fas fa-times"></i>
            </button>
            <h3>Alasan Penolakan</h3>
            <form id="rejectionForm" method="POST" action="{{ route('pembimbing.reject', ['id' => '__ID__']) }}">
                @csrf
                <input type="hidden" name="id" id="rejectionId">
                <textarea name="rejection_reason" id="rejectionReason" class="w-full p-2 border rounded" rows="4" 
                          placeholder="Masukkan alasan penolakan..." required></textarea>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="hideRejectionModal()">Batal</button>
                    <button type="submit" class="btn btn-danger">Kirim Penolakan</button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Toast Notification -->
    <div id="toastNotification" class="toast">
        <i class="fas fa-info-circle"></i>
        <span id="toastMessage"></span>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar Toggle
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.getElementById('toggleBtn');
            const mainContent = document.getElementById('mainContent');
            
            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('expanded');
                mainContent.classList.toggle('sidebar-expanded');
            });

            // Real-time Clock
            function updateClock() {
                const now = new Date();
                const timeString = now.toLocaleTimeString('id-ID', {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                });
                const dateString = now.toLocaleDateString('id-ID', {
                    weekday: 'long',
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                });
                document.getElementById('current-time').textContent = `${dateString}, ${timeString}`;
            }
            updateClock();
            setInterval(updateClock, 1000);

            // Tab Navigation
            const datangBtn = document.getElementById('datangBtn');
            const pulangBtn = document.getElementById('pulangBtn');
            const datangTable = document.getElementById('datangTable');
            const pulangTable = document.getElementById('pulangTable');

            function switchTab(activeBtn, activeTable) {
                // Update buttons
                [datangBtn, pulangBtn].forEach(btn => btn.classList.remove('active'));
                activeBtn.classList.add('active');

                // Update tables
                [datangTable, pulangTable].forEach(table => table.classList.add('hidden'));
                activeTable.classList.remove('hidden');
            }

            datangBtn.addEventListener('click', () => switchTab(datangBtn, datangTable));
            pulangBtn.addEventListener('click', () => switchTab(pulangBtn, pulangTable));

            // Image Modal
            const imageModal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');

            window.showModal = function(img) {
                modalImage.src = img.src;
                imageModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }

            window.hideModal = function() {
                imageModal.classList.remove('active');
                document.body.style.overflow = 'auto';
            }

            // Rejection Modal
            const rejectionModal = document.getElementById('rejectionModal');
            const rejectionForm = document.getElementById('rejectionForm');

            window.showRejectionModal = function(formAction, id) {
                const form = document.getElementById('rejectionForm');
                const idInput = document.getElementById('rejectionId');
                
                form.action = formAction.replace('__ID__', id);
                idInput.value = id;
                rejectionModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }

            window.hideRejectionModal = function() {
                rejectionModal.classList.remove('active');
                document.getElementById('rejectionReason').value = '';
                document.body.style.overflow = 'auto';
            }
            
            // Approve All Functionality
            const approveAllBtn = document.getElementById('approveAllBtn');
            const approveAllModal = document.getElementById('approveAllModal');
            const confirmApproveAllBtn = document.getElementById('confirmApproveAll');
            const toast = document.getElementById('toastNotification');
            const toastMessage = document.getElementById('toastMessage');

            function showToast(message, type) {
    const toast = document.getElementById('toastNotification');
    const toastMessage = document.getElementById('toastMessage');
    
    toast.className = 'toast show';
    toast.classList.add(`toast-${type}`);
    toastMessage.textContent = message;
    
    setTimeout(() => {
        toast.className = 'toast';
        toast.classList.remove(`toast-${type}`);
    }, 3000);
}
            
            approveAllBtn.addEventListener('click', function() {
                // Check if there are any pending approvals
                const activeTable = datangBtn.classList.contains('active') ? datangTable : pulangTable;
                const pendingForms = activeTable.querySelectorAll('form[action*="/approve"]');
                
                if (pendingForms.length === 0) {
                    showToast('Tidak ada absensi yang perlu disetujui', 'error');
                    return;
                }
                
                approveAllModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
            
            window.hideApproveAllModal = function() {
                approveAllModal.classList.remove('active');
                document.body.style.overflow = 'auto';
            }

            document.getElementById('selectAllCheckbox').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('.approval-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
});

// Fungsi untuk update select all checkbox
// Fungsi untuk mengelola select all checkbox
function setupSelectAllCheckbox() {
    const activeTable = datangBtn.classList.contains('active') ? datangTable : pulangTable;
    const selectAllCheckbox = activeTable.querySelector('thead input[type="checkbox"]');
    const itemCheckboxes = activeTable.querySelectorAll('tbody .approval-checkbox');
    
    if (selectAllCheckbox && itemCheckboxes.length > 0) {
        // Select all checkbox event
        selectAllCheckbox.addEventListener('change', function() {
            itemCheckboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
        
        // Individual checkbox events
        itemCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const allChecked = [...itemCheckboxes].every(cb => cb.checked);
                selectAllCheckbox.checked = allChecked;
            });
        });
    }
}

// Panggil fungsi saat pertama kali load dan saat ganti tab
setupSelectAllCheckbox();

// Tambahkan event listener untuk tab navigation
datangBtn.addEventListener('click', () => {
    setTimeout(setupSelectAllCheckbox, 0);
});
pulangBtn.addEventListener('click', () => {
    setTimeout(setupSelectAllCheckbox, 0);
});

// Update fungsi approveAll untuk menangani kedua tabel
confirmApproveAllBtn.addEventListener('click', function() {
    const activeTable = datangBtn.classList.contains('active') ? datangTable : pulangTable;
    const checkedBoxes = activeTable.querySelectorAll('.approval-checkbox:checked');
    
    if (checkedBoxes.length === 0) {
        showToast('Pilih minimal 1 absensi untuk disetujui', 'error');
        hideApproveAllModal();
        return;
    }

    const ids = Array.from(checkedBoxes).map(checkbox => checkbox.dataset.id);
    const data = {
        ids: ids,
        tab: datangBtn.classList.contains('active') ? 'datang' : 'pulang',
        _token: document.querySelector('meta[name="csrf-token"]').content
    };

    fetch('{{ route("pembimbing.approveAll") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': data._token
        },
        body: JSON.stringify(data)
    })
    .then(async response => {
        if (!response.ok) {
            const error = await response.text();
            throw new Error(error || 'Request failed');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            showToast(`Berhasil menyetujui ${data.approved_count} absensi`, 'success');
            
            checkedBoxes.forEach(checkbox => {
                const row = checkbox.closest('tr');
                if (row) {
                    // Update status
                    const statusCell = row.querySelector('td:nth-child(8)'); // Sesuaikan dengan posisi kolom status
                    if (statusCell) {
                        statusCell.innerHTML = `
                            <span class="status-badge status-approved">
                                <i class="fas fa-check-circle"></i> Disetujui
                            </span>
                        `;
                    }
                    
                    // Update checkbox dan tombol aksi
                    const firstCell = row.querySelector('td:first-child');
                    const actionCell = row.querySelector('td:last-child');
                    if (firstCell) firstCell.innerHTML = '<span class="text-gray-400">-</span>';
                    if (actionCell) actionCell.innerHTML = '';
                }
            });
            
            // Setup ulang select all checkbox
            setupSelectAllCheckbox();
        } else {
            throw new Error(data.message || 'Gagal memproses');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast(error.message || 'Terjadi kesalahan', 'error');
    })
    .finally(() => {
        hideApproveAllModal();
    });
});

function updateSelectAllVisibility() {
    const activeTable = datangBtn.classList.contains('active') ? datangTable : pulangTable;
    const availableCheckboxes = activeTable.querySelectorAll('.approval-checkbox');
    
    const selectAllContainer = document.getElementById('selectAllCheckbox').parentElement;
    
    if (availableCheckboxes.length === 0) {
        selectAllContainer.innerHTML = '<span class="text-gray-400">-</span>';
    } else {
        selectAllContainer.innerHTML = '<input type="checkbox" id="selectAllCheckbox">';
        // Tambahkan event listener baru
        document.getElementById('selectAllCheckbox').addEventListener('change', function() {
            const checkboxes = activeTable.querySelectorAll('.approval-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    }
}

// Panggil fungsi saat pertama kali load dan setelah approve
document.addEventListener('DOMContentLoaded', updateSelectAllVisibility);



            // Company search functionality
            const companySearch = document.getElementById('companySearch');
            const searchResults = document.getElementById('searchResults');
            
            // Sample company data - in a real app, you might fetch this from your backend
            const companies = [
                'Perusahaan A',
                'Perusahaan B',
                'Perusahaan C',
                'Perusahaan D',
                'PT Maju Jaya',
                'PT Sejahtera Abadi',
                'CV Kreatif Mandiri',
                'PT Teknologi Inovasi',
                'CV Sumber Rejeki',
                'PT Global Solusi'
            ];
            
            companySearch.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const filteredCompanies = companies.filter(company => 
                    company.toLowerCase().includes(searchTerm))
                    .sort();
                
                // Clear previous results
                searchResults.innerHTML = '';
                
                if (searchTerm.length > 0) {
                    if (filteredCompanies.length > 0) {
                        filteredCompanies.forEach(company => {
                            const div = document.createElement('div');
                            div.className = 'search-result-item';
                            div.textContent = company;
                            div.addEventListener('click', function() {
                                companySearch.value = company;
                                searchResults.style.display = 'none';
                            });
                            searchResults.appendChild(div);
                        });
                    } else {
                        const div = document.createElement('div');
                        div.className = 'no-results';
                        div.textContent = 'Tidak ditemukan perusahaan yang cocok';
                        searchResults.appendChild(div);
                    }
                    searchResults.style.display = 'block';
                } else {
                    searchResults.style.display = 'none';
                }
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!companySearch.contains(e.target) && !searchResults.contains(e.target)) {
                    searchResults.style.display = 'none';
                }
            });
            
            // Highlight item on hover
            searchResults.addEventListener('mouseover', function(e) {
                if (e.target.classList.contains('search-result-item')) {
                    const items = document.querySelectorAll('.search-result-item');
                    items.forEach(item => item.classList.remove('active'));
                    e.target.classList.add('active');
                }
            });
            
            // Navigate with keyboard
            companySearch.addEventListener('keydown', function(e) {
                if (e.key === 'ArrowDown' || e.key === 'ArrowUp') {
                    e.preventDefault();
                    const items = document.querySelectorAll('.search-result-item');
                    if (items.length === 0) return;
                    
                    let activeIndex = -1;
                    items.forEach((item, index) => {
                        if (item.classList.contains('active')) {
                            activeIndex = index;
                        }
                    });
                    
                    if (e.key === 'ArrowDown') {
                        if (activeIndex < items.length - 1) {
                            items.forEach(item => item.classList.remove('active'));
                            items[activeIndex + 1].classList.add('active');
                        } else if (activeIndex === -1) {
                            items[0].classList.add('active');
                        }
                    } else if (e.key === 'ArrowUp') {
                        if (activeIndex > 0) {
                            items.forEach(item => item.classList.remove('active'));
                            items[activeIndex - 1].classList.add('active');
                        }
                    }
                } else if (e.key === 'Enter') {
                    const activeItem = document.querySelector('.search-result-item.active');
                    if (activeItem) {
                        e.preventDefault();
                        companySearch.value = activeItem.textContent;
                        searchResults.style.display = 'none';
                    }
                }
            });
  
            // Set default to show arrival table
            switchTab(datangBtn, datangTable);
        });
    </script>
</body>
</html>