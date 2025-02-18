<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Journal;
use App\Models\Daftarhdr;
use App\Models\Dftrshalat;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

    // Proses persetujuan untuk approvals
// Proses persetujuan untuk approvals
public function approve($id)
{
    $item = Daftarhdr::findOrFail($id);
    $item->status = 'Disetujui';
    $item->save();

    return redirect()->route('pembimbing.approvals')->with('status', 'Data berhasil disetujui!');
}

public function reject($id)
{
    $item = Daftarhdr::findOrFail($id);
    $item->status = 'Ditolak';
    $item->save();

    return redirect()->route('pembimbing.approvals')->with('status', 'Data berhasil ditolak!');
}

    
    
    

    // Proses persetujuan untuk shalat
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

        // Menghapus data setelah ditolak
        $shalat->delete();

        return redirect()->route('pembimbing.shalat')->with('status', 'Shalat ditolak dan data dihapus!');
    }
}
