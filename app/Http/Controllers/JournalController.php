<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index()
    {
        $journals = Journal::all();
        return view('journals.index', compact('journals'));
    }

    public function create()
    {
        return view('journals.create');
    }


    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'uraian_konsentrasi' => 'required|string|max:500',
        ]);
    
        // Menyimpan jurnal baru dengan status 'Menunggu'
        Journal::create([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'uraian_konsentrasi' => $request->uraian_konsentrasi,
            'status' => 'Menunggu', // status default
        ]);
    
        // Redirect ke halaman Pembimbing PKL
        return redirect()->route('journals.index')->with('status', 'Jurnal berhasil dikirim dan menunggu persetujuan!');
    }
    

    public function show(Journal $journal)
    {
        return view('journals.show', compact('journal'));
    }

    public function edit(Journal $journal)
    {
        return view('journals.edit', compact('journal'));
        
        $request->validate([
            'tanggal' => 'required|date',
            'nama' => 'required',
            'uraian_konsentrasi' => 'nullable|string',
        ]);
    }

    public function update(Request $request, Journal $journal)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nama' => 'required',
            'uraian_konsentrasi' => 'nullable|string',
        ]);

        $journal->update($request->all());
        return redirect()->route('journals.index')->with('success', 'Jurnal berhasil diperbarui!');
    }

    public function destroy(Journal $journal)
    {
        $journal->delete();
        return redirect()->route('journals.index')->with('success', 'Jurnal berhasil dihapus!');
    }
}
