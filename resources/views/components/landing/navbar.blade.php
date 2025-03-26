<header class="sticky top-0 z-40 w-full border-b border-gray-200 bg-white/80 backdrop-blur-sm backdrop-grayscale px-2 md:px-16">
    <div class="container flex h-16 items-center justify-between">
        <a href="/" class="flex items-center space-x-2" wire:navigate>
            <span class="text-xl font-semibold">Bolsapp</span>
        </a>
        <nav class="hidden md:flex items-center space-x-6 text-sm font-medium">
            <a href="{{ route('jobs.index') }}" class="transition-colors hover:text-foreground/80" wire:navigate>
                Explorar
            </a>
            <a href="#" class="transition-colors hover:text-foreground/80">
                Empresas
            </a>
            <a href="#" class="transition-colors hover:text-foreground/80">
                Blog
            </a>
            <a href="#" class="transition-colors hover:text-foreground/80">
                Contacto
            </a>
        </nav>
        <div class="flex items-center space-x-4">
            <a href="{{ route('login') }}" class="text-sm font-medium hover:underline underline-offset-4" wire:navigate>
                Iniciar sesión
            </a>
            <a href="{{ route('register') }}" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 bg-primary text-white hover:bg-primary/90 h-10 px-4 py-2">
                Registrarse
            </a>
        </div>
    </div>
</header>