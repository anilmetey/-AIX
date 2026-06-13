@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-cyan-400 text-sm font-bold leading-5 text-white focus:outline-none focus:border-cyan-500 transition duration-150 ease-in-out drop-shadow-[0_0_10px_rgba(34,211,238,0.5)]'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-400 hover:text-white hover:border-white/30 focus:outline-none focus:text-white focus:border-white/30 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
