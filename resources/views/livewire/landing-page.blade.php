<div class="flex min-h-screen flex-col">
    {{-- Navbar --}}
    @include('components.landing.navbar')

    <div class="flex-1">
        {{-- Hero --}}
        @include('components.landing.hero')

        {{-- Main Content --}}
        @include('components.landing.main-content')
    </div>

    {{-- Footer --}}
    @include('components.landing.footer')
</div>