<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Show the registration form.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request)
    {
        // Debug: Tampilkan semua data yang dikirim dari form
        //dd($request->all()); 

        $validated = $request->validate([
            'register_option' => 'required|in:siswa,pembimbingpkl',
            'full_name' => 'required_if:register_option,siswa|nullable',
            'birth_date' => 'required_if:register_option,siswa|nullable|date',
            'nik' => 'required_if:register_option,siswa|nullable',
            'major' => 'required_if:register_option,siswa|nullable',
            'phone_number' => 'required_if:register_option,siswa|nullable',
            'location_pkl' => 'required_if:register_option,siswa|nullable',
            'supervisor_name' => 'required_if:register_option,pembimbingpkl|nullable',
            'nip' => 'required_if:register_option,pembimbingpkl|nullable',
            'birth_date_pembimbing' => 'required_if:register_option,pembimbingpkl|nullable|date',
            'rank' => 'required_if:register_option,pembimbingpkl|nullable',
            'company_address' => 'required_if:register_option,pembimbingpkl|nullable',
            'phone_number_pembimbing' => 'required_if:register_option,pembimbingpkl|nullable',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        // Simpan data ke database
        $user = new User;
        $user->role = $validated['register_option'];
        $user->full_name = $validated['full_name'] ?? $validated['supervisor_name'] ?? null;
        $user->birth_date = $validated['birth_date'] ?? $validated['birth_date_pembimbing'] ?? null;
        $user->nik = $validated['nik'] ?? null;
        $user->major = $validated['major'] ?? null;
        $user->phone_number = $validated['phone_number'] ?? $validated['phone_number_pembimbing']; // Menggunakan phone_number_pembimbing jika ada
        $user->location_pkl = $validated['location_pkl'] ?? null;
        $user->nip = $validated['nip'] ?? null;
        $user->rank = $validated['rank'] ?? null;
        $user->company_address = $validated['company_address'] ?? null;
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->save();

        // **Arahkan semua pengguna ke halaman login setelah registrasi**
        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }
}
