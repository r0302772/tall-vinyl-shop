<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Records extends Component
{
    // filter and pagination
    public $search;
    public $noStock = false;
    public $noCover = false;
    public $perPage = 5;
    // show/hide the modal
    public $showModal = false;

    #[Layout('layouts.vinylshop', ['title' => 'Records', 'description' => 'Manage the records of your vinyl records',])]
    public function render()
    {
        return view('livewire.admin.records');
    }
}
