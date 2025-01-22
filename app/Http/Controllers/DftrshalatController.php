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


        
        // Simpan data ke database
        $dftrshalat = Dftrshalat::create([
            'type' => $request->type,
            'tanggal' => now()->toDateString(),
            'hari' => Carbon::now()->locale('id')->isoFormat('dddd'),
            'waktu' => now()->toTimeString(),
            'status'=> 'panding'

        ]);
    
        // Redirect ke halaman show dengan ID data yang baru dibuat
        return redirect()->route('dftrshalats.show', $dftrshalat->id)->with('success', 'Data berhasil disimpan menunggu persetujuan!');

    }
    
    public function update(Request $request, Dftrshalat $dftrshalat)
{
    $request->validate([
       'tanggal'=>'required|date',
       'hari'=>'required',
       'waktu'=>'required',
       'status'=>'required'
    ]);
    $dftrshalat->update($request->all());
    return redirect()->route('dftrshalats.show')->with('succses','journal berhasil di perbarui');
}
    
    
    public function show($id)
{
    // Ambil data berdasarkan ID yang dikirim
    $dftrshalat = Dftrshalat::findOrFail($id);

    // Tampilkan halaman detail
    return view('dftrshalats.show', compact('dftrshalat'));
}

    
}
