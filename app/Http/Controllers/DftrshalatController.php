<?php

namespace App\Http\Controllers;

use App\Models\Dftrshalat;
use Illuminate\Http\Request;

class DftrshalatController extends Controller
{
    // Menampilkan daftar waktu shalat
    public function index()
    {
        $dftrshalats = Dftrshalat::all();
        return view('dftrshalats.index', compact('dftrshalats'));
    }

    // Menampilkan form untuk membuat data waktu shalat baru
    public function create()
    {
        return view('dftrshalats.create');
    }

    // Menyimpan data waktu shalat baru
    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'duha' => 'required|date_format:H:i',
            'dzuhur' => 'required|date_format:H:i',
            'ashar' => 'required|date_format:H:i',
        ]);

        Dftrshalat::create($request->all());

        return redirect()->route('dftrshalats.index')->with('success', 'Data waktu shalat berhasil ditambahkan');
    }

    // Menampilkan detail data waktu shalat tertentu
    public function show(Dftrshalat $dftrshalat)
    {
        return view('dftrshalats.show', compact('dftrshalat'));
    }

    // Menampilkan form untuk mengedit data waktu shalat tertentu
    public function edit(Dftrshalat $dftrshalat)
    {
        return view('dftrshalats.edit', compact('dftrshalat'));
    }

    // Mengupdate data waktu shalat tertentu
    public function update(Request $request, Dftrshalat $dftrshalat)
    {
        $request->validate([
            'hari' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'duha' => 'required|date_format:H:i',
            'dzuhur' => 'required|date_format:H:i',
            'ashar' => 'required|date_format:H:i',
        ]);

        $dftrshalat->update($request->all());

        return redirect()->route('dftrshalats.index')->with('success', 'Data waktu shalat berhasil diperbarui');
    }

    // Menghapus data waktu shalat tertentu
    public function destroy(Dftrshalat $dftrshalat)
    {
        $dftrshalat->delete();

        return redirect()->route('dftrshalats.index')->with('success', 'Data waktu shalat berhasil dihapus');
    }
}
