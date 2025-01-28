<?php

namespace App\Http\Controllers;

use App\Models\Daftarhdr;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DaftarhdrController extends Controller
{
    public function index(Request $request)
{
    $week = $request->get('week', Carbon::now()->format('Y-W'));
    $startOfWeek = Carbon::parse($week)->startOfWeek();
    $endOfWeek = Carbon::parse($week)->endOfWeek();

    \Log::info("Start of Week: " . $startOfWeek);
    \Log::info("End of Week: " . $endOfWeek);

    $daftarhdrs = Daftarhdr::whereBetween('tanggal', [$startOfWeek, $endOfWeek])
        ->orderBy('tanggal')
        ->get();

    \Log::info("Daftarhdrs: ", $daftarhdrs->toArray());

    return view('daftarhdr.index', compact('daftarhdrs', 'startOfWeek', 'endOfWeek', 'week'));
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
