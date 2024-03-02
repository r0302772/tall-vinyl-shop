<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class UsersBasic extends Component
{

    #[Layout('layouts.vinylshop', ['title' => 'Users (basic)', 'description' => 'Manage users (basic)',])]
    public function render()
    {
        return view('livewire.admin.users-basic');
    }
}
