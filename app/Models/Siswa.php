<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Siswa extends Authenticatable
{
    use Notifiable;

    protected $table = 'siswa';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'alamat',
        'telepon',
        'pembimbing_id',
        'tempat_pkl_id',
        'kelas_id'
    ];

    protected $hidden = [
        'password',
    ];

    public function pembimbing()
    {
        return $this->belongsTo(Pembimbing::class);
    }

    public function tempatPkl()
    {
        return $this->belongsTo(TempatPkl::class);
    }

    public function laporan()
    {
        return $this->hasMany(LaporanPkl::class);
    }

    public function absensi()
    {
        return $this->hasMany(AbsensiPkl::class);
    }

    public function penilaian()
    {
        return $this->hasMany(PenilaianPkl::class);
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
}