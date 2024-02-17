<div>
    <x-tmk.list type="group">
        @foreach($users as $user)
            <li class="p-2">
                <span class="font-bold">{{ $user->name }}</span>
                <span class="block italic">{{ $user->email }}</span>
            </li>
        @endforeach
    </x-tmk.list>
    <x-tmk.livewire-log :users="$users"/>
</div>
