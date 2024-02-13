<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    public function jadwalpelajaran(){
        return $this->hasMany(Jadwal_Pelajaran::class);
    }
}
