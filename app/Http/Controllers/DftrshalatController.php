<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Dftrshalat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Tambahkan ini

class DftrshalatController extends Controller
{
    // Method untuk menampilkan daftar waktu shalat
    public function index()
    {
        // Ambil data waktu shalat dari database
        $dftrshalats = Dftrshalat::all();
    
        // Kirim data ke view tanpa variabel showDuha, showDzuhur, showAshar
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

        // Kirim tipe ke form
        return view('dftrshalats.create', compact('type'));
    }

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

        // Simpan data ke database
        Dftrshalat::create([
            'type' => $validated['type'],
            'tanggal' => $validated['tanggal'],
            'hari' => $validated['hari'],
            'waktu' => $validated['waktu'],
            'status' => 'Menunggu',
        ]);

        // Redirect ke index dengan pesan sukses
        return redirect()->route('dftrshalats.index')
            ->with('success', 'Waktu shalat berhasil disimpan!');
    }

    // Method untuk mengedit data waktu shalat
    public function edit($id)
    {
        $dftrshalat = Dftrshalat::findOrFail($id);
        return view('dftrshalats.edit', compact('dftrshalat'));
    }

    public function destroy($id)
    {
        $dftrshalat = Dftrshalat::findOrFail($id);
        $dftrshalat->delete();
        return redirect()->route('dftrshalats.index')->with('success', 'Data berhasil dihapus!');
    }

    public function arsip()
    {
        $dftrshalatsArsip = Dftrshalat::where('status', 'arsip')->get();
        return view('dftrshalats.arsip', compact('dftrshalatsArsip'));
    }
}