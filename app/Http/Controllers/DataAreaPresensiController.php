<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data_Area_Presensi;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataAreaPresensiExport;

class DataAreaPresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataareapresensi = Data_Area_Presensi::all();
        $tittle = 'Data Area Presensi'; 
        return view('kepegawaian.presensi-pegawai.data-area-presensi', compact('dataareapresensi', 'tittle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_area' => 'required',
            'longi' => 'required',
            'lati' => 'required',
            'keterangan' => 'required',
        ]);

        Data_Area_Presensi::create($request->all());

        return redirect()->back()->with('success', 'Data presensi area berhasil ditambah.');
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Data_Area_Presensi $dataareapresensi)
    {
        $request->validate([
            'nama_area' => 'required',
            'longi' => 'required',
            'lati' => 'required',
            'keterangan' => 'required',
        ]);

        $dataareapresensi->update($request->all());

        return redirect()->back()->with('success', 'Data presensi area berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Data_Area_Presensi $dataareapresensi)
    {
        $dataareapresensi->delete();

        return redirect()->back()->with('success', 'Data presensi area berhasil dihapus.');
    }

    public function export(){
         return Excel::download(new DataAreaPresensiExport, 'dataareapresensi.xlsx', \Maatwebsite\Excel\Excel::XLSX);   
    }
}
