<!-- resources/views/profile/details.blade.php -->

<x-layout>
    <div class="max-w-3xl mx-auto p-8">
      <h1 class="text-2xl font-bold mb-6">Detail Akun</h1>
      
      <div class="mb-4">
        <label class="font-semibold">Nama Lengkap</label>
        <p>{{ $user->full_name }}</p>
      </div>
      
      <div class="mb-4">
        <label class="font-semibold">Email</label>
        <p>{{ $user->email }}</p>
      </div>
      
      <div class="mb-4">
        <label class="font-semibold">Tempat, Tanggal Lahir</label>
        <p>{{ $user->birth_date }}</p>
      </div>
      
      <div class="mb-4">
        <label class="font-semibold">NIK</label>
        <p>{{ $user->nik }}</p>
      </div>
      
      <div class="mb-4">
        <label class="font-semibold">Jurusan</label>
        <p>{{ $user->major }}</p>
      </div>

      <div class="mb-4">
        <label class="font-semibold">Perusahaan</label>
        <p>{{ $user->PT }}</p>
      </div>
      
      <div class="mb-4">
        <label class="font-semibold">No Telepon</label>
        <p>{{ $user->phone_number }}</p>
      </div>
      
      <div class="mb-4">
        <label class="font-semibold">Lokasi PKL</label>
        <p>{{ $user->location_pkl }}</p>
      </div>
  
      <div>
        <a href="{{ route('profile.edit') }}" class="text-teal-500">Edit Profil</a>
      </div>
    </div>
  </x-layout>
  