<section class="w-full py-0 md:py-8 md:px-10">
    <div class="container px-4 md:px-6">
        <div class="grid gap-8 md:grid-cols-[280px_1fr]">
            <div class="hidden md:block">
                <div class="sticky top-20 max-h-[calc(100vh-6rem)] overflow-y-auto pb-6 space-y-4 pr-2">
                    <div class="border border-gray-200 rounded-md  p-4">
                        <div class="pb-3">
                            <h3 class="text-2xl font-medium">Filtros</h3>
                        </div>
                        <div class="space-y-6">
                            <div class="flex flex-col gap-4 justify-center">
                                <div class="">
                                    <h4 class="text-sm font-semibold">Tipo de empleo</h4>
                                    <div class="">
                                        <div class="space-y-2 pt-1">
                                            @foreach(['Tiempo completo', 'Medio tiempo', 'Contrato', 'Freelance', 'Prácticas'] as $type)
                                            <div class="flex items-center space-x-2">
                                                <input type="checkbox" id="type-{{ Str::slug($type) }}" name="type[]" value="{{ $type }}" class="checkbox">
                                                <label for="type-{{ Str::slug($type) }}" class="text-sm">{{ $type }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <!-- Location Filter -->
                                <div class="">
                                    <h4 class="text-sm font-semibold">Ubicación</h4>
                                    <div class="">
                                        <div class="space-y-2 pt-1">
                                            @foreach(['Remoto', 'Madrid', 'Barcelona', 'Valencia', 'Sevilla', 'Bilbao'] as $location)
                                            <div class="flex items-center space-x-2">
                                                <input type="checkbox" id="location-{{ Str::slug($location) }}" name="location[]" value="{{ $location }}" class="checkbox">
                                                <label for="location-{{ Str::slug($location) }}" class="text-sm">{{ $location }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <!-- Date Posted Filter -->
                                <div class="">
                                    <h4 class="text-sm font-semibold">Fecha de publicación</h4>
                                    <div class="">
                                        <div class="space-y-2 pt-1">
                                            @foreach(['Hoy', 'Últimos 3 días', 'Última semana', 'Último mes'] as $date)
                                            <div class="flex items-center space-x-2">
                                                <input type="checkbox" id="date-{{ Str::slug($date) }}" name="date[]" value="{{ $date }}" class="checkbox">
                                                <label for="date-{{ Str::slug($date) }}" class="text-sm">{{ $date }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col gap-2">
                                <button class="inline-flex items-center cursor-pointer justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-white hover:bg-primary/90 h-10 px-4 py-2">
                                    Aplicar filtros
                                </button>
                                <button class="inline-flex items-center cursor-pointer justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-gray-200 bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2">
                                    Limpiar filtros
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:hidden">
                <button class="inline-flex items-center w-full justify-between whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-gray-200 bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2">
                    <span>Filtros</span>
                    <x-lucide-chevron-down class="w-4 h-4" />
                </button>
            </div>

            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold">Resultados</h2>
                    <div class="flex items-center gap-2">
                        <span class="text-sm text-muted-foreground">Ordenar por:</span>
                        <select class="h-9 rounded-md border border-gray-200 bg-background px-3 py-1 text-sm shadow-sm">
                            <option value="recent">Más recientes</option>
                            <option value="relevant">Relevancia</option>
                            <option value="salary-high">Mayor salario</option>
                            <option value="salary-low">Menor salario</option>
                        </select>
                    </div>
                </div>

                <!-- Infinite Job List -->
                {{-- @include('partials.infinite-job-list') --}}
            </div>
        </div>
    </div>
</section>