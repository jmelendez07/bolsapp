<div class="space-y-4 p-2">
    <div class="flex justify-between flex-col sm:flex-row gap-2 items-center mb-4">
        <div class="flex items-center flex-col sm:flex-row gap-2 w-full">
            <div class="relative flex w-full sm:max-w-md flex-col gap-1 text-on-surface">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="absolute left-2.5 top-1/2 size-5 -translate-y-1/2 text-on-surface/50"> 
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <input 
                    type="search" 
                    wire:model.live.debounce.300ms="search"
                    class="w-full rounded-radius border border-outline bg-surface-alt py-2 pl-10 pr-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75"
                    name="search" 
                    placeholder="Buscar usuarios" 
                    aria-label="search"
                />
            </div>

            <div class="relative flex w-full sm:max-w-[150px] flex-col gap-1 text-on-surface">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="absolute pointer-events-none right-2 top-2 size-5">
                    <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>
                <select 
                    wire:model.live="filterRole"
                    class="w-full appearance-none rounded-radius border border-outline bg-surface-alt px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75"
                >
                    <option selected value="">Todos los roles</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}">
                            @switch($role->name)
                                @case('admin')
                                    Administrador
                                    @break
                                @case('candidate')
                                    Candidato
                                    @break
                                @case('recruiter')
                                    Reclutador
                                    @break
                                @default
                                    {{ ucfirst($role->name) }}
                            @endswitch
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="flex space-x-2 w-full sm:w-auto justify-end">
            <button 
                wire:click="changeView('table')" 
                class="p-2 mr-2 rounded-md bg-gray-50 cursor-pointer hover:shadow-sm transition-shadow {{ $view === 'table' ? 'text-gray-600' : 'text-gray-300' }}"
                title="Vista de tabla"
            >
                <x-lucide-table-properties class="w-5 h-5" />
            </button>
            <button 
                wire:click="changeView('cards')" 
                class="p-2 rounded-md bg-gray-50 cursor-pointer hover:shadow-sm transition-shadow {{ $view === 'cards' ? 'text-gray-600' : 'text-gray-300' }}"
                title="vista de tarjetas"
            >
                <x-lucide-grid-2x2 class="w-5 h-5" />
            </button>
        </div>
    </div>

    @if($view === 'table')
        <div class="overflow-hidden w-full overflow-x-auto rounded-radius border border-outline">
            <table class="w-full text-left text-sm text-on-surface">
                <thead class="border-b border-outline bg-surface-alt text-sm text-on-surface-strong">
                    <tr>
                        <th scope="col" class="p-4">Usuario</th>
                        <th scope="col" class="p-4">Roles</th>
                        <th scope="col" class="p-4">Creado el</th>
                        <th scope="col" class="p-4">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline ">
                    @foreach($users as $user)
                    <tr>
                        <td class="p-4">
                            <div class="flex w-max items-center gap-2">
                                <img 
                                    src="https://api.dicebear.com/9.x/thumbs/svg?seed={{ $user->name }}&backgroundColor=facc15" 
                                    alt="{{ $user->name }}"
                                    class="object-cover rounded-sm w-12 h-12"
                                />
                                <div class="flex flex-col">
                                    <span class="text-neutral-900">{{ $user->name }}</span>
                                    <span class="text-sm text-neutral-600 opacity-85">{{ $user->email }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="p-4">
                            @foreach($user->roles as $role)
                                <span class="badge badge-primary">
                                    @switch($role->name)
                                        @case('admin')
                                            Administrador
                                            @break
                                        @case('candidate')
                                            Candidato
                                            @break
                                        @case('recruiter')
                                            Reclutador
                                            @break
                                        @default
                                            {{ ucfirst($role->name) }}
                                    @endswitch
                                </span>
                            @endforeach
                        </td>
                        <td class="p-4">{{ $user->created_at->format('d/m/Y H:i') }}</td>
                        @if($user->id !== auth()->id())
                            <td class="p-4 flex items-center gap-2">
                                <button 
                                    @click="$dispatch('openEditModal', { userId: {{ $user->id }} })"
                                    type="button" 
                                    class="whitespace-nowrap rounded-radius font-semibold text-primary outline-primary hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0 cursor-pointer p-2 bg-gray-50"
                                >
                                    <x-lucide-settings-2 class="size-5 shrink-0" />
                                </button>
                                <button 
                                    @click="$dispatch('openDeleteModal', { userId: {{ $user->id }} })"
                                    type="button" 
                                    class="whitespace-nowrap cursor-pointer rounded-radius bg-gray-50 p-2 font-semibold text-red-600 outline-red-600 hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0"
                                >
                                    <x-lucide-delete class="size-5 shrink-0" />
                                </button>
                            </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>        
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-4">
            @foreach($users as $user)
                <div 
                    x-data="{ isOpen: false, openedWithKeyboard: false }" 
                    x-on:keydown.esc.window="isOpen = false, openedWithKeyboard = false"
                    class="bg-gray-50 shadow-sm hover:shadow-lg rounded-md transition-shadow p-4 relative"
                >
                    <figure>
                        <img 
                            src="https://api.dicebear.com/9.x/thumbs/svg?seed={{ $user->name }}&backgroundColor=facc15" 
                            alt="{{ $user->name }}" 
                            class="rounded-xl"
                        />
                    </figure>
                    <div class="flex items-center text-center mt-2">
                        <div class="block text-left">
                            <h2 class="text-gray-900">
                                {{ $user->name }}
                                <span class="text-xs text-gray-700">
                                    (
                                        @foreach($user->roles as $role)
                                            <span>
                                                @switch($role->name)
                                                    @case('admin')
                                                        Administrador
                                                        @break
                                                    @case('candidate')
                                                        Candidato
                                                        @break
                                                    @case('recruiter')
                                                        Reclutador
                                                        @break
                                                    @default
                                                        {{ ucfirst($role->name) }}
                                                @endswitch
                                            </span>
                                        @endforeach
                                    )
                                </span>
                            </h2>
                            <p class="text-sm text-gray-600">{{ $user->email }}</p>  
                        </div>
                        {{--<div class="card-actions">
                            
                        </div>
                        <div class="text-sm text-gray-500">
                            Creado: {{ $user->created_at->format('d/m/Y') }}
                        </div>--}}
                    </div>
                    @if($user->id !== auth()->id())
                        <button 
                            type="button" 
                            x-on:click="isOpen = ! isOpen" 
                            class="absolute right-6 top-6 hover:bg-gray-50/20 focus:bg-gray-50/20 hover:text-gray-900 inline-flex items-center gap-2 whitespace-nowrap rounded-radius p-2 text-sm font-medium tracking-wide transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-outline-strong" 
                            aria-haspopup="true" 
                            x-on:keydown.space.prevent="openedWithKeyboard = true" 
                            x-on:keydown.enter.prevent="openedWithKeyboard = true" 
                            x-on:keydown.down.prevent="openedWithKeyboard = true" 
                            x-bind:class="isOpen || openedWithKeyboard ? 'text-on-surface-strong' : 'text-on-surface'" 
                            x-bind:aria-expanded="isOpen || openedWithKeyboard"
                        >
                            <x-lucide-ellipsis-vertical class="size-5" />      
                        </button>
                        <div x-cloak x-show="isOpen || openedWithKeyboard" x-transition x-trap="openedWithKeyboard" x-on:click.outside="isOpen = false, openedWithKeyboard = false" x-on:keydown.down.prevent="$focus.wrap().next()" x-on:keydown.up.prevent="$focus.wrap().previous()" class="absolute top-16 right-6 flex w-fit min-w-48 flex-col overflow-hidden rounded-radius border border-gray-200 bg-surface-alt " role="menu">
                            <a href="#" class="bg-surface-alt px-4 py-2 text-sm text-on-surface hover:bg-gray-100 hover:text-on-surface-strong focus-visible:bg-surface-dark-alt/10 focus-visible:text-on-surface-strong focus-visible:outline-hidden" role="menuitem">
                                Editar
                            </a>
                            <a href="#" class="bg-surface-alt px-4 py-2 text-sm text-on-surface hover:bg-red-100 hover:text-on-surface-strong focus-visible:bg-surface-dark-alt/10 focus-visible:text-on-surface-strong focus-visible:outline-hidden" role="menuitem">
                                Eliminar
                            </a>
                        </div>    
                    @endif           
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    @endif

    @livewire('delete-user-modal')
    @livewire('edit-user-modal')
</div>