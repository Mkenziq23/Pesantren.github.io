<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi_Khusus extends Model
{
    use HasFactory;
    protected $fillable = ['tanggal', 'pegawai_id', 'lokasi_id', 'keterangan'];
    Protected $table = 'presensi_khusus';

    public function pegawai(){
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
      }

      public function dataareapresensi(){
        return $this->belongsTo(Data_Area_Presensi::class, 'lokasi_id');
      }
}
