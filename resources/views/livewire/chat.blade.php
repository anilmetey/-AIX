<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 h-[800px]">
        
        <!-- Sidebar: Documents & Settings -->
        <div class="lg:col-span-1 bg-[#121a22]/80 backdrop-blur-xl shadow-[0_0_30px_rgba(0,0,0,0.5)] rounded-3xl p-6 border border-white/5 flex flex-col h-full relative overflow-hidden group">
            <!-- Decorative background blob -->
            <div class="absolute -top-24 -left-24 w-48 h-48 bg-cyan-600/20 rounded-full mix-blend-screen filter blur-2xl opacity-50 group-hover:opacity-100 transition-opacity duration-700"></div>
            <div class="absolute -bottom-24 -right-24 w-48 h-48 bg-teal-600/20 rounded-full mix-blend-screen filter blur-2xl opacity-50 group-hover:opacity-100 transition-opacity duration-700"></div>
            
            <div class="relative z-10">
                <h3 class="text-2xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-teal-400 mb-8 tracking-tight drop-shadow-md">Yapay Zeka Asistanı</h3>
                
                <div class="mb-8">
                    <label class="block text-sm font-bold text-gray-300 mb-2">Bağlam / Doküman</label>
                    <p class="text-xs text-gray-500 mb-3 font-light">Spesifik bir doküman hakkında soru sormak için seçin.</p>
                    
                    <div class="relative mb-6">
                        <select wire:model.live="documentId" class="block w-full pl-4 pr-10 py-3 text-sm bg-white/5 text-gray-200 border-white/10 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 rounded-xl shadow-sm appearance-none cursor-pointer transition-all hover:bg-white/10">
                            <option value="">🧠 Genel Yapay Zeka (Bağlamsız)</option>
                            @foreach($documents as $doc)
                                <option value="{{ $doc->id }}">📄 {{ Str::limit($doc->name, 25) }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>

                    <label class="block text-sm font-bold text-gray-300 mb-2">Yapay Zeka Modeli</label>
                    <p class="text-xs text-gray-500 mb-3 font-light">Beyin gücünü seçin.</p>
                    <div class="space-y-4">
                        <label class="flex items-center space-x-3 p-3 rounded-2xl bg-white/5 border border-white/10 hover:border-cyan-500/50 hover:bg-cyan-500/5 transition-all cursor-pointer group">
                            <input type="radio" wire:model.live="form.aiModel" value="gpt-3.5-turbo" class="text-cyan-500 focus:ring-cyan-500 bg-black/50 border-white/20">
                            <div>
                                <p class="text-sm font-bold text-gray-200">GPT-3.5 Hızlı</p>
                                <p class="text-[10px] text-gray-500">1 kredi / mesaj</p>
                            </div>
                        </label>
                        <label class="flex items-center space-x-3 p-3 rounded-2xl bg-white/5 border border-white/10 hover:border-teal-500/50 hover:bg-teal-500/5 transition-all cursor-pointer group relative overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-r from-teal-500/10 to-emerald-500/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <input type="radio" wire:model.live="form.aiModel" value="gpt-4o" class="text-teal-500 focus:ring-teal-500 bg-black/50 border-white/20 z-10">
                            <div class="relative z-10">
                                <p class="text-sm font-bold text-gray-200">GPT-4o Akıllı</p>
                                <p class="text-[10px] text-gray-500">3 kredi / mesaj</p>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-cyan-900/20 to-teal-900/20 rounded-2xl p-5 border border-white/5 shadow-inner">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-semibold text-cyan-300">Kredi Bakiyesi</span>
                        <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <div class="flex items-end space-x-2">
                        <span class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-teal-400 drop-shadow-[0_0_10px_rgba(45,212,191,0.3)]">{{ auth()->user()->credits }}</span>
                        <span class="text-sm text-cyan-400/70 font-medium pb-1">kredi</span>
                    </div>
                    
                    @if(auth()->user()->credits <= 0)
                        <div class="mt-4 p-3 bg-red-900/30 rounded-lg border border-red-500/30">
                            <p class="text-xs font-semibold text-red-400 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                Krediniz bitti
                            </p>
                            <p class="text-[10px] text-red-300/70 mt-1 leading-tight">Sohbete devam etmek için lütfen kredi satın alın.</p>
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="mt-auto relative z-10 pt-6 border-t border-white/10 mt-6">
                <button wire:click="clearChat" wire:confirm="Bu sohbet geçmişini silmek istediğinize emin misiniz?" class="w-full text-sm text-center py-2 text-red-400 font-medium hover:text-red-300 transition-colors flex items-center justify-center bg-red-500/10 hover:bg-red-500/20 rounded-lg">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    Sohbet Geçmişini Temizle
                </button>
            </div>
        </div>

        <!-- Main Chat Area -->
        <div class="lg:col-span-3 bg-[#121a22]/80 backdrop-blur-xl rounded-3xl shadow-[0_0_50px_rgba(0,0,0,0.5)] flex flex-col h-full border border-white/5 overflow-hidden relative">
            
            <!-- Chat Header -->
            <div class="px-6 py-4 border-b border-white/5 bg-black/20 flex justify-between items-center z-10">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-cyan-500 to-teal-600 flex items-center justify-center shadow-[0_0_15px_rgba(45,212,191,0.5)]">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-gray-100 leading-tight">Kurumsal AI Asistanı</h2>
                        <p class="text-xs font-medium text-emerald-400 flex items-center drop-shadow-[0_0_5px_rgba(52,211,153,0.8)]">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 mr-1.5 animate-pulse shadow-[0_0_5px_rgba(52,211,153,1)]"></span> Çevrimiçi & Hazır
                        </p>
                    </div>
                </div>
            </div>

            <!-- Messages -->
            <div x-data="{
                    scrollToBottom() {
                        this.$refs.messagesContainer.scrollTop = this.$refs.messagesContainer.scrollHeight;
                    }
                 }"
                 x-init="
                    scrollToBottom();
                    Livewire.hook('commit', ({ succeed }) => {
                        succeed(() => {
                            setTimeout(() => scrollToBottom(), 50);
                        })
                    });
                 "
                 class="flex-1 overflow-y-auto p-6 space-y-6 scroll-smooth bg-transparent" 
                 id="chat-messages" 
                 x-ref="messagesContainer">
                
                @if(count($messages) === 0)
                    <div class="flex flex-col h-full items-center justify-center opacity-80">
                        <div class="w-24 h-24 mb-6 rounded-3xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center rotate-12 shadow-[0_0_30px_rgba(34,211,238,0.2)]">
                            <svg class="w-12 h-12 text-cyan-400 -rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-200 mb-2 drop-shadow-md">Size nasıl yardımcı olabilirim?</h3>
                        <p class="text-sm text-gray-400 text-center max-w-sm font-light">Bana genel sorular sorabilir veya sol menüden bir doküman seçerek verilerinizin derinliklerine inebilirsiniz.</p>
                    </div>
                @else
                    @foreach($messages as $message)
                        @if($message['role'] !== 'system')
                            <div class="flex {{ $message['role'] === 'user' ? 'justify-end' : 'justify-start' }} items-end space-x-2 group">
                                
                                @if($message['role'] === 'assistant')
                                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-gradient-to-br from-cyan-500 to-teal-600 flex items-center justify-center shadow-sm">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                    </div>
                                @endif

                                <div class="max-w-[75%] rounded-2xl px-5 py-3.5 shadow-md
                                    {{ $message['role'] === 'user' 
                                        ? 'bg-gradient-to-br from-cyan-500 to-teal-600 text-white rounded-br-sm shadow-[0_5px_15px_rgba(45,212,191,0.3)]' 
                                        : 'bg-white/10 backdrop-blur-md border border-white/10 text-gray-200 rounded-bl-sm' }}">
                                    <div class="text-[15px] leading-relaxed prose prose-sm max-w-none {{ $message['role'] === 'user' ? 'prose-invert text-white' : 'prose-invert text-gray-200' }}">
                                        {!! Illuminate\Support\Str::markdown($message['content'], ['html_input' => 'escape']) !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
                
                <!-- Loading indicator -->
                <div wire:loading wire:target="sendMessage" class="flex justify-start items-end space-x-2">
                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-gradient-to-br from-cyan-500 to-teal-600 flex items-center justify-center shadow-[0_0_10px_rgba(45,212,191,0.4)]">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md border border-white/10 rounded-2xl rounded-bl-sm px-5 py-4 shadow-sm flex space-x-1.5 items-center">
                        <div class="w-2 h-2 bg-cyan-400 rounded-full animate-bounce shadow-[0_0_5px_rgba(34,211,238,0.8)]" style="animation-delay: 0ms"></div>
                        <div class="w-2 h-2 bg-teal-400 rounded-full animate-bounce shadow-[0_0_5px_rgba(45,212,191,0.8)]" style="animation-delay: 150ms"></div>
                        <div class="w-2 h-2 bg-emerald-400 rounded-full animate-bounce shadow-[0_0_5px_rgba(52,211,153,0.8)]" style="animation-delay: 300ms"></div>
                    </div>
                </div>
            </div>

            <!-- Input Area -->
            <div class="p-4 bg-black/40 backdrop-blur-xl border-t border-white/5 z-10 relative">
                <!-- Subtle top glow for the input area -->
                <div class="absolute -top-px left-0 right-0 h-px bg-gradient-to-r from-transparent via-teal-500/50 to-transparent"></div>
                
                @if(session('error'))
                    <div class="mb-4 rounded-xl bg-red-500/10 p-3 border border-red-500/30 text-center animate-bounce shadow-[0_0_15px_rgba(239,68,68,0.2)]">
                        <p class="text-sm font-bold text-red-400">{{ session('error') }}</p>
                    </div>
                @endif
                
                <form wire:submit.prevent="sendMessage" class="relative flex items-center group">
                    <input type="text" wire:model="form.newMessage" placeholder="Bir şeyler sorun..." 
                           wire:loading.attr="disabled" wire:target="sendMessage"
                           class="w-full pl-6 pr-16 py-4 bg-white/5 border border-white/10 focus:bg-[#0a1118] focus:ring-2 focus:ring-teal-500/80 focus:border-teal-500 rounded-full text-[15px] text-white placeholder-gray-400 shadow-[0_0_15px_rgba(0,0,0,0.5)] focus:shadow-[0_0_30px_rgba(45,212,191,0.2)] transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed"
                           {{ auth()->user()->credits <= 0 ? 'disabled' : '' }} autocomplete="off">
                           
                    <button type="submit" 
                            wire:loading.attr="disabled" 
                            {{ auth()->user()->credits <= 0 ? 'disabled' : '' }}
                            class="absolute right-2 top-2 bottom-2 aspect-square flex items-center justify-center rounded-full bg-gradient-to-br from-cyan-500 to-teal-600 text-white hover:shadow-[0_0_20px_rgba(45,212,191,0.6)] hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-black focus:ring-teal-600 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed z-10">
                        
                        <svg wire:loading.remove wire:target="sendMessage" class="w-5 h-5 transform rotate-90 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform drop-shadow-md" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        
                        <svg wire:loading wire:target="sendMessage" class="w-5 h-5 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </button>
                </form>
                <div class="text-center mt-3">
                    <p class="text-[11px] text-gray-500/80 font-light">Yapay zeka hatalar yapabilir. Önemli bilgileri her zaman doğrulayın.</p>
                </div>
            </div>
        </div>
    </div> <!-- Close grid div -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/atom-one-dark.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js"></script>
    <style>
        .code-container {
            position: relative;
            margin-top: 1.5rem;
            margin-bottom: 1.5rem;
            border-radius: 0.75rem;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
            background-color: #0d1117;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }
        .code-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.5rem 1rem;
            background-color: #010409;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        .code-header-left {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .mac-dots {
            display: flex;
            gap: 0.375rem;
        }
        .mac-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }
        .mac-dot.red { background-color: #ff5f56; }
        .mac-dot.yellow { background-color: #ffbd2e; }
        .mac-dot.green { background-color: #27c93f; }
        
        .code-lang {
            font-size: 0.75rem;
            color: #8b949e;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-left: 0.5rem;
        }
        .prose pre {
            background-color: transparent !important;
            margin: 0 !important;
            padding: 1.25rem !important;
            border: none !important;
        }
        .prose pre code {
            background-color: transparent !important;
            padding: 0 !important;
            font-size: 0.85em;
            font-family: 'Fira Code', 'Courier New', Courier, monospace;
        }
        .copy-code-btn {
            background: transparent;
            color: #8b949e;
            border: none;
            border-radius: 0.25rem;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }
        .copy-code-btn:hover {
            color: #2dd4bf;
            background: rgba(45,212,191,0.1);
        }
    </style>

    <script>
        document.addEventListener('livewire:initialized', () => {
            const container = document.getElementById('chat-messages');
            
            const scrollToBottom = () => {
                if(container) {
                    container.scrollTop = container.scrollHeight;
                }
            };
            
            const applyHighlighting = () => {
                document.querySelectorAll('pre code').forEach((block) => {
                    if(!block.classList.contains('hljs')) {
                        hljs.highlightElement(block);
                        
                        // Extract language from class (e.g., language-php)
                        let lang = 'code';
                        block.classList.forEach(cls => {
                            if(cls.startsWith('language-')) {
                                lang = cls.replace('language-', '');
                            }
                        });

                        const pre = block.parentElement;
                        
                        // Check if already wrapped
                        if (!pre.parentElement.classList.contains('code-container')) {
                            const wrapper = document.createElement('div');
                            wrapper.className = 'code-container';
                            
                            const header = document.createElement('div');
                            header.className = 'code-header';
                            
                            header.innerHTML = `
                                <div class="code-header-left">
                                    <div class="mac-dots">
                                        <div class="mac-dot red"><\/div>
                                        <div class="mac-dot yellow"><\/div>
                                        <div class="mac-dot green"><\/div>
                                    <\/div>
                                    <span class="code-lang">${lang}<\/span>
                                <\/div>
                                <button class="copy-code-btn">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"><\/path><\/svg> 
                                    Kopyala
                                <\/button>
                            `;
                            
                            pre.parentNode.insertBefore(wrapper, pre);
                            wrapper.appendChild(header);
                            wrapper.appendChild(pre);
                            
                            const btn = header.querySelector('.copy-code-btn');
                            btn.addEventListener('click', () => {
                                navigator.clipboard.writeText(block.innerText);
                                btn.innerHTML = `<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"><\/path><\/svg> Kopyalandı`;
                                btn.style.color = '#34d399';
                                setTimeout(() => {
                                    btn.innerHTML = `<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"><\/path><\/svg> Kopyala`;
                                    btn.style.color = '#8b949e';
                                }, 2000);
                            });
                        }
                    }
                });
            };
            
            scrollToBottom();
            applyHighlighting();
            
            Livewire.hook('morph.updated', (el, component) => {
                scrollToBottom();
                applyHighlighting();
            });
        });
    </script>
</div>
