<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pembimbing PKL</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .input-glow:focus {
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1), 0 0 20px rgba(99, 102, 241, 0.2);
        }
        
        .floating-label {
            transition: all 0.3s ease;
        }
        
        .input-container:focus-within .floating-label {
            transform: translateY(-12px) scale(0.85);
            color: #6366f1;
        }
        
        .input-container input:not(:placeholder-shown) + .floating-label,
        .input-container select:not([value=""]) + .floating-label {
            transform: translateY(-12px) scale(0.85);
            color: #6366f1;
        }
        
        .btn-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        .animate-float-delayed {
            animation: float 6s ease-in-out infinite 2s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(3deg); }
        }
        
        .form-appear {
            animation: slideUp 0.8s ease-out;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .stagger-animation {
            animation: stagger 0.6s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }
        
        @keyframes stagger {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="min-h-screen bg-gray-900 relative overflow-x-hidden">
    <!-- Background Elements -->
    <div class="fixed inset-0 z-0">
        <div class="absolute top-10 left-10 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-float"></div>
        <div class="absolute top-40 right-10 w-72 h-72 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-float-delayed"></div>
        <div class="absolute -bottom-32 left-1/2 transform -translate-x-1/2 w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl opacity-10"></div>
    </div>
    
    <!-- Particle Effect -->
    <div class="fixed inset-0 z-0" id="particles"></div>
    
    <div class="relative z-10 min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-2xl">
            <!-- Header -->
            <div class="text-center mb-8 form-appear">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2">Registrasi Pembimbing PKL</h1>
                <p class="text-gray-400">Silakan lengkapi data diri Anda untuk mendaftar sebagai pembimbing</p>
            </div>
            
            <!-- Form Container -->
            <div class="glass-effect rounded-3xl p-8 shadow-2xl form-appear">
                <form method="POST" action="{{ route('register') }}" autocomplete="on" class="space-y-6">
                    @csrf
                    <input type="hidden" name="register_option" value="pembimbingpkl">
                    
                    <!-- Form Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Pembimbing -->
                        <div class="input-container relative stagger-animation" style="animation-delay: 0.1s">
                            <input type="text" 
                                   id="supervisor_name" 
                                   name="supervisor_name" 
                                   placeholder=" "
                                   autocomplete="name" 
                                   value="{{ old('supervisor_name') }}"
                                   class="peer w-full bg-gray-800/50 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-transparent focus:outline-none focus:border-indigo-500 input-glow transition-all duration-300" 
                                   required>
                            <label for="supervisor_name" class="floating-label absolute left-4 top-3 text-gray-400 pointer-events-none">Nama Pembimbing</label>
                        </div>

                        <!-- NIP -->
                        <div class="input-container relative stagger-animation" style="animation-delay: 0.2s">
                            <input type="text" 
                                   id="nip" 
                                   name="nip" 
                                   placeholder=" "
                                   autocomplete="off" 
                                   value="{{ old('nip') }}"
                                   class="peer w-full bg-gray-800/50 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-transparent focus:outline-none focus:border-indigo-500 input-glow transition-all duration-300" 
                                   required>
                            <label for="nip" class="floating-label absolute left-4 top-3 text-gray-400 pointer-events-none">NIP</label>
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="input-container relative stagger-animation" style="animation-delay: 0.3s">
                            <input type="date" 
                                   id="birth_date_pembimbing" 
                                   name="birth_date_pembimbing" 
                                   autocomplete="bday" 
                                   value="{{ old('birth_date_pembimbing') }}"
                                   class="w-full bg-gray-800/50 border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500 input-glow transition-all duration-300" 
                                   required>
                            <label for="birth_date_pembimbing" class="absolute left-4 -top-2 text-xs text-indigo-400 bg-gray-900 px-2 rounded">Tanggal Lahir</label>
                        </div>

                        <!-- Pangkat -->
                        <div class="input-container relative stagger-animation" style="animation-delay: 0.4s">
                            <input type="text" 
                                   id="rank" 
                                   name="rank" 
                                   placeholder=" "
                                   value="{{ old('rank') }}"
                                   class="peer w-full bg-gray-800/50 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-transparent focus:outline-none focus:border-indigo-500 input-glow transition-all duration-300" 
                                   required>
                            <label for="rank" class="floating-label absolute left-4 top-3 text-gray-400 pointer-events-none">Pangkat</label>
                        </div>
                    </div>

                    <!-- Perusahaan -->
                    <div class="input-container relative stagger-animation" style="animation-delay: 0.5s">
                        <select id="company_id" 
                                name="company_id" 
                                autocomplete="organization" 
                                class="w-full bg-gray-800/50 border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-indigo-500 input-glow transition-all duration-300" 
                                required>
                            <option value="" class="bg-gray-800">Pilih Perusahaan</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }} class="bg-gray-800">
                                    {{ $company->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="company_id" class="absolute left-4 -top-2 text-xs text-indigo-400 bg-gray-900 px-2 rounded">Perusahaan</label>
                        @error('company_id')
                            <span class="mt-1 text-sm text-red-400 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <!-- Alamat Perusahaan -->
                    <div class="input-container relative stagger-animation" style="animation-delay: 0.6s">
                        <input type="text" 
                               id="company_address" 
                               name="company_address" 
                               placeholder=" "
                               autocomplete="organization-street-address" 
                               value="{{ old('company_address') }}"
                               class="peer w-full bg-gray-800/50 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-transparent focus:outline-none focus:border-indigo-500 input-glow transition-all duration-300" 
                               required>
                        <label for="company_address" class="floating-label absolute left-4 top-3 text-gray-400 pointer-events-none">Alamat Perusahaan</label>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nomor Telepon -->
                        <div class="input-container relative stagger-animation" style="animation-delay: 0.7s">
                            <input type="tel" 
                                   id="phone_number_pembimbing" 
                                   name="phone_number_pembimbing" 
                                   placeholder=" "
                                   autocomplete="tel" 
                                   value="{{ old('phone_number_pembimbing') }}"
                                   class="peer w-full bg-gray-800/50 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-transparent focus:outline-none focus:border-indigo-500 input-glow transition-all duration-300" 
                                   required>
                            <label for="phone_number_pembimbing" class="floating-label absolute left-4 top-3 text-gray-400 pointer-events-none">Nomor Telepon</label>
                        </div>

                        <!-- Email -->
                        <div class="input-container relative stagger-animation" style="animation-delay: 0.8s">
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   placeholder=" "
                                   autocomplete="email" 
                                   value="{{ old('email') }}"
                                   class="peer w-full bg-gray-800/50 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-transparent focus:outline-none focus:border-indigo-500 input-glow transition-all duration-300" 
                                   required>
                            <label for="email" class="floating-label absolute left-4 top-3 text-gray-400 pointer-events-none">Email</label>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Password -->
                        <div class="input-container relative stagger-animation" style="animation-delay: 0.9s">
                            <input type="password" 
                                   id="password" 
                                   name="password" 
                                   placeholder=" "
                                   autocomplete="new-password" 
                                   class="peer w-full bg-gray-800/50 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-transparent focus:outline-none focus:border-indigo-500 input-glow transition-all duration-300" 
                                   required>
                            <label for="password" class="floating-label absolute left-4 top-3 text-gray-400 pointer-events-none">Password (Bebas)</label>
                            <button type="button" class="absolute right-3 top-3 text-gray-400 hover:text-white transition-colors" onclick="togglePassword('password')">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="input-container relative stagger-animation" style="animation-delay: 1s">
                            <input type="password" 
                                   id="password_confirmation" 
                                   name="password_confirmation" 
                                   placeholder=" "
                                   autocomplete="new-password" 
                                   class="peer w-full bg-gray-800/50 border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-transparent focus:outline-none focus:border-indigo-500 input-glow transition-all duration-300" 
                                   required>
                            <label for="password_confirmation" class="floating-label absolute left-4 top-3 text-gray-400 pointer-events-none">Konfirmasi Password</label>
                            <button type="button" class="absolute right-3 top-3 text-gray-400 hover:text-white transition-colors" onclick="togglePassword('password_confirmation')">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4 stagger-animation" style="animation-delay: 1.1s">
                        <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold py-3 px-6 rounded-xl btn-hover focus:outline-none focus:ring-4 focus:ring-indigo-500/50 transition-all duration-300">
                            <span class="flex items-center justify-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                </svg>
                                <span>Daftar Pembimbing</span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Footer -->
            <div class="text-center mt-8 text-gray-400 text-sm">
                <p>Sudah memiliki akun? <a href="#" class="text-indigo-400 hover:text-indigo-300 transition-colors">Masuk di sini</a></p>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
        }

        // Create floating particles
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 50;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'absolute w-1 h-1 bg-white rounded-full opacity-20';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';
                particle.style.animationDuration = (Math.random() * 3 + 2) + 's';
                particle.style.animationDelay = Math.random() * 2 + 's';
                particle.style.animation = 'float ' + particle.style.animationDuration + ' ease-in-out infinite ' + particle.style.animationDelay;
                particlesContainer.appendChild(particle);
            }
        }

        // Initialize particles
        createParticles();

        // Animate form elements on scroll/load
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                }
            });
        });

        document.querySelectorAll('.stagger-animation').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>