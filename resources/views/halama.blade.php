<!DOCTYPE html>
<html>
<head>
    <title>Welcome Page with Twinkling Stars</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            overflow: hidden;
            background: #000;
            position: relative;
        }

        .welcome-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-family: Arial, sans-serif;
            font-size: 3em;
            text-align: center;
            z-index: 1;
            animation: fadeIn 2s ease-in;
        }

        .star {
            position: absolute;
            background: white;
            border-radius: 50%;
            animation: twinkle var(--duration) ease-in-out infinite;
        }

        @keyframes twinkle {
            0% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.5); }
            100% { opacity: 0.3; transform: scale(1); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <div>
        <x-navigasi></x-navigasi>
    </div>
    <div class="welcome-text">Selamat Datang</div>

    <script>
        function createStars() {
            const starCount = 300; // Jumlah bintang ditambah agar lebih merata

            for (let i = 0; i < starCount; i++) {
                const star = document.createElement('div');
                star.classList.add('star');

                // Posisi acak di seluruh halaman
                star.style.left = `${Math.random() * 100}vw`;
                star.style.top = `${Math.random() * 100}vh`;

                // Ukuran acak untuk efek lebih alami
                const size = Math.random() * 3 + 1; // 1px - 4px
                star.style.width = `${size}px`;
                star.style.height = `${size}px`;

                // Durasi animasi acak untuk variasi kedipan
                star.style.setProperty('--duration', `${Math.random() * 2 + 1}s`);

                document.body.appendChild(star);
            }
        }

        // Membuat bintang setelah halaman dimuat
        window.onload = createStars;
    </script>
</body>
</html>
