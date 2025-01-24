<?php
namespace App\Http\Controllers;

use App\Models\Dftrshalat;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DftrshalatController extends Controller
{
    // Method untuk menampilkan daftar waktu shalat
    public function index()
    {
        $dftrshalats = Dftrshalat::all();
        return view('dftrshalats.index', compact('dftrshalats'));
    }

    // Method untuk menampilkan form tambah data waktu shalat
    public function create($type = null)
    {
        $validTypes = ['duha', 'dzuhur', 'ashar'];

        if ($type && !in_array($type, $validTypes)) {
            abort(404, 'Tipe tidak valid.');
        }

        return view('dftrshalats.create', compact('type'));
    }

    // Method untuk menyimpan data waktu shalat
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:duha,dzuhur,ashar',
            'tanggal' => 'required|date',
            'hari' => 'required|string',
            'waktu' => 'required|date_format:H:i',
        ]);

        Dftrshalat::create([
            'type' => $validated['type'],
            'tanggal' => $validated['tanggal'],
            'hari' => $validated['hari'],
            'waktu' => $validated['waktu'],
            'status' => 'Menunggu',
        ]);

        return redirect()->route('dftrshalats.index')
            ->with('success', 'Waktu shalat berhasil disimpan!');
    }

    // Method untuk mengedit data waktu shalat
    public function edit($id)
    {
        $dftrshalat = Dftrshalat::findOrFail($id);
        return view('dftrshalats.edit', compact('dftrshalat'));
    }

    // Method untuk mengupdate data waktu shalat
    public function update(Request $request, Dftrshalat $dftrshalat)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'hari' => 'required',
            'waktu' => 'required',
            'status' => 'required',
        ]);

        $dftrshalat->update($request->all());
        return redirect()->route('dftrshalats.index')->with('success', 'Data berhasil diupdate!');
    }

    // Method untuk menghapus data waktu shalat
    public function destroy($id)
    {
        $dftrshalat = Dftrshalat::findOrFail($id);
        $dftrshalat->delete();
        return redirect()->route('dftrshalats.index')->with('success', 'Data berhasil dihapus!');
    }

    // Method untuk menampilkan detail data waktu shalat
    public function show($id)
    {
        $dftrshalat = Dftrshalat::findOrFail($id);
        return view('dftrshalats.show', compact('dftrshalat'));
    }
}