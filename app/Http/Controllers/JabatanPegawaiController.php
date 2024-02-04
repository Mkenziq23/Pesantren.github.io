<?php

namespace App\Http\Controllers;

use App\Models\Jabatan_Pegawai;
use Illuminate\Http\Request;

class JabatanPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatan = Jabatan_Pegawai::all();
        $tittle = 'jabatan'; 
        return view('kepegawaian.jabatan', compact('jabatan', 'tittle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jabatan', [
            'tittle' => 'Tambah Jabatan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'kode_jabatan' => 'required',
            'nama_jabatan' => 'required',
            'unit_sekolah' => 'required',
        ]);

        Jabatan_Pegawai::create($request->all());

        return redirect()->route('jabatan.index')->with('success', 'Jabatan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan_Pegawai $jabatan)
    {
        return view('jabatan', compact('jabatan', 'tittle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jabatan_Pegawai $jabatan)
    {
          $tittle = 'Edit Jabatan';
    return view('jabatan', compact('jabatan', 'tittle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jabatan_Pegawai $jabatan)
    {
          $request->validate([
            'kode_jabatan' => 'required',
            'nama_jabatan' => 'required',
            'unit_sekolah' => 'required',
        ]);

        $jabatan->update($request->all());

        return redirect()->route('jabatan.index')->with('success', 'Jabatan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan_Pegawai $jabatan)
    {
         $jabatan->delete();

        return redirect()->route('jabatan.index')->with('success', 'Jabatan deleted successfully.');
    }
}
