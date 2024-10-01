<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.app', ['page_title' => 'Data User'])]
#[Title('User')]
class UserIndex extends Component
{
    public $modalTitle;
    public $isEditMode = false;
    public $user;

    public $userId;
    #[Validate('required|min:3')]
    public $name;
    #[Validate('required|email')]
    public $email;
    #[Validate('nullable|min:4')]
    public $password;

    public $listener = ['resetField', 'closeModal', 'editUser'];

    public function mount($userId = null){
        if($userId){
            $this->editUser($userId);
        }
    }

    public function addUser(){
        $this->modalTitle = 'Tambah Pengguna';
        $this->resetField();
    }

    public function editUser($userId){
        $user = User::find($userId);
        $this->user = $user;
        if($user){
            $this->userId = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->isEditMode = true;
            $this->dispatch('editUser');
        }
    }

    public function saveUser(){
        $validated = $this->validate();

        $passwordHash = $this->password ? Hash::make($this->password) : null;

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $passwordHash ?? $this->user['password'],
        ];
        
        $createUpdatePost = User::updateOrCreate(['id' => $this->userId], $data);

        session()->flash('message', $this->isEditMode ? 'Post berhasil diupdate' : 'Post Berhasil ditamabah');
        
        if($createUpdatePost){
            $this->dispatch('closeModal');
            $this->ResetField();
        }
    }

    public function deleteUser($userId){
        if($userId){
            User::destroy($userId);
        }
    }

    public function resetField(){
        $this->reset(['name', 'email', 'password']);
        $this->isEditMode = false;
        $this->dispatch('resetField');
    }

    public function render()
    {
        $users = User::orderBy('name', 'Desc')->get();
        return view('livewire.user.user-index', [
            'users' => $users,
        ]);
    }
}
