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
        return view('pembimbing.index', compact('journals'));

          // Filter hanya menampilkan data yang statusnya belum disetujui atau ditolak
          $daftarhdrs = Daftarhdr::where('status', '!=', 'Disetujui')
          ->where('status', '!=', 'Ditolak')
          ->get();

return view('pembimbingd.index', compact('daftarhdrs'));
    }

    public function journals()
{
    $journals = Journal::all(); // Sesuaikan dengan model atau logika Anda
    return view('pembimbing.journals', compact('journals'));
}

public function approvals()
{
    $daftarhdrs = Daftarhdr::all(); // Sesuaikan dengan model atau logika Anda
    return view('pembimbing.approvals', compact('daftarhdrs'));
}
public function shalat()
{
    $dftrshalats = Dftrshalat::all(); // Sesuaikan dengan model atau logika Anda
    return view('pembimbing.shalat', compact('dftrshalats'));
}


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



    // Proses persetujuan
    public function aprove($id)
    {
        $daftarhdr = Daftarhdr::findOrFail($id);
        $daftarhdr->status = 'Disetujui';
        $daftarhdr->save();
    
        return redirect()->route('pembimbing.approvals')->with('status', 'Absen disetujui!');
    }

    // Proses penolakan
    public function reject($id)
    {
        $daftarhdr = Daftarhdr::findOrFail($id);
        $daftarhdr->status = 'Ditolak';
        $daftarhdr->save();
    
        return redirect()->route('pembimbing.approvals')->with('status', 'Absen ditolak!');
    }
}
