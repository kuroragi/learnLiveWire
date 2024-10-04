<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $users = count(User::all());
        return view('livewire.dashboard', [
            'users' => $users,
        ]);
    }
}
