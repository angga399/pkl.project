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
        //jourmnals: Mengambil jurnal dengan status 'Menunggu'
        $journals = Journal::where('status', 'Menunggu')->get();
        return view('pembimbing.journals', compact('journals'));

          // approvals: Filter hanya menampilkan data yang statusnya belum disetujui atau ditolak
          $daftarhdrs = Daftarhdr::where('status', '!=', 'Disetujui')
          ->where('status', '!=', 'Ditolak')
          ->get();
return view('pembimbingd.approvals', compact('daftarhdrs'));

//shalat: Menyaring hanya data yang statusnya 'Menunggu'
 $dftrshalats = Dftrshalat::where('status', 'Menunggu')->get();
 return view('pembimbing.shalat', compact('dftrshalats'));
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
//journal halaman

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


//approvevals halaman
    // Proses persetujuan
  // Proses persetujuan





    public function approve($id)
    {
        $item = Daftarhdr::find($id);
        if ($item) {
            $item->status = 'Disetujui'; // Atur status sesuai kebutuhan
            $item->save();

            return redirect()->route('pembimbing.approvals')->with('status', 'Pengambilan foto telah disetujui.');
        }

        return redirect()->route('pembimbing.approvals')->with('status', 'Pengambilan foto tidak ditemukan.');
    }

    public function reject($id)
    {
        $item = Daftarhdr::find($id);
        if ($item) {
            $item->status = 'Ditolak'; // Atur status sesuai kebutuhan
            $item->save();

            return redirect()->route('pembimbing.approvals')->with('status', 'Pengambilan foto telah ditolak.');
        }

        return redirect()->route('pembimbing.approvals')->with('status', 'Pengambilan foto tidak ditemukan.');
    }

    // Metode lainnya...

  

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

    // Menghapus data setelah ditolak
    $shalat->delete();

    return redirect()->route('pembimbing.shalat')->with('status', 'Shalat ditolak dan data dihapus!');

}

}
