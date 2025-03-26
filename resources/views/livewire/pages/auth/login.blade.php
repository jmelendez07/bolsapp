<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.app')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div x-data="{ carrousel_index: 0 }" class="flex min-h-screen flex-col">
    <main class="flex-1 flex flex-col md:flex-row">
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="w-full md:w-1/2 flex items-center justify-center p-8 md:p-12">
            <div class="w-full max-w-md space-y-8">
                <div class="text-center md:text-left">
                    <h1 class="text-3xl font-bold"></h1>
                    <p class="mt-2 text-muted-foreground">
                        
                    </p>
                </div>
                <div class="space-y-2">
                    <div class="flex items-center gap-2">
                        <a href="/" wire:navigate>
                            <img 
                                src="/logo-removebg-preview - copia.png" 
                                alt="Logo de Bolsapp"
                                class="size-10 object-cover rounded-sm"
                            >
                        </a>
                        <h1 class="text-3xl font-bold">Bienvenido de nuevo</h1>
                    </div>
                    <p class="text-muted-foreground">
                        Inicia sesión en tu cuenta para continuar tu búsqueda de empleo
                    </p>
                </div>
                <div class="space-y-6">
                    <form wire:submit="login" class="space-y-4">
                        <div class="space-y-2">
                            <x-input-label for="email" :value="__('Correo Electronico')" />
                            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email"
                                name="email" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center justify-between">
                                <x-input-label for="email" :value="__('Contraseña')" />
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm font-medium text-primary hover:underline underline-offset-4" wire:navigate>
                                    ¿Olvidaste tu contraseña?
                                </a>
                                @endif
                            </div>
                            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full"
                                type="password" name="password" required autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
                        </div>
                        <div class="flex items-center space-x-2">
                            <label for="remember" class="inline-flex items-center">
                                <input wire:model="form.remember" id="remember" type="checkbox"
                                    class="rounded border-gray-300 text-yellow-400 shadow-sm focus:ring-yellow-500"
                                    name="remember">
                                <span class="ms-2 text-sm text-gray-800">{{ __('Recordar sesión')
                                    }}</span>
                            </label>
                        </div>
                        <button
                            class="w-full inline-flex items-center cursor-pointer justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-white hover:bg-primary/90 h-10 px-4 py-2">
                            {{ __('Acceder') }}
                        </button>
                    </form>
                    <div class="text-center">
                        <p class="text-sm text-gray-500">
                            ¿No tienes una cuenta?
                            <a 
                                href="{{ route('register') }}"
                                class="font-medium text-primary hover:underline underline-offset-4"
                                wire:navigate
                            >
                                Regístrate Aquí
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden md:flex w-1/2 bg-muted/30 relative overflow-hidden">
            <div class="absolute inset-0 flex items-center justify-center p-8">
                <div class="relative w-full h-full">
                    <div class="relative w-full h-full overflow-hidden ">
                        <div x-show="carrousel_index === 0" class="absolute inset-0 transition-opacity duration-1000 ease-in-out pointer-events-none flex items-center">
                            <div class="relative w-full h-full max-w-2xl max-h-[80vh] mx-auto">
                                <img src="/carrousel-1.jpg"" 
                                    alt=" Imagen de Carrousel 1"
                                    class="object-cover rounded-lg shadow-lg w-full h-full">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent rounded-lg flex flex-col justify-end p-8 text-white">
                                    <h2 class="text-2xl font-bold mb-2">Encuentra tu próximo trabajo ideal</h2>
                                    <p class="text-white/80 max-w-md">Miles de oportunidades laborales esperan por ti.
                                        Explora las mejores ofertas de empleo en un solo lugar.</p>
                                </div>
                            </div>
                        </div>

                        <div x-show="carrousel_index === 1" class="absolute inset-0 transition-opacity duration-1000 ease-in-out pointer-events-none flex items-center">
                            <div class="relative w-full h-full max-w-2xl max-h-[80vh] mx-auto">
                                <img src="/carrousel-2.jpg"" 
                                    alt=" Imagen de Carrousel 1"
                                    class="object-cover rounded-lg shadow-lg w-full h-full">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent rounded-lg flex flex-col justify-end p-8 text-white">
                                    <h2 class="text-2xl font-bold mb-2">Conecta con las mejores empresas</h2>
                                    <p class="text-white/80 max-w-md">Accede a ofertas exclusivas de las compañías más innovadoras y en crecimiento del mercado.</p>
                                </div>
                            </div>
                        </div>

                        <div x-show="carrousel_index === 2" class="absolute inset-0 transition-opacity duration-1000 ease-in-out pointer-events-none flex items-center">
                            <div class="relative w-full h-full max-w-2xl max-h-[80vh] mx-auto">
                                <img src="/carrousel-3.jpg"" 
                                    alt=" Imagen de Carrousel 1"
                                    class="object-cover rounded-lg shadow-lg w-full h-full">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent rounded-lg flex flex-col justify-end p-8 text-white">
                                    <h2 class="text-2xl font-bold mb-2">Impulsa tu carrera profesional</h2>
                                    <p class="text-white/80 max-w-md">Descubre oportunidades que se alinean con tus objetivos y te ayudan a crecer profesionalmente.</p>
                                </div>
                            </div>
                        </div>
                        <div class="absolute bottom-4 z-50 left-0 right-0 flex justify-center space-x-2">
                            <button
                                :class="{
                                    'w-2 h-2 cursor-pointer rounded-full transition-all bg-gray-300': true,
                                    'w-4 bg-gray-600': carrousel_index === 0 
                                }"
                                aria-label="Ir a la imagen 1"
                                @click="carrousel_index = 0"
                            />
                            <button
                                :class="{
                                    'w-2 h-2 cursor-pointer rounded-full transition-all bg-gray-300': true,
                                    'w-4 bg-gray-600': carrousel_index === 1 
                                }"
                                aria-label="Ir a la imagen 1"
                                @click="carrousel_index = 1"
                            />
                            <button
                                :class="{
                                    'w-2 h-2 cursor-pointer rounded-full transition-all bg-gray-300': true,
                                    'w-4 bg-gray-600': carrousel_index === 2 
                                }"
                                aria-label="Ir a la imagen 1"
                                @click="carrousel_index = 2"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>