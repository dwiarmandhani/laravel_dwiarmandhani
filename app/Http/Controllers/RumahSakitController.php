<?php

namespace App\Http\Controllers;

use App\Models\RumahSakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    public function index()
    {
        $rumahSakits = RumahSakit::all();
        return view('rumah_sakit.index', compact('rumahSakits'));
    }

    public function create()
    {
        return view('rumah_sakit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_rumah_sakit' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:rumah_sakits',
            'telepon' => 'required',
        ]);

        RumahSakit::create($request->all());
        return redirect()->route('rumah_sakits.index')
            ->with('success', 'Rumah Sakit created successfully.');
    }

    public function show(RumahSakit $rumahSakit)
    {
        return view('rumah_sakit.show', compact('rumahSakit'));
    }

    public function edit(RumahSakit $rumahSakit)
    {
        return view('rumah_sakit.edit', compact('rumahSakit'));
    }

    public function update(Request $request, RumahSakit $rumahSakit)
    {
        $request->validate([
            'nama_rumah_sakit' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:rumah_sakits,email,' . $rumahSakit->id,
            'telepon' => 'required',
        ]);

        $rumahSakit->update($request->all());
        return redirect()->route('rumah_sakits.index')
            ->with('success', 'Rumah Sakit updated successfully.');
    }

    public function destroy(RumahSakit $rumahSakit)
    {
        $rumahSakit->delete();
        return response()->json(['success' => 'Rumah Sakit deleted successfully.']);
    }
}
