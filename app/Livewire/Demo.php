<?php

namespace App\Livewire;

use App\Models\Genre;
use App\Models\Record;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Demo extends Component
{
    use WithPagination;

    #[Layout('layouts.vinylshop', [
        'title' => 'Eloquent models',
        'subtitle' => 'Eloquent models: part 2',
        'description' => 'Eloquent models: part 2',
    ])]
    public function render()
    {
        $maxPrice = 20;
        $perPage = 8;
        $records = Record::orderBy('artist')
            ->orderBy('title')
            ->maxPrice($maxPrice)
            ->paginate($perPage);
        $genres = Genre::orderBy('name')
            ->with('records')
            ->get();
        return view('livewire.demo', compact('records','genres'));
    }
}
