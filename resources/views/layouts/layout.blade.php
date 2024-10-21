<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
<body>
    <div class="min-h-full">
        <x-navigasi></x-navigasi> <!-- Komponen navigasi digunakan di semua halaman -->

        <main>
            {{$slot}} <!-- Tempat konten halaman yang spesifik -->
        </main>
    </div>
</body>
</html>
