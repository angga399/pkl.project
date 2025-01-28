<?php

namespace App\Http\Controllers;

use App\Models\Daftarhdr;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DaftarhdrController extends Controller
{
    public function index(Request $request)
    {
        // Default: tanggal awal dan akhir minggu saat ini
        $startOfWeek = Carbon::now()->startOfWeek(Carbon::MONDAY);
        $endOfWeek = Carbon::now()->endOfWeek(Carbon::SUNDAY);
    
        // Jika parameter 'week' dikirim
        if ($request->has('week') && $request->week) {
            $date = Carbon::parse($request->week); // Parse tanggal yang dikirimkan
            $startOfWeek = $date->startOfWeek(Carbon::MONDAY); // Mulai dari Senin
            $endOfWeek = $date->endOfWeek(Carbon::SUNDAY); // Berakhir pada Minggu
        }
    
        // Debug log untuk melihat nilai tanggal yang dihitung
        \Log::info("Start of Week: $startOfWeek");
        \Log::info("End of Week: $endOfWeek");
    
        // Ambil data berdasarkan tanggal dalam rentang minggu
        $daftarhdrs = Daftarhdr::whereDate('tanggal', '>=', $startOfWeek)
            ->whereDate('tanggal', '<=', $endOfWeek)
            ->orderBy('tanggal')
            ->get();
    
        return view('daftarhdr.index', compact('daftarhdrs', 'startOfWeek', 'endOfWeek'));
    }
    

    public function create()
    {
        return view('daftarhdr.create');
    }

    public function store(Request $request)
    {
        \Log::info('Data yang diterima:', $request->all());
        

        $request->validate([
            'tipe' => 'required',
            'hari' => 'required',
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
}
