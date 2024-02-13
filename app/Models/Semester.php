<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = ['nama_semester', 'tahunajaran_id'];
    protected $table = 'semesters';

    public function tahunajaran(){
        return $this->belongsTo(Tahun_Ajaran::class, 'tahunajaran_id', 'id');
    }

    public function jadwalpelajaran(){
        return $this->hasMany(Jadwal_Pelajaran::class);
    }
}
