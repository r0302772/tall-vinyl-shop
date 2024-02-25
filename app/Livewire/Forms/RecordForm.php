<?php

namespace App\Livewire\Forms;

use App\Models\Record;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RecordForm extends Form
{
    public $id = null;
    #[Validate('required', as: 'name of the artist')]
    public $artist = null;
    #[Validate('required', as: 'title for this record')]
    public $title = null;
    #[Validate('required|size:36|unique:records,mb_id,id', as: 'MusicBrainz ID')]
    public $mb_id = null;
    #[Validate('required|numeric|min:0', as: 'stock')]
    public $stock = null;
    #[Validate('required|numeric|min:0', as: 'price')]
    public $price = null;
    #[Validate('required|exists:genres,id', as: 'genre')]
    public $genre_id = null;
    public $cover = '/storage/covers/no-cover.png';

    // read the selected record
    public function read($record)
    {
        $this->id = $record->id;
        $this->artist = $record->artist;
        $this->title = $record->title;
        $this->mb_id = $record->mb_id;
        $this->stock = $record->stock;
        $this->price = $record->price;
        $this->genre_id = $record->genre_id;
        $this->cover = $record->cover;
    }

    // create a new record
    public function create()
    {
        $this->validate();
        Record::create([
            'artist' => $this->artist,
            'title' => $this->title,
            'mb_id' => $this->mb_id,
            'stock' => $this->stock,
            'price' => $this->price,
            'genre_id' => $this->genre_id,
        ]);
    }

    // update the selected record
    public function update(Record $record) {
        $this->validate();
        $record->update([
            'stock' => $this->stock,
            'price' => $this->price,
            'genre_id' => $this->genre_id,
        ]);
    }

    // delete the selected record
    public function delete(Record $record)
    {
        $record->delete();
    }
}
