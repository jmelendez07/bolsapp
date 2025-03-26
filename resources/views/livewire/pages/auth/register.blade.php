<?php

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.app')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $rol = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'rol' => ['required', 'string', 'exists:roles,name'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);
        $role = Role::where('name', $validated['rol'])->first();

        if ($role) {
            $user->assignRole($role);
        } else {
            $this->addError('rol', 'El rol no ha sido creado en el sistema.');
            return;
        }

        event(new Registered($user));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div x-data="{ carrousel_index: 0 }" class="flex min-h-screen flex-col">
    <main class="flex-1 flex flex-col md:flex-row">
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="w-full md:w-1/2 flex items-center justify-center p-8 md:p-12">
            <div class="w-full max-w-md space-y-8">
                <div class="space-y-2">
                    <div class="flex items-center gap-2">
                        <a href="/" wire:navigate>
                            <img 
                                src="/logo-removebg-preview - copia.png" 
                                alt="Logo de Bolsapp"
                                class="size-10 object-cover rounded-sm"
                            >
                        </a>
                        <h1 class="text-3xl font-bold">Registrate en Bolsapp</h1>
                    </div>
                    <p class="text-muted-foreground">
                        Coloca tus credenciales para empezar tu busqueda de empleo.
                    </p>
                </div>
                <div class="space-y-6">
                    <form wire:submit="register" class="space-y-4">
                        <div class="space-y-2">
                            <x-input-label for="name" :value="__('Nombre')" />
                            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required
                                autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="space-y-2">
                            <x-input-label for="email" :value="__('Correo Electronico')" />
                            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required
                                autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="space-y-2">
                            <x-input-label for="rol" :value="__('Rol')" />
                            <x-select-input wire:model="rol" id="rol" class="mt-1 block w-full">
                                <option selected disabled hidden>Selecciona una opción</option>
                                <option value="recruiter">Reclutador</option>
                                <option value="candidate">Candidato</option>
                            </x-select-input>
                            <x-input-error :messages="$errors->get('rol')" class="mt-2" />
                        </div>
                        <div class="space-y-2">
                            <x-input-label for="password" :value="__('Contraseña')" />
                            <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="space-y-2">
                            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
                            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                                type="password" name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        <button
                            class="w-full inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors cursor-pointer focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-white hover:bg-primary/90 h-10 px-4 py-2">
                            {{ __('Registrarse') }}
                        </button>
                    </form>
                    <div class="text-center">
                        <p class="text-sm text-gray-500">
                            ¿Ya estas registrado?
                            <a href="{{ route('login') }}"
                                class="font-medium text-primary hover:underline underline-offset-4" wire:navigate>
                                Accede Aquí
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
                        <div x-show="carrousel_index === 0"
                            class="absolute inset-0 transition-opacity duration-1000 ease-in-out pointer-events-none flex items-center">
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

                        <div x-show="carrousel_index === 1"
                            class="absolute inset-0 transition-opacity duration-1000 ease-in-out pointer-events-none flex items-center">
                            <div class="relative w-full h-full max-w-2xl max-h-[80vh] mx-auto">
                                <img src="/carrousel-2.jpg"" 
                                    alt=" Imagen de Carrousel 1"
                                    class="object-cover rounded-lg shadow-lg w-full h-full">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent rounded-lg flex flex-col justify-end p-8 text-white">
                                    <h2 class="text-2xl font-bold mb-2">Conecta con las mejores empresas</h2>
                                    <p class="text-white/80 max-w-md">Accede a ofertas exclusivas de las compañías más
                                        innovadoras y en crecimiento del mercado.</p>
                                </div>
                            </div>
                        </div>

                        <div x-show="carrousel_index === 2"
                            class="absolute inset-0 transition-opacity duration-1000 ease-in-out pointer-events-none flex items-center">
                            <div class="relative w-full h-full max-w-2xl max-h-[80vh] mx-auto">
                                <img src="/carrousel-3.jpg"" 
                                    alt=" Imagen de Carrousel 1"
                                    class="object-cover rounded-lg shadow-lg w-full h-full">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent rounded-lg flex flex-col justify-end p-8 text-white">
                                    <h2 class="text-2xl font-bold mb-2">Impulsa tu carrera profesional</h2>
                                    <p class="text-white/80 max-w-md">Descubre oportunidades que se alinean con tus
                                        objetivos y te ayudan a crecer profesionalmente.</p>
                                </div>
                            </div>
                        </div>
                        <div class="absolute bottom-4 z-50 left-0 right-0 flex justify-center space-x-2">
                            <button :class="{
                                    'w-2 h-2 cursor-pointer rounded-full transition-all bg-gray-300': true,
                                    'w-4 bg-gray-600': carrousel_index === 0 
                                }" aria-label="Ir a la imagen 1" @click="carrousel_index = 0" />
                            <button :class="{
                                    'w-2 h-2 cursor-pointer rounded-full transition-all bg-gray-300': true,
                                    'w-4 bg-gray-600': carrousel_index === 1 
                                }" aria-label="Ir a la imagen 1" @click="carrousel_index = 1" />
                            <button :class="{
                                    'w-2 h-2 cursor-pointer rounded-full transition-all bg-gray-300': true,
                                    'w-4 bg-gray-600': carrousel_index === 2 
                                }" aria-label="Ir a la imagen 1" @click="carrousel_index = 2" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>