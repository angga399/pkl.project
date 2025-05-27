<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Journal;
use App\Models\Daftarhdr;
use Illuminate\Support\Facades\DB;
use App\Models\Dftrshalat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Events\StatusUpdated;


class PembimbingController extends Controller
{
    public function index(Request $request)
{
    $week = $request->input('week', Carbon::now()->format('Y-\WW'));
    $startOfWeek = Carbon::createFromFormat('Y-\WW', $week)->startOfWeek();
    $endOfWeek = Carbon::createFromFormat('Y-\WW', $week)->endOfWeek();

    $journals = Journal::where('status', 'Menunggu')
        ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
        ->get();

    $daftarhdrs = Daftarhdr::where('status', '!=', 'Disetujui')
        ->where('status', '!=', 'Ditolak')
        ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
        ->get();

    $dftrshalats = Dftrshalat::where('status', 'Menunggu')
        ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
        ->get();

    return view('pembimbing.index', compact('journals', 'daftarhdrs', 'dftrshalats', 'startOfWeek', 'endOfWeek'));
}



public function journals(Request $request)
{
    // Jika week dipilih, gunakan tanggal dari minggu yang dipilih
    // Jika tidak, gunakan minggu ini sebagai default
    if ($request->has('week')) {
        $selectedWeek = $request->week;
        $startOfWeek = Carbon::parse($selectedWeek)->startOfWeek();
        $endOfWeek = Carbon::parse($selectedWeek)->endOfWeek();
    } else {
        $selectedWeek = Carbon::now()->format('Y-\WW');
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
    }

    // Mulai query
    $journals = Journal::query();

    // Terapkan filter tanggal berdasarkan minggu yang dipilih
    $journals->whereBetween('tanggal', [
        $startOfWeek->format('Y-m-d'),
        $endOfWeek->format('Y-m-d')
    ]);

    // Filter berdasarkan perusahaan jika dipilih
    if ($request->has('PT') && $request->PT != '') {
        $journals->where('PT', $request->PT);
    }

    // Ambil data
    $journals = $journals->get();

    // Kirim data ke view dengan parameter yang dipilih
    return view('pembimbing.journals', compact(
        'journals',
        'startOfWeek',
        'endOfWeek',
        'selectedWeek'
    ));
}

public function approvals(Request $request)
{
    // Jika week dipilih, gunakan tanggal dari minggu yang dipilih
    // Jika tidak, gunakan minggu ini sebagai default
    if ($request->has('week')) {
        $selectedWeek = $request->week;
        $startOfWeek = Carbon::parse($selectedWeek)->startOfWeek();
        $endOfWeek = Carbon::parse($selectedWeek)->endOfWeek();
    } else {
        $selectedWeek = Carbon::now()->format('Y-\WW');
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
    }

    // Mulai query
    $daftarhdrs = Daftarhdr::query();

    // Terapkan filter tanggal berdasarkan minggu yang dipilih
    $daftarhdrs->whereBetween('tanggal', [
        $startOfWeek->format('Y-m-d'),
        $endOfWeek->format('Y-m-d')
    ]);

    // Filter berdasarkan perusahaan jika dipilih
    if ($request->has('PT') && $request->PT != '') {
        $daftarhdrs->where('PT', $request->PT);
    }

    // Ambil data
    $daftarhdrs = $daftarhdrs->get();

    // Kirim data ke view dengan parameter yang dipilih
    return view('pembimbing.approvals', compact(
        'daftarhdrs',
        'startOfWeek',
        'endOfWeek',
        'selectedWeek'
    ));
}
public function shalat(Request $request)
{
    // Jika week dipilih, gunakan tanggal dari minggu yang dipilih
    // Jika tidak, gunakan minggu ini sebagai default
    if ($request->has('week')) {
        $selectedWeek = $request->week;
        $startOfWeek = Carbon::parse($selectedWeek)->startOfWeek();
        $endOfWeek = Carbon::parse($selectedWeek)->endOfWeek();
    } else {
        $selectedWeek = Carbon::now()->format('Y-\WW');
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
    }

    // Mulai query
    $dftrshalats = Dftrshalat::query();

    // Terapkan filter tanggal berdasarkan minggu yang dipilih
    $dftrshalats->whereBetween('tanggal', [
        $startOfWeek->format('Y-m-d'),
        $endOfWeek->format('Y-m-d')
    ]);

    // Filter berdasarkan perusahaan jika dipilih
    if ($request->has('PT') && $request->PT != '') {
        $dftrshalats->where('PT', $request->PT);
    }

    // Ambil data
    $dftrshalats = $dftrshalats->get();

    // Kirim data ke view dengan parameter yang dipilih
    return view('pembimbing.shalat', compact(
        'dftrshalats',
        'startOfWeek',
        'endOfWeek',
        'selectedWeek'
    ));
}

    // Proses setuju dan tolak untuk jurnal
    public function setuju($id)
{
    $journal = Journal::findOrFail($id);
    $journal->status = 'Disetujui';
    $journal->save();


    return redirect()->route('pembimbing.journals')->with('status', 'Jurnal disetujui!');
}

public function tolak($id)
{
    $journal = Journal::findOrFail($id);
    $journal->status = 'Ditolak';
    $journal->save();

    return redirect()->route('pembimbing.journals')->with('status', 'Jurnal ditolak!');
}

public function approveAllJournals(Request $request)
{
    $ids = $request->input('ids', []);
    $count = 0;

    foreach ($ids as $id) {
        $journal = Journal::find($id);
        if ($journal && $journal->status === 'Menunggu') {
            $journal->status = 'Disetujui';
            $journal->save();
            $count++;
        }
    }

    return response()->json([
        'success' => true,
        'approved_count' => $count
    ]);
}

public function approve($id)
{
    $item = Daftarhdr::findOrFail($id);
    $item->status = 'Disetujui';
    $item->save();



    return redirect()->route('pembimbing.approvals')->with('status', 'Data berhasil disetujui!');
}

public function reject(Request $request, $id)
{
    try {
        $request->validate([
            'rejection_reason' => 'required|string|max:500'
        ]);

        $daftar = DaftarHdr::findOrFail($id);
        $daftar->update([
            'status' => 'Ditolak',
            'alasan_penolakan' => $request->rejection_reason
        ]);



        return response()->json([
            'success' => true,
            'message' => 'Penolakan berhasil disimpan'
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan: ' . $e->getMessage()
        ], 500);
    }
}

public function approveAll(Request $request)
{
    $validated = $request->validate([
        'ids' => 'required|array|min:1',
        'ids.*' => 'required|integer|exists:daftarhdrs,id',
        'tab' => 'required|in:datang,pulang'
    ]);

    $count = Daftarhdr::whereIn('id', $validated['ids'])
        ->where('status', 'Menunggu Persetujuan')
        ->where('tipe', $validated['tab'])
        ->update([
            'status' => 'Disetujui',
            // Hapus approved_at dan approved_by jika kolom tidak ada
            // 'approved_at' => now(),
            // 'approved_by' => auth()->id()
        ]);

    return response()->json([
        'success' => $count > 0,
        'approved_count' => $count,
        'message' => $count > 0 
            ? "Berhasil menyetujui $count absensi" 
            : 'Tidak ada absensi yang perlu disetujui'
    ]);
}

public function disetujui($id)
{
    $shalat = Dftrshalat::findOrFail($id);
    $shalat->status = 'Disetujui';
    $shalat->save();

    return redirect()->route('pembimbing.shalat')->with('status', 'Shalat disetujui!');
}

public function Ditolak($id)
{
    $shalat = Dftrshalat::findOrFail($id);
    $shalat->status = 'Ditolak';
    $shalat->save();


    return redirect()->route('pembimbing.shalat')->with('status', 'Shalat ditolak!');
}

public function approveAllShalat(Request $request)
{
    $ids = $request->input('ids', []);
    $count = 0;

    foreach ($ids as $id) {
        $shalat = Dftrshalat::find($id);
        if ($shalat && $shalat->status === 'Menunggu') {
            $shalat->status = 'Disetujui';
            $shalat->save();
            $count++;
        }
    }

    return response()->json([
        'success' => true,
        'approved_count' => $count
    ]);
}

}