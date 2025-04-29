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
      background: linear-gradient(135deg, #EEF2FF 0%, #C7D2FE 100%);
      min-height: 100vh;
      font-family: 'Segoe UI', system-ui, sans-serif;
    }

    .glass-card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.1);
    }

    .custom-input {
      transition: all 0.3s ease;
      border: 2px solid #e2e8f0;
    }

    .custom-input:focus {
      border-color: #4F46E5;
      box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
    }

    .custom-button {
      background: linear-gradient(45deg, #4F46E5, #6366F1);
      transition: all 0.3s ease;
    }

    .custom-button:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
    }

    .active-tab {
      background-color: white;
      color: #4338ca;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
    
    .tab-button {
      transition: all 0.3s ease;
    }
    
    .tab-button:hover:not(.active-tab) {
      background-color: rgba(79, 70, 229, 0.1);
    }
    
    .registration-container {
      display: flex;
      min-height: 100vh;
      justify-content: center;
      align-items: center;
      padding: 2rem;
    }
    
    .registration-card {
      width: 100%;
      max-width: 900px;
    }
    
    @media (max-width: 768px) {
      .registration-card {
        max-width: 600px;
      }
    }
  </style>
</head>
<body class="text-gray-800">
  <div class="registration-container">
    <div class="registration-card glass-card rounded-xl p-8 shadow-lg">
      <div class="text-center mb-8">
        <h2 class="text-4xl font-bold text-indigo-700">Daftar Akun</h2>
        <p class="mt-2 text-gray-500">Isi formulir dengan lengkap untuk mendaftar</p>
      </div>
      
      <!-- Registration Options Tabs -->
      <div class="flex rounded-lg overflow-hidden bg-gray-100 p-1 mb-6 max-w-md mx-auto">
        <button id="siswa-tab" type="button" class="tab-button flex-1 py-3 px-4 text-base font-medium rounded-md transition-all active-tab">
          Siswa/i
        </button>
        <button id="pembimbing-tab" type="button" class="tab-button flex-1 py-3 px-4 text-base font-medium rounded-md transition-all text-gray-700 hover:bg-gray-200">
          Pembimbing PKL
        </button>
      </div>
      
      <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <input type="hidden" name="register_option" id="register_option" value="siswa">

        <!-- Formulir Siswa/i -->
        <div id="siswa-form" class="space-y-6">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
              <div class="relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-user text-gray-400"></i>
                </div>
                <input id="full_name" name="full_name" type="text" value="{{ old('full_name') }}" class="custom-input pl-10 block w-full py-3 px-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none sm:text-sm" required>
              </div>
            </div>

            <div>
              <label for="birth_date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
              <div class="relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-calendar text-gray-400"></i>
                </div>
                <input id="birth_date" name="birth_date" type="date" value="{{ old('birth_date') }}" class="custom-input pl-10 block w-full py-3 px-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none sm:text-sm" required>
              </div>
            </div>
          </div>

          <div>
            <label for="nik" class="block text-sm font-medium text-gray-700 mb-1">NIK Peserta Didik</label>
            <div class="relative rounded-md shadow-sm">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-id-card text-gray-400"></i>
              </div>
              <input id="nik" name="nik" type="text" value="{{ old('nik') }}" class="custom-input pl-10 block w-full py-3 px-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none sm:text-sm" required>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="major" class="block text-sm font-medium text-gray-700 mb-1">Jurusan</label>
              <div class="relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-graduation-cap text-gray-400"></i>
                </div>
                <select name="major" id="major" class="custom-input pl-10 block w-full py-3 px-4 border border-gray-300 bg-white rounded-lg shadow-sm focus:outline-none sm:text-sm" required>
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
              <label for="PT" class="block text-sm font-medium text-gray-700 mb-1">Perusahaan</label>
              <div class="relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-building text-gray-400"></i>
                </div>
                <select name="PT" id="PT" class="custom-input pl-10 block w-full py-3 px-4 border border-gray-300 bg-white rounded-lg shadow-sm focus:outline-none sm:text-sm" required>
                  <option value="" disabled {{ old('PT') == '' ? 'selected' : '' }}>Pilih Perusahaan</option>
                  <option value="Perusahaan A" {{ old('PT') == 'Perusahaan A' ? 'selected' : '' }}>Perusahaan A</option>
                  <option value="Perusahaan B" {{ old('PT') == 'Perusahaan B' ? 'selected' : '' }}>Perusahaan B</option>
                  <option value="Perusahaan C" {{ old('PT') == 'Perusahaan C' ? 'selected' : '' }}>Perusahaan C</option>
                  <option value="Perusahaan D" {{ old('PT') == 'Perusahaan D' ? 'selected' : '' }}>Perusahaan D</option>
                </select>
              </div>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-1">No Telepon</label>
              <div class="relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-phone text-gray-400"></i>
                </div>
                <input id="phone_number" name="phone_number" type="text" value="{{ old('phone_number') }}" class="custom-input pl-10 block w-full py-3 px-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none sm:text-sm" required>
              </div>
            </div>

            <div>
              <label for="location_pkl" class="block text-sm font-medium text-gray-700 mb-1">Lokasi PKL</label>
              <div class="relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-map-marker-alt text-gray-400"></i>
                </div>
                <input id="location_pkl" name="location_pkl" type="text" value="{{ old('location_pkl') }}" class="custom-input pl-10 block w-full py-3 px-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none sm:text-sm" required>
              </div>
            </div>
          </div>
        </div>

        <!-- Formulir Pembimbing PKL -->
        <div id="pembimbing-form" class="space-y-6" style="display: none;">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="supervisor_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Pembimbing</label>
              <div class="relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-user-tie text-gray-400"></i>
                </div>
                <input id="supervisor_name" name="supervisor_name" type="text" value="{{ old('supervisor_name') }}" class="custom-input pl-10 block w-full py-3 px-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none sm:text-sm">
              </div>
            </div>

            <div>
              <label for="nip" class="block text-sm font-medium text-gray-700 mb-1">NIP Pembimbing</label>
              <div class="relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-id-badge text-gray-400"></i>
                </div>
                <input id="nip" name="nip" type="text" value="{{ old('nip') }}" class="custom-input pl-10 block w-full py-3 px-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none sm:text-sm">
              </div>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="birth_date_pembimbing" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
              <div class="relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-calendar text-gray-400"></i>
                </div>
                <input id="birth_date_pembimbing" name="birth_date_pembimbing" type="date" value="{{ old('birth_date_pembimbing') }}" class="custom-input pl-10 block w-full py-3 px-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none sm:text-sm">
              </div>
            </div>

            <div>
              <label for="rank" class="block text-sm font-medium text-gray-700 mb-1">Pangkat Pembimbing</label>
              <div class="relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-medal text-gray-400"></i>
                </div>
                <input id="rank" name="rank" type="text" value="{{ old('rank') }}" class="custom-input pl-10 block w-full py-3 px-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none sm:text-sm">
              </div>
            </div>
          </div>

          <div>
            <label for="company_address" class="block text-sm font-medium text-gray-700 mb-1">Alamat Perusahaan</label>
            <div class="relative rounded-md shadow-sm">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-building text-gray-400"></i>
              </div>
              <input id="company_address" name="company_address" type="text" value="{{ old('company_address') }}" class="custom-input pl-10 block w-full py-3 px-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none sm:text-sm">
            </div>
          </div>

          <div>
            <label for="phone_number_pembimbing" class="block text-sm font-medium text-gray-700 mb-1">No Telepon</label>
            <div class="relative rounded-md shadow-sm">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-phone text-gray-400"></i>
              </div>
              <input id="phone_number_pembimbing" name="phone_number_pembimbing" type="text" value="{{ old('phone_number_pembimbing') }}" class="custom-input pl-10 block w-full py-3 px-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none sm:text-sm">
            </div>
          </div>
        </div>

        <!-- Common Fields -->
        <div class="space-y-6 pt-6 border-t border-gray-200">
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <div class="relative rounded-md shadow-sm">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-envelope text-gray-400"></i>
              </div>
              <input id="email" name="email" type="email" value="{{ old('email') }}" class="custom-input pl-10 block w-full py-3 px-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none sm:text-sm" required>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
              <div class="relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-lock text-gray-400"></i>
                </div>
                <input id="password" name="password" type="password" class="custom-input pl-10 block w-full py-3 px-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none sm:text-sm" required>
              </div>
            </div>

            <div>
              <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
              <div class="relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-lock text-gray-400"></i>
                </div>
                <input id="password_confirmation" name="password_confirmation" type="password" class="custom-input pl-10 block w-full py-3 px-4 border border-gray-300 rounded-lg shadow-sm focus:outline-none sm:text-sm" required>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-8">
          <button type="submit" class="custom-button relative w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-150">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <i class="fas fa-user-plus text-indigo-300 group-hover:text-indigo-200"></i>
            </span>
            Daftar Sekarang
          </button>
        </div>

        <div class="text-center text-sm text-gray-500 pt-4">
          Sudah punya akun? 
          <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 transition-colors">
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
          $(el).removeClass('active-tab bg-white text-indigo-700 shadow-sm');
          $(el).addClass('text-gray-700 hover:bg-gray-200');
        });
        
        // Add active class to selected tab
        $(tab).addClass('active-tab bg-white text-indigo-700 shadow-sm');
        $(tab).removeClass('text-gray-700 hover:bg-gray-200');
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