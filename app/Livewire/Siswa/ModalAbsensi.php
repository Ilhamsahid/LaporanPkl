<?php

namespace App\Livewire\Siswa;

use Livewire\Component;

class ModalAbsensi extends Component
{
    public $timeNow = '';
    public $showModal = true;
    protected $listeners = ['selected-attendance-js' => 'selectedAttendanceType'];

    public function mount(){
        $this->timeNow = now()->format('H:i:s');
    }

    public function selectedAttendanceType($type){
        $this->dispatch('absenMasuk', $type);
    }

    public function render()
    {
        return view('livewire.siswa.modal-absensi');
    }
}
