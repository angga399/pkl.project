<nav class="bg-white/10 backdrop-blur-md text-white fixed w-full top-0 z-50">
  <div class="container mx-auto flex justify-between items-center py-4 px-6">
    <div></div>

    <div class="relative">
      @auth
        <button class="flex items-center space-x-2 text-white cursor-pointer hover:opacity-80 transition-opacity" id="profileDropdownButtonSiswa">
          <i class="fas fa-user-circle text-3xl"></i>
        </button>

        <!-- Dropdown Profile -->
        <div id="profileDropdownSiswa" class="hidden absolute right-0 mt-2 w-56 bg-white/95 backdrop-blur-md shadow-lg rounded-md text-gray-700 z-50 transform transition-all duration-200 ease-in-out">
          <div class="p-4 border-b border-gray-100">
            <p class="font-semibold">{{ auth()->user()->full_name }}</p>
            <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
            <p class="text-sm text-gray-500">{{ auth()->user()->major }}</p>
            <p class="text-sm text-gray-500">{{ auth()->user()->PT }}</p>
            <p class="text-sm text-gray-500">{{ auth()->user()->phone_number }}</p>
            <p class="text-sm text-gray-500">{{ auth()->user()->location_pkl }}</p>
          </div>
          <div class="bg-white/90">
            <a href="{{ route('profile.details') }}" class="block px-4 py-2 text-teal-600 hover:bg-teal-50 transition-colors">Detail Akun</a>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="block w-full text-left px-4 py-2 text-red-600 hover:bg-red-50 transition-colors">Logout</button>
            </form>
          </div>
        </div>
      @else
        <div class="space-x-4">
          <a href="{{ route('login') }}" class="text-white hover:text-gray-200 transition-colors">Login</a>
          <a href="{{ route('register') }}" class="text-white hover:text-gray-200 transition-colors">Register</a>
        </div>
      @endauth
    </div>
  </div>
</nav>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const profileButton = document.getElementById('profileDropdownButtonSiswa');
    const dropdown = document.getElementById('profileDropdownSiswa');

    if (profileButton && dropdown) {
      profileButton.addEventListener('click', function (event) {
        dropdown.classList.toggle('hidden');
        event.stopPropagation();
      });

      // Tambahkan animasi saat dropdown muncul/sembunyi
      dropdown.addEventListener('transitionend', function() {
        if (dropdown.classList.contains('hidden')) {
          dropdown.style.transform = 'translateY(-10px)';
          dropdown.style.opacity = '0';
        } else {
          dropdown.style.transform = 'translateY(0)';
          dropdown.style.opacity = '1';
        }
      });

      document.addEventListener('click', function (event) {
        if (!dropdown.contains(event.target) && !profileButton.contains(event.target)) {
          dropdown.classList.add('hidden');
        }
      });
    }
  });
</script>