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

        Dftrshalat::create([
            'type' => $request->type,
            'tanggal' => now()->toDateString(),
            'hari' => Carbon::now()->locale('id')->isoFormat('dddd'),
            'waktu' => now()->toTimeString(), // Waktu otomatis dari server
        ]);

        return redirect()->route('dftrshalats.index')->with('success', 'Data berhasil disimpan!');
    }
}
