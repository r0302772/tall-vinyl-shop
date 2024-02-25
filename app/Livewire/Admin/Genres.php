<?php

namespace App\Livewire\Admin;

use App\Models\Genre;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Genres extends Component
{
    // sort properties
    public $orderBy = 'name';
    public $orderAsc = true;

    #[Layout('layouts.vinylshop', ['title' => 'Genres', 'description' => 'Manage the genres of your vinyl records',])]
    public function render()
    {
        $genres = Genre::withCount('records')
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->get();
        return view('livewire.admin.genres', compact('genres'));
    }

    public function resort($column)
    {
        $this->orderBy === $column ?
            $this->orderAsc = !$this->orderAsc :
            $this->orderAsc = true;
        $this->orderBy = $column;
    }
}
