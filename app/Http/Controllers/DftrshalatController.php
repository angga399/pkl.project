<?php

namespace App\Http\Controllers;

use App\Models\Dftrshalat;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class DftrshalatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function index(Request $request)
{
    $week = $request->get('week', Carbon::now()->format('Y-\WW'));
    $year = Carbon::parse($week)->year;
    $weekNumber = Carbon::parse($week)->weekOfYear;
    
    $startOfWeek = Carbon::now()->setISODate($year, $weekNumber, 1)->startOfDay();
    $endOfWeek = Carbon::now()->setISODate($year, $weekNumber, 7)->endOfDay();

    // Ambil data berdasarkan user DAN rentang minggu
    $dftrshalats = Dftrshalat::where('user_id', auth()->id())
        ->whereBetween('tanggal', [$startOfWeek, $endOfWeek])
        ->orderBy('tanggal', 'desc')
        ->get();
                   Log::debug('Data shalat untuk user '.auth()->id(), [
        'total' => $dftrshalats->count(),
        'per_jenis' => $dftrshalats->groupBy('jenis')->map->count()
    ]);

    return view('dftrshalats.index', compact('dftrshalats', 'week'));
}

    public function create()
    {
        $currentTime = Carbon::now('Asia/Jakarta');

        return view('dftrshalats.create', [
            'tanggal' => $currentTime->format('Y-m-d'),
            'hari' => $currentTime->locale('id')->isoFormat('dddd'),
            'waktu' => $currentTime->format('H:i'),
            'week' => $currentTime->format('Y-\WW')
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis' => 'required|string|in:Subuh,Dzuhur,Ashar,Maghrib,Isya,Duha',
            'nama' => 'required|string|max:255',
            'perusahaan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'hari' => 'required|string|max:20',
            'waktu' => 'required|date_format:H:i',
        ]);

        $validated['user_id'] = auth()->id();

        try {
            $shalat = Dftrshalat::create($validated);
            
            Log::info('Data shalat berhasil disimpan:', $shalat->toArray());
            
            return redirect()
                ->route('dftrshalats.index')
                ->with('status', 'Data shalat berhasil disimpan!');
                
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan data shalat:', [
                'error' => $e->getMessage(),
                'data' => $validated
            ]);
            
            return back()
                ->withInput()
                ->with('error', 'Gagal menyimpan data shalat');
        }
    }

    public function showGuru()
    {
        $companyId = auth()->user()->company_id;
        
        $dftrshalats = Dftrshalat::with('user')
            ->whereHas('user', function($query) use ($companyId) {
                $query->where('company_id', $companyId);
            })
            ->orderBy('tanggal', 'desc')
            ->get();

        Log::info('Data shalat untuk guru:', [
            'company_id' => $companyId,
            'count' => $dftrshalats->count()
        ]);

        return view('guru.shalats', compact('dftrshalats'));
    }
}