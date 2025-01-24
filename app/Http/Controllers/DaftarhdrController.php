<?php

namespace App\Http\Controllers;

use App\Models\Daftarhdr;
use Illuminate\Http\Request;
use Carbon\Carbon;



class DaftarhdrController extends Controller
{
public function index()
{
    // Fetch all records from the database
    $daftarhdrs = Daftarhdr::all();

    // Pass the records to the view
    return view('daftarhdr.index', compact('daftarhdrs'));
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

    DaftarHdr::create($request->all());

    return redirect()->route('daftarhdr.index')->with('success', 'Data berhasil disimpan.');
}



    // public function edit(Daftarhdr $daftarhdr)
    // {
    //     return view('daftarhdr.edit', compact('daftarhdr'));
    // }

    public function update(Request $request, Daftarhdr $daftarhdr)
    {
        $daftarhdr->update($request->only(['latitude', 'longitude', 'imageData', 'notes']));
        return redirect()->route('daftarhdr.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Daftarhdr $daftarhdr)
    {
        $daftarhdr->delete();
        return redirect()->route('daftarhdr.index')->with('success', 'Data berhasil dihapus.');
    }
}
