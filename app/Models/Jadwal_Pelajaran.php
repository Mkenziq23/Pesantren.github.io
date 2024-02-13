<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_Pelajaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'jadwal_pelajarans';

    public function unit(){
        return $this->belongsTo(Unit::class);
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
    public function semester(){
        return $this->belongsTo(Semester::class);
    }

     public function tahunajaran(){
        return $this->belongsTo(Tahun_Ajaran::class);
    }

    public function jampelajaran(){
        return $this->belongsTo(Jam_Pelajaran::class);
    }

    public function matapelajaran(){
        return $this->belongsTo(Matapelajaran::class);
    }
}
