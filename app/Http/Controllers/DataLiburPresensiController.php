<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data_Libur_Presensi;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataLiburPresensiExport;

class DataLiburPresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataliburpresensi = Data_Libur_Presensi::all();
        $tittle = 'Data Libur Presensi';
        return view('kepegawaian.presensi-pegawai.data-libur-presensi', compact('dataliburpresensi', 'tittle'));
    }

 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required|not_in:disable value',
            'keterangan' => 'required'
        ]);

        Data_Libur_Presensi::create($request->all());

        return redirect()->back()->with('Success', 'Data Libur Presensi has been added');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Data_Libur_Presensi $dataliburpresensi, $id)
    {
        $request->validate([
            'hari' => 'required|not_in:disable value',
            'keterangan' => 'required'
        ]);

        $dataliburpresensi = Data_Libur_Presensi::findOrFail($id);

        $dataliburpresensi->update($request->all());

        return redirect()->back()->with('Success', 'Data Libur Presensi has been update');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    Data_Libur_Presensi::destroy($id);

    return redirect()->back()->with('Success', 'Data libur presensi has been deleted');
    }

    public function export(){
         return Excel::download(new DataLiburPresensiExport, 'data-libur-presensi.xlsx', \Maatwebsite\Excel\Excel::XLSX);   
    }

}
