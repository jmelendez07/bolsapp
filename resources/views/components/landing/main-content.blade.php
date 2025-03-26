<main class="flex-1 md:px-10">
    <section class="w-full py-12 md:py-24">
        <div class="container px-4 md:px-6">
            <div class="flex flex-col items-start gap-4 md:flex-row md:justify-between">
                <div class="space-y-1">
                    <h2 class="text-3xl font-bold tracking-tight">Empleos destacados</h2>
                    <p class="text-muted-foreground">
                        Explora las últimas oportunidades laborales
                    </p>
                </div>
                <div class="flex items-center gap-2">
                    <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm cursor-pointer font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-gray-300 bg-background hover:bg-gray-200 hover:text-accent-foreground h-9 px-3">
                        Filtrar
                    </button>
                    <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm  cursor-pointer font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-gray-300 bg-background hover:bg-gray-200 hover:text-accent-foreground h-9 px-3">
                        Ordenar
                    </button>
                </div>
            </div>
            
            {{-- Aquí iría tu JobList, que puedes reemplazar con un componente o directiva de Laravel --}}
        </div>
    </section>
    <section class="w-full py-12 md:py-24 lg:py-32 bg-muted/50">
        <div class="container px-4 md:px-6">
            <div class="grid gap-6 lg:grid-cols-2 lg:gap-12 xl:grid-cols-2">
                <div class="flex flex-col justify-center space-y-4">
                    <div class="space-y-2">
                        <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">¿Eres reclutador?</h2>
                        <p class="max-w-[600px] text-muted-foreground md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed">
                            Publica tus ofertas de empleo y encuentra a los mejores candidatos para tu empresa.
                        </p>
                    </div>
                    <div class="flex flex-col gap-2 min-[400px]:flex-row">
                        <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-white hover:bg-primary/90 h-10 px-4 py-2">
                            Publicar empleo
                        </button>
                        <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-gray-200 bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2">
                            Conocer más
                        </button>
                    </div>
                </div>
                <div class="flex flex-col justify-center space-y-4">
                    <div class="space-y-2">
                        <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">¿Buscas empleo?</h2>
                        <p class="max-w-[600px] text-muted-foreground md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed">
                            Crea tu perfil, sube tu CV y recibe alertas de empleo personalizadas.
                        </p>
                    </div>
                    <div class="flex flex-col gap-2 min-[400px]:flex-row">
                        <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-white hover:bg-primary/90 h-10 px-4 py-2">
                            Crear perfil
                        </button>
                        <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-gray-200 bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2">
                            Explorar empleos
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>