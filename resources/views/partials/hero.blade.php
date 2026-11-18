<!-- 00. HERO SECTION (Same Theme & Layout, Elevated Polish) -->
<section id="home" class="min-h-screen relative flex items-center pt-28 pb-16 sm:pt-24 lg:py-0 px-6 sm:px-8 lg:px-12 xl:px-20 overflow-hidden">
    <!-- Subtle glow behind hero (GPU Layer) -->
    <div class="absolute top-1/2 left-1/4 -translate-y-1/2 w-[500px] h-[500px] bg-accent-cyan/5 rounded-full blur-[120px] pointer-events-none gpu-layer" aria-hidden="true"></div>

    <div class="w-full max-w-7xl mx-auto grid xl:grid-cols-12 gap-10 xl:gap-8 items-center relative z-10">

        <!-- Left: Typography & Actions -->
        <div class="xl:col-span-7 flex flex-col gap-6">
            <div class="reveal font-mono text-sm tracking-[0.2em] text-text-dim uppercase flex flex-wrap items-center gap-4">
                <span class="w-8 h-[1px] bg-accent-cyan"></span>
                <span>Hello, I'm Yukafii</span>
                <span class="hidden sm:inline-flex items-center gap-2 text-[11px] tracking-normal normal-case px-2.5 py-0.5 rounded border border-bg-border bg-bg-card/80 text-text-dim">
                    <span class="w-1.5 h-1.5 rounded-full bg-accent-cyan" aria-hidden="true"></span>
                    <span>Bogor &middot; <span data-bogor-clock class="text-white">--:-- WIB</span></span>
                </span>
            </div>

            <h1 class="reveal reveal-delay-1 font-display text-[clamp(2.25rem,11vw,3.25rem)] min-[480px]:text-5xl md:text-7xl 2xl:text-8xl font-bold leading-[1.05] tracking-tight text-white">
                I BUILD <br>
                <span class="text-accent-cyan relative inline-block">
                    DIGITAL
                    <span class="absolute bottom-1 left-0 w-full h-[0.1em] bg-accent-cyan/30"></span>
                </span> <br>
                EXPERIENCES.
            </h1>

            <p class="reveal reveal-delay-2 text-text-dim text-lg md:text-xl font-light max-w-lg leading-relaxed">
                Web Developer &amp; Creative Technologist based in Bogor. Focused on solving problems through clean code and intuitive design.
            </p>

            <div class="reveal reveal-delay-2 mt-4 flex flex-wrap items-center gap-4 font-mono text-sm">
                <a href="#work" class="nav-link-click interactable magnetic-btn group relative px-5 sm:px-8 py-4 bg-white text-bg-main font-bold flex items-center gap-3 overflow-hidden">
                    <span class="relative z-10 group-hover:translate-x-1 transition-transform">VIEW MY WORK</span>
                    <svg class="relative z-10 w-4 h-4 group-hover:translate-x-2 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M5 12h14M13 5l7 7-7 7"></path>
                    </svg>
                    <div class="absolute inset-0 bg-accent-cyan transform scale-x-0 origin-left group-hover:scale-x-100 transition-transform duration-300 ease-out"></div>
                </a>

                <a href="#contact" class="nav-link-click interactable px-5 sm:px-8 py-4 border border-bg-border text-text-main hover:border-accent-cyan hover:text-accent-cyan transition-colors flex items-center gap-3">
                    CONTACT ME
                </a>

                <a
                    href="https://github.com/yungkaii"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="interactable inline-flex items-center gap-1.5 px-2 py-2 text-text-dim hover:text-accent-cyan transition-colors"
                >
                    <span>github.com/yungkaii</span>
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M7 17 17 7M7 7h10v10"></path>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Right: Interactive Developer Terminal (Syntax Highlighted + History + Tab Complete) -->
        <div class="reveal xl:col-span-5">
            <div class="spotlight-card bg-bg-card rounded-lg border border-bg-border hover:border-[#2a2a2a] shadow-2xl overflow-hidden xl:transform xl:rotate-1 xl:hover:rotate-0 transition-all duration-500 interactable gpu-layer">
                <div class="bg-bg-alt px-4 py-3 flex items-center justify-between gap-2 border-b border-bg-border">
                    <div class="flex items-center gap-2" aria-hidden="true">
                        <div class="w-3 h-3 rounded-full bg-[#FF5F56]"></div>
                        <div class="w-3 h-3 rounded-full bg-[#FFBD2E]"></div>
                        <div class="w-3 h-3 rounded-full bg-[#27C93F]"></div>
                    </div>
                    <span class="font-mono text-[11px] text-text-mute">yukafii@bogor:~ (interaktif)</span>
                    <span class="font-mono text-[10px] text-accent-cyan/80">zsh</span>
                </div>

                <div id="terminal-output" class="p-5 font-mono space-y-3 h-[255px] sm:h-[275px] overflow-y-auto bg-bg-card" aria-live="polite">
                    <div class="space-y-1.5">
                        <div class="flex items-center gap-2 text-xs">
                            <span class="text-accent-cyan font-medium">$</span>
                            <span class="text-white">cat profile.json</span>
                        </div>
                        <div class="pl-4 text-xs leading-relaxed text-text-dim">
                            <span class="text-text-mute">{</span><br>
                            &nbsp;&nbsp;<span class="text-white">"name"</span>: <span class="text-accent-cyan">"Yukafii"</span>,<br>
                            &nbsp;&nbsp;<span class="text-white">"role"</span>: <span class="text-accent-cyan">"Student Developer"</span>,<br>
                            &nbsp;&nbsp;<span class="text-white">"location"</span>: <span class="text-accent-cyan">"Bogor, ID"</span>,<br>
                            &nbsp;&nbsp;<span class="text-white">"projects"</span>: <span class="text-accent-purple font-semibold">{{ count($projects) }}</span>,<br>
                            &nbsp;&nbsp;<span class="text-white">"core_stack"</span>: [<span class="text-accent-cyan">"PHP"</span>, <span class="text-accent-cyan">"Laravel"</span>, <span class="text-accent-cyan">"TypeScript"</span>, <span class="text-accent-cyan">"React"</span>]<br>
                            <span class="text-text-mute">}</span>
                        </div>
                    </div>
                    <div class="text-[11px] text-text-mute pl-4">
                        Ketik <span class="text-white">help</span>, gunakan <span class="text-white">Tab</span> untuk autocomplete, atau klik tombol cepat:
                    </div>
                </div>

                <!-- Quick Command Chips -->
                <div class="px-4 py-2 border-t border-bg-border bg-bg-alt flex flex-wrap items-center gap-1.5">
                    <button type="button" data-terminal-cmd="whoami" class="interactable px-2 py-1 rounded border border-bg-border bg-bg-card hover:border-accent-cyan text-[11px] font-mono text-text-dim hover:text-white transition-colors cursor-pointer">whoami</button>
                    <button type="button" data-terminal-cmd="stack" class="interactable px-2 py-1 rounded border border-bg-border bg-bg-card hover:border-accent-cyan text-[11px] font-mono text-text-dim hover:text-white transition-colors cursor-pointer">stack</button>
                    <button type="button" data-terminal-cmd="projects" class="interactable px-2 py-1 rounded border border-bg-border bg-bg-card hover:border-accent-cyan text-[11px] font-mono text-text-dim hover:text-white transition-colors cursor-pointer">projects</button>
                    <button type="button" data-terminal-cmd="filter game" class="interactable px-2 py-1 rounded border border-bg-border bg-bg-card hover:border-accent-cyan text-[11px] font-mono text-text-dim hover:text-white transition-colors cursor-pointer">filter game</button>
                    <button type="button" data-terminal-cmd="clear" class="interactable px-2 py-1 rounded border border-bg-border bg-bg-card hover:border-text-dim text-[11px] font-mono text-text-mute hover:text-white transition-colors cursor-pointer ml-auto">clear</button>
                </div>

                <!-- Real Command Input -->
                <form id="terminal-form" class="px-4 py-2.5 border-t border-bg-border bg-bg-card flex items-center gap-2 font-mono text-xs">
                    <label for="terminal-input" class="sr-only">Ketik perintah terminal</label>
                    <span class="text-accent-cyan font-medium shrink-0" aria-hidden="true">$</span>
                    <input
                        id="terminal-input"
                        type="text"
                        autocomplete="off"
                        spellcheck="false"
                        placeholder="ketik perintah (mis. help, open gymtrack)..."
                        class="interactable w-full bg-transparent text-white placeholder:text-text-mute focus:outline-none"
                    >
                    <button type="submit" class="interactable text-[11px] text-text-dim hover:text-accent-cyan px-2 py-0.5 rounded border border-bg-border hover:border-accent-cyan transition-colors cursor-pointer shrink-0">
                        Run
                    </button>
                </form>
            </div>
        </div>

    </div>
</section>

<!-- MARQUEE SECTION -->
<div class="marquee-container group relative flex w-full cursor-default overflow-hidden border-y border-bg-border bg-bg-main py-5">
    <div class="marquee-track">
        @for ($i = 0; $i < 4; $i++)
            <div class="flex min-w-max items-center justify-around gap-8 px-4" @if ($i > 0) aria-hidden="true" @endif>
                <span class="font-mono text-xs tracking-widest text-text-dim">LARAVEL ARCHITECTURE</span>
                <span class="font-bold text-accent-cyan">*</span>
                <span class="font-mono text-xs tracking-widest text-text-dim">UI/UX DESIGN</span>
                <span class="font-bold text-accent-cyan">*</span>
                <span class="font-mono text-xs tracking-widest text-text-dim">PHP BACKEND</span>
                <span class="font-bold text-accent-cyan">*</span>
                <span class="font-mono text-xs tracking-widest text-text-dim">RESPONSIVE FRONTEND</span>
                <span class="font-bold text-accent-cyan">*</span>
                <span class="font-mono text-xs tracking-widest text-text-dim">DATABASE MANAGEMENT</span>
                <span class="font-bold text-accent-cyan">*</span>
            </div>
        @endfor
    </div>
</div>
