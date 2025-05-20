<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registrasi PKL</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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

    .active-tab {
      background-color: rgba(30, 58, 138, 0.7);
      color: #e2e8f0;
      border: 1px solid rgba(59, 130, 246, 0.3);
    }
    
    .tab-button {
      transition: all 0.3s ease;
      color: #94a3b8;
    }
    
    .tab-button:hover:not(.active-tab) {
      background-color: rgba(30, 58, 138, 0.3);
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
    
    .animate-gradient {
      background-size: 200% 200%;
      animation: gradientAnimation 5s ease infinite;
    }
    
    @keyframes gradientAnimation {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
    }
  </style>
</head>
<body class="text-gray-100">
  <div class="registration-container">
    <div class="glass-card rounded-xl p-6 w-full max-w-md animate-gradient" style="background: linear-gradient(135deg, rgba(15, 23, 42, 0.9) 0%, rgba(30, 58, 138, 0.9) 100%);">
      <div class="text-center mb-6">
        <div class="inline-block p-3 rounded-full bg-gradient-to-r from-blue-800 to-blue-600 mb-3">
          <i class="fas fa-user-plus text-2xl text-white"></i>
        </div>
        <h2 class="text-2xl font-bold text-white text-glow">Daftar Akun</h2>
        <p class="mt-1 text-blue-200 text-sm">Isi formulir dengan lengkap untuk mendaftar</p>
      </div>
      
      <!-- Registration Options Tabs -->
      <div class="flex rounded-lg overflow-hidden bg-slate-800 p-1 mb-4">
        <button id="siswa-tab" type="button" class="tab-button flex-1 py-2 px-3 text-sm font-medium rounded-md transition-all active-tab">
          Siswa/i
        </button>
        <button id="pembimbing-tab" type="button" class="tab-button flex-1 py-2 px-3 text-sm font-medium rounded-md transition-all">
          Pembimbing
        </button>
      </div>
      
      <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <input type="hidden" name="register_option" id="register_option" value="siswa">

        <!-- Formulir Siswa/i -->
        <div id="siswa-form" class="space-y-4">
          <div>
            <label for="full_name" class="block text-sm font-medium text-blue-200 mb-1">Nama Lengkap</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-user text-blue-400 text-sm"></i>
              </div>
              <input id="full_name" name="full_name" type="text" value="{{ old('full_name') }}" class="custom-input pl-10 block w-full py-2 px-3 rounded-lg text-sm focus:outline-none" required>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label for="birth_date" class="block text-sm font-medium text-blue-200 mb-1">Tanggal Lahir</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-calendar text-blue-400 text-sm"></i>
                </div>
                <input id="birth_date" name="birth_date" type="date" value="{{ old('birth_date') }}" class="custom-input pl-10 block w-full py-2 px-3 rounded-lg text-sm focus:outline-none" required>
              </div>
            </div>

            <div>
              <label for="nik" class="block text-sm font-medium text-blue-200 mb-1">NIK Peserta</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-id-card text-blue-400 text-sm"></i>
                </div>
                <input id="nik" name="nik" type="text" value="{{ old('nik') }}" class="custom-input pl-10 block w-full py-2 px-3 rounded-lg text-sm focus:outline-none" required>
              </div>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label for="major" class="block text-sm font-medium text-blue-200 mb-1">Jurusan</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-graduation-cap text-blue-400 text-sm"></i>
                </div>
                <select name="major" id="major" class="custom-input pl-10 block w-full py-2 px-3 border border-gray-300 bg-slate-800 rounded-lg text-sm focus:outline-none" required>
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

            <div>
              <label for="PT" class="block text-sm font-medium text-blue-200 mb-1">Perusahaan</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-building text-blue-400 text-sm"></i>
                </div>
                <select name="PT" id="PT" class="custom-input pl-10 block w-full py-2 px-3 border border-gray-300 bg-slate-800 rounded-lg text-sm focus:outline-none" required>
                  <option value="" disabled {{ old('PT') == '' ? 'selected' : '' }}>Pilih Perusahaan</option>
                  <option value="Perusahaan A" {{ old('PT') == 'Perusahaan A' ? 'selected' : '' }}>Perusahaan A</option>
                  <option value="Perusahaan B" {{ old('PT') == 'Perusahaan B' ? 'selected' : '' }}>Perusahaan B</option>
                  <option value="Perusahaan C" {{ old('PT') == 'Perusahaan C' ? 'selected' : '' }}>Perusahaan C</option>
                  <option value="Perusahaan D" {{ old('PT') == 'Perusahaan D' ? 'selected' : '' }}>Perusahaan D</option>
                </select>
              </div>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label for="phone_number" class="block text-sm font-medium text-blue-200 mb-1">No Telepon</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-phone text-blue-400 text-sm"></i>
                </div>
                <input id="phone_number" name="phone_number" type="text" value="{{ old('phone_number') }}" class="custom-input pl-10 block w-full py-2 px-3 rounded-lg text-sm focus:outline-none" required>
              </div>
            </div>

            <div>
              <label for="location_pkl" class="block text-sm font-medium text-blue-200 mb-1">Lokasi PKL</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-map-marker-alt text-blue-400 text-sm"></i>
                </div>
                <input id="location_pkl" name="location_pkl" type="text" value="{{ old('location_pkl') }}" class="custom-input pl-10 block w-full py-2 px-3 rounded-lg text-sm focus:outline-none" required>
              </div>
            </div>
          </div>
        </div>

        <!-- Formulir Pembimbing PKL -->
        <div id="pembimbing-form" class="space-y-4" style="display: none;">
          <div>
            <label for="supervisor_name" class="block text-sm font-medium text-blue-200 mb-1">Nama Pembimbing</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-user-tie text-blue-400 text-sm"></i>
              </div>
              <input id="supervisor_name" name="supervisor_name" type="text" value="{{ old('supervisor_name') }}" class="custom-input pl-10 block w-full py-2 px-3 rounded-lg text-sm focus:outline-none">
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label for="nip" class="block text-sm font-medium text-blue-200 mb-1">NIP Pembimbing</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-id-badge text-blue-400 text-sm"></i>
                </div>
                <input id="nip" name="nip" type="text" value="{{ old('nip') }}" class="custom-input pl-10 block w-full py-2 px-3 rounded-lg text-sm focus:outline-none">
              </div>
            </div>

            <div>
              <label for="birth_date_pembimbing" class="block text-sm font-medium text-blue-200 mb-1">Tanggal Lahir</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-calendar text-blue-400 text-sm"></i>
                </div>
                <input id="birth_date_pembimbing" name="birth_date_pembimbing" type="date" value="{{ old('birth_date_pembimbing') }}" class="custom-input pl-10 block w-full py-2 px-3 rounded-lg text-sm focus:outline-none">
              </div>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label for="rank" class="block text-sm font-medium text-blue-200 mb-1">Pangkat</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-medal text-blue-400 text-sm"></i>
                </div>
                <input id="rank" name="rank" type="text" value="{{ old('rank') }}" class="custom-input pl-10 block w-full py-2 px-3 rounded-lg text-sm focus:outline-none">
              </div>
            </div>

            <div>
              <label for="phone_number_pembimbing" class="block text-sm font-medium text-blue-200 mb-1">No Telepon</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-phone text-blue-400 text-sm"></i>
                </div>
                <input id="phone_number_pembimbing" name="phone_number_pembimbing" type="text" value="{{ old('phone_number_pembimbing') }}" class="custom-input pl-10 block w-full py-2 px-3 rounded-lg text-sm focus:outline-none">
              </div>
            </div>
          </div>

          <div>
            <label for="company_address" class="block text-sm font-medium text-blue-200 mb-1">Alamat Perusahaan</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-building text-blue-400 text-sm"></i>
              </div>
              <input id="company_address" name="company_address" type="text" value="{{ old('company_address') }}" class="custom-input pl-10 block w-full py-2 px-3 rounded-lg text-sm focus:outline-none">
            </div>
          </div>
        </div>

        <!-- Common Fields -->
        <div class="space-y-4 pt-4 border-t border-slate-700">
          <div>
            <label for="email" class="block text-sm font-medium text-blue-200 mb-1">Email</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-envelope text-blue-400 text-sm"></i>
              </div>
              <input id="email" name="email" type="email" value="{{ old('email') }}" class="custom-input pl-10 block w-full py-2 px-3 rounded-lg text-sm focus:outline-none" required>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label for="password" class="block text-sm font-medium text-blue-200 mb-1">Password</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-lock text-blue-400 text-sm"></i>
                </div>
                <input id="password" name="password" type="password" class="custom-input pl-10 block w-full py-2 px-3 rounded-lg text-sm focus:outline-none" required>
              </div>
            </div>

            <div>
              <label for="password_confirmation" class="block text-sm font-medium text-blue-200 mb-1">Konfirmasi</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-lock text-blue-400 text-sm"></i>
                </div>
                <input id="password_confirmation" name="password_confirmation" type="password" class="custom-input pl-10 block w-full py-2 px-3 rounded-lg text-sm focus:outline-none" required>
              </div>
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

  <script>
    $(document).ready(function() {
      const registerOption = $('#register_option');
      const siswaForm = $('#siswa-form');
      const pembimbingForm = $('#pembimbing-form');
      const siswaTab = $('#siswa-tab');
      const pembimbingTab = $('#pembimbing-tab');
  
      function setActiveTab(tab) {
        // Remove active class from all tabs
        [siswaTab, pembimbingTab].forEach(function(el) {
          $(el).removeClass('active-tab');
          $(el).addClass('text-blue-200 hover:bg-slate-700');
        });
        
        // Add active class to selected tab
        $(tab).addClass('active-tab');
        $(tab).removeClass('text-blue-200 hover:bg-slate-700');
      }
      
      function toggleForms(option) {
        registerOption.val(option);
        
        if (option === 'siswa') {
          siswaForm.show();
          pembimbingForm.hide();
          setActiveTab(siswaTab);
  
          // Remove required attribute from pembimbing form
          $('#pembimbing-form input, #pembimbing-form select').each(function() {
            $(this).removeAttr('required');
          });
  
          // Add required attribute to siswa form
          $('#siswa-form input, #siswa-form select').each(function() {
            $(this).attr('required', 'required');
          });
  
        } else if (option === 'pembimbingpkl') {
          pembimbingForm.show();
          siswaForm.hide();
          setActiveTab(pembimbingTab);
  
          // Remove required attribute from siswa form
          $('#siswa-form input, #siswa-form select').each(function() {
            $(this).removeAttr('required');
          });
  
          // Add required attribute to pembimbing form
          $('#pembimbing-form input, #pembimbing-form select').each(function() {
            $(this).attr('required', 'required');
          });
        }
      }
  
      // Add event listeners for tab buttons
      siswaTab.on('click', function() {
        toggleForms('siswa');
      });
      
      pembimbingTab.on('click', function() {
        toggleForms('pembimbingpkl');
      });
      
      // Set initial form
      toggleForms('siswa');
    });
  </script>
</body>
</html>