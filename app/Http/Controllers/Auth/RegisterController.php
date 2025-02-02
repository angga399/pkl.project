<?php

public function store(Request $request)
{
    // Debugging: Cek apakah data terkirim
    dd($request->all());

    // Validasi umum
    $request->validate([
        'register-option' => 'required|in:siswa,pembimbingpkl',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|confirmed|min:8',
    ]);

    if ($request->input('register-option') === 'siswa') {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'nik' => 'required|string|max:20',
            'major' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'location_pkl' => 'required|string|max:255',
        ]);

        $user = User::create([
            'role' => 'siswa',
            'full_name' => $request->full_name,
            'birth_date' => $request->birth_date,
            'nik' => $request->nik,
            'major' => $request->major,
            'phone_number' => $request->phone_number,
            'location_pkl' => $request->location_pkl,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    } else {
        $request->validate([
            'supervisor_name' => 'required|string|max:255',
            'nip' => 'required|string|max:20',
            'birth_date_pembimbing' => 'required|date',
            'rank' => 'required|string|max:100',
            'company_address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
        ]);

        $user = User::create([
            'role' => 'pembimbingpkl',
            'full_name' => $request->supervisor_name,
            'birth_date' => $request->birth_date_pembimbing,
            'nip' => $request->nip,
            'rank' => $request->rank,
            'company_address' => $request->company_address,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }

    auth()->login($user);

    return redirect()->route('welcome');
}
