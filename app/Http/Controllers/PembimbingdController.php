<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daftarhdr;

class PembimbingdController extends Controller
{
    // Mengganti nama metode showAprovedftr menjadi index
    public function index()
    {
        $daftarhdrs = Daftarhdr::where('status', 'Pending')->get();
        return view('pembimbingd.index', compact('daftarhdrs'));
    }

    public function approve($id)
    {
        $item = Daftarhdr::find($id);
        $item->status = 'Setuju';
        $item->save();
        
        return redirect()->route('pembimbingd.index')->with('success', 'Data berhasil disetujui.');
    }

    public function reject($id)
    {
        $item = Daftarhdr::find($id);
        $item->status = 'Tolak';
        $item->save();
        
        return redirect()->route('pembimbingd.index')->with('success', 'Data berhasil ditolak.');
    }
}
