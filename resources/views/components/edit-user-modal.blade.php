<div>
    <div x-cloak wire:show="showModal" x-transition.opacity.duration.200ms class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8" role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
        <!-- Modal Dialog -->
        <form wire:submit="update" wire:show="showModal" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" class="flex w-lg  max-w-lg flex-col gap-4 overflow-hidden rounded-radius border border-outline bg-surface text-on-surface">
            <!-- Dialog Header -->
            <div class="flex items-center justify-between border-b border-outline bg-surface-alt/60 p-4 ">
                @if ($user)
                <h3 
                    class="font-semibold tracking-wide text-gray-500"
                >
                    Editar a <span class="text-on-surface-strong underline underline-offset-2">{{ $user->email }}</span> 
                </h3>
                @endif
                <button wire:click="showModal = false" aria-label="close modal" class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            @if ($user)
            <div class="px-4 py-2 space-y-4">
                <div class="space-y-2">
                    <x-input-label for="name" :value="__('Nombre')" />
                    <x-text-input wire:model="form.name" id="name" value="{{ $user->name }}" class="block mt-1 w-full" type="text" name="name" required
                        autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('form.name')" class="mt-2" />
                </div>
                <div class="space-y-2">
                    <x-input-label for="email" :value="__('Correo Electronico')" />
                    <x-text-input wire:model="form.email" id="email" value="{{ $user->email }}" class="block mt-1 w-full" type="email" name="email" required
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                </div>
                <div class="space-y-2">
                    <x-input-label for="rol" :value="__('Rol')" />
                    <x-select-input wire:model="form.role" id="rol" class="mt-1 block w-full">
                        <option disabled hidden>Selecciona una opción</option>
                        <option value="admin" selected="{{ $user->hasRole('admin') }}">Administrador</option>
                        <option value="recruiter" selected="{{ $user->hasRole('recruiter') }}">Reclutador</option>
                        <option value="candidate" selected="{{ $user->hasRole('candidate') }}">Candidato</option>
                    </x-select-input>
                    <x-input-error :messages="$errors->get('form.role')" class="mt-2" />
                </div>
            </div>
            @endif
            <!-- Dialog Footer -->
            <div class="flex flex-col-reverse justify-between gap-2 border-t border-outline bg-surface-alt/60 p-4 sm:flex-row sm:items-center md:justify-end">
                <button wire:click="showModal = false" type="button" class="whitespace-nowrap cursor-pointer rounded-radius px-4 py-2 text-center text-sm font-medium tracking-wide text-on-surface transition hover:opacity-75 focus-visible:outline focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 ">
                    Cancelar
                </button>
                <button type="submit" class="whitespace-nowrap cursor-pointer rounded-radius bg-primary border border-primary px-4 py-2 text-center text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 focus-visible:outline focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</div>