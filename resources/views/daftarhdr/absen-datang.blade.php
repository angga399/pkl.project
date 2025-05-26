<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengambilan Foto dengan Lokasi</title>
    <script src="{{ asset('js/webcam.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .camera-container {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
            border: 1px solid #333;
        }
        .glass-effect {
            background-color: rgba(30, 30, 30, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(100, 100, 100, 0.3);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }
        .btn-primary {
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #4338ca, #4f46e5);
            transform: translateY(-2px);
        }
        .btn-success {
            background: linear-gradient(135deg, #10b981, #34d399);
            transition: all 0.3s ease;
        }
        .btn-success:hover {
            background: linear-gradient(135deg, #059669, #10b981);
            transform: translateY(-2px);
        }
        .card {
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        #map {
            border-radius: 12px;
        }
        .pulse {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(99, 102, 241, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(99, 102, 241, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(99, 102, 241, 0);
            }
        }
    </style>
</head>
<body class="min-h-screen py-10">
    <div class="container px-4">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-500 mb-2">Pengambilan Foto dengan Lokasi</h1>
            <p class="text-gray-400">Catat kehadiran dengan foto dan lokasi otomatis</p>
        </div>

        <!-- Pesan Keberhasilan -->
        @if(session('success'))
            <div class="bg-green-900 text-green-200 px-4 py-3 rounded-lg mb-6 flex items-center glass-effect">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        @endif

        <!-- Pesan Kesalahan -->
        @if ($errors->any())
            <div class="bg-red-900 text-red-200 px-4 py-3 rounded-lg mb-6 glass-effect">
                <div class="flex items-center mb-1">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <span class="font-semibold">Terjadi kesalahan:</span>
                </div>
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="flex flex-col items-center">
                <div class="bg-gray-800 p-4 rounded-xl camera-container mb-4">
                    <div id="camera" class="overflow-hidden rounded-lg"></div>
                </div>
                <button onclick="ambilFoto()" class="btn-success px-6 py-3 text-white rounded-lg font-medium flex items-center gap-2 pulse">
                    <i class="fas fa-camera"></i>
                    Ambil Foto
                </button>
                
                <div id="hasil" class="mt-6 text-center"></div>
            </div>
            
            <div class="flex flex-col">
                <div class="glass-effect rounded-xl p-5 mb-4">
                    <h2 class="text-xl font-semibold mb-3 flex items-center">
                        <i class="fas fa-map-marker-alt text-indigo-400 mr-2"></i>
                        Lokasi Saat Ini
                    </h2>
                    <div id="mapContainer" class="h-64 w-full rounded-lg overflow-hidden bg-gray-700"></div>
                    <div class="mt-3">
                        <a id="googleMapsLink" href="#" target="_blank" class="text-indigo-400 flex items-center justify-center gap-2 hover:text-indigo-300 transition-colors hidden">
                            <i class="fas fa-external-link-alt"></i>
                            Lihat di Google Maps
                        </a>
                    </div>
                </div>
                
                <div class="glass-effect rounded-xl p-5">
                    <h2 class="text-xl font-semibold mb-3 flex items-center">
                        <i class="fas fa-user-check text-indigo-400 mr-2"></i>
                        Informasi Kehadiran
                    </h2>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-400">Nama:</span>
                            <span class="font-medium">{{ Auth::user()->full_name }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-400">Perusahaan:</span>
                            <span class="font-medium">{{ Auth::user()->PT }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-400">Tanggal:</span>
                            <span class="font-medium" id="displayDate">Memuat tanggal...</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-400">Status:</span>
                            <span class="font-medium text-green-400">Datang</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Form Simpan -->
        <form id="formSimpan" action="{{ route('daftarhdr.store') }}" method="POST" enctype="multipart/form-data" class="mt-8 flex justify-center">
            @csrf
            <input type="hidden" name="tipe" value="datang">
            <input type="hidden" name="hari" id="hari" required>
            <input type="hidden" name="tanggal" id="tanggal" required>
            <input type="hidden" name="nama" id="nama" value="{{ Auth::user()->full_name }}" required>
            <input type="hidden" name="pt" id="pt" value="{{ Auth::user()->PT }}" required>
            <input type="hidden" name="latitude" id="latitude">
            <input type="hidden" name="longitude" id="longitude">
            <input type="hidden" name="dataGambar" id="dataGambar">
            <button type="submit" id="btnSimpan" class="btn-primary px-8 py-3 text-white rounded-lg font-medium flex items-center gap-2 hidden">
                <i class="fas fa-save"></i>
                Simpan Kehadiran
            </button>
        </form>
    </div>

    <script>
        // Mengatur webcam
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('#camera');

        // Mengatur tanggal
        const sekarang = new Date();
        const hariList = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        const hari = hariList[sekarang.getDay()];
        const tanggal = sekarang.toISOString().split('T')[0];
        const tanggalFormatted = new Intl.DateTimeFormat('id-ID', { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        }).format(sekarang);
        
        document.getElementById('displayDate').textContent = tanggalFormatted;

        // Fungsi untuk mengambil foto
        function ambilFoto() {
            Webcam.snap(function(data_uri) {
                document.getElementById('hasil').innerHTML = `
                    <div class="bg-gray-800 p-3 rounded-xl overflow-hidden mt-2 camera-container">
                        <img src="${data_uri}" alt="Foto Hasil" class="rounded-lg">
                        <div class="mt-3 text-gray-300 text-sm">
                            <span class="bg-indigo-900 text-indigo-200 px-2 py-1 rounded-md">
                                <i class="fas fa-calendar-alt mr-1"></i> ${tanggalFormatted}
                            </span>
                        </div>
                    </div>
                `;
                document.getElementById('dataGambar').value = data_uri;
                document.getElementById('btnSimpan').classList.remove('hidden');
                document.getElementById('btnSimpan').classList.add('pulse');
                
                document.getElementById('hari').value = hari;
                document.getElementById('tanggal').value = tanggal;
            });
        }

        // Mendapatkan lokasi pengguna
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                alert("Geolocation tidak didukung oleh browser ini.");
            }
        }

        function showPosition(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            document.getElementById('latitude').value = latitude;
            document.getElementById('longitude').value = longitude;
            displayMap(latitude, longitude);

            const googleMapsLink = document.getElementById('googleMapsLink');
            googleMapsLink.href = `https://www.google.com/maps?q=${latitude},${longitude}`;
            googleMapsLink.classList.remove('hidden');
        }

        function showError(error) {
            let errorMessage = "";
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    errorMessage = "Anda menolak permintaan akses lokasi.";
                    break;
                case error.POSITION_UNAVAILABLE:
                    errorMessage = "Informasi lokasi tidak tersedia.";
                    break;
                case error.TIMEOUT:
                    errorMessage = "Permintaan akses lokasi timeout.";
                    break;
                case error.UNKNOWN_ERROR:
                    errorMessage = "Terjadi kesalahan yang tidak diketahui.";
                    break;
            }
            
            document.getElementById('mapContainer').innerHTML = `
                <div class="flex items-center justify-center h-full flex-col p-4 text-center">
                    <i class="fas fa-exclamation-triangle text-yellow-500 text-3xl mb-3"></i>
                    <p class="text-yellow-200">${errorMessage}</p>
                    <button onclick="getLocation()" class="mt-3 px-4 py-2 bg-yellow-700 text-yellow-100 rounded-lg hover:bg-yellow-600">
                        <i class="fas fa-sync-alt mr-1"></i> Coba Lagi
                    </button>
                </div>
            `;
        }

        function displayMap(lat, lon) {
            const mapContainer = document.getElementById('mapContainer');
            mapContainer.innerHTML = `<div id="map" class="w-full h-full"></div>`;
            const map = L.map('map').setView([lat, lon], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);
            
            // Custom marker with pulse effect
            const pulsingIcon = L.divIcon({
                className: "custom-map-marker",
                html: `<div class="relative">
                         <div class="absolute w-4 h-4 bg-indigo-500 rounded-full" style="top: -8px; left: -8px; z-index: 1;"></div>
                         <div class="absolute w-12 h-12 bg-indigo-500 rounded-full opacity-30 animate-ping" style="top: -12px; left: -12px;"></div>
                       </div>`,
                iconSize: [12, 12],
                iconAnchor: [6, 6]
            });
            
            const marker = L.marker([lat, lon], {icon: pulsingIcon}).addTo(map)
                .bindPopup(`
                    <div class="text-center">
                        <strong>Lokasi Anda Saat Ini</strong><br>
                        <small>Latitude: ${lat.toFixed(6)}</small><br>
                        <small>Longitude: ${lon.toFixed(6)}</small>
                    </div>
                `)
                .openPopup();
        }

        window.onload = function() {
            getLocation();
        }
    </script>
</body>
</html>