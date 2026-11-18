<!DOCTYPE html>
<html lang="id" style="scroll-behavior: auto !important;" class="bg-[#0A0A0A]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Yukafii | Creative Web Developer berbasis di Bogor. Membangun aplikasi web Laravel, React, TypeScript, dan pengalaman digital interaktif.">
    <title>@yield('title', 'Yukafii | Creative Web Developer')</title>

    <!-- Fonts (Space Grotesk + Inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=Space+Grotesk:wght@400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans bg-bg-main text-text-main selection:bg-accent-cyan selection:text-bg-main">

    <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-3 focus:left-3 focus:z-[10001] focus:px-4 focus:py-2 focus:bg-accent-cyan focus:text-bg-main focus:font-mono focus:text-xs focus:font-bold">
        SKIP TO CONTENT
    </a>

    <!-- Loading Screen (Snappy on first visit, click to skip) -->
    <div id="loader" class="fixed inset-0 z-[10000] bg-bg-main flex flex-col items-center justify-center cursor-pointer" title="Klik untuk melewati">
        <div class="font-display text-4xl md:text-6xl font-bold tracking-tighter text-white">YUKAFII.DEV</div>
        <div class="mt-4 font-mono text-sm text-text-dim flex items-center gap-2">
            SYSTEM BOOT <span id="load-counter" class="text-accent-cyan w-9 text-right">0%</span>
        </div>
        <div class="w-48 h-[1px] bg-bg-border mt-4 relative overflow-hidden">
            <div id="load-bar" class="absolute top-0 left-0 h-full bg-accent-cyan w-0 transition-all duration-75"></div>
        </div>
    </div>

    <!-- Custom Cursor -->
    <div class="cursor-dot hidden md:block" aria-hidden="true"></div>
    <div class="cursor-ring hidden md:block" aria-hidden="true"></div>

    <!-- Background Grid -->
    <div class="fixed inset-0 z-[-1] bg-grid opacity-30 pointer-events-none" aria-hidden="true"></div>

    <div class="flex">
        <!-- LEFT SIDEBAR (Desktop) -->
        <aside class="hidden lg:flex w-[100px] xl:w-[120px] fixed h-screen border-r border-bg-border bg-bg-main/85 backdrop-blur-xl flex-col items-center justify-between py-8 z-50 gpu-layer">
            <a href="#home" class="nav-link-click font-display font-bold text-2xl text-white hover:text-accent-cyan transition-colors group relative interactable">
                Y<span class="text-accent-cyan">.</span>
            </a>

            <div class="flex flex-col items-center gap-3">
                <div class="h-28 w-[1px] bg-bg-border relative">
                    <div class="scroll-progress absolute top-0 left-0 w-full h-full bg-accent-cyan"></div>
                </div>
                <span id="scroll-percent" class="font-mono text-[9px] tracking-wider text-text-mute tabular-nums">00%</span>
            </div>

            <nav aria-label="Main navigation" class="flex flex-col gap-7 text-[10px] font-mono tracking-widest text-text-dim">
                <a href="#about" class="nav-link-click nav-highlight interactable hover:text-accent-cyan transition-colors" style="writing-mode: vertical-rl; transform: rotate(180deg);">01 ABOUT</a>
                <a href="#work" class="nav-link-click nav-highlight interactable hover:text-accent-cyan transition-colors" style="writing-mode: vertical-rl; transform: rotate(180deg);">02 WORK</a>
                <a href="#stack" class="nav-link-click nav-highlight interactable hover:text-accent-cyan transition-colors" style="writing-mode: vertical-rl; transform: rotate(180deg);">03 STACK</a>
                <a href="#contact" class="nav-link-click nav-highlight interactable hover:text-accent-cyan transition-colors" style="writing-mode: vertical-rl; transform: rotate(180deg);">04 CONTACT</a>
            </nav>

            <div class="flex flex-col items-center gap-2 group relative">
                <div class="w-2 h-2 rounded-full bg-accent-cyan shadow-[0_0_10px_#00FFD5] animate-pulse interactable" aria-label="Status: tersedia untuk proyek"></div>
                <span class="pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-150 absolute left-full ml-4 whitespace-nowrap px-2.5 py-1 rounded border border-bg-border bg-bg-card font-mono text-[10px] text-text-dim">
                    Available · Bogor
                </span>
            </div>
        </aside>

        <!-- MOBILE HEADER -->
        <header class="lg:hidden fixed top-0 w-full border-b border-bg-border bg-bg-main/85 backdrop-blur-xl z-50 flex flex-wrap items-center justify-between gap-x-4 gap-y-2 px-4 py-3 sm:px-6 sm:py-4 gpu-layer">
            <a href="#home" class="nav-link-click font-display font-bold text-xl text-white">YUKAFII<span class="text-accent-cyan">.</span></a>
            <nav aria-label="Main navigation" class="flex w-full items-center justify-between gap-2 font-mono text-[9px] tracking-widest text-text-dim sm:ml-auto sm:w-auto sm:gap-5 sm:text-[10px]">
                <a href="#about" class="nav-link-click nav-highlight interactable py-2 hover:text-accent-cyan transition-colors">01 ABOUT</a>
                <a href="#work" class="nav-link-click nav-highlight interactable py-2 hover:text-accent-cyan transition-colors">02 WORK</a>
                <a href="#stack" class="nav-link-click nav-highlight interactable py-2 hover:text-accent-cyan transition-colors">03 STACK</a>
                <a href="#contact" class="nav-link-click nav-highlight interactable py-2 hover:text-accent-cyan transition-colors">04 CONTACT</a>
            </nav>
        </header>

        <!-- MAIN CONTENT AREA -->
        <main id="main-content" class="min-w-0 w-full lg:ml-[100px] lg:flex-1 xl:ml-[120px]">
            @yield('content')

            <footer class="border-t border-bg-border bg-bg-alt py-12 px-6 sm:px-8 lg:px-12 xl:px-20 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-accent-cyan/5 rounded-full blur-[100px] pointer-events-none gpu-layer" aria-hidden="true"></div>
                <div class="max-w-7xl mx-auto reveal-up flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                    <div>
                        <h3 class="font-display text-2xl font-bold text-white mb-1">YUKAFII<span class="text-accent-cyan">.</span>DEV</h3>
                        <p class="font-mono text-xs text-text-mute flex items-center gap-2">
                            <span>Bogor, Indonesia</span>
                            <span aria-hidden="true">&middot;</span>
                            <span data-bogor-clock class="text-text-dim">--:-- WIB</span>
                        </p>
                    </div>

                    <div class="flex flex-wrap items-center gap-x-6 gap-y-2 font-mono text-xs text-text-dim">
                        <a href="#about" class="nav-link-click interactable hover:text-accent-cyan transition-colors">01 ABOUT</a>
                        <a href="#work" class="nav-link-click interactable hover:text-accent-cyan transition-colors">02 WORK</a>
                        <a href="#stack" class="nav-link-click interactable hover:text-accent-cyan transition-colors">03 STACK</a>
                        <a href="#contact" class="nav-link-click interactable hover:text-accent-cyan transition-colors">04 CONTACT</a>
                        <a
                            href="https://github.com/yungkaii"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="interactable inline-flex items-center gap-1 text-white hover:text-accent-cyan transition-colors"
                        >
                            <span>github.com/yungkaii</span>
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M7 17 17 7M7 7h10v10"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </footer>
        </main>
    </div>

    <!-- Subtle Back to Top Button -->
    <button
        id="back-to-top"
        type="button"
        aria-label="Kembali ke atas"
        class="interactable fixed bottom-6 right-6 z-40 w-10 h-10 rounded-md border border-bg-border bg-bg-card/95 text-text-dim hover:border-accent-cyan hover:text-accent-cyan flex items-center justify-center shadow-lg cursor-pointer"
    >
        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="m18 15-6-6-6 6"></path>
        </svg>
    </button>
</body>
</html>
