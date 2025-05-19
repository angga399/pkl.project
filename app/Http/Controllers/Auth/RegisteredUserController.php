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
     * Show the teacher registration form.
     */
    public function createGuru()
    {
        return view('auth.register-guru');
    }

    /**
 * Show the pembimbing registration form.
 */
public function createPembimbing()
{
    return view('auth.register-pembimbing');
}

    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request)
    {
        // Jika register_option tidak ada (form guru), set default ke 'guru'
        $role = $request->register_option ?? 'guru';
        
        $validationRules = [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ];

        // Tambahkan validasi berdasarkan role
        if ($role === 'siswa') {
            $validationRules = array_merge($validationRules, [
                'full_name' => 'required',
                'birth_date' => 'required|date',
                'major' => 'required',
                'PT' => 'required',
                'phone_number' => 'required',
                'location_pkl' => 'required',
            ]);
        } elseif ($role === 'pembimbingpkl') {
            $validationRules = array_merge($validationRules, [
                'supervisor_name' => 'required',
                'nip' => 'required',
                'birth_date_pembimbing' => 'required|date',
                'rank' => 'required',
                'company_address' => 'required',
                'phone_number_pembimbing' => 'required',
            ]);
        } else { // Untuk guru
            $validationRules = array_merge($validationRules, [
                'full_name' => 'required',
            ]);
        }

        $validated = $request->validate($validationRules);

        // Simpan data ke database
        $user = new User;
        $user->role = $role;
        $user->full_name = $validated['full_name'] ?? $validated['supervisor_name'] ?? null;
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);

        // Isi data khusus role
        if ($role === 'siswa') {
            $user->birth_date = $validated['birth_date'];
            $user->major = $validated['major'];
            $user->PT = $validated['PT'];
            $user->phone_number = $validated['phone_number'];
            $user->location_pkl = $validated['location_pkl'];
        } elseif ($role === 'pembimbingpkl') {
            $user->birth_date = $validated['birth_date_pembimbing'];
            $user->nip = $validated['nip'];
            $user->rank = $validated['rank'];
            $user->company_address = $validated['company_address'];
            $user->phone_number = $validated['phone_number_pembimbing'];
        }
        // Untuk guru tidak perlu field tambahan

        $user->save();

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }
}