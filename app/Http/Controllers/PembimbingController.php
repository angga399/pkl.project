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

//shalat
public function disetujui($id)
{
    $shalat = Dftrshalat::findOrFail($id);
    $shalat->status = 'Disetujui';
    $shalat->save();

    // Kirim semua data dftrshalats ke view pembimbing.shalat
    $dftrshalats = Dftrshalat::all();

    return view('pembimbing.shalat', compact('dftrshalats'))->with('status', 'Shalat disetujui!');
}

public function ditolak($id)
{
    $shalat = Dftrshalat::findOrFail($id);
    $shalat->status = 'Ditolak';
    $shalat->save();

    // Setelah ditolak, data dihapus
    $shalat->delete();

    // Kirim semua data dftrshalats ke view pembimbing.shalat
    $dftrshalats = Dftrshalat::all();

    return view('pembimbing.shalat', compact('dftrshalats'))->with('status', 'Shalat ditolak dan data dihapus!');
}

}


