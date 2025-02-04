<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Akun</title>
    @vite('resources/css/app.css') <!-- Tambahkan jika menggunakan Vite -->
</head>
<body>
    <div class="min-h-screen bg-gray-100">
        <!-- Pilih navigasi berdasarkan peran pengguna -->
        @if(auth()->check()) 
            @if(auth()->user()->role === 'pembimbingpkl')
                <x-bar></x-bar> <!-- Navbar khusus Pembimbing -->
            @else
                <x-navigasi></x-navigasi> <!-- Navbar khusus Siswa -->
            @endif
        @else
            <x-navigasi></x-navigasi> <!-- Navbar default untuk tamu (belum login) -->
        @endif

        <!-- Konten utama -->
        <main>
            {{ $slot }}
        </main>

        <!-- Footer jika perlu -->
        <x-footer></x-footer>
    </div>
</body>
</html>
