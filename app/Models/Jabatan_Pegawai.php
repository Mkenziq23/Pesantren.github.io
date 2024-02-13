<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan_Pegawai extends Model
{
    use HasFactory;

      protected $fillable = ['kode_jabatan', 'nama_jabatan', 'unit_sekolah'];
      protected $table = 'jabatan_pegawais';



      public function pegawai(){
        return $this->belongsTo(Pegawai::class);
      }
}
