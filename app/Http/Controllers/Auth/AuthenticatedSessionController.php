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
        return view('auth.login'); // pastikan ada view 'auth.login'
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
            // Cek jenis pengguna setelah login
            $user = Auth::user();
            
            // Jika pengguna adalah siswa
            if ($user->register_option == 'siswa') {
                return redirect()->route('/'); // Halaman untuk siswa setelah login
            }

            // Jika pengguna adalah pembimbing PKL
            if ($user->register_option == 'pembimbingpkl') {
                return redirect()->route('pembimbingpkl'); // Halaman untuk pembimbing PKL setelah login
            }

            // Default arahkan ke halaman utama jika tidak dikenali
            return redirect()->route('awal');
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
