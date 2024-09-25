<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
// use Livewire\Attributes\Validate;
use Livewire\Component;

class Clicker extends Component
{
    public $title = 'Clicker';

    #[Rule('required|min:2|max:50')]
    public $name;

    #[Rule('required|email|unique:users')]
    public $email;

    #[Rule('required|min:5')]
    public $password;

    public function CreateNewUSer(){
        $validated = $this->validate();

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset(['name', 'email', 'password']);
    }

    public function ClickDestroy($id){
        User::destroy('id', $id);
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.clicker', [
            'users' => $users,
        ]);
    }
}
