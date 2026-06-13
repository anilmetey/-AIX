<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-6 py-3 bg-red-500/10 border border-red-500/30 rounded-xl font-bold text-sm text-red-400 uppercase tracking-widest hover:bg-red-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-[#0a0a0f] transition-all duration-300']) }}>
    {{ $slot }}
</button>
