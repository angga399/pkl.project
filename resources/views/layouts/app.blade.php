<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Laravel')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> {{-- Tambahkan jika menggunakan Tailwind atau Bootstrap --}}
</head>
<body>
    <nav>
        <!-- Tambahkan navigasi di sini -->
    </nav>

    <div class="container mt-4">
        @yield('content') {{-- Tempat untuk konten dinamis --}}
    </div>

    <footer>
        <!-- Tambahkan footer di sini -->
    </footer>
</body>
</html>
