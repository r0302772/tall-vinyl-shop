<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class UsersExpert extends Component
{

    #[Layout('layouts.vinylshop', ['title' => 'Users (expert)', 'description' => 'Manage users (expert)',])]
    public function render()
    {
        return view('livewire.admin.users-expert');
    }
}
