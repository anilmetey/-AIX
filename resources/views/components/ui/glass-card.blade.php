@props([
    'padding' => 'p-8',
    'rounded' => 'rounded-[2rem]',
    'border' => 'border border-white/5',
    'shadow' => 'shadow-[0_0_50px_rgba(0,0,0,0.6)]',
    'bg' => 'bg-[#0a0f16]/80 backdrop-blur-3xl',
    'glowColor' => null,
])

<div {{ $attributes->merge(['class' => "{$bg} {$shadow} {$rounded} {$border} relative overflow-hidden group"]) }}>
    
    @if($glowColor)
        <!-- Glowing Top Border -->
        <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r {{ $glowColor }}"></div>
    @endif

    <div class="{{ $padding }} relative z-10">
        {{ $slot }}
    </div>
</div>
