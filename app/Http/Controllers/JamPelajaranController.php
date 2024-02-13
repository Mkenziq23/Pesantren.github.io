<?php

namespace App\Http\Controllers;

use App\Models\Jam_Pelajaran;
use Illuminate\Http\Request;

class JamPelajaranController extends Controller
{
    public function index(){
        $jampelajaran =  Jam_Pelajaran::all();
        $tittle = 'Jam Pelajaran';
        return view('akademik.jam-pelajaran', compact('jampelajaran', 'tittle'));
    }
public function store(Request $request)
{
    $request->validate([
        'keterangan' => 'required|array',
        'jam_mulai' => 'required|array',
        'jam_berakhir' => 'required|array',
    ]);

    $keteranganArray = $request->input('keterangan');
    $jamMulaiArray = $request->input('jam_mulai');
    $jamBerakhirArray = $request->input('jam_berakhir');

    // Assuming you have a JamPelajaran model, you can loop through the arrays and store each record
    foreach ($keteranganArray as $key => $keterangan) {
        Jam_Pelajaran::create([
            'keterangan' => $keterangan,
            'jam_mulai' => $jamMulaiArray[$key],
            'jam_berakhir' => $jamBerakhirArray[$key],
        ]);
    }

    return redirect()->back()->with('success', 'Jam Pelajaran successfully added');
}


    
    public function update(Request $request, $id){
        $request->validate([
            'keterangan' => 'required',
            'jam_mulai' => 'required',
            'jam_berakhir' => 'required'      
        ]);

        $jampelajaran =  Jam_Pelajaran::findOrFail($id);
        $jampelajaran->update($request->all());
    return redirect()->back()->with('success', 'Data Kitab successfully added');

    }

    
    public function destroy($id){
        Jam_Pelajaran::destroy($id);
    
         return redirect()->back()->with('success', 'Data Kitab successfully deleted');
    

    }
}
