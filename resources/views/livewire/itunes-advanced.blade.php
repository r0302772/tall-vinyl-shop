@php use Carbon\Carbon; @endphp

<div>
    <div class="fixed top-8 left-1/2 -translate-x-1/2 z-50 animate-pulse"
         wire:loading>
        <x-tmk.preloader class="bg-lime-700/60 text-white border border-lime-700 shadow-2xl">
            {{ $loading }}
        </x-tmk.preloader>
    </div>
    <div class="flex gap-4">
        <div class="flex-1">
            <h2>{{$feed['title']}} - {{strtoupper($feed['country'])}}</h2>
            <h3>Last updated: {{ Carbon::parse($feed['updated'])->format('F j Y') }}</h3>
        </div>
        <div class="w-52">
            <x-tmk.form.select id="countryCode"
                               wire:model.live="countryCode"
                               class="block mt-1 w-full">
                @foreach ($countries as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </x-tmk.form.select>
            <x-tmk.form.select id="resultLimit"
                               wire:model.live="resultLimit"
                               class="block mt-1 w-full">
                @foreach ([6,10,12,15,20,25,50] as $value)
                    <option value="{{ $value }}">{{ $value }} items</option>
                @endforeach
            </x-tmk.form.select>
            <x-tmk.form.switch
                class="block mt-1 w-full"
                color-off="bg-green-500" color-on="bg-gray-200"
                text-on="Songs" text-off="Albums"
                wire:model.live="showSongs"/>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 2lg:grid-cols-3 2xl:grid-cols-3 gap-8 mt-8">
        @foreach($feed['results'] as $i => $result)
            <div class=" relative flex gap-4 bg-white border rounded overflow-hidden shadow-2xl">
                <img
                    src="{{ $result['artworkUrl100'] ?? asset('storage/covers/no-cover.png') }}"
                    class="w-40 aspect-square object-cover" alt="">
                <div class="py-2 flex-1 flex flex-col justify-between">
                    <div>
                        <p class="font-bold">{{$result['artistName']}}</p>
                        <p class="italic">{{$result['name']}}</p>
                    </div>
                    <hr>
                    <div>
                        <p class="text-sm">Genre:
                            <span class="font-bold">
                                {{$result['genres'][0]['name']}}
                            </span>
                        </p>
                        <p class="text-sm">Artist URL:
                            <a class="text-sky-600 underline"
                               href="{{$result['artistUrl'] ?? '#'}}"
                               target="appleMusic">
                                {{$result['artistName']}}
                            </a>
                        </p>
                    </div>
                </div>
                <div
                    class="absolute top-4 right-4 w-8 h-8 rounded-full grid place-items-center bg-orange-600/75 text-gray-100">
                    {{$i + 1}}
                </div>
            </div>
        @endforeach
    </div>
</div>
