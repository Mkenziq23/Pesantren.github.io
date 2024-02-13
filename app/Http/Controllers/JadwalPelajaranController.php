<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Kelas;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Models\Jadwal_Pelajaran;
use App\Models\Jam_Pelajaran;
use App\Models\Matapelajaran;
use App\Models\Tahun_Ajaran;

class JadwalPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
    {
        $unit = Unit::all();
        $kelas = Kelas::all();
        $semester = Semester::all();
        $tahunajaran = Tahun_Ajaran::all();
        $jampelajaran = Jam_Pelajaran::all();
        $matapelajaran = Matapelajaran::all();
        $tittle = 'Jadwal Pelajaran';
        $jadwalpelajaran = Jadwal_Pelajaran::with('unit', 'kelas', 'semester', 'tahunajaran', 'jampelajaran', 'matapelajaran');

        $selectedUnit = $request->input('unit_id');
        $selectedClass = $request->input('kelas_id');
        $selectedSemester = $request->input('semester_id');
        $selectedTahunajaran = $request->input('tahunajaran_id');
        $selectedDay = $request->input('hari');

        if ($selectedUnit) {
            $jadwalpelajaran->where('unit_id', $selectedUnit);
        }

        if ($selectedClass) {
            $jadwalpelajaran->where('kelas_id', $selectedClass);
        }

        if ($selectedSemester) {
            $jadwalpelajaran->where('semester_id', $selectedSemester);
        }

        if ($selectedTahunajaran) {
            $jadwalpelajaran->where('tahunajaran_id', $selectedTahunajaran);
        }

        if ($selectedDay) {
            $jadwalpelajaran->where('hari', $selectedDay);
        }

        $jadwalpelajaran = $jadwalpelajaran->get();

        

        return view('akademik.jadwal-pelajaran', compact('tittle',
            'unit', 'selectedUnit', 'selectedClass', 'selectedSemester',
            'selectedTahunajaran', 'selectedDay', 'jadwalpelajaran', 'kelas', 'semester',
            'tahunajaran', 'jampelajaran', 'matapelajaran'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'unit_id' => 'required',
            'kelas_id' => 'required',
            'semester_id' => 'required',
            'tahunajaran_id' => 'required',
            'hari' => 'required',
            'matapelajaran_id' => 'required',
            'jampelajaran_id' => 'required',
        ]);

        $jadwalpelajaran = new Jadwal_Pelajaran([
            'unit_id' => $request->input('unit_id'),
            'kelas_id' => $request->input('kelas_id'),
            'semester_id' => $request->input('semester_id'),
            'tahunajaran_id' => $request->input('tahunajaran_id'),
            'hari' => $request->input('hari'),
            'matapelajaran_id' => $request->input('matapelajaran_id'),
            'jampelajaran_id' => $request->input('jampelajaran_id'),
        ]);

        $jadwalpelajaran->save();

        return redirect()->back()->with('Success', 'Data success to added');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal_Pelajaran $jadwalpelajaran, $id)
    {
        $jadwalpelajaran = Jadwal_Pelajaran::findOrFail($id);
        $jadwalpelajaran->delete();

        return redirect()->back()->with('Success', 'Data success to deleted');

    }
}
