<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Journal;
use App\Models\JournalHistory; // Import model JournalHistory
use Illuminate\Http\Request;


class JournalController extends Controller
{
    public function index()
    {
        // Ambil semua jurnal dari database
    $journals = Journal::all();
    
    // Ambil semua histori dari database dengan informasi jurnal
    $histories = JournalHistory::with('journal')->get(); // Ambil semua histori beserta jurnalnya

    // Kirim data ke view
    return view('journals.index', compact('journals', 'histories'));
    }

    public function create()
    {
        return view('journals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'kelas' => 'required',
            'nik' => 'required',
            'uraian_konsentrasi' => 'required|string|max:500',
        ]);

        $journal = Journal::create([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'kelas' => $request->kelas,
            'nik' => $request->nik,
            'uraian_konsentrasi' => $request->uraian_konsentrasi,
            'status' => 'Menunggu',
        ]);

        JournalHistory::create([
            'journal_id' => $journal->id,
            'action' => 'created',
            'changes' => json_encode($journal),
        ]);

        return redirect()->route('journals.index')->with('status', 'Jurnal berhasil dikirim dan menunggu persetujuan!');
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
            'tanggal' => 'required|date',
            'nama' => 'required',
            'kelas' => 'required',
            'nik' => 'required',
            'uraian_konsentrasi' => 'nullable|string',
        ]);

        $oldData = $journal->getOriginal();

        $journal->update($request->all());

        JournalHistory::create([
            'journal_id' => $journal->id,
            'action' => 'updated',
            'changes' => json_encode(['old' => $oldData, 'new' => $journal]),
        ]);

        return redirect()->route('journals.index')->with('success', 'Jurnal berhasil diperbarui!');
    }

    public function destroy(Journal $journal)
    {
        JournalHistory::create([
            'journal_id' => $journal->id,
            'action' => 'deleted',
            'changes' => json_encode($journal),
        ]);

        $journal->delete();
        return redirect()->route('journals.index')->with('success', 'Jurnal berhasil dihapus!');
    }

    public function history(Journal $journal)
    {
        
        $histories = JournalHistory::where('journal_id', $journal->id)->get();
        return view('journals.index', compact('histories', 'journal'));
    }
    public function getAllHistories()
    {
        $histories = JournalHistory::all(); // Ambil semua histori
        dd($histories); // Debugging
        return response()->json($histories);
    }
    

}