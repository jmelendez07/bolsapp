@props(['disabled' => false])

<input 
    @disabled($disabled) 
    {{ $attributes->merge(['class' => 'w-full rounded-radius border border-outline border-gray-300 bg-white px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-gray-400 focus-visible:outline-offset-2 disabled:cursor-not-allowed disabled:opacity-75']) }}
>