<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pembimbing PKL</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
        <div class="mb-6 text-center">
            <h2 class="text-2xl font-bold text-gray-800">Registrasi Pembimbing PKL</h2>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Hidden role field -->
            <input type="hidden" name="register_option" value="pembimbingpkl">

            <!-- Supervisor Name -->
            <div class="mb-4">
                <label for="supervisor_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap Pembimbing</label>
                <input id="supervisor_name" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                       type="text" name="supervisor_name" value="{{ old('supervisor_name') }}" required autofocus>
                @error('supervisor_name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- NIP -->
            <div class="mb-4">
                <label for="nip" class="block text-sm font-medium text-gray-700 mb-1">NIP/NIK Pembimbing</label>
                <input id="nip" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                       type="text" name="nip" value="{{ old('nip') }}" required>
                @error('nip')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Birth Date -->
            <div class="mb-4">
                <label for="birth_date_pembimbing" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                <input id="birth_date_pembimbing" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                       type="date" name="birth_date_pembimbing" value="{{ old('birth_date_pembimbing') }}" required>
                @error('birth_date_pembimbing')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Rank -->
            <div class="mb-4">
                <label for="rank" class="block text-sm font-medium text-gray-700 mb-1">Pangkat/Jabatan</label>
                <input id="rank" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                       type="text" name="rank" value="{{ old('rank') }}" required>
                @error('rank')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Company Address -->
            <div class="mb-4">
                <label for="company_address" class="block text-sm font-medium text-gray-700 mb-1">Alamat Perusahaan</label>
                <textarea id="company_address" name="company_address" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                          required>{{ old('company_address') }}</textarea>
                @error('company_address')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone Number -->
            <div class="mb-4">
                <label for="phone_number_pembimbing" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                <input id="phone_number_pembimbing" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                       type="tel" name="phone_number_pembimbing" value="{{ old('phone_number_pembimbing') }}" required>
                @error('phone_number_pembimbing')
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
                    Daftar Sebagai Pembimbing
                </button>
            </div>
        </form>
    </div>
</body>
</html>