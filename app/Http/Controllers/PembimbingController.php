<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Daftarhdr;
use App\Models\Dftrshalat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PembimbingController extends Controller
{
    public function index(Request $request)
    {
        // Filter berdasarkan minggu
        $week = $request->input('week', Carbon::now()->format('Y-\WW')); // default minggu saat ini
        $startOfWeek = Carbon::parse($week . '-1')->startOfWeek(); // Hari pertama dalam minggu
        $endOfWeek = Carbon::parse($week . '-1')->endOfWeek(); // Hari terakhir dalam minggu

        // Journals: Mengambil jurnal dengan status 'Menunggu' dalam minggu yang dipilih
        $journals = Journal::where('status', 'Menunggu')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->get();

        // Approvals: Mengambil data dari Daftarhdr yang statusnya belum disetujui atau ditolak dalam minggu yang dipilih
        $daftarhdrs = Daftarhdr::where('status', '!=', 'Disetujui')
            ->where('status', '!=', 'Ditolak')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->get();

        // Shalat: Mengambil data yang statusnya 'Menunggu' dalam minggu yang dipilih
        $dftrshalats = Dftrshalat::where('status', 'Menunggu')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->get();

        // Menampilkan data pada view
        return view('pembimbing.index', compact('journals', 'daftarhdrs', 'dftrshalats', 'startOfWeek', 'endOfWeek'));
    }

    public function journals(Request $request)
    {
        // Filter berdasarkan minggu
        $week = $request->input('week', Carbon::now()->format('Y-\WW')); // default minggu saat ini
        $startOfWeek = Carbon::parse($week . '-1')->startOfWeek(); // Hari pertama dalam minggu
        $endOfWeek = Carbon::parse($week . '-1')->endOfWeek(); // Hari terakhir dalam minggu

        // Menampilkan jurnal berdasarkan minggu
        $journals = Journal::where('status', 'Menunggu')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->get();

        return view('pembimbing.journals', compact('journals', 'startOfWeek', 'endOfWeek'));
    }

    public function approvals(Request $request)
    {
        // Filter berdasarkan minggu
        $week = $request->input('week', Carbon::now()->format('Y-\WW')); // default minggu saat ini
        $startOfWeek = Carbon::parse($week . '-1')->startOfWeek(); // Hari pertama dalam minggu
        $endOfWeek = Carbon::parse($week . '-1')->endOfWeek(); // Hari terakhir dalam minggu

        // Menampilkan approval berdasarkan minggu
        $daftarhdrs = Daftarhdr::where('status', '!=', 'Disetujui')
            ->where('status', '!=', 'Ditolak')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->get();

        return view('pembimbing.approvals', compact('daftarhdrs', 'startOfWeek', 'endOfWeek'));
    }

    public function shalat(Request $request)
    {
        // Filter berdasarkan minggu
        $week = $request->input('week', Carbon::now()->format('Y-\WW')); // default minggu saat ini
        $startOfWeek = Carbon::parse($week . '-1')->startOfWeek(); // Hari pertama dalam minggu
        $endOfWeek = Carbon::parse($week . '-1')->endOfWeek(); // Hari terakhir dalam minggu

        // Menampilkan data shalat berdasarkan minggu
        $dftrshalats = Dftrshalat::where('status', 'Menunggu')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->get();

        return view('pembimbing.shalat', compact('dftrshalats', 'startOfWeek', 'endOfWeek'));
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
