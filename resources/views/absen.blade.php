<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webcam Capture with Location</title>
    <script src="{{ asset('js/webcam.min.js') }}"></script>
    <style>
        #camera {
            position: relative; /* Untuk posisi absolut teks lokasi */
        }
        #locationText {
            position: absolute;
            bottom: 10px; /* Atur posisi teks */
            left: 10px; /* Atur posisi teks */
            color: white; /* Warna teks */
            background-color: rgba(0, 0, 0, 0.5); /* Latar belakang semi-transparan */
            padding: 5px; /* Padding untuk teks */
            border-radius: 5px; /* Sudut bulat */
        }
    </style>
</head>
<body>
    <div id="camera"></div>
    <div id="locationText">Menentukan lokasi...</div>
    <button onclick="takeSnapshot()">Ambil Foto</button>
    <div id="result"></div>

    <script>
        let userLocation = "Lokasi tidak ditemukan"; // Lokasi default
        const locationTextElement = document.getElementById('locationText');

        // Dapatkan lokasi pengguna
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                locationTextElement.innerHTML = "Geolocation tidak didukung oleh browser ini.";
            }
        }

        function showPosition(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            userLocation = `Lat: ${latitude.toFixed(4)}, Lon: ${longitude.toFixed(4)}`;
            locationTextElement.innerHTML = userLocation; // Tampilkan lokasi di halaman
        }

        function showError(error) {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    locationTextElement.innerHTML = "Pengguna menolak permintaan izin lokasi.";
                    break;
                case error.POSITION_UNAVAILABLE:
                    locationTextElement.innerHTML = "Lokasi tidak tersedia.";
                    break;
                case error.TIMEOUT:
                    locationTextElement.innerHTML = "Permintaan lokasi timeout.";
                    break;
                case error.UNKNOWN_ERROR:
                    locationTextElement.innerHTML = "Kesalahan tidak diketahui.";
                    break;
            }
        }

        // Setup Webcam
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('#camera');

        function takeSnapshot() {
            Webcam.snap(function(data_uri) {
                const img = new Image();
                img.src = data_uri;

                img.onload = function() {
                    const canvas = document.createElement('canvas');
                    const context = canvas.getContext('2d');
                    canvas.width = img.width;
                    canvas.height = img.height;
                    context.drawImage(img, 0, 0);

                    // Tambahkan teks lokasi
                    context.fillStyle = 'rgba(0, 0, 0, 0.5)'; // Warna latar belakang
                    context.fillRect(10, img.height - 30, 200, 20); // Latar belakang untuk teks
                    context.fillStyle = 'white'; // Warna teks
                    context.font = '16px Arial'; // Font
                    context.fillText(userLocation, 15, img.height - 10); // Teks lokasi

                    document.getElementById('result').innerHTML = '';
                    document.getElementById('result').appendChild(canvas);
                };
            });
        }

        // Ambil lokasi saat halaman dimuat
        window.onload = function() {
            getLocation();
        }
    </script>
</body>
</html>
