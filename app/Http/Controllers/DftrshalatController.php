<?php
namespace App\Http\Controllers;

use App\Models\Dftrshalat;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DftrshalatController extends Controller
{
    public function index()
    {
        $dftrshalats = Dftrshalat::all();
        return view('dftrshalats.index', compact('dftrshalats'));
    }

    public function create(Request $request)
    {
        $type = $request->type;
        return view('dftrshalats.create', compact('type'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
        ]);
        
        // Simpan data ke database
        $dftrshalat = Dftrshalat::create([
            'type' => $request->type,
            'tanggal' => now()->toDateString(),
            'hari' => Carbon::now()->locale('id')->isoFormat('dddd'),
            'waktu' => now()->toTimeString(),
        ]);
    
        // Redirect ke halaman show dengan ID data yang baru dibuat
        return redirect()->route('dftrshalats.show', $dftrshalat->id)->with('success', 'Data berhasil disimpan!');
    }
    
    
    public function show($id)
{
    // Ambil data berdasarkan ID yang dikirim
    $dftrshalat = Dftrshalat::findOrFail($id);

    // Tampilkan halaman detail
    return view('dftrshalats.show', compact('dftrshalat'));
}

    
}
