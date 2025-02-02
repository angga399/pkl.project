<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Journal;
use App\Models\JournalHistory;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index(Request $request)
    {
        // Ambil minggu yang dipilih, atau defaultkan ke minggu ini
        $week = $request->input('week', Carbon::now()->format('Y-\WW'));

        // Tentukan tanggal awal dan akhir dari minggu yang dipilih
        $startOfWeek = Carbon::parse($week . '-1')->startOfWeek(); // Hari Senin
        $endOfWeek = Carbon::parse($week . '-7')->endOfWeek(); // Hari Minggu

        // Ambil semua jurnal dalam rentang minggu
        $journals = Journal::whereBetween('tanggal', [$startOfWeek, $endOfWeek])->get();

        // Ambil semua histori yang terkait dengan jurnal dalam rentang minggu yang sama
        $histories = JournalHistory::whereHas('journal', function ($query) use ($startOfWeek, $endOfWeek) {
            $query->whereBetween('tanggal', [$startOfWeek, $endOfWeek]);
        })->get();

        // Kirim data ke view
        return view('journals.index', compact('journals', 'histories', 'startOfWeek', 'endOfWeek'));
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
            'uraian_konsentrasi' => 'required|string|max:500',
        ]);

        $journal = Journal::create([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'kelas' => $request->kelas,
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
    public function showGuru()
{
    $journals = Journal::orderBy('tanggal')->get(); // Ubah $journal menjadi $journals
    return view('guru.journal', compact('journals')); // Tetap gunakan compact('journals')
}

}
