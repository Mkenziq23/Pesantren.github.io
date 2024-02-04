<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_Keluarga extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'hubungan'];

    protected $table = 'data_keluargas';

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
