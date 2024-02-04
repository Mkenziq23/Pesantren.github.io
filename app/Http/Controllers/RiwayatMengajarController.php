<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Riwayat_Mengajar;
use Illuminate\Http\Request;

class RiwayatMengajarController extends Controller
{
    public function riwayatMengajarStore(Request $request, Pegawai $pegawai)
    {
    $request->validate([
        'tahun_mulai' => 'required|date',
        'tahun_selesai' => 'required|date',
        'mapel' => 'required|string',
        'keterangan' => 'required|string',
    ]);

    $riwayatMengajar = new Riwayat_Mengajar([
        'tahun_mulai' => $request->input('tahun_mulai'),
        'tahun_selesai' => $request->input('tahun_selesai'),
        'mapel' => $request->input('mapel'),
        'keterangan' => $request->input('keterangan'),
    ]);

    $pegawai->riwayatmengajar()->save($riwayatMengajar);

    return redirect()->back()->with('success', ' Data riwayat mengajar added successfully!');
    }


    public function riwayatMengajarUpdate(Request $request, Pegawai $pegawai, Riwayat_Mengajar $riwayatMengajar)
    {
        $validatedData = $request->validate([
            'tahun_mulai' => 'required',
            'tahun_selesai' => 'required',
            'mapel' => 'required',
            'keterangan' => 'required',
        ]);

        $riwayatMengajar->update($validatedData);

        return redirect()->back()->with('success', 'Data riwayat mengajar berhasil diperbarui.');
    }

     public function destroy(Pegawai $pegawai, Riwayat_Mengajar $riwayatMengajar)
        {
        $riwayatMengajar->delete();

        
        return redirect()->back()->with('success', 'Data riwayat mengajar berhasil dihapus');
        }
}
