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
        // Validate required fields
        $request->validate([
            'hari' => 'required|string',
            'tanggal' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'dataGambar' => 'required|string',
        ]);


        // Save data to the database
        Daftarhdr::create([
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'dataGambar' => $request->dataGambar,
            'status' => 'Pending'
        ]);
        return redirect()->route('daftarhdr.index')->with('success', 'Data berhasil disimpan dan menunggu persetujuan.');


    }



    public function edit(Daftarhdr $daftarhdr)
    {
        return view('daftarhdr.edit', compact('daftarhdr'));
    }

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
