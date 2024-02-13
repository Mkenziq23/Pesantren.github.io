<?php

namespace App\Http\Controllers;

use App\Models\Tahun_Ajaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
   public function index()
    {
        $tahunajaran = Tahun_Ajaran::all();
        $tittle = 'Tahun Ajaran';
        return view('akademik.tahun-ajaran', compact('tahunajaran', 'tittle'));
    }

    public function store(Request $request){

        $request->validate([
        'tahun_awal' => 'required',
        'tahun_akhir' => 'required',
        'status' => 'required|string'
        ]);

        Tahun_Ajaran::create($request->all());

        return redirect()->back()->with('Success', 'Tahun Ajaran susccess to added');
    }

    public function update(Request $request, Tahun_Ajaran $tahunajaran, $id){
        $request->validate([
        'tahun_awal' => 'required',
        'tahun_akhir' => 'required',
        'status' => 'required|string'
        ]);

        $tahunajaran = Tahun_Ajaran::findOrFail($id);
        $tahunajaran->update($request->all());

        return redirect()->back()->with('Success', 'Tahun Ajaran susccess to update');

    }

    public function destroy($id){
        Tahun_Ajaran::destroy($id);

        return redirect()->back()->with('Success', 'Tahun Ajaran has been to Deleted');

        
    }

    public function activateStatus($id)
    {
        Tahun_Ajaran::where('id', '!=', $id)->update(['status' => 'Tidak Aktif']);
        Tahun_Ajaran::where('id', $id)->update(['status' => 'Aktif']);

        return response()->json(['success' => true]);
    }

}
