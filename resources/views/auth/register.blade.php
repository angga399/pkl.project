<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registrasi Siswa PKL</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <style>
    body {
      background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
      min-height: 100vh;
      font-family: 'Segoe UI', system-ui, sans-serif;
    }
    .glass-card {
      background: rgba(15, 23, 42, 0.8);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.1);
      box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
      color: #e2e8f0;
    }
    .custom-input {
      transition: all 0.3s ease;
      border: 2px solid #1e293b;
      background-color: rgba(30, 41, 59, 0.9);
      color: #e2e8f0;
    }
    .custom-input::placeholder {
      color: #94a3b8;
    }
    .custom-input:focus {
      border-color: #3b82f6;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
    }
    .custom-button {
      background: linear-gradient(45deg, #1e40af, #3b82f6);
      transition: all 0.3s ease;
    }
    .custom-button:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
      background: linear-gradient(45deg, #1e3a8a, #2563eb);
    }
    .registration-container {
      display: flex;
      min-height: 100vh;
      justify-content: center;
      align-items: center;
      padding: 1rem;
    }
    .text-glow {
      text-shadow: 0 0 15px rgba(59, 130, 246, 0.5);
    }
  </style>
</head>
<body class="text-gray-100">
  <div class="registration-container">
    <div class="glass-card rounded-xl p-6 w-full max-w-md">
      <div class="text-center mb-6">
        <div class="inline-block p-3 rounded-full bg-gradient-to-r from-blue-800 to-blue-600 mb-3">
          <i class="fas fa-user-graduate text-2xl text-white"></i>
        </div>
        <h2 class="text-2xl font-bold text-white text-glow">Registrasi Siswa PKL</h2>
        <p class="mt-1 text-blue-200 text-sm">Isi formulir dengan lengkap untuk mendaftar</p>
      </div>
      
      <form method="POST" action="{{ route('register') }}" autocomplete="on" class="space-y-4">
        @csrf
        <input type="hidden" name="register_option" value="siswa">

        <!-- Nama Lengkap -->
        <div>
          <label for="full_name" class="block text-sm font-medium text-blue-200 mb-1">Nama Lengkap</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <i class="fas fa-user text-blue-400 text-sm"></i>
            </div>
            <input id="full_name" 
                   name="full_name" 
                   type="text" 
                   autocomplete="name" 
                   value="{{ old('full_name') }}" 
                   class="custom-input pl-10 block w-full py-2 px-3 rounded-lg text-sm focus:outline-none" 
                   required>
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <!-- Tanggal Lahir -->
          <div>
            <label for="birth_date" class="block text-sm font-medium text-blue-200 mb-1">Tanggal Lahir</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-calendar text-blue-400 text-sm"></i>
              </div>
              <input id="birth_date" 
                     name="birth_date" 
                     type="date" 
                     autocomplete="bday" 
                     value="{{ old('birth_date') }}" 
                     class="custom-input pl-10 block w-full py-2 px-3 rounded-lg text-sm focus:outline-none" 
                     required>
            </div>
          </div>

          <!-- NIS Peserta -->
          <div>
            <label for="nik" class="block text-sm font-medium text-blue-200 mb-1">NIS Peserta</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-id-card text-blue-400 text-sm"></i>
              </div>
              <input id="nik" 
                     name="nik" 
                     type="text" 
                     autocomplete="off" 
                     value="{{ old('nik') }}" 
                     class="custom-input pl-10 block w-full py-2 px-3 rounded-lg text-sm focus:outline-none" 
                     required>
            </div>
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <!-- Jurusan -->
          <div>
            <label for="major" class="block text-sm font-medium text-blue-200 mb-1">Jurusan</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-graduation-cap text-blue-400 text-sm"></i>
              </div>
              <select name="major" 
                      id="major" 
                      class="custom-input pl-10 block w-full py-2 px-3 border border-gray-300 bg-slate-800 rounded-lg text-sm focus:outline-none" 
                      required>
                <option value="" disabled {{ old('major') == '' ? 'selected' : '' }}>Pilih Jurusan</option>
                <option value="PPLG" {{ old('major') == 'PPLG' ? 'selected' : '' }}>PPLG</option>
                <option value="TJKT" {{ old('major') == 'TJKT' ? 'selected' : '' }}>TJKT</option>
                <option value="BR" {{ old('major') == 'BR' ? 'selected' : '' }}>BR</option>
                <option value="AN" {{ old('major') == 'AN' ? 'selected' : '' }}>AN</option>
                <option value="MP" {{ old('major') == 'MP' ? 'selected' : '' }}>MP</option>
                <option value="LPS" {{ old('major') == 'LPS' ? 'selected' : '' }}>LPS</option>
                <option value="DPB" {{ old('major') == 'DPB' ? 'selected' : '' }}>DPB</option>
                <option value="AK" {{ old('major') == 'AK' ? 'selected' : '' }}>AK</option>
              </select>
            </div>
          </div>

          <!-- Perusahaan -->
          <div>
            <label for="company_id" class="block text-sm font-medium text-blue-200 mb-1">Perusahaan</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-building text-blue-400 text-sm"></i>
              </div>
              <select id="company_id" 
                      name="company_id" 
                      autocomplete="organization" 
                      class="custom-input pl-10 block w-full py-2 px-3 rounded-lg text-sm focus:outline-none" 
                      required>
                <option value="">Pilih Perusahaan</option>
                @foreach($companies as $company)
                  <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                    {{ $company->name }}
                  </option>
                @endforeach
              </select>
              @error('company_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <!-- Nomor Telepon -->
          <div>
            <label for="phone_number" class="block text-sm font-medium text-blue-200 mb-1">No Telepon</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-phone text-blue-400 text-sm"></i>
              </div>
              <input id="phone_number" 
                     name="phone_number" 
                     type="tel" 
                     autocomplete="tel" 
                     value="{{ old('phone_number') }}" 
                     class="custom-input pl-10 block w-full py-2 px-3 rounded-lg text-sm focus:outline-none" 
                     required>
            </div>
          </div>

          <!-- Lokasi PKL -->
          <div>
            <label for="location_pkl" class="block text-sm font-medium text-blue-200 mb-1">Lokasi PKL</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-map-marker-alt text-blue-400 text-sm"></i>
              </div>
              <input id="location_pkl" 
                     name="location_pkl" 
                     type="text" 
                     autocomplete="address-line1" 
                     value="{{ old('location_pkl') }}" 
                     class="custom-input pl-10 block w-full py-2 px-3 rounded-lg text-sm focus:outline-none" 
                     required>
            </div>
          </div>
        </div>

        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium text-blue-200 mb-1">Email</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <i class="fas fa-envelope text-blue-400 text-sm"></i>
            </div>
            <input id="email" 
                   name="email" 
                   type="email" 
                   autocomplete="email" 
                   value="{{ old('email') }}" 
                   class="custom-input pl-10 block w-full py-2 px-3 rounded-lg text-sm focus:outline-none" 
                   required>
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <!-- Password -->
          <div>
            <label for="password" class="block text-sm font-medium text-blue-200 mb-1">Password</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-lock text-blue-400 text-sm"></i>
              </div>
              <input id="password" 
                     name="password" 
                     type="password" 
                     autocomplete="new-password" 
                     class="custom-input pl-10 block w-full py-2 px-3 rounded-lg text-sm focus:outline-none" 
                     required>
            </div>
          </div>

          <!-- Konfirmasi Password -->
          <div>
            <label for="password_confirmation" class="block text-sm font-medium text-blue-200 mb-1">Konfirmasi Password</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-lock text-blue-400 text-sm"></i>
              </div>
              <input id="password_confirmation" 
                     name="password_confirmation" 
                     type="password" 
                     autocomplete="new-password" 
                     class="custom-input pl-10 block w-full py-2 px-3 rounded-lg text-sm focus:outline-none" 
                     required>
            </div>
          </div>
        </div>

        <div class="mt-6">
          <button type="submit" class="custom-button relative w-full flex justify-center py-2 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-150">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <i class="fas fa-user-plus text-blue-300"></i>
            </span>
            Daftar Sekarang
          </button>
        </div>

        <div class="text-center text-xs text-blue-300 pt-3">
          Sudah punya akun? 
          <a href="{{ route('login') }}" class="font-medium text-white hover:text-blue-200 transition-colors">
            Masuk disini
          </a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>