<?php

namespace App\Livewire;

use App\Models\Genre;
use App\Models\Record;
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
        $maxPrice = 20;
        $records = Record::orderBy('artist')
            ->orderBy('title')
            ->maxPrice(20)
            ->get();
        $genres = Genre::orderBy('name')
            ->with('records')
            ->get();
        return view('livewire.demo', compact('records','genres'));
    }
}
