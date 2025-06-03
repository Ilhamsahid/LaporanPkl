<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pembimbing extends Authenticatable
{
    use Notifiable;

    protected $table = 'pembimbing';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'telepon',
    ];

    protected $hidden = [
        'password',
    ];
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }


    public function penilaian()
    {
        return $this->hasMany(PenilaianPkl::class);
    }
}