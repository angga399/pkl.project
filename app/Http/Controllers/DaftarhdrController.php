<?php

namespace App\Http\Controllers;

use App\Models\Daftarhdr;
use App\Models\HistoriAbsen;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class DaftarhdrController extends Controller
{
    public function index(Request $request)
    {
        $week = $request->get('week', Carbon::now()->format('Y-W'));
        
        list($year, $weekNumber) = explode('-', $week);
        $date = Carbon::createFromDate($year)->setISODate($year, (int)$weekNumber);
        
        $startOfWeek = $date->copy()->startOfWeek();
        $endOfWeek = $date->copy()->endOfWeek();
        
        Log::info("Start of Week: " . $startOfWeek);
        Log::info("End of Week: " . $endOfWeek);
    
        $query = Daftarhdr::whereBetween('tanggal', [$startOfWeek->toDateString(), $endOfWeek->toDateString()]);
        Log::info('Data yang diterima:', $request->all());
    
        $daftarhdrs = $query->get();
        
        return view('daftarhdr.index', compact('daftarhdrs', 'startOfWeek', 'endOfWeek', 'week'));
    }

    

    public function create()
    {
        return view('daftarhdr.create');
    }

    public function store(Request $request)
    {
        Log::info('Data yang diterima:', $request->all());
        
        $request->validate([
            'tipe' => 'required',
            'hari' => 'required',
            'nama' => 'required|string',
            'pt' => 'required|string',
            'tanggal' => 'required|date',
            'latitude' => 'required',
            'longitude' => 'required',
            'dataGambar' => 'required',
        ]);

        
        Daftarhdr::create($request->all());

        return redirect()->route('daftarhdr.index')->with('success', 'Data berhasil disimpan.');
    }

    public function update(Request $request, Daftarhdr $daftarhdr)
    {
        $request->validate([
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'imageData' => 'nullable',
            'notes' => 'nullable',
        ]);

        $daftarhdr->update($request->only(['latitude', 'longitude', 'imageData', 'notes']));
        return redirect()->route('daftarhdr.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Daftarhdr $daftarhdr)
    {
        $daftarhdr->delete();
        return redirect()->route('daftarhdr.index')->with('success', 'Data berhasil dihapus.');
    }

    public function showGuru()
    {
        $daftarhdrs = Daftarhdr::orderBy('tanggal')->get();
        return view('guru.absen', compact('daftarhdrs'));
    }

    // Method untuk mengambil histori terkait Daftarhdr (journal)
    public function history(Daftarhdr $daftarhdr)
    {
        // Asumsi HistoriAbsen memiliki 'journal_id' yang menghubungkan ke Daftarhdr
        $histories = HistoriAbsen::where('journal_id', $daftarhdr->id)->get();
        
        // Kirim data ke view, termasuk histori dan data daftarhdr
        return view('daftarhdr.histori', compact('histories', 'daftarhdr'));
    }

    // Method untuk mengambil seluruh histori absen (berguna untuk admin atau laporan)
    public function getAllHistories()
    {
        $histori = HistoriAbsen::all(); // Mengambil semua histori
        
        // Mengembalikan data dalam format JSON (atau bisa dikembalikan dalam format lain)
        return response()->json($histori);
    }



}

