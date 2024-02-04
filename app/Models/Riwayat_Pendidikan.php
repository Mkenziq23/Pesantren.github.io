<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat_Pendidikan extends Model
{
    use HasFactory;

    protected $fillable = ['tahun_masuk', 'tahun_lulus', 'pendidikan', 'lokasi'];

    protected $table = 'riwayat_pendidikan';

    public function pegawai(){
        return $this->belongsTo(Pegawai::class);
    }
}


