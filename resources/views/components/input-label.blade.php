@props(['value'])

<label {{ $attributes->merge(['class' => 'w-fit pl-0.5 text-sm']) }}>
    {{ $value ?? $slot }}
</label>