<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Daftarhdr;
use Illuminate\Http\Request;

class PembimbingController extends Controller
{
    public function index()
    {
        // Mengambil jurnal dengan status 'Menunggu'
        $journals = Journal::where('status', 'Menunggu')->get();
        return view('pembimbing.index', compact('journals'));
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


    public function setuju($id)
    {
        $journal = Journal::findOrFail($id);
        $journal->status = 'Disetujui';
        $journal->save();
    
        return redirect()->route('pembimbing.index')->with('status', 'Jurnal disetujui!');
    }

    public function tolak($id)
    {
        $journal = Journal::findOrFail($id);
        $journal->status = 'Ditolak';
        $journal->save();
    
        return redirect()->route('pembimbing.index')->with('status', 'Jurnal ditolak!');
    }
}