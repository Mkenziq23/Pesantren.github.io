<?php

namespace App\Imports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;

class PegawaiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new Pegawai([
            'NIP' => $row['nip'],
           'Nama Lengkap' => $row['nama_lengkap'],
            'Jenis Kelamin' => $row['jenis_kelamin'],
            'Tempat Lahir' => $row['tempat_lahir'],
            'Tanggal Lahir' => $row['tanggal_lahir'],
            'Pendidikan Terakhir' => $row['pendidikan_terakhir'],
            'Unit Sekolah' => $row['unit_sekolah'],
            'Alamat' => $row['alamat'],
            'Telephone' => $row['telephone'],
            'Email' => $row['email'],

        ]);
    }
}
