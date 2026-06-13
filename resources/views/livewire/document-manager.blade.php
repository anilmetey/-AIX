<div class="py-12 bg-transparent min-h-screen relative z-10">
    <!-- Ambient Background -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden z-[-1]">
        <div class="absolute top-[-10%] right-[10%] w-[500px] h-[500px] bg-gradient-to-br from-emerald-900/20 to-teal-900/20 blur-[120px] rounded-full animate-[pulse_6s_ease-in-out_infinite]"></div>
        <div class="absolute bottom-[-10%] left-[5%] w-[600px] h-[600px] bg-gradient-to-tr from-cyan-900/20 to-blue-900/20 blur-[150px] rounded-full animate-[pulse_8s_ease-in-out_infinite]"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        
        <!-- Header -->
        <div class="mb-12 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <div>
                <div class="inline-flex items-center px-4 py-2 rounded-full border border-emerald-500/30 bg-emerald-500/10 text-emerald-300 text-sm font-bold mb-4 shadow-[0_0_15px_rgba(16,185,129,0.2)]">
                    <span class="flex h-2.5 w-2.5 rounded-full bg-emerald-400 mr-3 animate-ping"></span>
                    Güvenli Depolama Aktif
                </div>
                <h2 class="text-4xl lg:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-cyan-400 drop-shadow-xl mb-3 tracking-tight">Kurumsal Veri Merkezi</h2>
                <p class="text-gray-400 font-light text-lg max-w-2xl">Dokümanlarınızı güvenle yükleyin. Yapay zeka asistanınız bu bilgileri saniyeler içinde öğrenip, şirketinizin dijital hafızasına katacaktır.</p>
            </div>
            
            <div class="flex items-center space-x-3 bg-white/5 backdrop-blur-xl border border-white/10 p-3 rounded-2xl shadow-lg">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center shadow-[0_0_15px_rgba(16,185,129,0.4)]">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <div class="pr-4">
                    <p class="text-xs text-gray-500 font-semibold uppercase tracking-wider">Hafıza Kapasitesi</p>
                    <p class="text-xl font-bold text-white">{{ count($documents) }} / <span class="text-gray-500">Sınırsız</span></p>
                </div>
            </div>
        </div>

        @if (session()->has('message'))
            <div class="mb-10 rounded-2xl bg-emerald-500/10 p-5 border border-emerald-500/30 shadow-[0_0_30px_rgba(16,185,129,0.2)] flex items-center backdrop-blur-md animate-[bounce_1s_infinite]">
                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-emerald-500/20 flex items-center justify-center border border-emerald-500/40">
                    <svg class="h-6 w-6 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-base font-bold text-emerald-400">Yükleme Başarılı</h3>
                    <div class="text-sm text-emerald-200/80 font-light">
                        {{ session('message') }}
                    </div>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Upload Area -->
            <div class="lg:col-span-1">
                <x-ui.glass-card glowColor="from-cyan-500 to-emerald-500" class="sticky top-24" padding="p-0">
                    
                    <div class="px-8 py-6 border-b border-white/5 flex items-center space-x-4 bg-gradient-to-b from-white/5 to-transparent">
                        <div class="w-10 h-10 rounded-xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center shadow-[0_0_15px_rgba(34,211,238,0.2)]">
                            <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-white">Yeni Doküman Yükle</h3>
                    </div>
                    <div class="p-8">
                        <form wire:submit.prevent="uploadDocument" class="space-y-6">
                            
                            <div class="relative group/upload">
                                <label for="document" class="sr-only">Doküman Seç</label>
                                <div class="mt-1 flex justify-center px-6 pt-10 pb-10 border-2 border-white/10 border-dashed rounded-[2rem] group-hover/upload:border-cyan-500/50 group-hover/upload:bg-cyan-500/5 transition-all duration-500 cursor-pointer relative overflow-hidden">
                                    <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/10 to-teal-500/10 blur-3xl rounded-full opacity-0 group-hover/upload:opacity-100 transition-opacity duration-700"></div>
                                    
                                    <div class="space-y-3 text-center relative z-10">
                                        <div class="mx-auto w-16 h-16 rounded-full bg-cyan-500/10 flex items-center justify-center group-hover/upload:scale-110 transition-transform duration-500 group-hover/upload:shadow-[0_0_20px_rgba(34,211,238,0.4)]">
                                            <svg class="h-8 w-8 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                        </div>
                                        <div class="flex flex-col text-sm text-gray-400 justify-center">
                                            <label for="document" class="relative cursor-pointer bg-transparent rounded-md font-bold text-cyan-400 hover:text-cyan-300 focus-within:outline-none transition-colors text-base">
                                                <span>PDF Dosyası Seçin</span>
                                                <input id="document" name="document" type="file" wire:model="form.document" class="sr-only" accept=".pdf">
                                            </label>
                                            <p class="mt-1 font-light">veya sürükleyip bırakın</p>
                                        </div>
                                        <p class="text-xs text-gray-500 font-light pt-2">
                                            Maksimum boyut: 10MB
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            @error('form.document') <span class="text-sm text-red-400 font-medium block bg-red-500/10 p-3 rounded-xl border border-red-500/20">{{ $message }}</span> @enderror

                            <div wire:loading wire:target="form.document" class="w-full">
                                <div class="flex justify-between text-xs text-cyan-400 mb-2 font-bold uppercase tracking-wider">
                                    <span>Yükleniyor...</span>
                                </div>
                                <div class="w-full bg-black/40 rounded-full h-2 border border-white/10 overflow-hidden">
                                    <div class="bg-gradient-to-r from-cyan-400 to-teal-400 h-2 rounded-full shadow-[0_0_15px_rgba(34,211,238,0.8)] animate-[shimmer_1s_linear_infinite] bg-[length:200%_auto]" style="width: 100%"></div>
                                </div>
                            </div>

                            @if ($form->document)
                                <div class="flex items-center p-4 bg-emerald-500/10 border border-emerald-500/30 rounded-2xl shadow-inner">
                                    <div class="w-10 h-10 rounded-full bg-emerald-500/20 flex items-center justify-center mr-3 flex-shrink-0">
                                        <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <span class="text-sm text-emerald-100 truncate font-semibold">{{ $form->document->getClientOriginalName() }}</span>
                                </div>
                            @endif

                            <div>
                                <button type="submit" wire:loading.attr="disabled" class="w-full flex justify-center py-4 px-6 border border-transparent rounded-2xl shadow-[0_0_20px_rgba(16,185,129,0.3)] text-base font-black text-white bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-400 hover:to-teal-500 hover:shadow-[0_0_30px_rgba(16,185,129,0.5)] focus:outline-none transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed hover:scale-[1.02]">
                                    <span wire:loading.remove wire:target="uploadDocument" class="flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                        Dokümanı İşle & Öğren
                                    </span>
                                    <span wire:loading wire:target="uploadDocument" class="flex items-center">
                                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        Yapay Zeka Öğreniyor...
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </x-ui.glass-card>
            </div>

            <!-- Documents List -->
            <div class="lg:col-span-2">
                <x-ui.glass-card glowColor="from-teal-500 to-cyan-500 opacity-50" padding="p-0">
                    
                    <div class="px-8 py-6 border-b border-white/5 flex items-center justify-between bg-gradient-to-b from-white/5 to-transparent">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 rounded-xl bg-teal-500/10 border border-teal-500/20 flex items-center justify-center shadow-[0_0_15px_rgba(20,184,166,0.2)]">
                                <svg class="w-5 h-5 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold text-white">Eğitilmiş Veri Tabanı</h3>
                        </div>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-white/10 text-gray-300 border border-white/10 drop-shadow-md">
                            {{ count($documents) }} Dosya
                        </span>
                    </div>
                    
                    <div class="p-4 sm:p-6">
                        <ul role="list" class="space-y-4">
                            @forelse($documents as $doc)
                                <li class="bg-[#121a22] border border-white/5 hover:border-cyan-500/30 rounded-2xl transition-all duration-300 group hover:shadow-[0_0_20px_rgba(34,211,238,0.1)] hover:-translate-y-1">
                                    <div class="px-6 py-5 flex items-center justify-between">
                                        <div class="flex items-center min-w-0 gap-x-5">
                                            <div class="flex-shrink-0 w-14 h-14 rounded-[1.25rem] bg-gradient-to-br from-red-500/20 to-orange-500/10 flex items-center justify-center border border-red-500/20 group-hover:shadow-[0_0_20px_rgba(239,68,68,0.4)] transition-all duration-500 group-hover:scale-110">
                                                <svg class="w-7 h-7 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                            </div>
                                            <div class="min-w-0">
                                                <p class="text-base font-bold text-gray-200 truncate group-hover:text-cyan-300 transition-colors">
                                                    {{ $doc->name }}
                                                </p>
                                                <div class="mt-2 flex items-center gap-x-3 text-xs font-medium text-gray-500">
                                                    <p class="truncate flex items-center">
                                                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                        {{ $doc->created_at->diffForHumans() }}
                                                    </p>
                                                    <div class="w-1 h-1 rounded-full bg-gray-600"></div>
                                                    @if($doc->status === \App\Enums\DocumentStatus::COMPLETED)
                                                        <span class="inline-flex items-center gap-x-1.5 rounded-full bg-emerald-500/10 px-2.5 py-0.5 text-[11px] font-bold text-emerald-400 border border-emerald-500/30 shadow-[0_0_10px_rgba(16,185,129,0.2)]">
                                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 shadow-[0_0_5px_rgba(52,211,153,1)]"></span>
                                                            Hazır
                                                        </span>
                                                    @elseif($doc->status === \App\Enums\DocumentStatus::FAILED)
                                                        <span class="inline-flex items-center gap-x-1.5 rounded-full bg-red-500/10 px-2.5 py-0.5 text-[11px] font-bold text-red-400 border border-red-500/30">
                                                            <span class="w-1.5 h-1.5 rounded-full bg-red-400"></span>
                                                            Hata
                                                        </span>
                                                    @else
                                                        <span class="inline-flex items-center gap-x-1.5 rounded-full bg-amber-500/10 px-2.5 py-0.5 text-[11px] font-bold text-amber-400 border border-amber-500/30 shadow-[0_0_10px_rgba(245,158,11,0.2)]">
                                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                                                            İşleniyor
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-4">
                                            <button wire:click="deleteDocument({{ $doc->id }})" wire:confirm="Bu dokümanı yapay zeka hafızasından silmek istediğinize emin misiniz?" class="opacity-0 group-hover:opacity-100 transform translate-x-4 group-hover:translate-x-0 text-sm font-bold text-red-400 hover:text-white bg-red-500/10 border border-red-500/20 hover:bg-red-500 px-4 py-2 rounded-xl transition-all duration-300 shadow-[0_0_10px_rgba(239,68,68,0)] hover:shadow-[0_0_15px_rgba(239,68,68,0.5)]">
                                                Kaldır
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li>
                                    <div class="px-6 py-20 text-center bg-[#121a22]/50 rounded-[2rem] border border-white/5 border-dashed">
                                        <div class="mx-auto w-24 h-24 text-cyan-500/40 bg-cyan-500/5 rounded-full flex items-center justify-center mb-6 border border-cyan-500/10 relative overflow-hidden group">
                                            <div class="absolute inset-0 bg-cyan-500/20 rounded-full animate-ping opacity-20"></div>
                                            <svg class="h-10 w-10 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <h3 class="text-xl font-extrabold text-white mb-2 drop-shadow-md">Doküman Bulunamadı</h3>
                                        <p class="text-base text-gray-500 font-light max-w-sm mx-auto">Başlamak için sol taraftan yeni bir PDF yükleyin ve yapay zekayı eğitmeye hemen başlayın.</p>
                                    </div>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </x-ui.glass-card>
            </div>

        </div>
    </div>
</div>
