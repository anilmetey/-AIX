@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="text-lg font-bold text-white">
            {{ $title }}
        </div>

        <div class="mt-4 text-sm text-gray-400">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row justify-end px-6 py-4 bg-black/30 border-t border-white/5 text-end">
        {{ $footer }}
    </div>
</x-modal>
