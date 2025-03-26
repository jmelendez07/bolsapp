<div class="relative flex w-full flex-col gap-1 text-neutral-600 ">
    <x-lucide-chevron-down class="absolute pointer-events-none right-4 top-3.5 size-5" />
    <select 
        {{ $attributes->merge(['class' => 'w-full appearance-none rounded-sm border border-neutral-300 bg-neutral-50 px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-400 disabled:cursor-not-allowed disabled:opacity-75']) }}
    >
        {{ $slot }}
    </select>
</div>
