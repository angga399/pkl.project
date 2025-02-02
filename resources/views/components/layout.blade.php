<!-- resources/views/components/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Akun</title>
    @vite('resources/css/app.css') <!-- Tambahkan jika Anda menggunakan Vite -->
</head>
<body>
    <div class="min-h-screen bg-gray-100">
        <!-- Tambahkan navigasi di sini -->
        <x-navigasi></x-navigasi>

        <!-- Konten utama -->
        <main>
            {{ $slot }}
        </main>

        <!-- Footer jika perlu -->
        <x-footer></x-footer>
    </div>
</body>
</html>
