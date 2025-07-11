<?php

namespace App\Livewire\Siswa;

use Livewire\Component;

class ModalAbsensi extends Component
{
    public $timeNow = '';
    public $alert = [];
    public $showModal = true;
    protected $listeners = ['selected-attendance-js' => 'selectedAttendanceType'];

    public function mount(){
        $this->timeNow = now()->format('H:i:s');
        $this->alert = $this->getAlertByTime(now()->format('H:i'));
    }

    public function getAlertByTime($time){
        $startTime = '07:00';
        $late = '09:00';
        $endTime = '17:00';
        $alert = [
            'message' => 'Anda dapat melakukan absensi sekarang.',
            'type' => 'info',
        ];

        if ($time < $startTime) {
            $alert['type'] = 'info';
            $alert['message'] = 'Absensi belum dimulai. Waktu absensi mulai pukul 07:00.';
        }else if($time >= $late && $time <= $endTime){
            $alert['type'] = 'warning';
            $alert['message'] = 'Anda terlambat. Absensi akan dicatat sebagai terlambat.';
        }else if($time >= $endTime){
            $alert['type'] = 'error';
            $alert['message'] = 'Waktu absensi telah berakhir. anda dihitung alpha';
        }

        return $alert;
    }

    public function selectedAttendanceType($type){
        $this->dispatch('absenMasuk', $type);
    }

    public function render()
    {
        return view('livewire.siswa.modal-absensi');
    }
}
