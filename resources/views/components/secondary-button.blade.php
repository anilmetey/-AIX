<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-6 py-3 bg-white/5 border border-white/10 rounded-xl font-bold text-sm text-gray-300 uppercase tracking-widest hover:bg-white/10 hover:text-white focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 focus:ring-offset-[#0a0a0f] disabled:opacity-25 transition-all duration-300']) }}>
    {{ $slot }}
</button>
