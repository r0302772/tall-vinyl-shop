<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Log extends Component
{
    public int $perPage = 10;
    public bool $showModal = false;
    public array $person = [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
    ];

    #[Layout('layouts.vinylshop', ['title' => 'Livewire log example',])]
    public function render()
    {
        $users = User::orderBy('name')->get();
        return view('livewire.log', compact('users'));
    }
}
