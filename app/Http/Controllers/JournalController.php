<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Journal;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\JournalHistory;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth; // Pa
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;






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
   $userId = Auth::id();

$journals = Journal::where('user_id', $userId)
                   ->whereBetween('tanggal', [$startOfWeek, $endOfWeek])
                   ->get();

$histories = JournalHistory::whereHas('journal', function ($query) use ($startOfWeek, $endOfWeek, $userId) {
    $query->where('user_id', $userId)
          ->whereBetween('tanggal', [$startOfWeek, $endOfWeek]);
})->get();


    // Kirim data ke view
    return view('journals.index', compact('journals', 'histories', 'startOfWeek', 'endOfWeek', 'week'));
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
        'PT' => 'required',
        'uraian_konsentrasi' => 'required|string|max:500',
    ]);

    $journal = Journal::create([
        'nama' => $request->nama,
        'tanggal' => $request->tanggal,
        'kelas' => $request->kelas,
        'PT' => $request->PT,
        'uraian_konsentrasi' => $request->uraian_konsentrasi,
        'status' => 'Menunggu',
        'user_id' => Auth::id(), // ✅ Menambahkan user_id dari user yang login
    ]);

  JournalHistory::create([
    'journal_id' => $journal->id,
    'action' => 'created',
    'changes' => json_encode($journal->getAttributes()),
]);

    return redirect()->route('journals.index')->with('status', 'Jurnal berhasil dikirim dan menunggu persetujuan!');
 return redirect()->route('guru.journals')->with('success', 'Jurnal berhasil disimpan');
    }

    public function show(Journal $journal)
    {
        if ($journal->user_id !== Auth::id()) {
        abort(403); // Forbidden
    }

        return view('journals.show', compact('journal'));
    }

    public function edit(Journal $journal)
    {
        if ($journal->user_id !== Auth::id()) {
        abort(403); // Forbidden
    }

        return view('journals.edit', compact('journal'));
    }

    public function exportPdf(Request $request)
    {
        // Ambil minggu yang dipilih, atau defaultkan ke minggu ini
        $week = $request->input('week', Carbon::now()->format('Y-\WW'));
    
        // Tentukan tanggal awal dan akhir dari minggu yang dipilih
        $startOfWeek = Carbon::parse($week . '-1')->startOfWeek(); // Hari Senin
        $endOfWeek = Carbon::parse($week . '-7')->endOfWeek(); // Hari Minggu
    
        // Ambil semua jurnal dalam rentang minggu
     $journals = Journal::where('user_id', Auth::id())
                   ->whereBetween('tanggal', [$startOfWeek, $endOfWeek])
                   ->get();

    
        // Jika tidak ada data, kembalikan pesan error
        if ($journals->isEmpty()) {
            return redirect()->route('journals.index') // Redirect ke halaman index
                             ->with('error', 'Tidak ada data jurnal untuk minggu ini.'); // Pesan error
        }
    
        // Jika ada data, lanjutkan proses ekspor PDF
        $pdf = Pdf::loadView('journals.pdf', compact('journals', 'startOfWeek', 'endOfWeek', 'week'))
                  ->setPaper('A4', 'landscape');
    
        return $pdf->download('jurnal_kegiatan_' . $week . '.pdf');
    }


    public function exportExcel(Request $request)
{
    try {
        // Validasi autentikasi
        if (!auth()->check()) {
            throw new \Exception('User tidak terautentikasi');
        }

        // Ambil input minggu dengan default minggu ini
        $weekInput = $request->input('week', Carbon::now()->format('Y-\WW'));

        // Validasi format minggu (YYYY-Www)
        if (!preg_match('/^(\d{4})-W(\d{2})$/', $weekInput, $matches)) {
            throw new \Exception('Format minggu tidak valid. Gunakan format YYYY-Www (contoh: 2023-W52)');
        }

        $year = (int)$matches[1];
        $weekNum = (int)$matches[2];

        // Validasi range minggu
        if ($weekNum < 1 || $weekNum > 53) {
            throw new \Exception('Nomor minggu harus antara 1-53');
        }

        // Hitung rentang tanggal
        $startOfWeek = Carbon::now()
            ->setISODate($year, $weekNum)
            ->startOfWeek()
            ->startOfDay();

        $endOfWeek = $startOfWeek->copy()
            ->endOfWeek()
            ->endOfDay();

        // Ambil data jurnal
        $journals = Journal::with('user')
            ->whereBetween('tanggal', [
                $startOfWeek->format('Y-m-d H:i:s'),
                $endOfWeek->format('Y-m-d H:i:s')
            ])
            ->orderBy('tanggal')
            ->get();

        // Verifikasi data
        if ($journals->isEmpty()) {
            $hasAnyData = Journal::whereBetween('tanggal', [
                $startOfWeek->format('Y-m-d'),
                $endOfWeek->format('Y-m-d')
            ])->exists();

            $message = $hasAnyData 
                ? 'Data ada tetapi gagal dimuat' 
                : 'Tidak ada data jurnal untuk minggu yang dipilih';

            throw new \Exception($message);
        }

        // Siapkan data untuk Excel
        $exportData = $journals->map(function ($journal) {
            return [
                'Tanggal' => optional($journal->tanggal)->format('d/m/Y') ?? '-',
                'Nama' => $journal->user->name ?? 'N/A',
                'Uraian Kegiatan' => $journal->uraian_konsentrasi,
                'Jurusan' => $journal->kelas ?? '-',
                'Perusahaan' => $journal->PT ?? '-',
                'Status' => $journal->status ?? 'Pending',
                'Dibuat Pada' => optional($journal->created_at)->format('d/m/Y H:i') ?? '-'
            ];
        });

        // Generate Excel
        return (new FastExcel($exportData))->download(sprintf(
            'jurnal_%s_%s.xlsx',
            auth()->user()->username,
            $weekInput
        ));

    } catch (\Exception $e) {
        Log::error('Excel Export Failed: ' . $e->getMessage(), [
            'user_id' => auth()->id(),
            'week_input' => $request->input('week'),
            'trace' => $e->getTraceAsString()
        ]);

        return redirect()
            ->route('journals.index')
            ->with('error', 'Gagal ekspor: ' . $e->getMessage());
    }
}
    

    public function update(Request $request, Journal $journal)
    {
          if ($journal->user_id !== Auth::id()) {
        abort(403); // Forbidden
    }

        $request->validate([
            'tanggal' => 'required|date',
            'nama' => 'required',
            'kelas' => 'required',
            'PT' => 'required',
            'uraian_konsentrasi' => 'nullable|string',
        ]);

        $oldData = $journal->getOriginal();

        $journal->update($request->all());

       JournalHistory::create([
    'journal_id' => $journal->id,
    'action' => 'updated',
    'changes' => json_encode(['old' => $oldData, 'new' => $journal->getAttributes()]),
]);

        return redirect()->route('journals.index')->with('success', 'Jurnal berhasil diperbarui!');
    }

    public function destroy(Journal $journal)
    {
          if ($journal->user_id !== Auth::id()) {
        abort(403); // Forbidden
    }

       JournalHistory::create([
    'journal_id' => $journal->id,
    'action' => 'deleted',
    'changes' => json_encode($journal->getAttributes()),
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
  return view('guru.journal', compact('journals'));


}

}
