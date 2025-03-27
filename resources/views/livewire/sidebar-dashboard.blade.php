<div class="flex flex-col gap-2 overflow-y-auto pb-6">
    <a 
        href="/panel/principal"
        wire:navigate
        wire:current="bg-primary/10 hover:bg-primary/15"
        class="
            flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm font-medium text-on-surface 
            underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus-visible:underline 
            focus:outline-hidden"
    >
        <x-lucide-house class="size-5 shrink-0"></x-lucide-house>
        <span>Panel Principal</span>
    </a>

    @if(auth()->user() && auth()->user()->hasRole('admin'))
        <a 
            href="/panel/usuarios"
            wire:navigate
            wire:current="bg-primary/10 hover:bg-primary/15"
            class="flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm font-medium text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus-visible:underline focus:outline-hidden"
        >
            <x-lucide-users class="size-5 shrink-0"></x-lucide-users>
            <span>Usuarios</span>
        </a>
    @endif

    <a 
        href="/panel/trabajos"
        wire:navigate
        wire:current="bg-primary/10 hover:bg-primary/15"
        class="flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm font-medium text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus-visible:underline focus:outline-hidden"
    >
        <x-lucide-briefcase-business class="size-5 shrink-0"></x-lucide-briefcase-business>
        <span>Trabajos</span>
    </a>

    <a 
        href="/panel/solicitudes"
        wire:navigate
        wire:current="bg-primary/10 hover:bg-primary/15"
        class="flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm font-medium text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus-visible:underline focus:outline-hidden"
    >
        <x-lucide-newspaper class="size-5 shrink-0"></x-lucide-newspaper>
        <span>Solicitudes</span>
    </a>

    <a 
        href="/perfil"
        wire:navigate
        wire:current="bg-primary/10 hover:bg-primary/15"
        class="flex items-center rounded-radius gap-2 px-2 py-1.5 text-sm font-medium text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus-visible:underline focus:outline-hidden"
    >
        <x-lucide-user class="size-5 shrink-0"></x-lucide-user>
        <span>Perfil</span>
    </a>
</div>