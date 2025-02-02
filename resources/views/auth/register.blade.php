<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Pilihan Jenis Pendaftaran -->
        <div>
            <x-input-label for="register_option" :value="__('Pilih Jenis Pendaftaran')" />
            <select name="register_option" id="register_option" required>
                <option value="siswa" {{ old('register_option') == 'siswa' ? 'selected' : '' }}>Siswa/i</option>
                <option value="pembimbingpkl" {{ old('register_option') == 'pembimbingpkl' ? 'selected' : '' }}>Pembimbing PKL</option>
            </select>
        </div>

        <!-- Formulir Siswa/i -->
        <div id="siswa-form" style="display: none;">
            <x-input-label for="full_name" :value="__('Nama Lengkap')" />
            <x-text-input id="full_name" name="full_name" type="text" value="{{ old('full_name') }}" required />

            <x-input-label for="birth_date" :value="__('Tempat, Tanggal Lahir')" />
            <x-text-input id="birth_date" name="birth_date" type="date" value="{{ old('birth_date') }}" required />

            <x-input-label for="nik" :value="__('NIK Peserta Didik')" />
            <x-text-input id="nik" name="nik" type="text" value="{{ old('nik') }}" required />

            <x-input-label for="major" :value="__('Jurusan')" />
            <select name="major" id="major" required>
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
            

            <x-input-label for="phone_number" :value="__('No Telepon')" />
            <x-text-input id="phone_number" name="phone_number" type="text" value="{{ old('phone_number') }}" required />

            <x-input-label for="location_pkl" :value="__('Lokasi PKL')" />
            <x-text-input id="location_pkl" name="location_pkl" type="text" value="{{ old('location_pkl') }}" required />
        </div>

        <!-- Formulir Pembimbing PKL -->
        <div id="pembimbing-form" style="display: none;">
            <x-input-label for="supervisor_name" :value="__('Nama Pembimbing')" />
            <x-text-input id="supervisor_name" name="supervisor_name" type="text" value="{{ old('supervisor_name') }}" required />

            <x-input-label for="nip" :value="__('NIP Pembimbing')" />
            <x-text-input id="nip" name="nip" type="text" value="{{ old('nip') }}" required />

            <x-input-label for="birth_date_pembimbing" :value="__('Tempat, Tanggal Lahir Pembimbing')" />
            <x-text-input id="birth_date_pembimbing" name="birth_date_pembimbing" type="date" value="{{ old('birth_date_pembimbing') }}" required />

            <x-input-label for="rank" :value="__('Pangkat Pembimbing')" />
            <x-text-input id="rank" name="rank" type="text" value="{{ old('rank') }}" required />

            <x-input-label for="company_address" :value="__('Alamat Perusahaan')" />
            <x-text-input id="company_address" name="company_address" type="text" value="{{ old('company_address') }}" required />

            <x-input-label for="phone_number_pembimbing" :value="__('No Telepon Pembimbing')" />
            <x-text-input id="phone_number_pembimbing" name="phone_number_pembimbing" type="text" value="{{ old('phone_number_pembimbing') }}" required />
        </div>

        <!-- Email -->
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" name="email" type="email" value="{{ old('email') }}" required />

        <!-- Password -->
        <x-input-label for="password" :value="__('Password')" />
        <x-text-input id="password" name="password" type="password" required />

        <!-- Konfirmasi Password -->
        <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
        <x-text-input id="password_confirmation" name="password_confirmation" type="password" required />

        <x-primary-button>{{ __('Register') }}</x-primary-button>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var registerOption = document.getElementById('register_option');
            var siswaForm = document.getElementById('siswa-form');
            var pembimbingForm = document.getElementById('pembimbing-form');
    
            function toggleForms() {
                if (registerOption.value === 'siswa') {
                    siswaForm.style.display = 'block';
                    pembimbingForm.style.display = 'none';
    
                    // Hapus atribut required dari form pembimbing
                    document.querySelectorAll('#pembimbing-form input, #pembimbing-form select').forEach(function (el) {
                        el.removeAttribute('required');
                    });
    
                    // Tambahkan atribut required ke form siswa
                    document.querySelectorAll('#siswa-form input, #siswa-form select').forEach(function (el) {
                        el.setAttribute('required', 'required');
                    });
    
                } else if (registerOption.value === 'pembimbingpkl') {
                    pembimbingForm.style.display = 'block';
                    siswaForm.style.display = 'none';
    
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
    
            registerOption.addEventListener('change', toggleForms);
    
            // Jalankan saat halaman dimuat
            toggleForms();
        });
    </script>
    
</x-guest-layout>
