<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AbsenController extends Controller
{
    public function index()
    {
        return view('absen');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|file|image', // Validasi untuk file gambar
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'notes' => 'nullable|string',
        ]);
    
        // Simpan data foto
        Absen::create([
            'image' => file_get_contents($request->file('image')->getRealPath()), // Simpan gambar sebagai biner
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            'notes' => $data['notes'] ?? null,
        ]);
    
        return response()->json(['message' => 'Foto dan lokasi berhasil disimpan']);
    }
}

