<x-guest-layout>
    <!-- Back to Home -->
    <div class="absolute top-6 left-6 sm:top-10 sm:left-10 z-50">
        <a href="/" wire:navigate class="flex items-center text-sm font-medium text-gray-400 hover:text-cyan-400 transition-colors group">
            <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Ana Sayfaya Dön
        </a>
    </div>

    <div class="w-full max-w-md mx-auto">
        <!-- Logo Area -->
        <div class="flex justify-center mb-8">
            <a href="/" wire:navigate class="flex items-center space-x-3 group">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-cyan-400 to-teal-500 flex items-center justify-center shadow-[0_0_20px_rgba(45,212,191,0.5)] group-hover:scale-105 group-hover:shadow-[0_0_30px_rgba(45,212,191,0.7)] transition-all duration-300">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <span class="text-3xl font-extrabold tracking-tight animate-[shimmer_3s_linear_infinite] bg-[length:200%_auto] bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 via-emerald-300 to-cyan-400 drop-shadow-md">AIX</span>
            </a>
        </div>

        <div class="bg-[#121a22]/80 backdrop-blur-xl border border-white/10 rounded-3xl shadow-[0_0_50px_rgba(0,0,0,0.5)] overflow-hidden">
            <div class="px-8 py-10">
                <h2 class="text-2xl font-bold text-white text-center mb-2">Hesap Oluştur</h2>
                <p class="text-sm text-gray-400 text-center font-light mb-8">Ücretsiz katılarak akıllı asistanınızı eğitin</p>

                <x-validation-errors class="mb-4 bg-red-500/10 border border-red-500/20 text-red-400 p-4 rounded-xl text-sm" />

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Ad Soyad</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <input id="name" class="block w-full pl-11 pr-4 py-3 bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:bg-white/10 focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 rounded-xl sm:text-sm transition-colors" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Adınız Soyadınız" />
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">E-posta Adresi</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                            </div>
                            <input id="email" class="block w-full pl-11 pr-4 py-3 bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:bg-white/10 focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 rounded-xl sm:text-sm transition-colors" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="ornek@sirket.com" />
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Şifre</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                            <input id="password" class="block w-full pl-11 pr-4 py-3 bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:bg-white/10 focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 rounded-xl sm:text-sm transition-colors" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">Şifre (Tekrar)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            </div>
                            <input id="password_confirmation" class="block w-full pl-11 pr-4 py-3 bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:bg-white/10 focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 rounded-xl sm:text-sm transition-colors" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                        </div>
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" name="terms" type="checkbox" class="h-4 w-4 rounded border-white/20 bg-white/5 text-cyan-500 focus:ring-cyan-500 focus:ring-offset-gray-900" required>
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="text-gray-400">
                                    <a target="_blank" href="{{ route('terms.show') }}" class="underline hover:text-cyan-400">Hizmet Şartları</a>'nı ve
                                    <a target="_blank" href="{{ route('policy.show') }}" class="underline hover:text-cyan-400">Gizlilik Politikası</a>'nı kabul ediyorum.
                                </label>
                            </div>
                        </div>
                    @endif

                    <div>
                        <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-[0_0_20px_rgba(6,182,212,0.3)] text-sm font-bold text-white bg-gradient-to-r from-cyan-500 to-teal-500 hover:from-cyan-400 hover:to-teal-400 hover:shadow-[0_0_25px_rgba(6,182,212,0.5)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-cyan-500 transition-all duration-300">
                            Kayıt Ol ve Başla
                        </button>
                    </div>
                </form>
            </div>
            
            <div class="px-8 py-5 border-t border-white/5 bg-black/20 text-center">
                <p class="text-sm text-gray-400">
                    Zaten bir hesabınız var mı? 
                    <a href="{{ route('login') }}" wire:navigate class="font-bold text-cyan-400 hover:text-cyan-300 transition-colors">Giriş Yapın</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
