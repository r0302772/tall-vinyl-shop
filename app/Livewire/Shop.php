<?php

namespace App\Livewire;

use App\Models\Record;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Shop extends Component
{
    #[Layout('layouts.vinylshop', ['title' => 'Shop', 'description' => 'Welcome to our shop'])]
    public function render()
    {
        $records = Record::orderBy('artist')
            ->get();
        return view('livewire.shop', compact('records'));
    }
}
