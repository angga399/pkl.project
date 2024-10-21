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
        $request->validate([
            'judul_jurnal' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'nama' => 'required|string|max:255',
            'paraf' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        Journal::create($request->all());
        return redirect()->route('journals.index')->with('success', 'Jurnal berhasil ditambahkan!');
    }

    public function show(Journal $journal)
    {
        return view('journals.show', compact('journal'));
    }

    public function edit(Journal $journal)
    {
        return view('journals.edit', compact('journal'));
    }

    public function update(Request $request, Journal $journal)
    {
        $request->validate([
            'judul_jurnal' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'nama' => 'required|string|max:255',
            'paraf' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
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
