<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Penghargaan;
use Illuminate\Http\Request;

class PenghargaanController extends Controller
{
    public function penghargaanStore(Request $request, Pegawai $pegawai)
    {
    $request->validate([
        'tahun' => 'required|string',
        'keterangan' => 'required|string',
    ]);

    $penghargaan = new Penghargaan([
        'tahun' => $request->input('tahun'),
        'keterangan' => $request->input('keterangan'),
    ]);

    $pegawai->penghargaan()->save($penghargaan);

    return redirect()->back()->with('success', ' Data penghargaan added successfully!');
    }


    public function penghargaanUpdate(Request $request, Pegawai $pegawai, Penghargaan $penghargaan)
    {
        $validatedData = $request->validate([
            'tahun' => 'required',
            'keterangan' => 'required',
        ]);

        $penghargaan->update($validatedData);

        return redirect()->back()->with('success', 'Data penghargaan berhasil diperbarui.');
    }

     public function destroy(Pegawai $pegawai, Penghargaan $penghargaan)
        {
        $penghargaan->delete();

        
        return redirect()->back()->with('success', 'Data penghargaan berhasil dihapus');
        }

}
