<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Corporate AIX</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Inter', sans-serif; }
            .aurora-bg {
                background-color: #030a10;
                background-image: 
                    radial-gradient(at 0% 0%, hsla(190, 80%, 10%, 1) 0, transparent 50%), 
                    radial-gradient(at 100% 0%, hsla(170, 70%, 15%, 0.4) 0, transparent 50%), 
                    radial-gradient(at 50% 100%, hsla(280, 50%, 15%, 0.3) 0, transparent 50%);
                background-attachment: fixed;
            }
            @keyframes shimmer {
                0% { background-position: 200% center; }
                100% { background-position: -200% center; }
            }
        </style>
    </head>
    <body class="antialiased aurora-bg text-gray-100 min-h-screen flex flex-col relative overflow-x-hidden">
        
        <x-splash-screen />
        <!-- Global glowing ambient light -->
        <div class="pointer-events-none fixed inset-0 z-0">
            <div class="absolute top-[-20%] left-[-10%] w-[50%] h-[50%] rounded-full bg-cyan-900/20 blur-[120px] animate-pulse" style="animation-duration: 4s;"></div>
            <div class="absolute bottom-[-20%] right-[-10%] w-[50%] h-[50%] rounded-full bg-teal-900/20 blur-[120px] animate-pulse" style="animation-duration: 6s;"></div>
        </div>

        <!-- Navigation -->
        <nav class="relative z-10 py-6 px-4 sm:px-6 lg:px-8 border-b border-white/5 bg-[#0a0a0f]/50 backdrop-blur-md">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-cyan-400 to-teal-500 flex items-center justify-center shadow-[0_0_15px_rgba(45,212,191,0.5)] animate-[pulse_3s_ease-in-out_infinite] hover:animate-[spin_1s_ease-in-out]">
                        <svg class="w-5 h-5 text-white animate-bounce" style="animation-duration: 2s;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <span class="text-xl font-extrabold tracking-tight animate-[shimmer_3s_linear_infinite] bg-[length:200%_auto] bg-clip-text text-transparent bg-gradient-to-r from-cyan-500 via-emerald-300 to-cyan-500">Kurumsal AIX</span>
                </div>
                <div>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" wire:navigate class="text-sm font-semibold text-gray-300 hover:text-white transition-colors">Kontrol Paneli</a>
                        @else
                            <a href="{{ route('login') }}" wire:navigate class="text-sm font-semibold text-gray-300 hover:text-white transition-colors mr-6">Giriş Yap</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" wire:navigate class="inline-flex items-center px-4 py-2 text-sm font-bold rounded-full text-white bg-white/10 border border-white/20 hover:bg-white/20 transition-all shadow-[0_0_15px_rgba(255,255,255,0.1)] hover:shadow-[0_0_20px_rgba(255,255,255,0.2)]">Ücretsiz Başla</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <main class="flex-1 relative z-10 flex items-center justify-center py-20 px-4 sm:px-6 lg:px-8" x-data="{ loaded: false }" x-init="setTimeout(() => loaded = true, 100)">
            <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <!-- Text Content -->
                <div class="text-center lg:text-left">
                    <div class="inline-flex items-center px-4 py-2 rounded-full border border-teal-500/30 bg-teal-500/10 text-teal-300 text-sm font-medium mb-10 shadow-[0_0_15px_rgba(20,184,166,0.2)] transition-all duration-[1200ms] ease-out transform" :class="loaded ? 'translate-y-0 scale-100 opacity-100' : 'translate-y-12 scale-95 opacity-0'">
                        <span class="flex h-2 w-2 rounded-full bg-teal-400 mr-2 animate-pulse"></span>
                        Yeni Nesil Kurumsal Yapay Zeka
                    </div>

                    <h1 class="text-5xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight text-white mb-8 drop-shadow-2xl leading-tight transition-all duration-[1200ms] delay-200 ease-out transform" :class="loaded ? 'translate-y-0 scale-100 opacity-100' : 'translate-y-12 scale-95 opacity-0'">
                        <span class="block text-gray-300">Tüm verilerinizle</span>
                        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-emerald-400 to-teal-500 animate-text-gradient drop-shadow-[0_0_40px_rgba(45,212,191,0.4)]">Doğrudan Konuşun</span>
                    </h1>
                    
                    <p class="mt-6 max-w-xl text-xl text-gray-400 mx-auto lg:mx-0 font-light leading-relaxed mb-12 transition-all duration-[1200ms] delay-400 ease-out transform" :class="loaded ? 'translate-y-0 scale-100 opacity-100' : 'translate-y-12 scale-95 opacity-0'">
                        PDF'lerinizi ve şirket dokümanlarınızı yükleyin. Gelişmiş RAG motorumuz saniyeler içinde her şeyi okur, anlar ve size özel hiper-zeki bir asistan sunar.
                    </p>

                    <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-6 transition-all duration-[1200ms] delay-[600ms] ease-out transform" :class="loaded ? 'translate-y-0 scale-100 opacity-100' : 'translate-y-12 scale-95 opacity-0'">
                        <a href="{{ route('register') }}" wire:navigate class="relative inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white transition-all duration-300 bg-gradient-to-r from-cyan-600 to-teal-600 rounded-full shadow-[0_0_20px_rgba(45,212,191,0.5)] hover:shadow-[0_0_40px_rgba(45,212,191,0.8)] hover:-translate-y-1 group">
                            <div class="absolute inset-0 bg-gradient-to-r from-cyan-500 to-teal-500 rounded-full blur animate-pulse opacity-50 group-hover:opacity-70 transition-opacity"></div>
                            <div class="absolute inset-0 bg-white/20 rounded-full opacity-0 group-hover:opacity-100 transition-opacity z-10"></div>
                            <span class="relative z-20">Ücretsiz Dene</span>
                            <svg class="w-5 h-5 ml-2 relative z-20 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                        </a>
                        
                        <a href="{{ route('login') }}" wire:navigate class="inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white transition-all duration-300 bg-white/5 border border-white/10 rounded-full hover:bg-white/10 hover:border-white/20 hover:-translate-y-1 backdrop-blur-sm">
                            Zaten Hesabım Var
                        </a>
                    </div>
                </div>

                <!-- AI Hologram Image -->
                <div class="relative hidden lg:flex justify-center items-center transition-all duration-[1500ms] delay-[800ms] ease-out transform" :class="loaded ? 'translate-x-0 scale-100 opacity-100' : 'translate-x-24 scale-90 opacity-0'">
                    <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/20 to-teal-500/20 blur-[100px] rounded-full animate-pulse" style="animation-duration: 4s;"></div>
                    <img src="{{ asset('images/ai_hologram_hero.png') }}" alt="AI Hologram Brain" class="relative z-10 w-full max-w-lg object-contain drop-shadow-[0_0_25px_rgba(45,212,191,0.6)] transform hover:scale-105 transition-transform duration-700 animate-[float_6s_ease-in-out_infinite]" style="animation: float 6s ease-in-out infinite;">
                    
                    <style>
                        @keyframes float {
                            0% { transform: translateY(0px); }
                            50% { transform: translateY(-20px); }
                            100% { transform: translateY(0px); }
                        }
                    </style>
                </div>

            </div>
        </main>
        
        <!-- Footer -->
        <footer class="relative z-10 border-t border-white/5 py-6 flex flex-col items-center justify-center space-y-2">
            <p class="text-xs text-gray-500 font-light">&copy; {{ date('Y') }} Kurumsal AIX. Tüm hakları saklıdır.</p>
            
            <!-- Created by Signature with Shimmer Effect -->
            <div class="text-sm font-medium tracking-wide">
                <span class="animate-[shimmer_3s_linear_infinite] bg-[length:200%_auto] bg-clip-text text-transparent bg-gradient-to-r from-cyan-500 via-emerald-300 to-cyan-500">
                    Created by Anıl Mete
                </span>
            </div>
        </footer>

    </body>
</html>
