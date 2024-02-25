<?php

namespace App\Livewire;

use Http;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ItunesAdvanced extends Component
{
    public $countryCode = 'be';
    public $resultLimit = 10;
    public $showAlbums = true;
    public $loading = 'Please wait...';


    #[Layout('layouts.vinylshop',
        [
            'title' => 'iTunes - Advanced',
            'description' => 'iTunes - Advanced'
        ])]
    public function render()
    {
        $feed = $this->getFeed();
        $countries = include(base_path('resources/countries.php'));

        return view('livewire.itunes-advanced', compact('feed', 'countries'));
    }

    public function getFeed()
    {
        $url = "https://rss.applemarketingtools.com/api/v2/{$this->countryCode}/music/most-played/{$this->resultLimit}/"
            . ($this->showAlbums ? 'albums' : 'songs') . ".json";
        $response = Http::get($url)->json();
        // dump($response['feed']);
        return $response['feed'];
    }
}
