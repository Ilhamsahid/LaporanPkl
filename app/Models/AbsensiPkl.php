<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsensiPkl extends Model
{
    protected $table = 'absensi_pkl';

    protected $fillable = [
        'siswa_id',
        'tanggal',
        'status',
        'keterangan',
        'jam_masuk',
        'jam_keluar'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
