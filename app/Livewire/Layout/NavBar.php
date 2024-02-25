<?php

namespace App\Livewire\Layout;

use Livewire\Attributes\On;
use Livewire\Component;

class NavBar extends Component
{
    #[On('refresh-navigation-menu')] // refresh the NavBar component when the 'refresh-navigation-menu' event is emitted
    public function render()
    {
        return view('livewire.layout.nav-bar');
    }
}
