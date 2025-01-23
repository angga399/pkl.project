<?php
namespace App\Http\Controllers;

use App\Models\Dftrshalat;
use Illuminate\Http\Request;

class DftrshalatController extends Controller
{
    // Method untuk menampilkan daftar waktu shalat
    public function index()
    {

        $data = DftrShalat::all(); // Ambil semua data
        return view('dftrshalats.index', compact('data'));

        

        // Mengambil semua data waktu shalat
        $dftrshalats = Dftrshalat::all();
        return view('dftrshalats.index', compact('dftrshalats'));

    }

    // Method untuk menampilkan form tambah data waktu shalat
    public function create($type = null)
    {
        $validTypes = ['duha', 'dzuhur', 'ashar']; // Daftar tipe yang valid

        // Cek apakah tipe yang diberikan valid
        if ($type && !in_array($type, $validTypes)) {
            abort(404, 'Tipe tidak valid.');
        }

        // Mengirimkan tipe ke form
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


        

    // Method untuk menyimpan data waktu shalat

    public function store(Request $request)
    {
        // Validasi inputan dari form
        $validated = $request->validate([
            'type' => 'required|in:duha,dzuhur,ashar', 
            'tanggal' => 'required|date',
            'hari' => 'required|string',
            'waktu' => 'required|date_format:H:i', // Format waktu seperti HH:MM
        ]);

        // Menyimpan data ke database
        Dftrshalat::create([
            'type' => $validated['type'],
            'tanggal' => $validated['tanggal'],
            'hari' => $validated['hari'],
            'waktu' => $validated['waktu'],
            'status' => 'Menunggu', // Status default

        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('dftrshalats.index')
            ->with('success', 'Waktu shalat berhasil disimpan!');
    }

    // Method untuk mengedit data waktu shalat
    public function edit($id)
    {
        // Mengambil data berdasarkan ID
        $dftrshalat = Dftrshalat::findOrFail($id);

        // Menampilkan form edit
        return view('dftrshalats.edit', compact('dftrshalat'));
    }

    public function destroy($id)
    {
        // Cari data berdasarkan ID
        $dftrshalat = Dftrshalat::findOrFail($id);
    

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

        // Hapus data
        $dftrshalat->delete();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dftrshalats.index')->with('success', 'Data berhasil dihapus!');
    }
    


    // Method untuk menampilkan arsip
    
}
