<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengambilan Foto dengan Lokasi</title>
    <script src="{{ asset('js/webcam.min.js') }}"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        #camera {
            margin-bottom: 20px;
            text-align: center;
        }
        #mapContainer {
            height: 300px;
            width: 1000px;
            border: 2px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
        }
        #map {
            width: 100%;
            height: 100%;
        }
        button {
            margin: 10px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #218838;
        }
        #result {
            text-align: center;
            margin-top: 20px;
        }
        .container {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
    </style>
</head>
<body>
    <h1>Pengambilan Foto dengan Lokasi</h1>
    <div id="camera"></div>
    <button onclick="takeSnapshot()">Ambil Foto</button>
    <div class="container">
        <div id="result"></div>
        <div id="mapContainer"></div>
    </div>
    <form id="createForm" action="{{ route('create.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="latitude" id="latitude" required>
        <input type="hidden" name="longitude" id="longitude" required>
        <input type="hidden" name="notes" id="notes">
        <input type="hidden" name="imageData" id="imageData">
        <button type="button" onclick="submitForm()" id="submitBtn" style="display: none;">Simpan Data</button>
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
                document.getElementById('result').innerHTML = `<img src="${data_uri}" alt="Foto Hasil">`;
                document.getElementById('imageData').value = data_uri;
                document.getElementById('submitBtn').style.display = 'inline-block';
            });
        }

        function submitForm() {
            const notes = prompt("Masukkan catatan (opsional):");
            document.getElementById('notes').value = notes;
            document.getElementById('createForm').submit();
        }

        window.onload = function() {
            getLocation();
        }

        function displayMap(lat, lon) {
            const mapContainer = document.getElementById('mapContainer');
            mapContainer.innerHTML = `<div id="map"></div>`;
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
