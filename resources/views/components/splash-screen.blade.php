<style>
.splash-bg {
    background-color: #030a10;
}
.glitch-wrapper {
    position: relative;
    display: inline-block;
}
.glitch-text {
    font-size: 7rem;
    font-weight: 900;
    letter-spacing: 0.15em;
    background: linear-gradient(to right, #2dd4bf, #06b6d4, #3b82f6);
    -webkit-background-clip: text;
    color: transparent;
    position: relative;
    animation: focus-in 1.2s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
}
@media (min-width: 640px) {
    .glitch-text { font-size: 10rem; }
}
.glitch-text::after {
    content: "AIX";
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to right, #2dd4bf, #06b6d4, #3b82f6);
    -webkit-background-clip: text;
    color: transparent;
    filter: blur(25px);
    opacity: 0;
    animation: pulse-glow 2s ease-in-out infinite alternate;
}
.scanner-line {
    position: absolute;
    top: 0;
    left: -10%;
    width: 120%;
    height: 3px;
    background: rgba(34, 211, 238, 0.9);
    box-shadow: 0 0 15px rgba(34, 211, 238, 0.9), 0 0 30px rgba(34, 211, 238, 0.6);
    animation: scan 2s cubic-bezier(0.4, 0, 0.2, 1) infinite;
    z-index: 10;
}
@keyframes focus-in {
    0% { filter: blur(20px); opacity: 0; transform: scale(1.3); }
    100% { filter: blur(0px); opacity: 1; transform: scale(1); }
}
@keyframes pulse-glow {
    0% { opacity: 0.3; }
    100% { opacity: 0.7; filter: blur(30px); }
}
@keyframes scan {
    0% { top: -10%; opacity: 0; }
    10% { opacity: 1; }
    90% { opacity: 1; }
    100% { top: 110%; opacity: 0; }
}
.loader-bar {
    width: 0%;
    height: 2px;
    background: #2dd4bf;
    animation: load 2.4s cubic-bezier(0.77, 0, 0.175, 1) forwards;
    box-shadow: 0 0 15px #2dd4bf, 0 0 5px #fff;
}
@keyframes load {
    0% { width: 0%; }
    40% { width: 60%; }
    70% { width: 80%; }
    100% { width: 100%; }
}
/* Background Animation */
@keyframes bg-breathe {
    0% { transform: scale(1); opacity: 0.3; }
    50% { transform: scale(1.05); opacity: 0.6; }
    100% { transform: scale(1); opacity: 0.3; }
}
</style>

<div id="global-splash-screen" style="display: none;" class="fixed inset-0 z-[99999] flex-col items-center justify-center splash-bg overflow-hidden transition-all duration-700 ease-in-out">
    
    <!-- Image Background matching Auth (breathing and glowing) -->
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat mix-blend-screen animate-[bg-breathe_6s_ease-in-out_infinite]" style="background-image: url('{{ asset('images/auth_bg.png') }}');"></div>
    <div class="absolute top-[-20%] left-[-10%] w-[50%] h-[50%] rounded-full bg-cyan-900/30 blur-[120px] animate-pulse" style="animation-duration: 4s;"></div>
    <div class="absolute bottom-[-20%] right-[-10%] w-[50%] h-[50%] rounded-full bg-teal-900/30 blur-[120px] animate-pulse" style="animation-duration: 6s;"></div>

    <!-- Main Content -->
    <div class="relative z-10 flex flex-col items-center">
        <div class="glitch-wrapper">
            <h1 class="glitch-text drop-shadow-[0_0_20px_rgba(6,182,212,0.5)]">AIX</h1>
            <div class="scanner-line"></div>
        </div>
        
        <div class="mt-16 w-72 h-[2px] bg-white/10 rounded-full overflow-hidden relative">
            <div class="loader-bar"></div>
        </div>
        
        <div class="mt-6 flex items-center space-x-2 text-cyan-400 text-xs font-mono tracking-[0.3em] uppercase opacity-80">
            <svg class="w-4 h-4 animate-spin text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
            <span class="animate-pulse">Sistem Başlatılıyor</span>
        </div>
    </div>
</div>

<script>
    // Run synchronously immediately after the div is created to prevent flicker
    (function() {
        const splash = document.getElementById('global-splash-screen');
        
        // Check if we've already shown the splash screen in this browser session
        if (!sessionStorage.getItem('aix_splash_shown')) {
            // Show it immediately
            splash.style.display = 'flex';
            
            // Set the timeout to hide it after 2.5 seconds
            setTimeout(() => {
                // Animate out: scale up slightly and fade to 0
                splash.style.transform = 'scale(1.1)';
                splash.style.opacity = '0';
                splash.style.pointerEvents = 'none';
                
                // Remove from DOM entirely after transition finishes
                setTimeout(() => {
                    splash.remove();
                    // Mark as shown so it doesn't appear on subsequent page loads
                    sessionStorage.setItem('aix_splash_shown', 'true');
                }, 700);
            }, 2500); // 2.5 seconds loading time
        } else {
            // Already shown before, remove it instantly from the DOM
            splash.remove();
        }
    })();
</script>
