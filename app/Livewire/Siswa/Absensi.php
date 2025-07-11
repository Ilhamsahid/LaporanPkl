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
            'masuk' => $this->defaultPropsHandleLogin([
                'btn' => 'btn btn-primary',
                'time' => '--:--',
                'text' => '--text-secondary',
                'icon' => '--text-secondary',
                'access' => '',
            ], 'masuk'),
            'keluar' => $this->defaultPropsHandleLogin([
                'btn' => 'btn btn-secondary',
                'time' => '--:--',
                'text' => '--text-secondary',
                'icon' => '--text-secondary',
                'access' => '',
            ], 'keluar'),
        ];
    }

    public function defaultPropsHandleLogin($props, $type){
        $login = AbsensiPkl::with('siswa')
            ->where('siswa_id', Auth::user()->id)
            ->latest('tanggal')
            ->first();
        $islogin = $login->tanggal >= now()->format('Y-m-d');
        $islogout = $login->jam_keluar;

        return [
            'btn' => !$islogin ? $props['btn'] : ($type == 'masuk' || $islogout ? 'btn btn-secondary' : 'btn btn-primary'),
            'time' => !$islogin ? $props['time'] : ($type == 'masuk' || $islogout ? $login['jam_'.$type] : '--:--'),
            'text' => !$islogin ? $props['text'] : ($type == 'masuk' || $islogout ? '--success-500' : '--text-secondary'),
            'icon' => !$islogin ? $props['icon'] : ($type == 'masuk' || $islogout ? '--success-500' : '--text-secondary'),
            'access' => !$islogin ? $props['access'] : ($type == 'masuk' || $islogout ? 'disabled' : 'active'),
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
        $login = AbsensiPkl::with('siswa')
            ->where('siswa_id', Auth::user()->id)
            ->whereDate('tanggal', now())
            ->first();
        $login->jam_keluar = now()->format('H:i:s');
        $login->save();

        $this->handleKeluar($login, 'keluar');
        $this->dispatch('post', type: 'success', message: 'Absen keluar sukses!');
    }
    public function handleUI($btn, $type, $absensi){
        $this->props[$btn] = [
            'btn' => 'btn btn-secondary',
            'time' => $type == 'hadir' || $type == 'keluar' ? $absensi : '--:--',
            'text' => $type == 'hadir' || $type == 'keluar' ? '--success-500' : '--text-secondary',
            'icon' => $type == 'hadir' || $type == 'keluar' ? '--success-500' : '--text-secondary',
        ];

        $this->props[$btn]['access'] = $type == 'keluar' ? '' : 'disabled';
    }

    public function handleMasuk($absensi, $type){
        $this->handleUI('masuk', $type, $absensi->jam_masuk);
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

    public function handleKeluar($absensi, $type){
        $this->handleUI('keluar', $type, $absensi->jam_keluar);
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
