<?php

namespace App\Http\Controllers;

use App\Models\Jam_Masuk_dan_Pulang;
use App\Models\Unit;
use Illuminate\Http\Request;

class JamMasukdanPulangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jammasukdanpulang = Jam_Masuk_dan_Pulang::with('unit')->get();
        $units = Unit::all();
        $tittle = 'Jam Masuk dan Pulang';
        return view('kepegawaian.presensi-pegawai.jammasukdanpulang', compact('tittle', 'jammasukdanpulang', 'units'));
    }
    

public function store(Request $request)
{
    $request->validate([
        'unit_id' => 'required|exists:unit,id',
        'hari' => 'required|array',
        'jam_masuk' => 'required|array',
        'jam_pulang' => 'required|array',
    ]);

    // Check if there is existing data for the given unit_id
    $existingData = Jam_Masuk_dan_Pulang::where('unit_id', $request->unit_id)->get();

    // If existing data is found, delete it
    if (!$existingData->isEmpty()) {
        Jam_Masuk_dan_Pulang::where('unit_id', $request->unit_id)->delete();
    }

    // Loop through the arrays to store the new data
    foreach ($request->hari as $key => $hari) {
        Jam_Masuk_dan_Pulang::create([
            'unit_id' => $request->unit_id,
            'hari' => $hari,
            'jam_masuk' => $request->jam_masuk[$key],
            'jam_pulang' => $request->jam_pulang[$key],
        ]);
    }

    return redirect()->back()->with('success', 'Berhasil di Tambahkan atau Update');
}



    /**
     * Update the specified resource in storage.
     */
      public function update(Request $request, Jam_Masuk_dan_Pulang $jammasukdanpulang, $id)
    {
        $request->validate([
            'jam_masuk' => 'required',
            'jam_pulang' => 'required',
        ]);

        $jammasukdanpulang = Jam_Masuk_dan_Pulang::findOrFail($id);


        $jammasukdanpulang->update([
            'jam_masuk' => $request->jam_masuk,
            'jam_pulang' => $request->jam_pulang,
        ]);


        return redirect()->back()->with('success', 'Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    $jammasukdanpulang = Jam_Masuk_dan_Pulang::findOrFail($id);
    $jammasukdanpulang->delete();

    return redirect()->back()->with('success', 'Berhasil dihapus');
    }

public function destroyall()
{
    Jam_Masuk_dan_Pulang::truncate();

    return redirect()->back()->with('success', 'Semua data berhasil dihapus');
}


}
