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

// Pastikan data yang dikirim sesuai dengan inputan yang ada
$user = new User;
$user->role = $validated['register_option'];
$user->full_name = $validated['full_name'] ?? null;
$user->birth_date = $validated['birth_date'] ?? null;
$user->nik = $validated['nik'] ?? null;
$user->major = $validated['major'] ?? null;
$user->phone_number = $validated['phone_number'] ?? $validated['phone_number_pembimbing']; // Menggunakan phone_number_pembimbing
$user->location_pkl = $validated['location_pkl'] ?? null;
$user->supervisor_name = $validated['supervisor_name'] ?? null;
$user->nip = $validated['nip'] ?? null;
$user->birth_date_pembimbing = $validated['birth_date_pembimbing'] ?? null;
$user->rank = $validated['rank'] ?? null;
$user->company_address = $validated['company_address'] ?? null;
$user->email = $validated['email'];
$user->password = Hash::make($validated['password']);
$user->save();

    
        // Redirect sesuai role
        if ($user->role === 'siswa') {
            return redirect()->route('welcome')->with('success', 'Registrasi siswa berhasil!');
        } else {
            return redirect()->route('pembimbingpkl')->with('success', 'Registrasi pembimbing PKL berhasil!');
        }
    }
    
    
}
