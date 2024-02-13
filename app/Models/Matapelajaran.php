<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matapelajaran extends Model
{
    use HasFactory;
    protected $fillable = ['unit_id', 'kode_mapel', 'nama_mapel', 'pengajar'];
    protected $table = 'matapelajarans';


    public function unit(){
        return $this->belongsTo(Unit::class);
    }

    public function jadwalpelajaran(){
        return $this->hasMany(Jadwal_Pelajaran::class);
    }
}
