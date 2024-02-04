<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Riwayat_Jabatan;
use Illuminate\Http\Request;

class RiwayatJabatanController extends Controller
{
    public function riwayatJabatanStore(Request $request, Pegawai $pegawai)
    {
    $request->validate([
        'tahun_mulai' => 'required|date',
        'tahun_selesai' => 'required|date',
        'keterangan' => 'required|string',
        
    ]);

    $riwayatJabatan = new Riwayat_Jabatan([
        'tahun_mulai' => $request->input('tahun_mulai'),
        'tahun_selesai' => $request->input('tahun_selesai'),
        'keterangan' => $request->input('keterangan'),
    ]);

    $pegawai->riwayatjabatan()->save($riwayatJabatan);

    return redirect()->back()->with('success', ' Data riwayat jabatan added successfully!');
    }


    public function riwayatJabatanUpdate(Request $request, Pegawai $pegawai, Riwayat_Jabatan $riwayatJabatan)
    {

        $validatedData = $request->validate([
            'tahun_mulai' => 'required',
            'tahun_selesai' => 'required',
            'keterangan' => 'required',
        ]);

        $riwayatJabatan->update($validatedData);

        return redirect()->back()->with('success', 'Data riwayat jabatan berhasil diperbarui.');
    }

     public function destroy(Pegawai $pegawai, Riwayat_Jabatan $riwayatJabatan)
        {
        $riwayatJabatan->delete();

        
        return redirect()->back()->with('success', 'Data riwayat jabatan berhasil dihapus');
        }
}
