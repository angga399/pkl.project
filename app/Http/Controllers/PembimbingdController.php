<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daftarhdr;

class PembimbingdController extends Controller
{
    public function index() {
        $daftarhdrs = Daftarhdr::where('status', 'Pending')->get();
        return view('pembimbingd.index', compact('daftarhdrs'));
    }
    
    public function approve($id) {
        $item = Daftarhdr::find($id);
        if ($item) {
            $item->status = 'approve';
            $item->save();
            return redirect()->route('pembimbingd.index')->with('success', 'Data berhasil disetujui.');
        }
        return redirect()->route('pembimbingd.index')->with('error', 'Data tidak ditemukan.');
    }
    
    public function reject($id) {
        $item = Daftarhdr::find($id);
        if ($item) {
            $item->status = 'not approve';
            $item->save();
            return redirect()->route('pembimbingd.index')->with('success', 'Data berhasil ditolak.');
        }
        return redirect()->route('pembimbingd.index')->with('error', 'Data tidak ditemukan.');
    }
    
}
