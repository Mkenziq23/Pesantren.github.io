<?php

namespace App\Http\Controllers;

use App\Models\Jam_Masuk_dan_Pulang;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{


public function index(Request $request)
{
    $jammasukdanpulang = Jam_Masuk_dan_Pulang::with('unit')->get();
    $units = Unit::all();
    $tittle = 'Jam Masuk dan Pulang';

    // Get the actual value of jam_masuk_dan_pulang ID from the route parameters
    $jamMasukDanPulangId = $request->route('jam_masuk_dan_pulang');

    return view('kepegawaian.presensi-pegawai.jammasukdanpulang', compact('tittle', 'jammasukdanpulang', 'units', 'jamMasukDanPulangId'));
}




    public function destroy($jamMasukDanPulangId, $unit)
    {
        $jammasukdanpulang = Jam_Masuk_dan_Pulang::all();
    
        foreach ($jammasukdanpulang as $data) {
        $data->delete();
    }


        return redirect()->back()->with('success', 'Unit deleted successfully');
    }
}
