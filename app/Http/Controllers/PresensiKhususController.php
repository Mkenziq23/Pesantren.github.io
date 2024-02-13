<?php

namespace App\Http\Controllers;

use App\Exports\PresensiKhususExport;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\Presensi_Khusus;
use App\Models\Data_Area_Presensi;
use Maatwebsite\Excel\Facades\Excel;

class PresensiKhususController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presensikhusus = Presensi_Khusus::with(['pegawai', 'dataareapresensi'])->get();
        $pegawai = Pegawai::all();
        $dataareapresensi = Data_Area_Presensi::all();

        $tittle = 'Presensi Khusus';

        return view('kepegawaian.presensi-pegawai.presensi-khusus', compact('presensikhusus', 'pegawai', 'dataareapresensi', 'tittle'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
    $validatedData = $request->validate([
        'tanggal' => 'required|date',
        'pegawai_id' => 'required',
        'lokasi_id' => 'required',
        'keterangan' => 'required|string',
    ]);

    Presensi_Khusus::create($request->all());

    return redirect()->back()->with('success', 'Data presensi khusus added successfully!');
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Presensi_Khusus $presensikhusus, $id)
    {
     $request->validate([
         'tanggal' => 'required|date',
         'pegawai_id' => 'required',
         'lokasi_id' => 'required',
         'keterangan' => 'required|string',
    ]);

    $presensikhusus = Presensi_Khusus::findOrFail($id);

    $presensikhusus->update($request->all());

    return redirect()->back()->with('success', 'Data has been update');    
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
    {
        $presensikhusus = Presensi_Khusus::findOrFail($id);
        $presensikhusus->delete();

        return redirect()->back()->with('success', 'Data has been deleted');
    }

     public function export(){
         return Excel::download(new PresensiKhususExport, 'presensikhusus.xlsx', \Maatwebsite\Excel\Excel::XLSX);   
    }

}
