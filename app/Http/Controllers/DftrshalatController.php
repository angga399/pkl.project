<?php

namespace App\Http\Controllers;

use App\Models\Dftrshalat;
use Illuminate\Http\Request;

class DftrshalatController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter jenis jika ada
        $jenis = $request->input('jenis');
    
        // Ambil data berdasarkan jenis jika ada filter
        if ($jenis) {
            $dftrshalats = Dftrshalat::where('jenis', $jenis)->get();
        } else {
            // Jika tidak ada filter, ambil semua data
            $dftrshalats = Dftrshalat::all();
        }
    
        return view('dftrshalats.index', compact('dftrshalats'));
    }
    

    // Menampilkan form untuk menambahkan data waktu shalat
    public function create()
    {
        // Mendapatkan waktu saat ini di zona waktu Asia/Jakarta
        $currentTime = Carbon::now('Asia/Jakarta');

        // Data tambahan untuk form
        $data = [
            'tanggal' => $currentTime->format('Y-m-d'), // Format tanggal
            'hari' => $currentTime->locale('id')->isoFormat('dddd'), // Nama hari dalam bahasa Indonesia
            'waktu' => $currentTime->format('H:i'), // Waktu (jam dan menit)
        ];

        // Return ke view create
        return view('dftrshalats.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis' => 'required|string',
            'tanggal' => 'required|date',
            'hari' => 'required|string',
         'waktu' => 'required|date_format:H:i',     
        ]);
    
        // Menyimpan data ke dalam database
        Dftrshalat::create($validated);
    
        return redirect()->route('dftrshalats.index')->with('success', 'Waktu shalat berhasil ditambahkan.');
    }
    
    
}
