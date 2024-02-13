<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_Area_Presensi extends Model
{
    use HasFactory;

    protected $fillable = ['nama_area', 'longi', 'lati', 'keterangan'];
    protected $table = 'data_area_presensi';

    public function presensikhusus(){
        return $this->hasMany(Presensi_Khusus::class, 'lokasi_id');
    }
}
