<?php

namespace App\Http\Controllers;

use App\Models\Data_Kitab;
use Illuminate\Http\Request;

class DataKitabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datakitab = Data_Kitab::all();
        $tittle = 'Data Kitab';
        return view ('akademik.data-kitab', compact('datakitab', 'tittle'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kitab' => 'required'
        ]);

           $nama_kitab_values = $request->input('nama_kitab');

    foreach ($nama_kitab_values as $nama_kitab) {
        Data_Kitab::create(['nama_kitab' => $nama_kitab]);
    }
        return redirect()->back()->with('Success', 'Data Kitab success to added');

}

    public function update(Request $request, Data_Kitab $datakitab, $id)
    {
        $request->validate([
            'nama_kitab' => 'required'
        ]);

        $datakitab = Data_Kitab::findOrFail($id);
        $datakitab->update($request->all());

        return redirect()->back()->with('Success', 'Data Kitab success to update');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Data_kitab::destroy($id);

        return redirect()->back()->with('Success', 'Data Kitab success to deleted');

    }
}
