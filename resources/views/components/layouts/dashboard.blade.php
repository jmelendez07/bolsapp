<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans">
    <div x-data="{ sidebarIsOpen: false }" class="relative flex w-full flex-col md:flex-row">
        <a class="sr-only" href="#main-content">Saltar al contenido principal</a>

        <div x-cloak x-show="sidebarIsOpen" class="fixed inset-0 z-20 bg-white backdrop-blur-xs md:hidden"
            aria-hidden="true" x-on:click="sidebarIsOpen = false" x-transition.opacity></div>

        <nav x-cloak
            class="fixed left-0 z-30 flex h-svh w-60 shrink-0 flex-col border-r border-outline bg-white p-4 transition-transform duration-300 md:w-64 md:translate-x-0 md:relative"
            x-bind:class="sidebarIsOpen ? 'translate-x-0' : '-translate-x-60'" aria-label="sidebar navigation">
            <!-- logo  -->
            <a href="/" class="ml-2 w-fit text-2xl font-bold text-on-surface-strong mb-10">
                <span class="sr-only">Pagina principal</span>
                <div class="flex items-center gap-2 flex-wrap">
                    <img 
                        src="/logo-removebg-preview - copia.png"
                        alt="Logo de Bolsapp"
                        class="size-7"
                    >
                    <p>Bolsapp</p>
                </div>
            </a>

            @livewire('sidebar-dashboard')
        </nav>

        <div class="h-svh w-full overflow-y-auto bg-gray-100">
            <!-- top navbar  -->
            <nav class="sticky top-0 z-10 flex items-center justify-between border-b border-outline bg-surface-alt px-4 py-2"
                aria-label="top navibation bar">

                <!-- sidebar toggle button for small screens  -->
                <button type="button" class="md:hidden inline-block text-on-surface"
                    x-on:click="sidebarIsOpen = true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-5"
                        aria-hidden="true">
                        <path
                            d="M0 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5-1v12h9a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zM4 2H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h2z" />
                    </svg>
                    <span class="sr-only">Ocultar sidebar</span>
                </button>

                <!-- breadcrumbs  -->
                <nav class="hidden md:inline-block text-sm font-medium text-on-surface"
                    aria-label="breadcrumb">
                    <ol class="flex flex-wrap items-center gap-1">
                        <li class="flex items-center gap-1">
                            <a href="#"
                                class="hover:text-on-surface-strong ">{{ ucfirst(Request::segment(1)) }}</a>
                            
                            @if(Request::segment(2))
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor"
                                    fill="none" stroke-width="2" class="size-4" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            @endif
                        </li>

                        @if(Request::segment(2))
                        <li 
                            class="flex items-center gap-1 font-bold text-on-surface-strong"
                            aria-current="page"
                        >
                            {{ ucfirst(Request::segment(2)) }}
                        </li>
                        @endif
                    </ol>
                </nav>


                <!-- Profile Menu  -->
                <div x-data="{ userDropdownIsOpen: false }" class="relative"
                    x-on:keydown.esc.window="userDropdownIsOpen = false">
                    <button type="button"
                        class="flex w-full items-center rounded-radius gap-2 p-2 text-left text-on-surface hover:bg-primary/5 hover:text-on-surface-strong focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
                        x-bind:class="userDropdownIsOpen ? 'bg-primary/10' : ''"
                        aria-haspopup="true" x-on:click="userDropdownIsOpen = ! userDropdownIsOpen"
                        x-bind:aria-expanded="userDropdownIsOpen">
                            <img
                                src="https://api.dicebear.com/9.x/thumbs/svg?seed={{ Auth::user()->name }}&backgroundColor=facc15"
                                alt="avatar"
                                aria-hidden="true"
                                class="size-8 object-cover rounded-radius"
                            />
                        <div class="hidden md:flex flex-col">
                            <span class="text-sm font-bold text-on-surface-strong">{{ Auth::user()->name }}</span>
                            <span class="text-xs" aria-hidden="true">{{ Auth::user()->email }}</span>
                            <span class="sr-only">Configuración de Perfil</span>
                        </div>
                    </button>

                    <!-- menu -->
                    <div x-cloak x-show="userDropdownIsOpen"
                        class="absolute top-14 right-0 z-20 h-fit w-48 border divide-y divide-outline border-outline bg-surface rounded-radius"
                        role="menu" x-on:click.outside="userDropdownIsOpen = false"
                        x-on:keydown.down.prevent="$focus.wrap().next()"
                        x-on:keydown.up.prevent="$focus.wrap().previous()" x-transition="" x-trap="userDropdownIsOpen">

                        <div class="flex flex-col">
                            <a href="{{ route('profile') }}"
                                class="flex items-center gap-2 px-2 py-3 text-sm font-medium text-on-surface underline-offset-2 hover:bg-primary/20 hover:text-on-surface-strong focus-visible:underline focus:outline-hidden"
                                role="menuitem"
                                wire:navigate
                            >
                                <x-lucide-user class="size-5 shrink-0"></x-lucide-user>
                                <span>Perfil</span>
                            </a>
                        </div>

                        @if(auth()->user() && auth()->user()->hasRole('admin'))
                            <div class="flex flex-col">
                                <a href="#"
                                    class="flex overflow-hidden items-center gap-2 px-2 py-3 text-sm font-medium text-on-surface underline-offset-2 hover:bg-primary/5 hover:text-on-surface-strong focus-visible:underline focus:outline-hidden"
                                    role="menuitem">
                                    <x-lucide-plus class="size-5 shrink-0"></x-lucide-plus>
                                    <span class="truncate">Nuevo trabajo</span>
                                </a>
                            </div>
                        @endif

                        <div class="flex flex-col">
                            @livewire('logout')
                        </div>
                    </div>
                </div>
            </nav>
            <!-- main content  -->
            <div id="main-content" class="p-4">
                <div class="overflow-y-auto">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
</body>

</html>