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
        $this->props = [
            'masuk' => $this->defaultProps('btn-primary'),
            'keluar' => $this->defaultProps('btn-secondary'),
        ];
    }

    public function defaultProps($btn){
        return [
            'btn' => 'btn '. $btn,
            'time' => '--:--',
            'text' => '--text-secondary',
            'icon' => '--success-500',
            'access' => '',
        ];
    }

    public function absenMasuk($type){
        $absensi = AbsensiPkl::create([
            'siswa_id' => Auth::user()->id,
            'tanggal' => now(),
            'jam_masuk' => now()->format('H:i'),
            'status' => 'hadir',
        ]);


        $this->handleMasuk($absensi, $type);
        $this->dispatch('absensiBerhasil');
        $this->dispatch('post', type: 'success', message: 'Absen berhasil!');
    }

    public function handleMasuk($absensi, $type){
        $this->props['masuk'] = [
            'btn' => 'btn btn-secondary',
            'time' => $type == 'hadir' ? $absensi->jam_masuk : '--:--',
            'text' => $type == 'hadir' ? '--success-500' : '--text-secondary',
            'icon' => $type == 'hadir' ? '--success-500' : '--text-secondary',
        ];

        $this->props['masuk']['access'] = 'disabled';

        if($type == 'hadir'){
            $this->props['keluar']['btn'] = 'btn btn-primary';
            $this->props['keluar']['access'] = 'active';

            if($this->isTerlambat($absensi->jam_masuk)){ 
                $absensi->status = 'terlambat';
                $absensi->save();
            }
        }else{
            $absensi->status = $type;
            $absensi->jam_masuk = null;
            $absensi->save();
        }
    }

    public function isTerlambat($jam){
        return strtotime($jam) > strtotime('09:00') && strtotime($jam) < strtotime('17:00');
    }

    public function render()
    {
        $absensis = AbsensiPkl::with('siswa')->where('siswa_id', Auth::user()->id)->latest()->paginate(5);
        return view('livewire.siswa.absensi',[
            'absensis' => $absensis
        ]);
    }
}
