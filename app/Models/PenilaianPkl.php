<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenilaianPkl extends Model
{
     protected $table = 'penilaian_pkl';

    protected $fillable = [
        'siswa_id',
        'pembimbing_id',
        'nilai',
        'komentar',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function pembimbing()
    {
        return $this->belongsTo(Pembimbing::class);
    }
}