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
        $companies = \App\Models\Company::all(); // Ambil semua data perusahaan
    return view('auth.register', ['companies' => $companies]);
    }

    /**
     * Show the teacher registration form.
     */
    public function createGuru()
    {
        $companies = \App\Models\Company::all();
    return view('auth.register-guru', ['companies' => $companies]);
    }

    /**
 * Show the pembimbing registration form.
 */
public function createPembimbing()
{

    $companies = \App\Models\Company::all();
    return view('auth.register-pembimbing', ['companies' => $companies]);
}



    /**
     * Handle an incoming registration request.
     */
  public function store(Request $request)
{
    try {
        // 1. Tentukan role
        $role = $request->register_option ?? 'siswa'; // Default siswa
        
        // 2. Validasi dasar
        $rules = [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'company_id' => 'required_if:role,siswa,pembimbingpkl|exists:companies,id'
        ];

        // 3. Tambahkan validasi spesifik role
        if ($role === 'siswa') {
            $rules = array_merge($rules, [
                'full_name' => 'required|string|max:255',
                'birth_date' => 'required|date',
                'nik' => 'required|string|max:20',
                'major' => 'required|string',
                'phone_number' => 'required|string|max:15',
                'location_pkl' => 'required|string'
            ]);
        } 
        elseif ($role === 'pembimbingpkl') {
            $rules = array_merge($rules, [
                'supervisor_name' => 'required|string|max:255',
                'nip' => 'required|string|max:20',
                'birth_date_pembimbing' => 'required|date',
                'rank' => 'required|string',
                'company_address' => 'required|string',
                'phone_number_pembimbing' => 'required|string|max:15'
            ]);
        }

        // 4. Jalankan validasi
        $validated = $request->validate($rules);
        \Log::info('Validated Data:', $validated);

        // 5. Siapkan data untuk disimpan
        $userData = [
            'role' => $role,
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'company_id' => $validated['company_id'] ?? null
        ];

        // 6. Tambahkan field spesifik role
        if ($role === 'siswa') {
            $userData = array_merge($userData, [
                'full_name' => $validated['full_name'],
                'birth_date' => $validated['birth_date'],
                'nik' => $validated['nik'],
                'major' => $validated['major'],
                'phone_number' => $validated['phone_number'],
                'location_pkl' => $validated['location_pkl']
            ]);
        } 
        elseif ($role === 'pembimbingpkl') {
            $userData = array_merge($userData, [
                'full_name' => $validated['supervisor_name'],
                'nip' => $validated['nip'],
                'birth_date' => $validated['birth_date_pembimbing'],
                'rank' => $validated['rank'],
                'company_address' => $validated['company_address'],
                'phone_number' => $validated['phone_number_pembimbing']
            ]);
        }

        // 7. Simpan data
        \DB::beginTransaction();
        $user = User::create($userData);
        \DB::commit();

        \Log::info('User created:', ['id' => $user->id]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil!');

    } catch (\Illuminate\Validation\ValidationException $e) {
        \DB::rollBack();
        \Log::error('Validation Error: '.$e->getMessage());
        return back()->withErrors($e->validator)->withInput();
        
    } catch (\Exception $e) {
        \DB::rollBack();
        \Log::error('Registration Error: '.$e->getMessage());
        return back()->with('error', 'Gagal menyimpan data: '.$e->getMessage())->withInput();
    }
}

}