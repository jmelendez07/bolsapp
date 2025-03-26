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
    <main class="flex-1 flex flex-col items-center justify-center p-6 text-center h-screen">
        <div class="max-w-3xl mx-auto space-y-8">
            <div class="space-y-2">
                <h1 class="text-9xl font-bold text-primary">404</h1>
                <div class="relative w-full h-40 my-8">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-24 h-24 rounded-full bg-muted flex items-center justify-center">
                            <Search class="h-12 w-12 text-muted-foreground" />
                        </div>
                    </div>
                    <div class="absolute top-1/2 left-1/4 w-16 h-1 bg-gray-600/20 animate-pulse"></div>
                    <div class="absolute top-1/3 right-1/4 w-20 h-1 bg-gray-600/20 animate-pulse"></div>
                    <div class="absolute bottom-1/3 left-1/3 w-12 h-1 bg-gray-600/20 animate-pulse"></div>
                </div>
            </div>

            <div class="space-y-4">
                <h2 class="text-6xl font-bold text-center">Página no encontrada</h2>
                <p class="text-gray-600">
                    Lo sentimos, la página que estás buscando no existe o ha sido movida.
                </p>
            </div>

            <div class="space-y-4">
                <a href="/" wire:navigate class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-white hover:bg-primary/90 h-10 px-4 py-2">
                    <x-lucide-undo-2 class="size-4"></x-lucide-undo-2>
                    Volver a la página principal
                </a>
            </div>
        </div>
    </main>
    @livewireScripts
</body>

</html>