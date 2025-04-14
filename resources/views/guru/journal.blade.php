<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jurnal Guru</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6366f1;
            --secondary-color: #8b5cf6;
            --accent-color: #ec4899;
            --light-bg: #f0f4f8;
            --card-bg: #ffffff;
        }
        
        body {
            background: linear-gradient(135deg, #f6f8ff 0%, #f0f7ff 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
       
        .page-header {
            position: relative;
            overflow: hidden;
            padding: 3rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 2rem 2rem;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            color: white;
            text-align: center;
        }
        
        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.4;
        }
        .main-title {
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        
        .custom-card {
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
            background: var(--card-bg);
            transition: all 0.3s ease;
        }
        
        .custom-card:hover {
            box-shadow: 0 20px 40px rgba(99, 102, 241, 0.12);
            transform: translateY(-5px);
        }
        
        .custom-header {
            background: linear-gradient(135deg, #f0f7ff 0%, #e6f5ff 100%);
            padding: 25px 20px;
            border-bottom: 3px solid var(--primary-color);
            position: relative;
        }
        
        .custom-header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 8px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary-color), var(--secondary-color));
        }
        
        .custom-table th {
            font-weight: 600;
            color: #4b5563;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            font-size: 0.8rem;
            padding: 18px 20px;
            background-color: #f8fafc;
            border-bottom: 2px solid #e5e7eb;
        }
        
        .custom-table td {
            padding: 18px 20px;
            vertical-align: middle;
            border-bottom: 1px solid #eef0f5;
            color: #4a5568;
            transition: all 0.2s ease;
        }
        
        .custom-table tr:hover td {
            background-color: rgba(99, 102, 241, 0.05);
        }
        
        .custom-table tr:nth-child(odd) {
            background-color: #fafbff;
        }
        
        .empty-state {
            padding: 70px 20px;
            color: #8795a9;
            background-color: #fafbfd;
        }
        
        .header-title {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.6rem;
            margin: 0;
            letter-spacing: 0.5px;
        }
        
        .empty-state svg {
            color: var(--secondary-color);
            opacity: 0.7;
        }
        
        .no-column {
            background-color: var(--primary-color);
            color: white;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="page-header">
        <div class="container mx-auto px-4">
            <h1 class="main-title text-3xl md:text-4xl mb-2">Journal</h1>
            <p class="opacity-90">Jadwal journal harian untuk kegiatan pkl siswa</p>
        </div>
    </div>
    
    <div class="container py-4">
        <div class="custom-card">
            <div class="custom-header">
                <h2 class="header-title text-center">Data Jurnal Guru</h2>
            </div>
            <div>
                <table class="table table-borderless mb-0 custom-table">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 70px;">No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Uraian Konsentrasi</th>
                            <th>Kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($journals as $index => $journal)
                            <tr>
                                <td class="text-center">
                                    <div class="no-column">{{ $index + 1 }}</div>
                                </td>
                                <td>{{ $journal->nama }}</td>
                                <td>{{ $journal->tanggal }}</td>
                                <td>{{ $journal->uraian_konsentrasi }}</td>
                                <td>{{ $journal->kelas }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center empty-state">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-3">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="12" y1="18" x2="12" y2="12"></line>
                                        <line x1="9" y1="15" x2="15" y2="15"></line>
                                    </svg>
                                    <p class="mb-0 text-lg">Tidak ada data jurnal.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>