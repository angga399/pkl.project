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
</head>
<body class="flex flex-col items-center bg-gray-100 py-10">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Pengambilan Foto dengan Lokasi</h1>

    <!-- Pesan Keberhasilan -->
    @if(session('success'))
        <div class="bg-green-200 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Pesan Kesalahan -->
    @if ($errors->any())
        <div class="bg-red-200 text-red-700 px-4 py-2 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div id="camera" class="mb-6"></div>
    <button onclick="ambilFoto()" class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50">Ambil Foto</button>

    <div class="flex flex-col md:flex-row justify-center items-center gap-8 mt-6">
        <div id="hasil" class="text-center"></div>
        <div>
            <div id="mapContainer" class="h-72 w-full md:w-96 rounded-lg border border-gray-300 overflow-hidden"></div>
            <a id="googleMapsLink" href="#" target="_blank" class="text-blue-500 underline mt-4 block text-center hidden">Lihat Lokasi di Google Maps</a>
        </div>
    </div>

    <!-- Form Simpan -->
    <form id="formSimpan" action="{{ route('daftarhdr.store') }}" method="POST" enctype="multipart/form-data" class="mt-6">
        @csrf
        <input type="hidden" name="tipe" value="datang"> <!-- Menambahkan input tipe -->
        <input type="hidden" name="hari" id="hari" required>
        <input type="hidden" name="tanggal" id="tanggal" required>
        <input type="hidden" name="latitude" id="latitude">
        <input type="hidden" name="longitude" id="longitude">
        <input type="hidden" name="dataGambar" id="dataGambar">
        <button type="submit" id="btnSimpan" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 mt-4 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50 hidden">Simpan Data</button>
    </form>
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
       // Fungsi untuk mengambil foto
function ambilFoto() {
    Webcam.snap(function(data_uri) {
        document.getElementById('hasil').innerHTML = `
            <img src="${data_uri}" alt="Foto Hasil" class="rounded-md">
            <div class="mt-4 text-gray-700" id="tampilTanggal"></div>
        `;
        document.getElementById('dataGambar').value = data_uri;
        document.getElementById('btnSimpan').classList.remove('hidden');
        
        // Menambahkan kode untuk mengatur hari dan tanggal
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
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    alert("Pengguna menolak permintaan izin lokasi.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Lokasi tidak tersedia.");
                    break;
                case error.TIMEOUT:
                    alert("Permintaan lokasi timeout.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("Kesalahan tidak diketahui.");
                    break;
            }
        }

        function displayMap(lat, lon) {
            const mapContainer = document.getElementById('mapContainer');
            mapContainer.innerHTML = `<div id="map" class="w-full h-full"></div>`;
            const map = L.map('map').setView([lat, lon], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);
            L.marker([lat, lon]).addTo(map)
                .bindPopup("Lokasi Anda")
                .openPopup();
        }

        window.onload = function() {
            getLocation();
        }
    </script>
</body>
</html>