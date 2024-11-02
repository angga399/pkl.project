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
    
    <div id="camera" class="mb-6"></div>
    <button onclick="takeSnapshot()" class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50">Ambil Foto</button>

    <div class="flex flex-col md:flex-row justify-center items-center gap-8 mt-6">
        <div id="result" class="text-center"></div>
        <div>
            <div id="mapContainer" class="h-72 w-full md:w-96 rounded-lg border border-gray-300 overflow-hidden"></div>
            <a id="googleMapsLink" href="#" target="_blank" class="text-blue-500 underline mt-4 block text-center hidden">Lihat Lokasi di Google Maps</a>
        </div>
    </div>

    <!-- Form Create -->
    <form id="createForm" action="{{ route('daftarhdr.store') }}" method="POST" enctype="multipart/form-data" class="mt-6">
        @csrf
        <input type="hidden" name="latitude" id="latitude" required>
        <input type="hidden" name="longitude" id="longitude" required>
        <input type="hidden" name="notes" id="notes">
        <input type="hidden" name="imageData" id="imageData">
        <button type="submit" id="submitBtn" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 mt-4 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50 hidden">Simpan Data</button>
    </form>

    <script>
        let latitude, longitude;

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                alert("Geolocation tidak didukung oleh browser ini.");
            }
        }

        function showPosition(position) {
            latitude = position.coords.latitude;
            longitude = position.coords.longitude;
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

        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('#camera');

        function takeSnapshot() {
            Webcam.snap(function(data_uri) {
                document.getElementById('result').innerHTML = `
                    <img src="${data_uri}" alt="Foto Hasil" class="rounded-md">
                    <div class="mt-4 text-gray-700" id="dateDisplay"></div>
                `;
                document.getElementById('imageData').value = data_uri;
                document.getElementById('submitBtn').classList.remove('hidden');
                
                const dateDisplay = document.getElementById('dateDisplay');
                const now = new Date();
                const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
                const day = days[now.getDay()];
                const date = now.toLocaleDateString('id-ID', {
                    day: 'numeric', month: 'long', year: 'numeric'
                });
                dateDisplay.textContent = `${day}, ${date}`;
            });
        }

        window.onload = function() {
            getLocation();
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
    </script>
</body>
</html>
