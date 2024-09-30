<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app', ['page_title' => 'Data User'])]
#[Title('User')]
class UserIndex extends Component
{
    public function render()
    {
        $users = User::groupBy('name', 'Desc')->get();
        return view('livewire.user.user-index', [
            'users' => $users,
        ]);
    }
}
