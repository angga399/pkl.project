<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengambilan Foto</title>
    @vite('resources/css/app.css')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Poppins', sans-serif;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border: none;
        }
        .table thead th {
            background-color: #e0f2fe;
            color: #1e40af;
            font-weight: 600;
            border-color: #e2e8f0;
        }
        .table-hover tbody tr:hover {
            background-color: #f0f9ff;
        }
        .badge-location {
            background-color: #dbeafe;
            color: #1e40af;
            font-weight: 500;
        }
        .section-title {
            color: #1e40af;
            font-weight: 700;
            position: relative;
            padding-bottom: 10px;
        }
        .section-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 60px;
            background-color: #93c5fd;
            border-radius: 2px;
        }
        .img-preview {
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid #e2e8f0;
        }
        .empty-img {
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f9fafb;
            border-radius: 8px;
            border: 1px dashed #cbd5e1;
            color: #64748b;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="card mb-5">
            <div class="card-body p-4">
                <h2 class="text-2xl font-bold mb-4 section-title">Data Daftar HDR</h2>
                
                <!-- Tabs for Arrival and Departure -->
                <ul class="nav nav-tabs mb-4" id="attendanceTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="arrival-tab" data-bs-toggle="tab" data-bs-target="#arrival" type="button" role="tab" aria-controls="arrival" aria-selected="true">Absen Datang</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="departure-tab" data-bs-toggle="tab" data-bs-target="#departure" type="button" role="tab" aria-controls="departure" aria-selected="false">Absen Pulang</button>
                    </li>
                </ul>
                
                <!-- Tab Content -->
                <div class="tab-content" id="attendanceTabContent">
                    <!-- Arrival Tab -->
                    <div class="tab-pane fade show active" id="arrival" role="tabpanel" aria-labelledby="arrival-tab">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="border">
                                    <tr>
                                        <th class="px-4 py-3">No</th>
                                        <th class="px-4 py-3">Hari</th>
                                        <th class="px-4 py-3">Tanggal</th>
                                        <th class="px-4 py-3">Lokasi</th>
                                        <th class="px-4 py-3">Gambar</th>
                                        <th class="px-4 py-3">Catatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($daftarhdrs as $key => $data)
                                    @if ($data->tipe === 'datang')
                                            <tr>
                                                <td class="px-4 py-3 border">{{ $key + 1 }}</td>
                                                <td class="px-4 py-3 border">{{ $data->hari }}</td>
                                                <td class="px-4 py-3 border">{{ $data->tanggal }}</td>
                                                <td class="px-4 py-3 border">
                                                    <a href="https://www.google.com/maps?q={{ $data->latitude }},{{ $data->longitude }}" target="_blank" class="badge badge-location px-3 py-2 text-decoration-none">
                                                        <i class="bi bi-geo-alt-fill me-1"></i>Lihat Lokasi
                                                    </a>
                                                </td>
                                                <td class="px-4 py-3 border">
                                                    @if ($data->dataGambar)
                                                        <img src="{{ $data->dataGambar }}" width="100" class="img-preview" onclick="showImage('{{ $data->dataGambar }}')">
                                                    @else
                                                        <div class="empty-img">Tidak ada gambar</div>
                                                    @endif
                                                </td>
                                                <td class="px-4 py-3 border">{{ $data->notes ?? '-' }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <!-- Departure Tab -->
                    <div class="tab-pane fade" id="departure" role="tabpanel" aria-labelledby="departure-tab">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="border">
                                    <tr>
                                        <th class="px-4 py-3">No</th>
                                        <th class="px-4 py-3">Hari</th>
                                        <th class="px-4 py-3">Tanggal</th>
                                        <th class="px-4 py-3">Lokasi</th>
                                        <th class="px-4 py-3">Gambar</th>
                                        <th class="px-4 py-3">Catatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($daftarhdrs as $key => $data)
                                        @if ($data->tipe === 'pulang')
                                            <tr>
                                                <td class="px-4 py-3 border">{{ $key + 1 }}</td>
                                                <td class="px-4 py-3 border">{{ $data->hari }}</td>
                                                <td class="px-4 py-3 border">{{ $data->tanggal }}</td>
                                                <td class="px-4 py-3 border">
                                                    <a href="https://www.google.com/maps?q={{ $data->latitude }},{{ $data->longitude }}" target="_blank" class="badge badge-location px-3 py-2 text-decoration-none">
                                                        <i class="bi bi-geo-alt-fill me-1"></i>Lihat Lokasi
                                                    </a>
                                                </td>
                                                <td class="px-4 py-3 border">
                                                    @if ($data->dataGambar)
                                                        <img src="{{ $data->dataGambar }}" width="100" class="img-preview" onclick="showImage('{{ $data->dataGambar }}')">
                                                    @else
                                                        <div class="empty-img">Tidak ada gambar</div>
                                                    @endif
                                                </td>
                                                <td class="px-4 py-3 border">{{ $data->notes ?? '-' }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Preview Gambar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" class="img-fluid" alt="Preview">
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- JavaScript for image modal -->
    <script>
        function showImage(imageSrc) {
            document.getElementById('modalImage').src = imageSrc;
            new bootstrap.Modal(document.getElementById('imageModal')).show();
        }
        
        // Function to initialize tooltips
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
</body>
</html>