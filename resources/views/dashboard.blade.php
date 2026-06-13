<x-app-layout>
    <div class="py-12 bg-transparent min-h-screen relative z-10">
        
        <!-- Background Animation/Decoration specific to Dashboard -->
        <div class="absolute inset-0 pointer-events-none overflow-hidden z-[-1]">
            <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-gradient-to-br from-cyan-900/20 to-teal-900/20 blur-[150px] rounded-full animate-pulse" style="animation-duration: 8s;"></div>
            <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-gradient-to-tr from-emerald-900/10 to-cyan-900/10 blur-[120px] rounded-full animate-pulse" style="animation-duration: 10s;"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            
            <!-- Welcome Header (Massive & Cinematic) -->
            <div class="mb-16 relative">
                <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end gap-8">
                    <div class="max-w-2xl relative z-10">
                        <!-- Shimmering Greeting -->
                        <div class="inline-flex items-center px-4 py-2 rounded-full border border-cyan-500/30 bg-cyan-500/10 text-cyan-300 text-sm font-bold mb-6 shadow-[0_0_20px_rgba(34,211,238,0.2)]">
                            <span class="flex h-2.5 w-2.5 rounded-full bg-cyan-400 mr-3 animate-ping"></span>
                            Kurumsal Zeka Merkezi Aktif
                        </div>

                        <h1 class="text-5xl lg:text-6xl font-extrabold tracking-tight text-white mb-4 drop-shadow-2xl">
                            Hoş Geldiniz,<br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-emerald-400 to-teal-500 animate-[shimmer_4s_linear_infinite] bg-[length:200%_auto]">{{ auth()->user()->name }}</span>
                        </h1>
                        <p class="text-xl text-gray-400 font-light leading-relaxed">
                            Sistemler devrede. Tüm süreçlerinizi hızlandırmak ve verilerinizi yönetmek için yapay zeka emrinizde.
                        </p>
                    </div>

                    <!-- Cyberpunk Credit Display -->
                    <div class="relative group z-10">
                        <div class="absolute -inset-1 bg-gradient-to-r from-cyan-500 to-teal-500 rounded-3xl blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200 animate-pulse"></div>
                        <div class="relative bg-[#0a0f16]/90 backdrop-blur-xl border border-white/10 p-6 rounded-3xl flex items-center gap-6 shadow-[0_0_30px_rgba(0,0,0,0.8)]">
                            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-cyan-500 to-teal-500 flex items-center justify-center shadow-[0_0_20px_rgba(45,212,191,0.5)] group-hover:scale-110 transition-transform duration-500">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-400 uppercase tracking-[0.2em] mb-1">Kalan Kredi</p>
                                <p class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-teal-300 drop-shadow-[0_0_10px_rgba(45,212,191,0.8)]">
                                    {{ number_format(auth()->user()->credits) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Massive Interactive Glass Cards -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-16">
                
                <!-- Card 1: Chat -->
                <a href="{{ route('chat') }}" class="group relative block bg-[#121a22]/60 backdrop-blur-2xl rounded-[2rem] border border-white/10 p-8 shadow-[0_0_40px_rgba(0,0,0,0.5)] hover:-translate-y-2 transition-all duration-500 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="absolute -top-24 -right-24 w-48 h-48 bg-cyan-500/20 rounded-full blur-[50px] group-hover:bg-cyan-500/40 transition-colors duration-500"></div>
                    
                    <div class="relative z-10">
                        <div class="w-20 h-20 rounded-3xl bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center mb-8 group-hover:scale-110 group-hover:bg-cyan-500/20 transition-all duration-500 shadow-[0_0_15px_rgba(34,211,238,0.2)]">
                            <svg class="w-10 h-10 text-cyan-400 group-hover:text-cyan-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                        </div>
                        <h3 class="text-3xl font-bold text-white mb-4 group-hover:text-cyan-300 transition-colors">Yapay Zeka ile Konuş</h3>
                        <p class="text-gray-400 text-lg font-light leading-relaxed">
                            Gelişmiş AI asistanımızla anında sohbet etmeye başlayın. Genel sorular sorun, strateji oluşturun veya beyin fırtınası yapın.
                        </p>
                    </div>
                    
                    <div class="absolute bottom-8 right-8 w-12 h-12 rounded-full bg-cyan-500/10 flex items-center justify-center opacity-0 group-hover:opacity-100 transform translate-x-4 group-hover:translate-x-0 transition-all duration-500">
                        <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </div>
                </a>

                <!-- Card 2: Documents -->
                <a href="{{ route('documents') }}" class="group relative block bg-[#121a22]/60 backdrop-blur-2xl rounded-[2rem] border border-white/10 p-8 shadow-[0_0_40px_rgba(0,0,0,0.5)] hover:-translate-y-2 transition-all duration-500 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="absolute -top-24 -right-24 w-48 h-48 bg-emerald-500/20 rounded-full blur-[50px] group-hover:bg-emerald-500/40 transition-colors duration-500"></div>
                    
                    <div class="relative z-10">
                        <div class="w-20 h-20 rounded-3xl bg-emerald-500/10 border border-emerald-500/30 flex items-center justify-center mb-8 group-hover:scale-110 group-hover:bg-emerald-500/20 transition-all duration-500 shadow-[0_0_15px_rgba(16,185,129,0.2)]">
                            <svg class="w-10 h-10 text-emerald-400 group-hover:text-emerald-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <h3 class="text-3xl font-bold text-white mb-4 group-hover:text-emerald-300 transition-colors">Veri Tabanınızı Eğitin</h3>
                        <p class="text-gray-400 text-lg font-light leading-relaxed">
                            PDF ve dokümanlarınızı yükleyin. AI asistanının sadece sizin özel şirket bilgilerinize göre yanıt vermesini sağlayın.
                        </p>
                    </div>
                    
                    <div class="absolute bottom-8 right-8 w-12 h-12 rounded-full bg-emerald-500/10 flex items-center justify-center opacity-0 group-hover:opacity-100 transform translate-x-4 group-hover:translate-x-0 transition-all duration-500">
                        <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </div>
                </a>

                <!-- Card 3: Pricing -->
                <a href="{{ route('pricing') }}" class="group relative block bg-[#121a22]/60 backdrop-blur-2xl rounded-[2rem] border border-white/10 p-8 shadow-[0_0_40px_rgba(0,0,0,0.5)] hover:-translate-y-2 transition-all duration-500 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-violet-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="absolute -top-24 -right-24 w-48 h-48 bg-violet-500/20 rounded-full blur-[50px] group-hover:bg-violet-500/40 transition-colors duration-500"></div>
                    
                    <div class="relative z-10">
                        <div class="w-20 h-20 rounded-3xl bg-violet-500/10 border border-violet-500/30 flex items-center justify-center mb-8 group-hover:scale-110 group-hover:bg-violet-500/20 transition-all duration-500 shadow-[0_0_15px_rgba(139,92,246,0.2)]">
                            <svg class="w-10 h-10 text-violet-400 group-hover:text-violet-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <h3 class="text-3xl font-bold text-white mb-4 group-hover:text-violet-300 transition-colors">Paketler & Kredi</h3>
                        <p class="text-gray-400 text-lg font-light leading-relaxed">
                            Büyük araştırmalar veya GPT-4o gibi gelişmiş modeller için kredi satın alarak hız kesmeden devam edin.
                        </p>
                    </div>
                    
                    <div class="absolute bottom-8 right-8 w-12 h-12 rounded-full bg-violet-500/10 flex items-center justify-center opacity-0 group-hover:opacity-100 transform translate-x-4 group-hover:translate-x-0 transition-all duration-500">
                        <svg class="w-6 h-6 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </div>
                </a>

            </div>
            
            <!-- Quick System Status Widget -->
            <div class="bg-[#0f151c]/80 backdrop-blur-xl border border-white/10 rounded-[2rem] p-8 flex flex-col sm:flex-row justify-between items-center shadow-[0_0_50px_rgba(0,0,0,0.6)]">
                <div class="flex items-center gap-6 mb-6 sm:mb-0">
                    <div class="w-16 h-16 rounded-2xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center relative">
                        <div class="absolute inset-0 rounded-2xl border border-cyan-500/50 animate-ping opacity-20"></div>
                        <svg class="w-8 h-8 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-2xl font-bold text-white">Sistemler Çevrimiçi</h4>
                        <p class="text-gray-400">Yapay zeka motorları ve veritabanı bağlantıları 100% kapasite ile çalışıyor.</p>
                    </div>
                </div>
                <a href="{{ route('chat') }}" class="inline-flex items-center px-8 py-4 bg-white/5 border border-white/10 hover:bg-white/10 hover:border-cyan-500/50 rounded-xl text-lg font-bold text-white transition-all shadow-[0_0_15px_rgba(255,255,255,0.05)] hover:shadow-[0_0_30px_rgba(34,211,238,0.2)]">
                    Sohbete Başla
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
