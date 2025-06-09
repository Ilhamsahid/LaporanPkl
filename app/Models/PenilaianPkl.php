<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenilaianPkl extends Model
{
     protected $table = 'penilaian_pkl';

    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function pembimbing()
    {
        return $this->belongsTo(Pembimbing::class);
    }

    public function getRataRataAttribute(){
        return ($this->nilai_etika + $this->nilai_kedisplinan + $this->nilai_keterampilan + $this->nilai_wawasan) / 4;
    }
}