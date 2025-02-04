<nav class="bg-gradient-to-r from-[#0a192f] to-[#1c1c1c] p-4">
  <div class="container mx-auto flex justify-between items-center">
    <div></div>

    <div class="relative">
      @auth
        <button class="flex items-center space-x-2 text-white" id="profileDropdownButtonPembimbing">
          <i class="fas fa-user-circle text-4xl"></i>
        </button>

        <!-- Dropdown hanya muncul jika role pembimbing -->
        <div id="profileDropdownPembimbing" 
             class="absolute right-0 mt-2 w-56 bg-white shadow-lg rounded-md text-gray-700 hidden">
          @if(auth()->user()->role === 'pembimbingpkl')
            <div class="p-4">
              <p class="font-semibold">{{ auth()->user()->full_name }}</p>
              <p class="text-sm">{{ auth()->user()->email }}</p>
              <p class="text-sm">{{ auth()->user()->rank }}</p> <!-- Pangkat/Jabatan -->
              <p class="text-sm">{{ auth()->user()->phone_number }}</p> <!-- No Telepon -->
              <p class="text-sm">{{ auth()->user()->company_address }}</p> <!-- Alamat Perusahaan -->
            </div>
            <div class="border-t">
              <a href="{{ route('profile.details') }}" class="block px-4 py-2 text-teal-600 hover:bg-gray-100">Detail Akun</a>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">Logout</button>
              </form>
            </div>
          @else
            <div class="p-4">
              <p class="font-semibold text-center text-gray-500">Anda bukan pembimbing PKL</p>
            </div>
          @endif
        </div>
      @else
        <a href="{{ route('login') }}" class="text-white">Login</a>
        <a href="{{ route('register') }}" class="text-white">Register</a>
      @endauth
    </div>
  </div>
</nav>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const profileButton = document.getElementById('profileDropdownButtonPembimbing');
    const dropdown = document.getElementById('profileDropdownPembimbing');

    if (profileButton) {
      profileButton.addEventListener('click', function (event) {
        dropdown.classList.toggle('hidden'); // Toggle dropdown
        event.stopPropagation();
      });

      document.addEventListener('click', function (event) {
        if (!profileButton.contains(event.target) && !dropdown.contains(event.target)) {
          dropdown.classList.add('hidden'); // Sembunyikan jika klik di luar
        }
      });
    }
  });
</script>
