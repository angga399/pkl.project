<?php

namespace App\Http\Controllers;

use App\Models\Dftrshalat;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

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
        
        // Debugging: Lihat data yang diambil
        Log::info('Data shalat untuk minggu:', [
            'week' => $week,
            'startOfWeek' => $startOfWeek,
            'endOfWeek' => $endOfWeek,
            'data' => $dftrshalats->toArray()
        ]);
    
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

        // Debugging: Lihat data yang akan dikirim ke view
        Log::info('Data untuk form create:', $data);

        // Return ke view create
        return view('dftrshalats.create', $data);
    }

    // Menyimpan data shalat
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'jenis' => 'required|string',
            'nama' => 'required|string',
            'perusahaan' => 'required|string',
            'tanggal' => 'required|date',
            'hari' => 'required|string',
            'waktu' => 'required|date_format:H:i', // Menggunakan date_format untuk waktu
        ]);
        
        // Debugging: Lihat data yang diterima
        Log::info('Data yang diterima untuk disimpan:', $request->all());
    
        // Simpan data ke database
        $shalat = new Dftrshalat();
        $shalat->jenis = $request->jenis;
        $shalat->nama = $request->nama;
        $shalat->perusahaan = $request->perusahaan;
        $shalat->tanggal = $request->tanggal;
        $shalat->hari = $request->hari;
        $shalat->waktu = $request->waktu;
        $shalat->save();
    
        // Redirect dengan pesan
        return redirect()->route('dftrshalats.index')->with('status', 'Data shalat berhasil disimpan!');
    }
    
    // Menampilkan data shalat untuk guru
    public function showGuru()
    {

         $companyId = auth()->user()->company_id;
        $dftrshalats = Dftrshalat::whereHas('user', function($query) use ($companyId) {
            $query->where('company_id', $companyId);
        })
        ->orderBy('tanggal')
        ->get();
        
        // Debugging: Lihat data yang diambil
        Log::info('Data shalat untuk guru:', $dftrshalats->toArray());

        return view('guru.shalats', compact('dftrshalats'));
    }
}