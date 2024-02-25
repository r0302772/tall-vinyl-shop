<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\RecordForm;
use App\Models\Record;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Records extends Component
{
    use WithPagination;

    // filter and pagination
    public $search;
    public $noStock = false;
    public $noCover = false;
    public $perPage = 5;
    // show/hide the modal
    public $showModal = false;

    public RecordForm $form;

    #[Layout('layouts.vinylshop', ['title' => 'Records', 'description' => 'Manage the records of your vinyl records',])]
    public function render()
    {
        // filter by $search
        $query = Record::orderBy('artist')
            ->orderBy('title')
            ->searchTitleOrArtist($this->search);
        // only if $noStock is true, filter the query further, else, skip this step
        if($this->noStock)
            $query->where('stock', false);
        // only if $noCover is true, filter the query further, else, skip this step
        if($this->noCover)
            $query->coverExists(false);
        // paginate the $query
        $records = $query
            ->paginate($this->perPage);
        return view('livewire.admin.records', compact('records'));
    }

    // reset the paginator
    public function updated($propertyName, $propertyValue)
    {
        // reset if the $search, $noCover, $noStock or $perPage property has changed (updated)
        if (in_array($propertyName, ['search', 'noCover', 'noStock', 'perPage']))
            $this->resetPage();
    }
}
