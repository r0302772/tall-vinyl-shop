<div>
    <div class="fixed top-8 left-1/2 -translate-x-1/2 z-50 animate-pulse"
         wire:loading>
        <x-tmk.preloader class="bg-lime-700/60 text-white border border-lime-700 shadow-2xl">
            {{ $loading }}
        </x-tmk.preloader>
    </div>
    <x-tmk.section
        x-data="{ open: false }"
        class="p-0 mb-4 flex flex-col gap-2">
        <div class="p-4 flex justify-between items-start gap-2">
            <x-input id="search" type="text" placeholder="Filter Name"
                     wire:model.live.debounce.500ms="search"
                     class="w-full shadow-md placeholder-gray-300"/>
        </div>
    </x-tmk.section>

    <x-tmk.section>
        <div class="my-4">{{ $users->links() }}</div>
        <table class="w-full border border-gray-300">
            <thead>
            <tr class="bg-gray-100 text-gray-700 [&>th]:p-2 cursor-pointer">
                <th class="text-left" wire:click="resort('name')">
                    <span>Name</span>
                    <x-heroicon-s-chevron-up
                        class="w-5 text-slate-400
                {{$orderAsc ?: 'rotate-180'}}
                {{$orderBy === 'name' ? 'inline-block' : 'hidden'}}"/>
                <th class="text-left" wire:click="resort('email')">
                    <span>E-mail</span>
                    <x-heroicon-s-chevron-up
                        class="w-5 text-slate-400
                {{$orderAsc ?: 'rotate-180'}}
                {{$orderBy === 'email' ? 'inline-block' : 'hidden'}}"/>
                <th wire:click="resort('active')">
                    <span>Active</span>
                    <x-heroicon-s-chevron-up
                        class="w-5 text-slate-400
                {{$orderAsc ?: 'rotate-180'}}
                {{$orderBy === 'active' ? 'inline-block' : 'hidden'}}"/>
                <th wire:click="resort('admin')">
                    <span>Admin</span>
                    <x-heroicon-s-chevron-up
                        class="w-5 text-slate-400
                {{$orderAsc ?: 'rotate-180'}}
                {{$orderBy === 'admin' ? 'inline-block' : 'hidden'}}"/>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr
                    wire:key="user-{{ $user->id }}"
                    class="border-t border-gray-300 [&>td]:p-2">
                    @if($editUser['id'] !== $user->id || $editField !== 'name')
                        <td
                            @if(auth()->user()->id !== $user->id)
                                wire:click="edit({{ $user->id }}, 'name')"
                            class="text-left cursor-pointer"
                            @else
                                class="text-left"
                            @endif
                        >
                            {{ $user->name }}
                        </td>
                    @else
                        <td>
                            <div class="relative text-left w-48">
                                <x-input id="edit_name_{{ $user->id }}" type="text"
                                         x-init="$el.focus()"
                                         @keydown.enter="$el.setAttribute('disabled', true);"
                                         @keydown.tab="$el.setAttribute('disabled', true);"
                                         @keydown.esc="$el.setAttribute('disabled', true);"
                                         wire:model="editUser.name"
                                         wire:keydown.enter="update({{ $user->id }}, 'name')"
                                         wire:keydown.tab="update({{ $user->id }}, 'name')"
                                         wire:keydown.escape="resetValues()"
                                         class="w-48"/>
                                <x-input-error for="editUser.name" class="mt-2"/>
                            </div>
                        </td>
                    @endif

                    @if($editUser['id'] !== $user->id || $editField !== 'email')
                        <td
                            @if(auth()->user()->id !== $user->id)
                                wire:click="edit({{ $user->id }}, 'email')"
                            class="text-left cursor-pointer"
                            @else
                                class="text-left"
                            @endif
                        >
                            {{ $user->email }}
                        </td>
                    @else
                        <td>
                            <div class="relative text-left w-56">
                                <x-input id="edit_email_{{ $user->id }}" type="text"
                                         x-init="$el.focus()"
                                         @keydown.enter="$el.setAttribute('disabled', true);"
                                         @keydown.tab="$el.setAttribute('disabled', true);"
                                         @keydown.esc="$el.setAttribute('disabled', true);"
                                         wire:model="editUser.email"
                                         wire:keydown.enter="update({{ $user->id }}, 'email')"
                                         wire:keydown.tab="update({{ $user->id }}, 'email')"
                                         wire:keydown.escape="resetValues()"
                                         class="w-56"/>
                                <x-input-error for="editUser.email" class="mt-2"/>
                            </div>
                        </td>
                    @endif

                    <td class="text-center">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox"
                                   class="sr-only peer"
                                   wire:click="toggleUserState('{{ $user->id }}', 'active')"
                                   @if($user->active) checked @endif
                                   @if(auth()->user()->id === $user->id) disabled @endif>
                            <div
                                class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                        </label>
                    </td>
                        <td class="text-center">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox"
                                       class="sr-only peer"
                                       wire:click="toggleUserState('{{ $user->id }}', 'admin')"
                                       @if($user->admin) checked @endif
                                       @if(auth()->user()->id === $user->id) disabled @endif>
                                <div
                                    class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            </label>
                        </td>
                    <td>
                        @if(auth()->user()->id !== $user->id)
                            <div class="border border-gray-300 rounded-md overflow-hidden m-2 grid h-10">
                                <button
                                    class="text-gray-400 hover:text-red-100 hover:bg-red-500 transition"
                                    wire:click="delete({{ $user->id }})"
                                    wire:confirm="Are you sure you want to delete this user?">
                                    <x-phosphor-trash-duotone class=" inline-block w-5 h-5"/>
                                </button>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="my-4">{{ $users->links() }}</div>
    </x-tmk.section>
</div>
