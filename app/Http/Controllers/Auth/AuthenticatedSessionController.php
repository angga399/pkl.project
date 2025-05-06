<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    // Menampilkan form login
    public function create()
    {
        return view('auth.login'); // Pastikan ada view 'auth.login'
    }

    // Menangani login
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Cek kredensial dan login
        if (Auth::attempt($request->only('email', 'password'))) {
            // Ambil data user yang sedang login
            //dd(Auth::user());

            $user = Auth::user();

            // Cek jenis pengguna berdasarkan kolom 'role'
            if ($user->role == 'siswa') {
                return redirect()->route('welcome'); // Ubah ke rute dashboard siswa
            }

            if ($user->role == 'pembimbingpkl') {
                return redirect()->route('pembimbingpkl'); // Ubah ke rute dashboard pembimbing
            }

            if ($user->role == 'guru'){
                return redirect()-> route('guru.index');
            }
            // Default redirect jika role tidak dikenali
            return redirect('/');
        }

        // Jika login gagal, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password tidak cocok.',
        ]);
    }

    // Logout
    public function destroy()
    {
        Auth::logout();
        return redirect()->route('login'); // Setelah logout, arahkan ke halaman login
    }
}
