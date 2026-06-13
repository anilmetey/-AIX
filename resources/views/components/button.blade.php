<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-gradient-to-r from-cyan-500 to-teal-500 border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest hover:shadow-[0_0_20px_rgba(45,212,191,0.5)] hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 focus:ring-offset-[#0a0a0f] active:scale-95 disabled:opacity-50 transition-all duration-300']) }}>
    {{ $slot }}
</button>
