<?php

namespace App\Http\Controllers;

use App\Models\Dftrshalat;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DftrshalatController extends Controller
{
    // Menampilkan data berdasarkan minggu

    
    public function index(Request $request)
    {
        // Ambil minggu yang dipilih, atau minggu saat ini jika tidak ada
        $week = $request->get('week', Carbon::now()->format('Y-\WW'));
    
        // Ambil tahun dan minggu dari parameter week
        $year = Carbon::parse($week)->year;
        $weekNumber = Carbon::parse($week)->weekOfYear;
    
        // Ambil tanggal mulai dan akhir minggu
        $startOfWeek = Carbon::now()->setISODate($year, $weekNumber, 1)->startOfDay();
        $endOfWeek = Carbon::now()->setISODate($year, $weekNumber, 7)->endOfDay();
    
        // Ambil data shalat berdasarkan minggu yang dipilih
        $dftrshalats = Dftrshalat::whereBetween('tanggal', [$startOfWeek, $endOfWeek])->get();
    
        // Kirim data ke view
        return view('dftrshalats.index', compact('dftrshalats', 'week'));
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
            'week' => $currentTime->format('Y-\WW'), // Format minggu (Y-W)
        ];

        // Return ke view create
        return view('dftrshalats.create', $data);
    }

    // Menyimpan data shalat
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'jenis' => 'required|string',
            'tanggal' => 'required|date',
            'hari' => 'required|string',
            'waktu' => 'required|date_format:H:i',
            'week' => 'required|string', // Pastikan week disertakan
        ]);

        // Menyimpan data ke dalam database
        Dftrshalat::create([
            'jenis' => $validated['jenis'],
            'tanggal' => $validated['tanggal'],
            'hari' => $validated['hari'],
            'waktu' => $validated['waktu'],
            'week' => $validated['week'], // Simpan minggu
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('dftrshalats.index')->with('success', 'Waktu shalat berhasil ditambahkan.');
    }
}
