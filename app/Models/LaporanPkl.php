<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPkl extends Model
{
    use HasFactory;
    protected $table = 'laporan_pkl';

    protected $fillable = [
        'siswa_id',
        'judul',
        'isi_laporan',
        'jenis_laporan',
        'tanggal',
        'status',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
