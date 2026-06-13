<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
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
            @keyframes auth-breathe {
                0% { opacity: 0.15; transform: scale(1); }
                50% { opacity: 0.35; transform: scale(1.05); }
                100% { opacity: 0.15; transform: scale(1); }
            }
            @keyframes shimmer {
                0% { background-position: 200% center; }
                100% { background-position: -200% center; }
            }
        </style>
    </head>
    <body class="font-sans text-gray-100 antialiased aurora-bg min-h-screen selection:bg-cyan-500/30 selection:text-cyan-200">
        <x-splash-screen />
        <!-- Global glowing ambient light & AI Background -->
        <div class="pointer-events-none fixed inset-0 z-0 overflow-hidden">
            <!-- Transparent AI Background Image -->
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat mix-blend-screen animate-[auth-breathe_8s_ease-in-out_infinite]" style="background-image: url('{{ asset('images/auth_bg.png') }}');"></div>
            
            <div class="absolute top-[-20%] left-[-10%] w-[50%] h-[50%] rounded-full bg-cyan-900/30 blur-[120px] animate-pulse" style="animation-duration: 5s;"></div>
            <div class="absolute bottom-[-20%] right-[-10%] w-[50%] h-[50%] rounded-full bg-teal-900/30 blur-[120px] animate-pulse" style="animation-duration: 7s;"></div>
        </div>

        <div class="relative z-10 font-sans text-gray-100 min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </body>
</html>
