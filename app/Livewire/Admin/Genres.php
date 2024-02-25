<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Genres extends Component
{
    #[Layout('layouts.vinylshop', ['title' => 'Genres', 'description' => 'Manage the genres of your vinyl records',])]
    public function render()
    {
        return view('livewire.admin.genres');
    }
}
