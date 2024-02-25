<?php

namespace App\Livewire;

use Http;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ItunesBasic extends Component
{
    public $countryCode = 'be';
    public $resultLimit = 10;
    public $type = 'albums';

    #[Layout('layouts.vinylshop',
        [
            'title' => 'iTunes - Basic',
            'description' => 'iTunes - Basic'
        ])]
    public function render()
    {
        $feed = $this->getFeed();

        return view('livewire.itunes-basic',compact('feed'));
    }

    public function getFeed(): array
    {
        $url = "https://rss.applemarketingtools.com/api/v2/{$this->countryCode}/music/most-played/{$this->resultLimit}/{$this->type}.json";
        $response = Http::get($url)->json();
        // dump($response['feed']);
        return $response['feed'];
    }
}
