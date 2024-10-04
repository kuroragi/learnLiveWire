<?php

namespace App\Livewire;

use app\CPU\Helpers;
use App\Http\Controllers\HelperController;
use App\Models\Role as ModelsRole;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.app', ['page_title' => 'Data Role'])]
#[Title('Role')]
class Role extends Component
{
    public $roleId;
    public $isEditMode;
    public $roles;

    #[Validate('required')]
    public $name;

    public $listener = ['closeModal, EditRole, resetField'];

    public function editRole($id){
        $role = ModelsRole::findOrFail($id);
        
        if($role){
            $this->roleId = $id;
            $this->name = $role->name;
            $this->isEditMode = true;
            $this->dispatch('editRole');
        }
    }

    public function resetField(){
        $this->reset(['name']);
        $this->isEditMode = false;
    }

    public function saveRole(){
        $this->validate(
            [
                'name' => 'required|string'
            ],[
                'name.required' => 'Nama role tidak boleh kosong',
                'name.string' => 'Nama tidak valid !'
            ]
        );
        
        $this->dispatch('closeModal');

        $data = [
            'name' => $this->name,
            'slug' => Helpers::getSlug($this->name),
        ];

        $createUpdateRole = ModelsRole::updateOrCreate(['id' => $this->roleId], $data);

        if($createUpdateRole){
            $this->roles = ModelsRole::orderBy('name')->get();
            $this->resetField();
        }
    }

    public function mount(){
        $this->roles = ModelsRole::orderBy('name', 'Desc')->get();
    }

    public function render()
    {
        return view('livewire.role');
    }
}
