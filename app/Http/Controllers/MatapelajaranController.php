<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Models\Matapelajaran;
use Illuminate\Support\Facades\Validator;

class MatapelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $unit = Unit::all();
        $tittle = 'Mata Pelajaran';

        $selectedUnit = $request->input('unit_id');
        $matapelajaran = Matapelajaran::with('unit');

        if ($selectedUnit) {
            $matapelajaran->where('unit_id', $selectedUnit);
        }

        $matapelajaran = $matapelajaran->get();

        return view('akademik.mata-pelajaran', compact('unit', 'matapelajaran', 'tittle', 'selectedUnit'));
    }


    public function store(Request $request)
    {
// dd($request->all());
        $request->validate([
            'unit_id' => 'required',
            'kode_mapel' => 'required',
            'nama_mapel' => 'required',
            'pengajar' => 'required'
        ]);

        Matapelajaran::create([
            'unit_id' => $request->unit_id,
            'kode_mapel' => $request->kode_mapel,
            'nama_mapel' => $request->nama_mapel,
            'pengajar' => $request->pengajar,
        ]);

        return redirect()->back()->with('success', 'Mata Pelajaran has been added');
    }

     public function update(Request $request, Matapelajaran $matapelajaran, $id)
    {

        // dd($request->all());
        $request->validate([
           'unit_id' => 'required',
            'kode_mapel' => 'required',
            'nama_mapel' => 'required',
            'pengajar' => 'required'
        ]);

        $matapelajaran = Matapelajaran::findOrFail($id);


        $matapelajaran->update([
              'unit_id' => $request->unit_id,
            'kode_mapel' => $request->kode_mapel,
            'nama_mapel' => $request->nama_mapel,
            'pengajar' => $request->pengajar,
        ]);


        return redirect()->back()->with('success', 'Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $matapelajaran = Matapelajaran::findOrFail($id);
    $matapelajaran->delete();

    return redirect()->back()->with('success', 'Berhasil dihapus');
    }

}
