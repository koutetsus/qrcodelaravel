<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absensi extends Model
{
    //
    use HasFactory;

    protected $fillable = ['judul' , 'photo'];
    // public function siswa()
    // {
    //     return $this->hasMany(AbsensiSiswa::class, 'absensi_id'); // 'absensi_id' adalah foreign key di tabel absensi_siswa
    // }
    public function absensiSiswa()
    {
        return $this->hasMany(AbsensiSiswa::class);
    }
}
