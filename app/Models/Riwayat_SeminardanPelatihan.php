<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat_SeminardanPelatihan extends Model
{
    use HasFactory;

    protected $fillable = ['mulai', 'selesai', 'penyelenggara', 'lokasi'];

    protected $table = 'seminardanpelatihan';


    public function pegawai(){
        return $this->belongsTo(Pegawai::class);
    }
}
