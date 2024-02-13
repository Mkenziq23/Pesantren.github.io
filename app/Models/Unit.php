<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $fillable = ['unit'];
    protected $table = 'unit';


    public function jammasukdanpulang(){
        return $this->hasMany(Jam_Masuk_dan_Pulang::class);
    }

    public function matapelajaran(){
        return $this->hasMany(Matapelajaran::class);
    }

    public function rekappresensidiweb(){
        return $this->hasMany(RekapPresensidiWeb::class);
    }

    public function jadwalpelajaran(){
        return $this->hasMany(Jadwal_Pelajaran::class);
    }
}
