@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full pl-4 pr-10 py-3 bg-white/5 border border-white/10 focus:bg-white/10 focus:ring-2 focus:ring-teal-500/50 focus:border-teal-500 rounded-xl text-[15px] text-white placeholder-gray-400 shadow-sm transition-all']) !!}>
