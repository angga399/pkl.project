<?php

namespace App\Http\Controllers;

use App\Models\Daftarhdr;
use App\Models\HistoriAbsen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class DaftarhdrController extends Controller
{
    public function __construct()
    {
        // Pastikan semua fungsi di controller ini hanya bisa diakses user yang login
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $week = $request->get('week', Carbon::now()->format('Y-W'));

        list($year, $weekNumber) = explode('-', $week);
        $date = Carbon::createFromDate($year)->setISODate($year, (int)$weekNumber);

        $startOfWeek = $date->copy()->startOfWeek();
        $endOfWeek = $date->copy()->endOfWeek();
        $userId = Auth::id();

        Log::info("Start of Week: " . $startOfWeek);
        Log::info("End of Week: " . $endOfWeek);

        $query = Daftarhdr::where('user_id', $userId)
            ->whereBetween('tanggal', [$startOfWeek->format('Y-m-d'), $endOfWeek->format('Y-m-d')]);

        $daftarhdrs = $query->get();

        return view('daftarhdr.index', compact('daftarhdrs', 'startOfWeek', 'endOfWeek', 'week'));
    }

    public function create()
    {
        return view('daftarhdr.create');
    }

    public function store(Request $request)
    {
        Log::info('Data yang diterima:', $request->all());

        $request->validate([
            'tipe' => 'required|string',
            'hari' => 'required|string',
            'nama' => 'required|string',
            'tanggal' => 'required|date',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'dataGambar' => 'required|string',
        ]);

        $user = auth()->user();

        if (!$user) {
            Log::error('User belum login saat mencoba menyimpan absen.');
            return redirect()->route('login')->withErrors('Silakan login terlebih dahulu.');
        }

        // Cek apakah sudah absen dengan tipe yang sama pada tanggal yang sama
        $existing = Daftarhdr::where('user_id', $user->id)
            ->where('tanggal', $request->tanggal)
            ->where('tipe', $request->tipe)
            ->first();

        if ($existing) {
            return redirect()->back()->withErrors(['error' => 'Anda sudah melakukan absen dengan tipe tersebut pada tanggal ini.']);
        }

        // Ambil nama perusahaan user, jika tidak ada isi default
        $companyName = $user->company->name ?? 'Tidak diketahui';

        Daftarhdr::create([
            'tipe' => $request->tipe,
            'hari' => $request->hari,
            'nama' => $request->nama,
            'pt' => $companyName,  // simpan nama perusahaan di kolom pt
            'tanggal' => $request->tanggal,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'dataGambar' => $request->dataGambar,
            'user_id' => $user->id,  // wajib isi user_id
            'status' => 'Menunggu Persetujuan', // Optional: default status
        ]);

        return redirect()->route('daftarhdr.index')->with('success', 'Data berhasil disimpan.');
    }

    public function update(Request $request, Daftarhdr $daftarhdr)
    {
        $request->validate([
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'dataGambar' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $daftarhdr->update($request->only(['latitude', 'longitude', 'dataGambar', 'notes']));

        return redirect()->route('daftarhdr.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Daftarhdr $daftarhdr)
    {
        $daftarhdr->delete();

        return redirect()->route('daftarhdr.index')->with('success', 'Data berhasil dihapus.');
    }

  public function showGuru()
{
    // Dapatkan perusahaan yang terkait dengan guru yang login
    $companyId = auth()->user()->company_id; // Asumsi ada relasi company
    
    // Dapatkan daftar absen hanya untuk perusahaan tersebut
    $daftarhdrs = Daftarhdr::whereHas('user', function($query) use ($companyId) {
            $query->where('company_id', $companyId);
        })
        ->orderBy('tanggal')
        ->get();

    return view('guru.absen', compact('daftarhdrs'));
}
    public function history(Daftarhdr $daftarhdr)
    {
        $histories = HistoriAbsen::where('journal_id', $daftarhdr->id)->get();

        return view('daftarhdr.histori', compact('histories', 'daftarhdr'));
    }

    public function getAllHistories()
    {
        $histori = HistoriAbsen::all();

        return response()->json($histori);
    }
}
