<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Journal;
use App\Models\Daftarhdr;
use App\Models\Dftrshalat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Events\StatusUpdated;
use App\Events\AttendanceApproved;
use App\Events\AttendanceRejected;
    

class PembimbingController extends Controller
{
    public function index(Request $request)
{
    $week = $request->input('week', Carbon::now()->format('Y-\WW'));
    $startOfWeek = Carbon::createFromFormat('Y-\WW', $week)->startOfWeek();
    $endOfWeek = Carbon::createFromFormat('Y-\WW', $week)->endOfWeek();

  $journals = Journal::with('user')
    ->where('status', 'Menunggu')
    ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
    ->get()
    ->groupBy('PT');



    $daftarhdrs = Daftarhdr::where('status', '!=', 'Disetujui')
        ->where('status', '!=', 'Ditolak')
        ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
        ->get();

    $dftrshalats = Dftrshalat::where('status', 'Menunggu')
        ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
        ->get();

    return view('pembimbing.index', compact('journals', 'daftarhdrs', 'dftrshalats', 'startOfWeek', 'endOfWeek'));
}


public function journals(Request $request)
{
    $companyId = auth()->user()->company_id; // atau sesuai logicmu

    $week = $request->input('week', Carbon::now()->format('Y-\WW'));
    $startOfWeek = Carbon::parse($week . '-1')->startOfWeek();
    $endOfWeek = Carbon::parse($week . '-7')->endOfWeek();

    $query = Journal::with('user')
        ->whereBetween('tanggal', [$startOfWeek, $endOfWeek])
        ->where('status', 'Menunggu')
        ->whereHas('user', function ($q) use ($companyId) {
            $q->where('company_id', $companyId);
        });

    if ($request->has('PT') && $request->PT != '') {
        $query->where('PT', 'like', '%' . $request->PT . '%');
    }

    $journals = $query->get()->groupBy('PT'); // atau 'company_id' kalau itu relasinya

    return view('pembimbing.journals', [
        'journals' => $journals,
        'startOfWeek' => $startOfWeek,
        'endOfWeek' => $endOfWeek,
        'selectedWeek' => $week,
    ]);
}


public function approvals(Request $request)
{
    // Jika week dipilih, gunakan tanggal dari minggu yang dipilih
    // Jika tidak, gunakan minggu ini sebagai default
    if ($request->has('week')) {
        $selectedWeek = $request->week;
        $startOfWeek = Carbon::parse($selectedWeek)->startOfWeek();
        $endOfWeek = Carbon::parse($selectedWeek)->endOfWeek();
    } else {
        $selectedWeek = Carbon::now()->format('Y-\WW');
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
    }

    // Mulai query
  $daftarhdrs = Daftarhdr::whereHas('user', function ($q) {
    $q->where('company_id', Auth::user()->company_id);
});


    // Terapkan filter tanggal berdasarkan minggu yang dipilih
    $daftarhdrs->whereBetween('tanggal', [
        $startOfWeek->format('Y-m-d'),
        $endOfWeek->format('Y-m-d')
    ]);

    // Filter berdasarkan perusahaan jika dipilih
    if ($request->has('PT') && $request->PT != '') {
        $daftarhdrs->where('PT', $request->PT);
    }

    // Ambil data
    $daftarhdrs = $daftarhdrs->get();

    // Kirim data ke view dengan parameter yang dipilih
    return view('pembimbing.approvals', compact(
        'daftarhdrs',
        'startOfWeek',
        'endOfWeek',
        'selectedWeek'
    ));
}
public function shalat(Request $request)
{
    // Dapatkan company_id pembimbing yang login
    $companyId = auth()->user()->company_id;

    // Jika week dipilih, gunakan tanggal dari minggu yang dipilih
    // Jika tidak, gunakan minggu ini sebagai default
    $selectedWeek = $request->week ?? Carbon::now()->format('Y-\WW');
    $startOfWeek = Carbon::parse($selectedWeek)->startOfWeek();
    $endOfWeek = Carbon::parse($selectedWeek)->endOfWeek();

    // Mulai query dengan relasi user dan filter company_id
    $dftrshalats = Dftrshalat::with('user')
        ->whereHas('user', function($query) use ($companyId) {
            $query->where('company_id', $companyId);
        })
        ->where('status', 'Menunggu') // Hanya ambil yang statusnya Menunggu
        ->whereBetween('tanggal', [
            $startOfWeek->format('Y-m-d'),
            $endOfWeek->format('Y-m-d')
        ]);

    // Filter berdasarkan perusahaan jika dipilih
    if ($request->has('PT') && $request->PT != '') {
        $dftrshalats->where('PT', 'like', '%'.$request->PT.'%');
    }

    // Ambil data
    $dftrshalats = $dftrshalats->orderBy('tanggal')->get();

    // Kirim data ke view dengan parameter yang dipilih
    return view('pembimbing.shalat', compact(
        'dftrshalats',
        'startOfWeek',
        'endOfWeek',
        'selectedWeek'
    ));
}

    // Proses setuju dan tolak untuk jurnal
 public function setuju($id)
{
    $journal = Journal::findOrFail($id);

    if ($journal->status != 'Menunggu') {
        return response()->json([
            'success' => false,
            'message' => 'Jurnal sudah diproses sebelumnya'
        ], 400);
    }

    $journal->status = 'Disetujui';
    $journal->save();

    if (request()->wantsJson()) {
        return response()->json([
            'success' => true,
            'message' => 'Jurnal berhasil disetujui',
            'journal' => $journal
        ]);
    }

    return redirect()->route('pembimbing.journals')->with('status', 'Jurnal disetujui!');
}


public function tolak($id)
{
    $journal = Journal::findOrFail($id);
    $journal->status = 'Ditolak';
    $journal->save();

    return redirect()->route('pembimbing.journals')->with('status', 'Jurnal ditolak!');
}

public function approve($id)
{
    $attendance = Daftarhdr::findOrFail($id);
    $attendance->update(['status' => 'Disetujui']);
    
    // Kirim notifikasi
    event(new AttendanceApproved(
        $attendance->user_id,
        [
            'id' => $attendance->id,
            'tanggal' => $attendance->tanggal,
            'tipe' => $attendance->tipe,
            'pt' => $attendance->pt,
            'status' => 'Disetujui'
        ]
    ));

    return redirect()->route('pembimbing.approvals')->with('status', 'Absen disetujui!');
}

public function reject(Request $request, $id)
{
    $request->validate([
        'rejection_reason' => 'required|string|max:255'
    ]);

    $attendance = Daftarhdr::findOrFail($id);
    $attendance->update([
        'status' => 'Ditolak',
        'rejection_reason' => $request->rejection_reason
    ]);
    
    // Kirim notifikasi
    event(new AttendanceRejected(
        $attendance->user_id,
        [
            'id' => $attendance->id,
            'tanggal' => $attendance->tanggal,
            'tipe' => $attendance->tipe,
            'pt' => $attendance->pt,
            'status' => 'Ditolak'
        ],
        $request->rejection_reason
    ));

    return redirect()->route('pembimbing.approvals')->with('status', 'Absen ditolak!');
}

public function disetujui($id)
{
    $shalat = Dftrshalat::findOrFail($id);
    $shalat->status = 'Disetujui';
    $shalat->save();

    return redirect()->route('pembimbing.shalat')->with('status', 'Shalat disetujui!');
}

public function Ditolak($id)
{
    $shalat = Dftrshalat::findOrFail($id);
    $shalat->status = 'Ditolak';
    $shalat->save();


    return redirect()->route('pembimbing.shalat')->with('status', 'Shalat ditolak dan data dihapus!');
}
}
