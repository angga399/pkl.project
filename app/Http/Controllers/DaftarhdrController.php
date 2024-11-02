<?php

namespace App\Http\Controllers;

use App\Models\Daftarhdr;
use Illuminate\Http\Request;

class DaftarhdrController extends Controller
{
    public function index()
    {
        $data = Daftarhdr::all();
        return view('daftarhdr.index', compact('data'));
    }

    public function create()
    {
        return view('daftarhdr.create');
    }

    public function store(Request $request)
{
    Daftarhdr::create([
        'latitude' => $request->latitude,
        'longitude' => $request->longitude,
        'image_data' => $request->imageData,
        'notes' => $request->notes,
    ]);

    return redirect()->route('daftarhdr.index')->with('success', 'Data berhasil disimpan.');
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
