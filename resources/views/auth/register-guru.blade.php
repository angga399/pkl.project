<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
        <div class="mb-6 text-center">
            <h2 class="text-2xl font-bold text-gray-800">Registrasi Guru</h2>
            <p class="text-gray-600 mt-2">Silakan isi formulir berikut untuk mendaftar</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Hidden role field -->
            <input type="hidden" name="register_option" value="guru">

            <!-- Full Name -->
            <div class="mb-4">
                <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input id="full_name" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                       type="text" name="full_name" value="{{ old('full_name') }}" required autofocus>
                @error('full_name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Teacher ID -->
            <div class="mb-4">
                <label for="teacher_id" class="block text-sm font-medium text-gray-700 mb-1">NIP/NUPTK</label>
                <input id="teacher_id" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                       type="text" name="teacher_id" value="{{ old('teacher_id') }}">
                @error('teacher_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Subject -->
            <div class="mb-4">
                <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Mata Pelajaran</label>
                <input id="subject" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                       type="text" name="subject" value="{{ old('subject') }}">
                @error('subject')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input id="email" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                       type="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input id="password" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                       type="password" name="password" required autocomplete="new-password">
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <input id="password_confirmation" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                       type="password" name="password_confirmation" required>
                @error('password_confirmation')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('login') }}" class="text-sm text-indigo-600 hover:text-indigo-500">
                    Sudah punya akun? Login
                </a>

                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Daftar Sebagai Guru
                </button>
            </div>
        </form>
    </div>
</body>
</html>