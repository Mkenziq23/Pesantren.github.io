<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat_Mengajar extends Model
{
    use HasFactory;

    protected $fillable = ['tahun_mulai', 'tahun_selesai', 'mapel', 'keterangan'];

    protected $table = 'riwayat_mengajar';

    public function pegawai(){
        return $this->belongsTo(Pegawai::class);
    }
}
