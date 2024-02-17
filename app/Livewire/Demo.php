<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Demo extends Component
{
    #[Layout('layouts.vinylshop', [
        'title' => 'Eloquent models',
        'subtitle' => 'Eloquent models: part 2',
        'description' => 'Eloquent models: part 2',
    ])]
    public function render()
    {
        return view('livewire.demo');
    }
}
