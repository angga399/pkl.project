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

$shalat = Dftrshalat::where('status', 'Menunggu')->get();
return view('pembimbing.index', compact('shalat'));
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
      // Cari data berdasarkan ID
      $item = Daftarhdr::findOrFail($id);
      
      // Update status menjadi 'Disetujui'
      $item->status = 'Disetujui';
      $item->save();
      
      // Redirect kembali dengan pesan sukses
      return redirect()->route('pembimbing.approvals')->with('status', 'Data berhasil disetujui.');
  }
  

public function reject($id)
{
    // Cari data berdasarkan ID
    $daftarhdrs = Daftarhdr::findOrFail($id);
    
    // Update status menjadi 'Ditolak'
    $daftarhdrs->status = 'Ditolak';
    $daftarhdrs->save();

    
    // Redirect kembali dengan pesan sukses
    return redirect()->route('pembimbing.approvals')->with('status', 'Data berhasil ditolak dan dihapus.');
}

//shalat shalat
public function disetujui($id)
{
    $shalat = Dftrshalat::findOrFail($id);
    $shalat->status = 'Disetujui';
    $shalat->save();

    return redirect()->route('pembimbing.shalat')->with('status', 'shalat disetujui!');
}

public function ditolak($id)
{
    $journal = Dftrshalat::findOrFail($id);
    $journal->status = 'Ditolak';
    $journal->save();

    return redirect()->route('pembimbing.shalat')->with('status', 'shalat ditolak!');
}

}
