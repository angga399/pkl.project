<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-xl shadow-xl">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-indigo-700">Daftar Akun</h2>
                <p class="mt-2 text-sm text-gray-500">Isi formulir dengan lengkap untuk mendaftar</p>
            </div>
            
            <!-- Registration Options Tabs -->
            <div class="flex rounded-lg overflow-hidden bg-gray-100 p-1">
                <button id="siswa-tab" type="button" class="flex-1 py-2 px-4 text-sm font-medium rounded-md transition-all active-tab">
                    Siswa/i
                </button>
                <button id="pembimbing-tab" type="button" class="flex-1 py-2 px-4 text-sm font-medium rounded-md transition-all">
                    Pembimbing PKL
                </button>
            </div>
            
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <input type="hidden" name="register_option" id="register_option" value="siswa">

                <!-- Formulir Siswa/i -->
                <div id="siswa-form" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="full_name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                                <input id="full_name" name="full_name" type="text" value="{{ old('full_name') }}" class="pl-10 block w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>
                        </div>

                        <div>
                            <label for="birth_date" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-calendar text-gray-400"></i>
                                </div>
                                <input id="birth_date" name="birth_date" type="date" value="{{ old('birth_date') }}" class="pl-10 block w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="nik" class="block text-sm font-medium text-gray-700">NIK Peserta Didik</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-id-card text-gray-400"></i>
                            </div>
                            <input id="nik" name="nik" type="text" value="{{ old('nik') }}" class="pl-10 block w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="major" class="block text-sm font-medium text-gray-700">Jurusan</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-graduation-cap text-gray-400"></i>
                                </div>
                                <select name="major" id="major" class="pl-10 block w-full py-2 px-3 border border-gray-300 bg-white rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
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
                            <label for="PT" class="block text-sm font-medium text-gray-700">Perusahaan</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-building text-gray-400"></i>
                                </div>
                                <select name="PT" id="PT" class="pl-10 block w-full py-2 px-3 border border-gray-300 bg-white rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
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
                            <label for="phone_number" class="block text-sm font-medium text-gray-700">No Telepon</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-phone text-gray-400"></i>
                                </div>
                                <input id="phone_number" name="phone_number" type="text" value="{{ old('phone_number') }}" class="pl-10 block w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>
                        </div>

                        <div>
                            <label for="location_pkl" class="block text-sm font-medium text-gray-700">Lokasi PKL</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-map-marker-alt text-gray-400"></i>
                                </div>
                                <input id="location_pkl" name="location_pkl" type="text" value="{{ old('location_pkl') }}" class="pl-10 block w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulir Pembimbing PKL -->
                <div id="pembimbing-form" class="space-y-4" style="display: none;">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="supervisor_name" class="block text-sm font-medium text-gray-700">Nama Pembimbing</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user-tie text-gray-400"></i>
                                </div>
                                <input id="supervisor_name" name="supervisor_name" type="text" value="{{ old('supervisor_name') }}" class="pl-10 block w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div>
                            <label for="nip" class="block text-sm font-medium text-gray-700">NIP Pembimbing</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-id-badge text-gray-400"></i>
                                </div>
                                <input id="nip" name="nip" type="text" value="{{ old('nip') }}" class="pl-10 block w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="birth_date_pembimbing" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-calendar text-gray-400"></i>
                                </div>
                                <input id="birth_date_pembimbing" name="birth_date_pembimbing" type="date" value="{{ old('birth_date_pembimbing') }}" class="pl-10 block w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div>
                            <label for="rank" class="block text-sm font-medium text-gray-700">Pangkat Pembimbing</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-medal text-gray-400"></i>
                                </div>
                                <input id="rank" name="rank" type="text" value="{{ old('rank') }}" class="pl-10 block w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="company_address" class="block text-sm font-medium text-gray-700">Alamat Perusahaan</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-building text-gray-400"></i>
                            </div>
                            <input id="company_address" name="company_address" type="text" value="{{ old('company_address') }}" class="pl-10 block w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="phone_number_pembimbing" class="block text-sm font-medium text-gray-700">No Telepon</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-phone text-gray-400"></i>
                            </div>
                            <input id="phone_number_pembimbing" name="phone_number_pembimbing" type="text" value="{{ old('phone_number_pembimbing') }}" class="pl-10 block w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>
                </div>

                <!-- Common Fields -->
                <div class="space-y-4 pt-4 border-t border-gray-200">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" class="pl-10 block w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="password" name="password" type="password" class="pl-10 block w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="password_confirmation" name="password_confirmation" type="password" class="pl-10 block w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-indigo-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-150">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <i class="fas fa-user-plus text-indigo-300 group-hover:text-indigo-200"></i>
                        </span>
                        Daftar Sekarang
                    </button>
                </div>

                <div class="text-center text-sm text-gray-500">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Masuk disini
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const registerOption = document.getElementById('register_option');
            const siswaForm = document.getElementById('siswa-form');
            const pembimbingForm = document.getElementById('pembimbing-form');
            const siswaTab = document.getElementById('siswa-tab');
            const pembimbingTab = document.getElementById('pembimbing-tab');
    
            function setActiveTab(tab) {
                // Remove active class from all tabs
                [siswaTab, pembimbingTab].forEach(el => {
                    el.classList.remove('bg-white', 'text-indigo-700', 'shadow-sm', 'active-tab');
                    el.classList.add('text-gray-700', 'hover:bg-gray-200');
                });
                
                // Add active class to selected tab
                tab.classList.add('bg-white', 'text-indigo-700', 'shadow-sm', 'active-tab');
                tab.classList.remove('text-gray-700', 'hover:bg-gray-200');
            }
            
            function toggleForms(option) {
                registerOption.value = option;
                
                if (option === 'siswa') {
                    siswaForm.style.display = 'block';
                    pembimbingForm.style.display = 'none';
                    setActiveTab(siswaTab);
    
                    // Hapus atribut required dari form pembimbing
                    document.querySelectorAll('#pembimbing-form input, #pembimbing-form select').forEach(function (el) {
                        el.removeAttribute('required');
                    });
    
                    // Tambahkan atribut required ke form siswa
                    document.querySelectorAll('#siswa-form input, #siswa-form select').forEach(function (el) {
                        el.setAttribute('required', 'required');
                    });
    
                } else if (option === 'pembimbingpkl') {
                    pembimbingForm.style.display = 'block';
                    siswaForm.style.display = 'none';
                    setActiveTab(pembimbingTab);
    
                    // Hapus atribut required dari form siswa
                    document.querySelectorAll('#siswa-form input, #siswa-form select').forEach(function (el) {
                        el.removeAttribute('required');
                    });
    
                    // Tambahkan atribut required ke form pembimbing
                    document.querySelectorAll('#pembimbing-form input, #pembimbing-form select').forEach(function (el) {
                        el.setAttribute('required', 'required');
                    });
                }
            }
    
            // Add event listeners for tab buttons
            siswaTab.addEventListener('click', () => toggleForms('siswa'));
            pembimbingTab.addEventListener('click', () => toggleForms('pembimbingpkl'));
            
            // Set initial styles
            setActiveTab(siswaTab);
            
            // Add some initial styles
            document.head.insertAdjacentHTML('beforeend', `
                <style>
                    .active-tab {
                        background-color: white;
                        color: #4338ca;
                        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
                    }
                    
                    input:focus, select:focus {
                        border-color: #6366f1;
                        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
                    }
                    
                    .bg-gradient-to-br {
                        background-image: linear-gradient(to bottom right, var(--tw-gradient-stops));
                    }
                    
                    button:hover {
                        transform: translateY(-1px);
                    }
                    
                    input, select {
                        transition: all 0.2s ease;
                    }
                </style>
            `);
            
            // Run on page load to show the correct form
            toggleForms('siswa');
        });
    </script>
</x-guest-layout>