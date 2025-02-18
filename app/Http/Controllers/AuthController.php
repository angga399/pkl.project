<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
{
    // Validasi input
    $request->validate([
        'full_name' => 'required|string|max:255',
        'birth_date' => 'required|date',
        'nik' => 'required|unique:users',
        'major' => 'required|string|max:100',
        'PT' => 'required|string|max:100',
        'phone_number' => 'required|string|max:15',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'location_pkl' => 'required|string|max:255', // Lokasi PKL
    ]);

    // Buat user baru
    User::create([
        'full_name' => $request->full_name,
        'birth_date' => $request->birth_date,
        'nik' => $request->nik,
        'major' => $request->major,
        'PT' => $request->PT,
        'phone_number' => $request->phone_number,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'location_pkl' => $request->location_pkl, // Lokasi PKL
    ]);

    // Redirect atau login langsung
    return redirect()->route('login');
}

}
