<?php

namespace App\Livewire;

use App\Http\Controllers\HelperController;
use Livewire\Component;

class RoleContoh extends Component
{
    public $testingNama;
    public $roles = [];
    public $isEditMode;
    

    public $listener = ['closeModal, EditRole, resetField'];

    public function render()
    {
        return view('livewire.role-contoh');
    }

    public function testingClick(){
        $tet = HelperController::getSlug($this->testingNama);
    }

    public function resetField(){
        $this->reset(['name']);
        $this->isEditMode = false;
    }
}
