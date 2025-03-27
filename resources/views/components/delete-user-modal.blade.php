<div>
    <div x-cloak wire:show="showModal" x-transition.opacity.duration.200ms class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8" role="dialog" aria-modal="true" aria-labelledby="dangerModalTitle">
        <!-- Modal Dialog -->
        <div wire:show="showModal" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" class="flex max-w-lg flex-col gap-4 overflow-hidden rounded-radius border border-outline bg-surface text-on-surface">
            <!-- Dialog Header -->
            <div class="flex items-center justify-between border-b border-outline bg-surface-alt/60 px-4 py-2">
                <div class="flex items-center justify-center rounded-full bg-danger/20 text-danger p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <button wire:click="showModal = false" aria-label="close modal" class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <!-- Dialog Body -->
            <div class="px-4 text-center"> 
                <h3 id="dangerModalTitle" class="mb-2 font-semibold tracking-wide text-on-surface-strong ">Confirmar Eliminación</h3>
                @if ($user)
                    <p>
                        ¿Estas seguro de querer eliminar al usuario <span class="text-gray-950 underline underline-offset-2">{{ $user->email }}</span> permanentemente?
                    </p>
                @endif
            </div>
            <!-- Dialog Footer -->
            <div class="flex items-center justify-center border-outline p-4 ">
                <button wire:click="delete" type="button" class="w-full cursor-pointer whitespace-nowrap rounded-radius border border-danger bg-danger px-4 py-2 text-center text-sm font-semibold tracking-wide text-on-danger transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-danger active:opacity-100 active:outline-offset-0">
                    Eliminar
                </button>
            </div>
        </div>
    </div>
</div>
