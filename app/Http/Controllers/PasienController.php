<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::with('rumah_sakit')->get();
        $rumah_sakits = RumahSakit::all();
        return view('pasiens.index', compact('pasiens', 'rumah_sakits'));
    }

    public function create()
    {
        $rumah_sakits = RumahSakit::all();
        return view('pasiens.create', compact('rumah_sakits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
            'rumah_sakit_id' => 'required|exists:rumah_sakits,id',
        ]);

        Pasien::create($request->all());

        return redirect()->route('pasiens.index')->with('success', 'Pasien created successfully.');
    }

    public function show(Pasien $pasien)
    {
        return view('pasiens.show', compact('pasien'));
    }

    public function edit(Pasien $pasien)
    {
        $rumah_sakits = RumahSakit::all();
        return view('pasiens.edit', compact('pasien', 'rumah_sakits'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'nama_pasien' => 'required',
            'alamat' => 'required',
            'no_telpon' => 'required',
            'rumah_sakit_id' => 'required|exists:rumah_sakits,id',
        ]);

        $pasien->update($request->all());

        return redirect()->route('pasiens.index')->with('success', 'Pasien updated successfully.');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return response()->json(['success' => 'Pasien deleted successfully.']);
    }

    public function filterByRumahSakit(Request $request)
    {
        $pasiens = Pasien::select('pasiens.*', 'rumah_sakits.nama_rumah_sakit')
            ->leftJoin('rumah_sakits', 'pasiens.rumah_sakit_id', '=', 'rumah_sakits.id')
            ->where('pasiens.rumah_sakit_id', $request->rumah_sakit_id)
            ->get();

        return response()->json($pasiens);
    }
}
