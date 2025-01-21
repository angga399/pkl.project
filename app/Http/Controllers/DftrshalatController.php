<?php
namespace App\Http\Controllers;

use App\Models\Dftrshalat;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DftrshalatController extends Controller
{
    public function index()
    {
        $data = DftrShalat::all(); // Ambil semua data
        return view('dftrshalats.index', compact('data'));

        
    }

    public function create(Request $request)
    {
        $type = $request->type;
        return view('dftrshalats.create', compact('type'));
    }
    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|string',
            'tanggal' => 'required|date',
            'hari' => 'required|string',
        ]);
    
        // Gunakan waktu lokal
        $validatedData['waktu'] = Carbon::now('Asia/Jakarta')->format('H:i:s');
    
        // Simpan ke database
        DftrShalat::create($validatedData);
    
        return redirect()->route('dftrshalats.index')->with('success', 'Data berhasil disimpan.');
    }
    
    
    
    public function show($id)
{
    // Ambil data berdasarkan ID yang dikirim
    $dftrshalat = Dftrshalat::findOrFail($id);

    // Tampilkan halaman detail
    return view('dftrshalats.show', compact('dftrshalat'));
}

    
}
