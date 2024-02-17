<?php

namespace App\Livewire;

use App\Models\Record;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Shop extends Component
{
    use WithPagination;

    // public properties
    public $perPage = 6;
    public $loading = 'Please wait...';

    #[Layout('layouts.vinylshop', ['title' => 'Shop', 'description' => 'Welcome to our shop'])]
    public function render()
    {
        sleep(2);
        $records = Record::orderBy('artist')
            ->paginate($this->perPage);
        return view('livewire.shop', compact('records'));
    }
}
