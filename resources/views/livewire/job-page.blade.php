<div class="flex min-h-screen flex-col">
    {{-- Navbar --}}
    @include('components.landing.navbar')

    <div class="flex-1">
        {{-- Search Header --}}
        @include('components.landing.search-header')

        {{-- Job Listing --}}
        @include('components.landing.job-listing')
    </div>
    
    {{-- Footer --}}
    @include('components.landing.footer')
</div>