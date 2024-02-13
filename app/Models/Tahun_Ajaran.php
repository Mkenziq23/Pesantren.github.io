<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun_Ajaran extends Model
{
    use HasFactory;

    protected $fillable = ['tahun_awal', 'tahun_akhir', 'status'];
    protected $table = 'tahun_ajarans';

    public function semester(){
        return $this->hasMany(Semester::class);
    }

    public function jadwalpelajaran(){
        return $this->hasMany(Jadwal_Pelajaran::class);
    }
}
