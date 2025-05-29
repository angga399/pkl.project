<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absen Pulang</title>
    <script src="{{ asset('js/webcam.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <style>
        body {
            background: linear-gradient(to bottom, #1a1a2e, #16213e);
            min-height: 100vh;
            color: #e2e8f0;
        }
        .card {
            background-color: rgba(30, 41, 59, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }
        .btn-primary {
            background-image: linear-gradient(to right, #4338ca, #5b21b6);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-image: linear-gradient(to right, #4f46e5, #7c3aed);
            transform: translateY(-2px);
        }
        .btn-success {
            background-image: linear-gradient(to right, #047857, #059669);
            transition: all 0.3s ease;
        }
        .btn-success:hover {
            background-image: linear-gradient(to right, #059669, #10b981);
            transform: translateY(-2px);
        }
        #camera, #hasil img {
            border-radius: 12px;
            border: 2px solid rgba(255, 255, 255, 0.1);
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }
        .pulse {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(99, 102, 241, 0.5); }
            70% { box-shadow: 0 0 0 10px rgba(99, 102, 241, 0); }
            100% { box-shadow: 0 0 0 0 rgba(99, 102, 241, 0); }
        }
        .leaflet-container {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body class="flex flex-col items-center py-10 px-4">
    <div class="card p-8 rounded-xl w-full max-w-4xl">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-300 to-purple-300 inline-block">Absen Pulang</h1>
            <p class="text-gray-400 mt-2">Silakan ambil foto dan pastikan lokasi Anda terdeteksi</p>
        </div>

        <!-- Pesan Keberhasilan -->
        @if(session('success'))
        <div class="bg-green-900 text-green-200 px-4 py-3 rounded-lg mb-6 border border-green-700 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            {{ session('success') }}
        </div>
        @endif

        <!-- Pesan Kesalahan -->
        @if ($errors->any())
        <div class="bg-red-900 text-red-200 px-4 py-3 rounded-lg mb-6 border border-red-700">
            <div class="flex items-center mb-2">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
                <span class="font-semibold">Terdapat kesalahan:</span>
            </div>
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="flex flex-col md:flex-row gap-8">
            <div class="flex-1 flex flex-col items-center">
                <div id="camera" class="mb-4 pulse"></div>
                <button onclick="ambilFoto()" class="btn-success px-6 py-2 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Ambil Foto
                </button>
                <div id="hasil" class="text-center mt-6"></div>
            </div>
            
            <div class="flex-1 flex flex-col">
                <div class="bg-slate-800 p-4 rounded-lg mb-4">
                    <h2 class="text-lg font-semibold mb-2 text-indigo-300">Lokasi Anda</h2>
                    <div id="mapContainer" class="h-64 w-full rounded-lg overflow-hidden"></div>
                    <a id="googleMapsLink" href="#" target="_blank" class="text-indigo-400 hover:text-indigo-300 underline mt-4 block text-center hidden transition-colors">
                        <span class="flex items-center justify-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd"></path>
                            </svg>
                            Lihat Lokasi di Google Maps
                        </span>
                    </a>
                </div>
                
                <div class="mt-2 p-4 bg-slate-800 rounded-lg">
                    <h2 class="text-lg font-semibold mb-2 text-indigo-300">Info Absensi</h2>
                    <div class="text-gray-300" id="infoAbsen">
                        <div class="flex items-center mb-2">
                            <svg class="w-4 h-4 mr-2 text-indigo-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ Auth::user()->full_name }}</span>
                        </div>
                        <div class="flex items-center mb-2">
                            <svg class="w-4 h-4 mr-2 text-indigo-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 2a8 8 0 100 16 8 8 0 000-16zM5.354 12.104a.5.5 0 01-.708-.708l3-3a.5.5 0 01.708 0l3 3a.5.5 0 01-.708.708L10 9.707l-4.646 4.397z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ auth()->user()->company->name ?? '' }}</span>
                        </div>
                        <div class="flex items-center" id="tampilTanggalContainer">
                            <svg class="w-4 h-4 mr-2 text-indigo-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                            <span id="tampilTanggal">Menunggu pengambilan foto...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Simpan -->
        <form id="formSimpan" action="{{ route('daftarhdr.store') }}" method="POST" enctype="multipart/form-data" class="mt-8">
            @csrf
            <input type="hidden" name="tipe" value="pulang">
            <input type="hidden" name="hari" id="hari" required>
            <input type="hidden" name="nama" id="nama" value="{{ Auth::user()->full_name }}" required>
            <input type="hidden" name="pt" id="pt" value="{{ Auth::user()->PT }}" required>
            <input type="hidden" name="tanggal" id="tanggal" required>
            <input type="hidden" name="latitude" id="latitude">
            <input type="hidden" name="longitude" id="longitude">
            <input type="hidden" name="dataGambar" id="dataGambar">
            <button type="submit" id="btnSimpan" class="btn-primary w-full px-6 py-3 text-white rounded-lg mt-4 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-opacity-50 hidden flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                Simpan Data Absensi
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

        // Fungsi untuk mengambil foto
        function ambilFoto() {
            Webcam.snap(function(data_uri) {
                document.getElementById('hasil').innerHTML = `
                    <img src="${data_uri}" alt="Foto Hasil" class="rounded-lg">
                    <div class="mt-2 text-indigo-300" id="statusFoto">Foto berhasil diambil</div>
                `;
                document.getElementById('dataGambar').value = data_uri;
                document.getElementById('camera').classList.remove('pulse');
                document.getElementById('btnSimpan').classList.remove('hidden');
                
                const sekarang = new Date();
                const hariList = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
                const hari = hariList[sekarang.getDay()];

                // Menggunakan toISOString untuk mendapatkan format YYYY-MM-DD
                const tanggal = sekarang.toISOString().split('T')[0];

                document.getElementById('hari').value = hari;
                document.getElementById('tanggal').value = tanggal;
                document.getElementById('tampilTanggal').textContent = `${hari}, ${tanggal}`;
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
            let message = "";
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    message = "Pengguna menolak permintaan izin lokasi.";
                    break;
                case error.POSITION_UNAVAILABLE:
                    message = "Lokasi tidak tersedia.";
                    break;
                case error.TIMEOUT:
                    message = "Permintaan lokasi timeout.";
                    break;
                case error.UNKNOWN_ERROR:
                    message = "Kesalahan tidak diketahui.";
                    break;
            }
            
            alert(message);
            
            // Tampilkan pesan error di halaman
            const mapContainer = document.getElementById('mapContainer');
            mapContainer.innerHTML = `
                <div class="flex items-center justify-center h-full bg-slate-700 rounded-lg">
                    <div class="text-center p-4">
                        <svg class="w-12 h-12 text-red-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                        <p class="text-red-300">${message}</p>
                        <p class="text-gray-400 text-sm mt-2">Mohon aktifkan izin lokasi untuk melanjutkan absensi</p>
                    </div>
                </div>
            `;
        }

        function displayMap(lat, lon) {
            const mapContainer = document.getElementById('mapContainer');
            mapContainer.innerHTML = `<div id="map" class="w-full h-full"></div>`;
            const map = L.map('map').setView([lat, lon], 15);
            
            // Menggunakan style peta yang lebih gelap
            L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
                subdomains: 'abcd',
                maxZoom: 19
            }).addTo(map);
            
            // Marker dengan warna yang lebih sesuai tema
            const customIcon = L.divIcon({
                html: `<div style="background-color: rgba(99, 102, 241, 0.8); width: 20px; height: 20px; border-radius: 50%; border: 2px solid white; box-shadow: 0 0 10px rgba(99, 102, 241, 0.5);"></div>`,
                className: '',
                iconSize: [20, 20]
            });
            
            L.marker([lat, lon], {icon: customIcon}).addTo(map)
                .bindPopup("<b>Lokasi Anda</b>")
                .openPopup();
        }

        window.onload = function() {
            getLocation();
        }
    </script>
</body>
</html>