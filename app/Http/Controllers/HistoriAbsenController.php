<?php
namespace App\Http\Controllers;

use App\Models\HistoriAbsen;
use Illuminate\Http\Request;

class HistoriAbsenController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'tipe' => 'required|string',
            'hari' => 'required|string',
            'tanggal' => 'required|date',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'dataGambar' => 'required|string', // Menyimpan gambar base64
        ]);

        // Menyimpan data ke database
        HistoriAbsen::create([
            'tipe' => $validated['tipe'],
            'hari' => $validated['hari'],
            'tanggal' => $validated['tanggal'],
            'latitude' => $validated['latitude'],
            'longitude' => $validated['longitude'],
            'data_gambar' => $validated['dataGambar'],
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('daftarhdr.histori')->with('success', 'Data berhasil disimpan!');
    }
    public function histori()
{
    // Ambil semua data histori absen dari database
    $absenDatang = AbsenDatang::all();  // Mengambil semua data absen datang
    $absenPulang = AbsenPulang::all();  // Mengambil semua data absen pulang

    // Kirim data histori absen ke view
    return view('daftarhdr.histori', compact('historiAbsen'));
}

}
