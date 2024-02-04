<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat_Jabatan extends Model
{
    use HasFactory;

    protected $fillable = ['tahun_mulai', 'tahun_selesai', 'keterangan'];

    protected $table = 'riwayat_jabatans';

    public function pegawai(){
        return $this->belongsTo(Pegawai::class);
    }
}
