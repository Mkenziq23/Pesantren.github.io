<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

      protected $fillable = [
    'nip', 'nama_lengkap', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir',
    'pendidikan_terakhir', 'unit_sekolah', 'jabatan_id', 'status_kepegawaian',
    'alamat', 'telephone', 'email', 'password', 'tanggal_masuk', 'tanggal_keluar',
    'status', 'image'
];


    public function Jabatan_Pegawai(){
        return $this->belongsTo(Jabatan_Pegawai::class, 'jabatan_id', 'id');
    }
    
    public function riwayatpendidikan(){
        return $this->hasMany(Riwayat_Pendidikan::class);
    }
    public function datakeluarga(){
        return $this->hasMany(Data_Keluarga::class);
    }

    public function penghargaan(){
        return $this->hasMany(Penghargaan::class);
    }

    public function riwayatmengajar(){
        return $this->hasMany(Riwayat_Mengajar::class);
    }

    public function riwayatseminardanpelatihan(){
        return $this->hasMany(Riwayat_SeminardanPelatihan::class);
    }

    public function riwayatjabatan(){
        return $this->hasMany(Riwayat_Jabatan::class);
    }
}
