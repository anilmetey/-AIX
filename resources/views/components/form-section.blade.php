@props(['submit'])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form wire:submit="{{ $submit }}">
            <div class="px-4 py-5 bg-[#121a22]/80 backdrop-blur-xl border border-white/5 sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-2xl sm:rounded-tr-2xl' : 'sm:rounded-2xl' }}">
                <div class="grid grid-cols-6 gap-6">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center justify-end px-4 py-3 bg-black/20 border border-t-0 border-white/5 text-end sm:px-6 shadow sm:rounded-bl-2xl sm:rounded-br-2xl">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
