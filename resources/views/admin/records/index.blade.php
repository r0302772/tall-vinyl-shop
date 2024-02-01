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
</x-vinylshop-layout>
