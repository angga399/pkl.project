<?php

namespace App\Http\Controllers;

use App\Models\Daftarhdr;
use Illuminate\Http\Request;

class DaftarhdrController extends Controller
{
    public function index()
    {
        $daftarhdrs = Daftarhdr::all();
        return view('daftarhdr.index', compact('daftarhdrs'));
    }

    public function create()
    {
        return view('daftarhdr.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam_datang' => 'required',
            'jam_pulang' => 'required',
            'paraf_pembimbing' => 'required|string|max:255',
        ]);

        Daftarhdr::create($request->all());

        return redirect()->route('daftarhdr.index')->with('success', 'Attendance created successfully.');
    }

    public function show($id)
    {
        $daftarhdr = Daftarhdr::findOrFail($id);
        return view('daftarhdr.show', compact('daftarhdr'));
    }

    public function edit($id)
    {
        $daftarhdr = Daftarhdr::findOrFail($id);
        return view('daftarhdr.edit', compact('daftarhdr'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'hari' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam_datang' => 'required',
            'jam_pulang' => 'required',
            'paraf_pembimbing' => 'required|string|max:255',
        ]);

        $daftarhdr = Daftarhdr::findOrFail($id);
        $daftarhdr->update($request->all());

        return redirect()->route('daftarhdr.index')->with('success', 'Attendance updated successfully.');
    }

    public function destroy($id)
    {
        $daftarhdr = Daftarhdr::findOrFail($id);
        $daftarhdr->delete();

        return redirect()->route('daftarhdr.index')->with('success', 'Attendance deleted successfully.');
    }
}
