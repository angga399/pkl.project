<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi Saya</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="/" class="text-xl font-bold text-blue-600">Aplikasi Saya</a>
            <div class="flex items-center space-x-4">
                <a href="/profile" class="text-gray-700 hover:text-blue-600">Profil</a>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="text-gray-700 hover:text-blue-600">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <!-- Header -->
            <div class="flex justify-between items-center border-b px-6 py-4">
                <h1 class="text-2xl font-bold">Semua Notifikasi</h1>
                <form action="/notifications/mark-all-as-read" method="POST">
                    @csrf
                    <button type="submit" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                        Tandai Semua Terbaca
                    </button>
                </form>
            </div>
            
            <!-- Daftar Notifikasi -->
            @if(count($notifications) > 0)
                @foreach($notifications as $notification)
                <div class="border-b last:border-b-0 px-6 py-4 hover:bg-gray-50 transition cursor-pointer 
                            {{ $notification->unread() ? 'bg-blue-50' : '' }}"
                     onclick="window.location.href='{{ $notification->data['url'] ?? '#' }}'">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 pt-1 text-{{ $notification->data['type'] === 'success' ? 'green' : 'red' }}-500">
                                <i class="fas fa-{{ $notification->data['type'] === 'success' ? 'check-circle' : 'times-circle' }}"></i>
                            </div>
                            <div class="ml-3 flex-1">
                                <p class="text-gray-800">{{ $notification->data['message'] }}</p>
                                <p class="text-xs text-gray-500 mt-1">{{ $notification->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @if($notification->unread())
                        <form action="/notifications/mark-as-read/{{ $notification->id }}" method="POST">
                            @csrf
                            <button type="submit" class="text-blue-600 hover:text-blue-800 text-xs">
                                Tandai Terbaca
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
                @endforeach
            @else
                <div class="px-6 py-12 text-center text-gray-500">
                    Tidak ada notifikasi
                </div>
            @endif
        </div>

        <!-- Pagination -->
        @if($notifications->hasPages())
        <div class="mt-4">
            {{ $notifications->links() }}
        </div>
        @endif
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t mt-8">
        <div class="container mx-auto px-4 py-4 text-center text-gray-500 text-sm">
            &copy; 2023 Aplikasi Saya. All rights reserved.
        </div>
    </footer>
</body>
</html>