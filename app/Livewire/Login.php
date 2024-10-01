<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.guest')]
class Login extends Component
{
    #[Validate('required|email')]
    public $email;
    #[Validate('required|min:4')]
    public $password;
    public $remember = false;

    public function login(){
        $this->validate();

        if(Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)){
            session()->flash('message', 'Login Berhasil!');
            return redirect()->to('/dashboard');
        }else{
            session()->flash('message', 'Username atau Password tidak dikenali');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
