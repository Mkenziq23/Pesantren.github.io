<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\Jabatan_Pegawai;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class PegawaiController extends Controller
{
    public function index()
    {   
        $pegawai = Pegawai::with('Jabatan_Pegawai')->get();
        return view('kepegawaian.pegawai', ['pegawai' => $pegawai, 'tittle' => 'Pegawai Table']);
    }

    public function create()
    {
        return view('kepegawaian.create', [
            'jabatan' => Jabatan_Pegawai::all(),
            'tittle' => 'Tambah Jabatan'
        ]);
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'nip' => 'required|string|unique:pegawais',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'pendidikan_terakhir' => 'required',
            'unit_sekolah' => 'required',
            'jabatan_id' => 'required',
            'status_kepegawaian' => 'required',
            'alamat' => 'required',
            'telephone' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date',
            'status' => 'required',
            'image' => 'image|file|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

    if ($request->hasFile('image')) {
        $validatedData['image'] = $request->file('image')->store('post-images');
        }


        Pegawai::create($validatedData);

        return redirect('/kepegawaian/pegawai')->with('success', 'Employee added successfully!');
    }


    public function show(Pegawai $pegawai)
    {

        $pegawai->tanggal_lahir = Carbon::parse($pegawai->tanggal_lahir);
        $pegawai->load('riwayatpendidikan');
        $pegawai->load('datakeluarga');
        $pegawai->load('penghargaan');

    return view('showpegawai', [
        'pegawai' => $pegawai,
        'tittle' => 'Pegawai Detail',
        'lengthOfService' => $this->formatLengthOfService($pegawai->tanggal_masuk)]);
    }

    public function edit(Pegawai $pegawai)
    {
        $jabatan = Jabatan_Pegawai::all(); 

        return view('editpegawai', ['tittle' => 'Edit Pegawai', 'pegawai' => $pegawai, 'jabatan' => $jabatan]);
    }
    


    public function update(Request $request, $id){
           $validatedData = $request->validate([
        'nip' => 'required|string|unique:pegawais,nip,' . $id,
        'nama_lengkap' => 'required',
        'jenis_kelamin' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required|date',
        'pendidikan_terakhir' => 'required',
        'unit_sekolah' => 'required',
        'jabatan_id' => 'required',
        'status_kepegawaian' => 'required',
        'alamat' => 'required',
        'telephone' => 'required',
        'email' => 'required|email:dns',
        'password' => 'required',
        'tanggal_masuk' => 'required|date',
        'tanggal_keluar' => 'nullable|date',
        'status' => 'required',
        'image' => 'image|file|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $pegawai = Pegawai::findOrFail($id);

    if ($request->hasFile('image')) {
        if ($pegawai->image) {
            Storage::delete($pegawai->image);
        }

        $pegawai->image = $request->file('image')->store('post-images');
    }

    if ($request->has('password')) {
        $pegawai->password = Hash::make($request->input('password'));
    } else {
        $validatedData['password'] = $pegawai->password;
    }

    $pegawai->update($validatedData);

    return redirect('/kepegawaian/pegawai')->with('success', 'Employee updated successfully!');
    }

    public function destroy(Pegawai $pegawai)
    {
       if ($pegawai->image) {
            Storage::delete($pegawai->image);
        }

        $pegawai->delete();

        return redirect('/kepegawaian/pegawai')->with('success', 'Project has been deleted');
    }


  protected function formatLengthOfService($tanggal_masuk)
    {
        $tanggalMasuk = Carbon::parse($tanggal_masuk);
        $now = Carbon::now();
        $lengthOfService = $tanggalMasuk->diff($now);

        return $lengthOfService->format('%Y tahun %m bulan %d hari');
    }


    
    
}
