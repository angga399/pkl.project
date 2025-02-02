<nav class="bg-gradient-to-r from-[#0a192f] to-[#1c1c1c] p-4">
    <div class="container mx-auto flex justify-between items-center">
      <div></div>
      <div class="relative">
        @auth
          <button class="flex items-center space-x-2 text-white" id="profileDropdownButton">
            <i class="fas fa-user-circle text-4xl"></i>  <!-- Ikon Font Awesome dengan ukuran lebih besar -->
          </button>
          <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md text-gray-700">
            <div class="p-4">
              <p class="font-semibold">{{ auth()->user()->supervisor_name }}</p>
              <p class="text-sm">{{ auth()->user()->email }}</p>
              <p class="text-sm">{{ auth()->user()->rank }}</p>
              <p class="text-sm">{{ auth()->user()->phone_number }}</p>
              <p class="text-sm">{{ auth()->user()->company_address }}</p>
            </div>
            <div class="border-t">
              <a href="{{ route('profile.details') }}" class="block px-4 py-2 text-teal-600 hover:bg-gray-100">Detail Akun</a>
              <a href="{{ route('login') }}" class="block px-4 py-2 text-red-600 hover:bg-gray-100">Logout</a>
            </div>
          </div>
        @else
          <a href="{{ route('login') }}" class="text-white">Login</a>
          <a href="{{ route('register') }}" class="text-white">Register</a>
        @endauth
      </div>
    </div>
  </nav>
  
  <script>
    document.getElementById('profileDropdownButton').addEventListener('click', function() {
      const dropdown = document.getElementById('profileDropdown');
      dropdown.classList.toggle('hidden');
    });
  </script>
  