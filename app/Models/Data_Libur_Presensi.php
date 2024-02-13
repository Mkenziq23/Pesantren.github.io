<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_Libur_Presensi extends Model
{
    use HasFactory;
    protected $fillable =['hari', 'keterangan'];
    protected $table ='dataliburpresensi';

}
