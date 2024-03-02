<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class UsersAdvanced extends Component
{

    #[Layout('layouts.vinylshop', ['title' => 'Users (advanced)', 'description' => 'Manage users (advanced)',])]
    public function render()
    {
        return view('livewire.admin.users-advanced');
    }
}
