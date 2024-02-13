<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Models\Tahun_Ajaran;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semester = Semester::with('tahunajaran')->get();
        $tahunajaran = Tahun_Ajaran::all();
        $tittle = 'Semester';
        return view ('akademik.semester', compact('tahunajaran', 'semester', 'tittle'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_semester' => 'required',
            'tahunajaran_id' => 'required'
        ]);

        Semester::create($request->all());

        return redirect()->back()->with('Success', 'Semester has been addedd');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Semester $semester)
    {
        $request->validate([
            'nama_semester' => 'required',
            'tahunajaran_id' => 'required'
        ]);

        $semester->update($request->all());

        return redirect()->back()->with('Success', 'Semester has been update');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $semester = Semester::findOrFail($id);
        $semester->delete();

        return redirect()->back()->with('Success', 'Semester has been deleted');
        
    }





}
