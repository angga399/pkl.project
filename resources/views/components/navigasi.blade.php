<nav class="bg-gradient-to-b from-blue-900 to-gray-800 text-white">

  <div class="container mx-auto flex justify-between items-center">
    <div></div> <!-- Kosong, hanya ikon profil di kanan -->

    <div class="relative">
      @auth
        <button class="flex items-center space-x-2 text-white cursor-pointer" id="profileDropdownButtonSiswa">
          <i class="fas fa-user-circle text-3xl"></i>
        </button>

        <!-- Dropdown Profile -->
        <div id="profileDropdownSiswa" class="hidden absolute right-0 mt-2 w-56 bg-white shadow-lg rounded-md text-gray-700 z-50">
          <div class="p-4">
            <p class="font-semibold">{{ auth()->user()->full_name }}</p>
            <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
            <p class="text-sm text-gray-500">{{ auth()->user()->major }}</p> <!-- Jurusan -->
            <p class="text-sm text-gray-500">{{ auth()->user()->PT }}</p> <!-- perusahaan -->
            <p class="text-sm text-gray-500">{{ auth()->user()->phone_number }}</p> <!-- No Telepon -->
            <p class="text-sm text-gray-500">{{ auth()->user()->location_pkl }}</p> <!-- Lokasi PKL -->
          </div>
          <div class="border-t">
            <a href="{{ route('profile.details') }}" class="block px-4 py-2 text-teal-600 hover:bg-gray-100">Detail Akun</a>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="block w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">Logout</button>
            </form>
          </div>
        </div>
      @else
        <a href="{{ route('login') }}" class="text-white px-2">Login</a>
        <a href="{{ route('register') }}" class="text-white px-2">Register</a>
      @endauth
    </div>
  </div>
</nav>

<!-- Script untuk Dropdown -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const profileButton = document.getElementById('profileDropdownButtonSiswa');
    const dropdown = document.getElementById('profileDropdownSiswa');

    if (profileButton) {
      profileButton.addEventListener('click', function (event) {
        dropdown.classList.toggle('hidden');
        event.stopPropagation();
      });

      document.addEventListener('click', function (event) {
        if (!dropdown.contains(event.target) && !profileButton.contains(event.target)) {
          dropdown.classList.add('hidden');
        }
      });
    }
  });
</script>
