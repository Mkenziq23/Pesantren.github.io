<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jam_Masuk_dan_Pulang extends Model
{
    use HasFactory;

// In your Jam_Masuk_dan_Pulang model
protected $fillable = ['unit_id', 'hari', 'jam_masuk', 'jam_pulang'];
    protected $table = 'jammasukdanpulang';


     public function unit(){
        return $this->belongsTo(Unit::class);
    }
}
