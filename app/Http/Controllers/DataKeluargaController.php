<?php

namespace App\Http\Controllers;

use App\Models\Data_Keluarga;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class DataKeluargaController extends Controller
{
    public function dataKeluargaStore(Request $request, Pegawai $pegawai)
    {
    $request->validate([
        'nama' => 'required|string',
        'hubungan' => 'required|string',
    ]);

    $dataKeluarga = new Data_Keluarga([
        'nama' => $request->input('nama'),
        'hubungan' => $request->input('hubungan'),
    ]);

    $pegawai->datakeluarga()->save($dataKeluarga);

    return redirect()->back()->with('success', ' Data keluarga added successfully!');
    }


    public function dataKeluargaUpdate(Request $request, Pegawai $pegawai, Data_Keluarga $dataKeluarga)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'hubungan' => 'required',
        ]);

        $dataKeluarga->update($validatedData);

        return redirect()->back()->with('success', 'Data keluarga berhasil diperbarui.');
    }


     public function destroy(Pegawai $pegawai, Data_Keluarga $dataKeluarga)
    {
    $dataKeluarga->delete();

        return redirect()->back()->with('success', 'Data keluarga berhasil dihapus');
    }

}
