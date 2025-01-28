<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Daftarhdr;
use App\Models\Dftrshalat;
use Illuminate\Http\Request;

class PembimbingController extends Controller
{
    public function index()
    {
        // Mengambil jurnal dengan status 'Menunggu'
        $journals = Journal::where('status', 'Menunggu')->get();

      // Mengambil semua data Daftarhdr
    $daftarhdrs = Daftarhdr::all();

    // Mengelompokkan data berdasarkan minggu
    $groupedByWeek = $daftarhdrs->groupBy(function ($item) {
        // Menggunakan Carbon untuk mendapatkan format 'tahun-minggu' (misalnya 2025-05 untuk minggu 5 di tahun 2025)
        return Carbon::parse($item->tanggal)->format('o-W');
    });

    // Mengirim data yang sudah dikelompokkan ke tampilan
    return view('pembimbing.index', compact('groupedByWeek'));
    
        // Menyaring data 'Dftrshalat' dengan status 'Menunggu'
        $dftrshalats = Dftrshalat::where('status', 'Menunggu')->get();

        return view('pembimbing.index', compact('journals', 'daftarhdrs', 'dftrshalats'));
    }

    public function journals()
    {
        // Menampilkan semua jurnal
        $journals = Journal::all();
        return view('pembimbing.journals', compact('journals'));
    }

    public function approvals()
    {
        // Menampilkan data yang belum disetujui atau ditolak
        $daftarhdrs = Daftarhdr::where('status', '!=', 'Disetujui')
            ->where('status', '!=', 'Ditolak')
            ->get();
        return view('pembimbing.approvals', compact('daftarhdrs'));
    }

    public function shalat()
    {
        // Menampilkan data shalat yang belum disetujui atau ditolak
        $dftrshalats = Dftrshalat::all();
        return view('pembimbing.shalat', compact('dftrshalats'));
    }

    // Proses persetujuan untuk jurnal
    public function setujuJurnal($id)
    {
        $journal = Journal::findOrFail($id);
        $journal->status = 'Disetujui';
        $journal->save();

        return redirect()->route('pembimbing.journals')->with('status', 'Jurnal disetujui!');
    }

    public function tolakJurnal($id)
    {
        $journal = Journal::findOrFail($id);
        $journal->status = 'Ditolak';
        $journal->save();

        return redirect()->route('pembimbing.journals')->with('status', 'Jurnal ditolak!');
    }

    // Proses persetujuan untuk Daftarhdr
    public function approveDaftarhdr($id)
    {
        $item = Daftarhdr::find($id);
        if ($item) {
            $item->status = 'Disetujui'; // Mengubah status menjadi Disetujui
            $item->save();

            return redirect()->route('pembimbing.approvals')->with('status', 'Pengambilan foto telah disetujui.');
        }

        return redirect()->route('pembimbing.approvals')->with('status', 'Pengambilan foto tidak ditemukan.');
    }

    public function rejectDaftarhdr($id)
    {
        $item = Daftarhdr::find($id);
        if ($item) {
            $item->status = 'Ditolak'; // Mengubah status menjadi Ditolak
            $item->save();

            return redirect()->route('pembimbing.approvals')->with('status', 'Pengambilan foto telah ditolak.');
        }

        return redirect()->route('pembimbing.approvals')->with('status', 'Pengambilan foto tidak ditemukan.');
    }

    // Proses persetujuan untuk Shalat
    public function disetujuiShalat($id)
    {
        $shalat = Dftrshalat::findOrFail($id);
        $shalat->status = 'Disetujui';
        $shalat->save();

        return redirect()->route('pembimbing.shalat')->with('status', 'Shalat disetujui!');
    }

    public function ditolakShalat($id)
    {
        $shalat = Dftrshalat::findOrFail($id);
        $shalat->status = 'Ditolak';
        $shalat->save();

        // Menghapus data setelah ditolak
        $shalat->delete();

        return redirect()->route('pembimbing.shalat')->with('status', 'Shalat ditolak dan data dihapus!');
    }
}

