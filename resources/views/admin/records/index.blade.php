<x-vinylshop-layout>
    <x-slot name="description">Admin: Records</x-slot>
    <x-slot name="title">Records</x-slot>

    <h2>Using php</h2>
    <ul>
        <?php
        foreach ($records as $record) {
            echo "<li> $record </li>";
            //echo '<li>' . $record . '</li>';
        }
        ?>
    </ul>

    <h2>Using "@-foreach" and curly braces</h2>
    <ul>
        @foreach ($records as $record)
            <li>{!! $record !!}</li>
        @endforeach
    </ul>

    <section class="grid sm:grid-cols-2 gap-4">
        <div>
            <h3>Original list</h3>
            <ul>
                @foreach ($records as $record)
                    <li>{!! $record !!}</li>
                @endforeach
            </ul>
        </div>
        <div>
            <h3>Bullet list</h3>
            <x-tmk.list title="Bullet list" class="p-4 border rounded shadow">
            @foreach ($records as $record)
                    <li>{!! $record !!}</li>
                @endforeach
            </x-tmk.list>
        </div>
        <div>
            <h3>Numbered list</h3>
            <x-tmk.list type="ol">
            @foreach ($records as $record)
                    <li>{!! $record !!}</li>
                @endforeach
            </x-tmk.list>
        </div>
        <div>
            <h3>Group list</h3>
            <x-tmk.list type="group" class="border rounded shadow-lg">
            @foreach ($records as $record)
                    <li class="p-2 hover:bg-gray-300">{!! $record !!}</li>
                @endforeach
            </x-tmk.list>
        </div>
    </section>
</x-vinylshop-layout>
