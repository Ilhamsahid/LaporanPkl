<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempatPkl extends Model
{
    protected $table = 'tempat_pkl';

    protected $fillable = [
        'nama_tempat',
        'alamat',
        'telepon',
        'email',
        'bidang'
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}