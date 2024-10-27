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
        // Validasi data
        $request->validate([
            'image' => 'required|string'
        ]);

        // Menghapus bagian 'data:image/jpeg;base64,' dari data URI
        $image = str_replace('data:image/jpeg;base64,', '', $request->image);
        $image = str_replace(' ', '+', $image);
        $imageName = 'absen_' . time() . '.jpeg';

        // Simpan gambar ke penyimpanan
        Storage::disk('public')->put('absen/' . $imageName, base64_decode($image));

        return response()->json(['success' => true, 'message' => 'Absen berhasil disimpan.']);
    }
}
