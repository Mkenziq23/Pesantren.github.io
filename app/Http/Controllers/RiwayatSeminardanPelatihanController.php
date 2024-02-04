<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Riwayat_SeminardanPelatihan;
use Illuminate\Http\Request;

class RiwayatSeminardanPelatihanController extends Controller
{
    public function riwayatSeminardanPelatihanStore(Request $request, Pegawai $pegawai)
    {
    $request->validate([
        'mulai' => 'required|date',
        'selesai' => 'required|date',
        'penyelenggara' => 'required|string',
        'lokasi' => 'required|string',
    ]);

    $riwayatSeminardanPelatihan = new Riwayat_SeminardanPelatihan([
        'mulai' => $request->input('mulai'),
        'selesai' => $request->input('selesai'),
        'penyelenggara' => $request->input('penyelenggara'),
        'lokasi' => $request->input('lokasi'),
    ]);

    $pegawai->riwayatseminardanpelatihan()->save($riwayatSeminardanPelatihan);

    return redirect()->back()->with('success', ' Data seminar dan pelatihan added successfully!');
    }


    public function riwayatSeminardanPelatihanUpdate(Request $request, Pegawai $pegawai, Riwayat_SeminardanPelatihan $riwayatSeminardanPelatihan)
    {
        $validatedData = $request->validate([
            'mulai' => 'required',
            'selesai' => 'required',
            'penyelenggara' => 'required',
            'lokasi' => 'required',
        ]);

        $riwayatSeminardanPelatihan->update($validatedData);

        return redirect()->back()->with('success', 'Data seminar dan pelatihan berhasil diperbarui.');
    }

     public function destroy(Pegawai $pegawai, Riwayat_SeminardanPelatihan $riwayatSeminardanPelatihan)
        {
        $riwayatSeminardanPelatihan->delete();

        
        return redirect()->back()->with('success', 'Data seminar dan pelatihan berhasil dihapus');
        }
}
