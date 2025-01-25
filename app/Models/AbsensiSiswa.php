<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AbsensiSiswa extends Model
{
    //
    use HasFactory;

    protected $table = 'absensi_siswa';
    protected $fillable = ['absensi_id', 'nama', 'kelas', 'status'];

    public function absensi()
    {
        return $this->belongsTo(Absensi::class);
    }
}
