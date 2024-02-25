@php use Carbon\Carbon; @endphp

<div>
    <div class="flex gap-4">
        <div class="flex-1">
            <h2>{{$feed['title']}} - {{strtoupper($feed['country'])}}</h2>
            <h3>Last updated: {{ Carbon::parse($feed['updated'])->format('F j Y') }}</h3>
        </div>
    </div>

    <table class="w-full text-left bg-white border border-gray-100 shadow-2xl mt-8">
        <thead>
        <tr class="bg-gray-800 text-gray-100">
            <th class="px-4 py-2">#</th>
            <th class="px-4 py-2">Cover</th>
            <th class="px-4 py-2">Artist</th>
            <th class="px-4 py-2">Genre</th>
            <th class="px-4 py-2">Artist URL</th>
        </tr>
        </thead>
        <tbody>
        @foreach($feed['results'] as $i => $song)
            <tr class="border-t border-gray-100 align-top">
                <td class="px-4 py-2">{{$i + 1}}</td>
                <td class="px-4 py-2">
                    <a href="{{$song['url']}}" target="itunes">
                        <img src="{{ $song['artworkUrl100'] ?? asset('storage/covers/no-cover.png') }}" alt=""
                             class="w-12 h-12">
                    </a>
                </td>
                <td class="px-4 py-2">
                    {{$song['artistName']}}
                    <br/>
                    {{$song['name']}}
                </td>
                <td class="px-4 py-2">{{$song['genres'][0]['name']}}</td>
                <td class="px-4 py-2">
                    <a class="text-sky-600 underline" href="{{$song['artistUrl'] ?? '#'}}" target="itunes">
                        {{$song['artistName']}}
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
