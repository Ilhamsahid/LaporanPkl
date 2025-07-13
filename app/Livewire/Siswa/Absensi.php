<?php

namespace App\Livewire\Siswa;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AbsensiPkl;
use Illuminate\Support\Facades\Auth;

class Absensi extends Component
{
    use WithPagination;
    public $props = [];
    protected $listeners = ['absenMasuk' => 'absenMasuk'];

    public function mount(){
        $this->props = absenAutoIfExpired(now()->format('H:i:s'), AbsensiPkl::class, $this->props);

        $this->props = [
            'masuk' => defaultPropsHandleLogin([
                'btn' => 'btn btn-primary',
                'time' => '--:--',
                'text' => '--text-secondary',
                'icon' => '--text-secondary',
                'access' => '',
            ], 'masuk', AbsensiPkl::class),
            'keluar' => defaultPropsHandleLogin([
                'btn' => 'btn btn-secondary',
                'time' => '--:--',
                'text' => '--text-secondary',
                'icon' => '--text-secondary',
                'access' => '',
            ], 'keluar', AbsensiPkl::class),
        ];
    }

    public function absenMasuk($type){
        $absensi = AbsensiPkl::create([
            'siswa_id' => Auth::user()->id,
            'tanggal' => now(),
            'jam_masuk' => now()->format('H:i:s'),
            'status' => 'hadir',
        ]);


        $this->handleMasuk($absensi, $type);
        $this->dispatch('absensiBerhasil');
        $this->dispatch('post', type: 'success', message: 'Absen berhasil!');
    }

    public function absenKeluar(){
        $login = getAbsensiBySiswaId(AbsensiPkl::class);
        $login->jam_keluar = now()->format('H:i:s');
        $login->save();

        $this->handleKeluar($login, 'keluar');
        $this->dispatch('post', type: 'success', message: 'Absen keluar sukses!');
    }

    public function handleMasuk($absensi, $type){
        $this->props = handleUI($this->props, 'masuk', $type, $absensi->jam_masuk);
        if($type == 'hadir'){
            $this->props['keluar']['btn'] = 'btn btn-primary';
            $this->props['keluar']['access'] = 'active';

            if(isTerlambat($absensi->jam_masuk)){ 
                $absensi->status = 'terlambat';
                $absensi->save();
            }
        }else{
            $absensi->status = $type;
            $absensi->jam_masuk = null;
            $absensi->save();
        }
    }

    public function handleKeluar($absensi, $type){
        $this->props = handleUI($this->props, 'keluar', $type, $absensi->jam_keluar);
    }

    public function render()
    {
        $absensis = AbsensiPkl::with('siswa')->where('siswa_id', Auth::user()->id)->latest()->paginate(5);
        return view('livewire.siswa.absensi',[
            'absensis' => $absensis
        ]);
    }
}
