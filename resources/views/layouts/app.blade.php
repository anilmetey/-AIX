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

        <!-- Styles -->
        @livewireStyles
        <style>
            body { font-family: 'Inter', sans-serif; }
            .aurora-bg {
                background-color: #030a10;
                background-image: 
                    radial-gradient(at 0% 0%, hsla(190, 80%, 10%, 1) 0, transparent 50%), 
                    radial-gradient(at 50% 0%, hsla(170, 70%, 15%, 0.3) 0, transparent 50%), 
                    radial-gradient(at 100% 0%, hsla(280, 50%, 15%, 0.3) 0, transparent 50%);
                background-attachment: fixed;
            }
        </style>
    </head>
    <body class="font-sans antialiased aurora-bg text-gray-100 min-h-screen selection:bg-cyan-500/30 selection:text-cyan-200">
        <x-splash-screen />
        <x-banner />

        <div class="min-h-screen flex flex-col relative">
            <!-- Global glowing ambient light -->
            <div class="pointer-events-none fixed inset-0 z-0">
                <div class="absolute top-[-20%] left-[-10%] w-[50%] h-[50%] rounded-full bg-cyan-900/20 blur-[120px]"></div>
                <div class="absolute bottom-[-20%] right-[-10%] w-[50%] h-[50%] rounded-full bg-teal-900/20 blur-[120px]"></div>
            </div>

            <div class="relative z-10 flex-1 flex flex-col">
                @livewire('navigation-menu')

                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-[#0f0f16]/80 backdrop-blur-xl border-b border-white/5">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main class="flex-1">
                    {{ $slot }}
                </main>
            </div>
        </div>

        @stack('modals')
        @livewireScripts
    </body>
</html>
