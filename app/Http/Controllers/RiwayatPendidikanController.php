<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Riwayat_Pendidikan;
use Illuminate\Http\Request;

class RiwayatPendidikanController extends Controller
{


    public function riwayatPendidikanStore(Request $request, Pegawai $pegawai)
    {
    $request->validate([
        'tahun_masuk' => 'required|string',
        'tahun_lulus' => 'required|string',
        'pendidikan' => 'required|string',
        'lokasi' => 'required|string',
    ]);

    $riwayatPendidikan = new Riwayat_Pendidikan([
        'tahun_masuk' => $request->input('tahun_masuk'),
        'tahun_lulus' => $request->input('tahun_lulus'),
        'pendidikan' => $request->input('pendidikan'),
        'lokasi' => $request->input('lokasi'),
    ]);

    $pegawai->riwayatpendidikan()->save($riwayatPendidikan);

    return redirect()->back()->with('success', 'Education history added successfully!');
    }


public function riwayatPendidikanUpdate(Request $request, Pegawai $pegawai, Riwayat_Pendidikan $riwayatPendidikan)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'tahun_masuk' => 'required',
            'tahun_lulus' => 'required',
            'pendidikan' => 'required',
            'lokasi' => 'required',
        ]);

        // Update the Riwayat_Pendidikan instance with the validated data
        $riwayatPendidikan->update($validatedData);

        // Optionally, you can redirect back or return a response
        return redirect()->back()->with('success', 'Riwayat pendidikan berhasil diperbarui.');
    }

public function destroy(Pegawai $pegawai, $riwayatPendidikan)
    {
    Riwayat_Pendidikan::destroy($riwayatPendidikan);

    return redirect()->back()->with('success', 'Education history deleted successfully!');
    }


}



    

