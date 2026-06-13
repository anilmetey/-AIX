<div class="py-12 bg-transparent min-h-screen relative z-10">
    <!-- Ambient Background -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden z-[-1]">
        <div class="absolute top-[-10%] right-[-5%] w-[600px] h-[600px] bg-gradient-to-br from-violet-900/20 to-fuchsia-900/20 blur-[120px] rounded-full animate-pulse" style="animation-duration: 8s;"></div>
        <div class="absolute bottom-[-10%] left-[-5%] w-[600px] h-[600px] bg-gradient-to-tr from-cyan-900/20 to-teal-900/20 blur-[120px] rounded-full animate-pulse" style="animation-duration: 10s;"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-20 relative">
            <div class="inline-flex items-center px-4 py-2 rounded-full border border-violet-500/30 bg-violet-500/10 text-violet-300 text-sm font-bold mb-6 shadow-[0_0_20px_rgba(139,92,246,0.2)] hover:scale-105 transition-transform cursor-default">
                <span class="flex h-2.5 w-2.5 rounded-full bg-violet-400 mr-3 animate-ping"></span>
                Gizli Ücret Yok, Taahhüt Yok
            </div>
            <h2 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-white via-gray-200 to-gray-500 sm:text-6xl sm:tracking-tight lg:text-7xl drop-shadow-2xl mb-6">
                Sınırları <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-violet-500 animate-[shimmer_3s_linear_infinite] bg-[length:200%_auto]">Kaldırın</span>
            </h2>
            <p class="mt-5 max-w-xl mx-auto text-xl text-gray-400 font-light leading-relaxed">
                Yapay zekanın tam potansiyeline ulaşmak için kredi satın alın. Sadece kullandığınız kadar ödeyin, daima hız kesmeden ilerleyin.
            </p>
        </div>

        @if(session('success'))
            <div class="mb-10 max-w-md mx-auto rounded-2xl bg-emerald-500/10 p-5 border border-emerald-500/30 shadow-[0_0_30px_rgba(16,185,129,0.2)] text-center backdrop-blur-md animate-bounce">
                <p class="text-lg font-bold text-emerald-400">{{ session('success') }}</p>
            </div>
        @endif

        <!-- Spotlight Grid -->
        <div x-data="{
                mouseX: 0,
                mouseY: 0,
                handleMouseMove(e) {
                    const rect = this.$refs.grid.getBoundingClientRect();
                    this.mouseX = e.clientX - rect.left;
                    this.mouseY = e.clientY - rect.top;
                }
            }" 
            x-ref="grid" 
            @mousemove="handleMouseMove" 
            class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto relative group/grid">
            
            <!-- Starter Package -->
            <div class="relative bg-[#0d131a]/80 backdrop-blur-2xl rounded-[2.5rem] shadow-[0_0_40px_rgba(0,0,0,0.6)] border border-white/5 overflow-hidden flex flex-col hover:-translate-y-2 transition-all duration-500 group/card">
                <!-- Spotlight Effect -->
                <div class="pointer-events-none absolute -inset-px opacity-0 transition duration-300 group-hover/grid:opacity-100 z-0" 
                     :style="`background: radial-gradient(800px circle at ${mouseX}px ${mouseY}px, rgba(34,211,238,0.1), transparent 40%);`"></div>
                
                <div class="p-10 relative z-10 border-b border-white/5 flex-1 bg-gradient-to-b from-transparent to-[#121a22]/50">
                    <h3 class="text-2xl font-bold text-gray-100 mb-2">Başlangıç</h3>
                    <p class="text-gray-400 text-sm mb-8 font-light h-10">Platformu denemek ve temel sorgular için mükemmel.</p>
                    <div class="flex items-baseline text-6xl font-black text-white mb-2">
                        $5
                    </div>
                    <p class="text-cyan-400 font-bold text-xl drop-shadow-md">500 Kredi</p>
                </div>
                <div class="p-10 flex flex-col justify-between flex-1 relative z-10 bg-[#0d131a]">
                    <ul class="space-y-5 mb-10">
                        <li class="flex items-center text-gray-300">
                            <div class="w-8 h-8 rounded-full bg-cyan-500/10 flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            Standart AI Modelleri
                        </li>
                        <li class="flex items-center text-gray-300">
                            <div class="w-8 h-8 rounded-full bg-cyan-500/10 flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            Gelişmiş RAG Bağlamı
                        </li>
                    </ul>
                    <button wire:click="checkout(5, 500)" class="w-full py-4 px-6 bg-cyan-500/10 border border-cyan-500/30 text-cyan-300 font-bold text-lg rounded-2xl hover:bg-cyan-500 hover:text-white hover:shadow-[0_0_30px_rgba(34,211,238,0.4)] transition-all duration-300">
                        Başlangıç Satın Al
                    </button>
                </div>
            </div>

            <!-- Pro Package (Glows & Pops Out) -->
            <div class="relative bg-[#0d131a]/90 backdrop-blur-3xl rounded-[2.5rem] shadow-[0_0_60px_rgba(45,212,191,0.2)] border border-teal-500/40 overflow-hidden flex flex-col transform md:-translate-y-6 hover:-translate-y-8 transition-all duration-500 group/card z-20">
                <!-- Glowing Border Top -->
                <div class="absolute top-0 inset-x-0 h-2 bg-gradient-to-r from-cyan-400 via-teal-400 to-emerald-400"></div>
                <div class="absolute top-0 inset-x-0 h-4 bg-gradient-to-r from-cyan-400 via-teal-400 to-emerald-400 blur-xl opacity-50"></div>
                
                <!-- Spotlight Effect -->
                <div class="pointer-events-none absolute -inset-px opacity-0 transition duration-300 group-hover/grid:opacity-100 z-0" 
                     :style="`background: radial-gradient(800px circle at ${mouseX - 380}px ${mouseY}px, rgba(45,212,191,0.15), transparent 40%);`"></div>

                <div class="absolute top-6 right-6 bg-gradient-to-r from-teal-500 to-emerald-500 text-white text-xs font-black px-4 py-1.5 rounded-full uppercase tracking-widest drop-shadow-[0_0_10px_rgba(16,185,129,0.8)] shadow-lg shadow-emerald-500/30">En Popüler</div>
                
                <div class="p-10 relative z-10 border-b border-white/5 flex-1 bg-gradient-to-b from-teal-900/40 to-transparent">
                    <h3 class="text-2xl font-bold text-white mb-2">Pro</h3>
                    <p class="text-gray-300 text-sm mb-8 font-light h-10">Düzenli kullanım ve derin belge analizi için idealdir.</p>
                    <div class="flex items-baseline text-6xl font-black text-white mb-2 drop-shadow-2xl">
                        $15
                    </div>
                    <p class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-teal-400 font-black text-2xl drop-shadow-md">2,000 Kredi</p>
                </div>
                <div class="p-10 flex flex-col justify-between flex-1 relative z-10 bg-[#0d131a]">
                    <ul class="space-y-5 mb-10">
                        <li class="flex items-center text-gray-100 font-medium">
                            <div class="w-8 h-8 rounded-full bg-teal-500/20 flex items-center justify-center mr-4 flex-shrink-0 border border-teal-500/30 shadow-[0_0_10px_rgba(45,212,191,0.3)]">
                                <svg class="w-4 h-4 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            GPT-4o Erişimi (Süper Zeka)
                        </li>
                        <li class="flex items-center text-gray-100 font-medium">
                            <div class="w-8 h-8 rounded-full bg-teal-500/20 flex items-center justify-center mr-4 flex-shrink-0 border border-teal-500/30 shadow-[0_0_10px_rgba(45,212,191,0.3)]">
                                <svg class="w-4 h-4 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            Gelişmiş RAG Bağlamı
                        </li>
                        <li class="flex items-center text-gray-100 font-medium">
                            <div class="w-8 h-8 rounded-full bg-teal-500/20 flex items-center justify-center mr-4 flex-shrink-0 border border-teal-500/30 shadow-[0_0_10px_rgba(45,212,191,0.3)]">
                                <svg class="w-4 h-4 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            Öncelikli İşlem Sırası
                        </li>
                    </ul>
                    <button wire:click="checkout(15, 2000)" class="w-full py-4 px-6 bg-gradient-to-r from-cyan-500 via-teal-500 to-emerald-500 text-white font-black text-lg rounded-2xl hover:shadow-[0_0_30px_rgba(45,212,191,0.6)] hover:scale-[1.02] transition-all duration-300">
                        Hemen Pro Ol
                    </button>
                </div>
            </div>

            <!-- Enterprise Package -->
            <div class="relative bg-[#0d131a]/80 backdrop-blur-2xl rounded-[2.5rem] shadow-[0_0_40px_rgba(0,0,0,0.6)] border border-white/5 overflow-hidden flex flex-col hover:-translate-y-2 transition-all duration-500 group/card">
                <!-- Spotlight Effect -->
                <div class="pointer-events-none absolute -inset-px opacity-0 transition duration-300 group-hover/grid:opacity-100 z-0" 
                     :style="`background: radial-gradient(800px circle at ${mouseX - 760}px ${mouseY}px, rgba(139,92,246,0.1), transparent 40%);`"></div>

                <div class="p-10 relative z-10 border-b border-white/5 flex-1 bg-gradient-to-b from-transparent to-[#121a22]/50">
                    <h3 class="text-2xl font-bold text-gray-100 mb-2">Kurumsal</h3>
                    <p class="text-gray-400 text-sm mb-8 font-light h-10">Maksimum güce ihtiyaç duyan profesyoneller için.</p>
                    <div class="flex items-baseline text-6xl font-black text-white mb-2">
                        $40
                    </div>
                    <p class="text-violet-400 font-bold text-xl drop-shadow-md">10,000 Kredi</p>
                </div>
                <div class="p-10 flex flex-col justify-between flex-1 relative z-10 bg-[#0d131a]">
                    <ul class="space-y-5 mb-10">
                        <li class="flex items-center text-gray-300">
                            <div class="w-8 h-8 rounded-full bg-violet-500/10 flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-4 h-4 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            Pro'daki her şey dahil
                        </li>
                        <li class="flex items-center text-gray-300">
                            <div class="w-8 h-8 rounded-full bg-violet-500/10 flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-4 h-4 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            Kredi başına en düşük maliyet
                        </li>
                    </ul>
                    <button wire:click="checkout(40, 10000)" class="w-full py-4 px-6 bg-violet-500/10 border border-violet-500/30 text-violet-300 font-bold text-lg rounded-2xl hover:bg-violet-500 hover:text-white hover:shadow-[0_0_30px_rgba(139,92,246,0.4)] transition-all duration-300">
                        Kurumsal Satın Al
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
