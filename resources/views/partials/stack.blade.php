<!-- 03. STACK & CAPABILITIES (Original Bento Grid + Interactive Skill-to-Project Jump) -->
<section id="stack" class="scroll-mt-4 lg:scroll-mt-0 py-20 sm:py-24 lg:py-32 px-6 sm:px-8 lg:px-12 xl:px-20 border-b border-bg-border">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-10 sm:mb-12 lg:mb-16">
            <div>
                <span class="reveal font-mono text-accent-cyan text-sm mb-4 block">03 &mdash; TECH STACK</span>
                <h2 class="reveal font-display text-3xl sm:text-4xl md:text-5xl font-bold text-white">ALAT &amp; TEKNOLOGI</h2>
            </div>
            <p class="reveal font-mono text-xs text-text-mute">
                Klik teknologi untuk memfilter proyek terkait &uarr;
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            <div class="spotlight-card reveal md:col-span-2 bg-bg-card border border-bg-border p-6 sm:p-8 hover:border-text-dim transition-colors relative overflow-hidden group interactable">
                <div class="absolute top-0 right-0 w-32 h-32 bg-[#68d391]/10 rounded-full blur-[50px] group-hover:bg-[#68d391]/20 transition-all pointer-events-none gpu-layer" aria-hidden="true"></div>
                <div class="relative z-10 flex flex-col h-full justify-between">
                    <div>
                        <svg class="w-8 h-8 text-white mb-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <rect width="20" height="8" x="2" y="2" rx="2" ry="2"></rect>
                            <rect width="20" height="8" x="2" y="14" rx="2" ry="2"></rect>
                            <line x1="6" x2="6.01" y1="6" y2="6"></line>
                            <line x1="6" x2="6.01" y1="18" y2="18"></line>
                        </svg>
                        <h3 class="font-display text-2xl font-bold mb-2 text-white">Backend &amp; Services</h3>
                        <p class="text-text-dim text-sm max-w-md">Membangun backend yang solid dan scalable dengan API, database, autentikasi, serta layanan cloud untuk aplikasi modern.</p>
                    </div>
                    <div class="flex flex-wrap gap-2.5 mt-8 font-mono text-xs">
                        @php
                            $backendBadges = [
                                ['name' => 'Laravel', 'dot' => '#ff2d20'],
                                ['name' => 'PHP', 'dot' => '#777bb4'],
                                ['name' => 'MySQL', 'dot' => '#4479a1'],
                                ['name' => 'Node.js', 'dot' => '#68d391'],
                                ['name' => 'Supabase', 'dot' => '#3ecf8e'],
                                ['name' => 'Firebase', 'dot' => '#ffca28'],
                            ];
                        @endphp
                        @foreach ($backendBadges as $badge)
                            <button
                                type="button"
                                data-stack-filter="{{ $badge['name'] }}"
                                data-scroll-to-work="true"
                                class="interactable inline-flex items-center gap-2 px-3 py-1.5 rounded border border-bg-border bg-bg-alt/80 hover:border-accent-cyan hover:text-accent-cyan text-text-main transition-colors cursor-pointer"
                            >
                                <span class="w-1.5 h-1.5 rounded-full" style="background-color: {{ $badge['dot'] }};" aria-hidden="true"></span>
                                <span>{{ $badge['name'] }}</span>
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="spotlight-card reveal bg-bg-card border border-bg-border p-6 sm:p-8 hover:border-accent-cyan transition-colors group interactable">
                <svg class="w-8 h-8 text-accent-cyan mb-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <rect width="18" height="18" x="3" y="3" rx="2"></rect>
                    <path d="M3 9h18M9 21V9"></path>
                </svg>
                <h3 class="font-display text-xl font-bold mb-2 text-white">Frontend</h3>
                <p class="text-text-dim text-sm mb-8">Membuat antarmuka responsif yang bekerja sempurna di seluruh perangkat.</p>
                <div class="flex flex-col gap-1 font-mono text-xs">
                    @php
                        $frontendRows = [
                            ['name' => 'TypeScript', 'level' => 'PRIMARY'],
                            ['name' => 'React', 'level' => 'PRIMARY'],
                            ['name' => 'TanStack', 'level' => 'PRIMARY'],
                            ['name' => 'Tailwind CSS', 'level' => 'PRIMARY'],
                        ];
                    @endphp
                    @foreach ($frontendRows as $row)
                        <button
                            type="button"
                            data-stack-filter="{{ $row['name'] }}"
                            data-scroll-to-work="true"
                            class="interactable w-full flex justify-between items-center border-b border-bg-border last:border-b-0 py-2.5 text-left hover:text-accent-cyan transition-colors cursor-pointer"
                        >
                            <span>{{ $row['name'] }}</span>
                            <span class="text-text-mute text-[10px]">{{ $row['level'] }}</span>
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="reveal md:col-span-3 bg-bg-alt border border-bg-border p-6 sm:p-8 mt-4">
                <div class="flex items-center justify-between gap-4 mb-8">
                    <h3 class="font-mono text-xs text-text-mute">LEARNING JOURNEY</h3>
                    <span class="font-mono text-[11px] text-accent-cyan">ACTIVE STAGE: 02 / 03</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
                    <div class="hidden md:block absolute top-2 left-0 w-1/2 h-[1px] bg-accent-cyan/60" aria-hidden="true"></div>
                    <div class="hidden md:block absolute top-2 left-1/2 w-1/2 h-[1px] border-t border-dashed border-bg-border" aria-hidden="true"></div>

                    <div class="relative z-10">
                        <div class="w-4 h-4 rounded-full bg-bg-main border-2 border-accent-cyan/60 mb-4"></div>
                        <div class="font-mono text-xs text-text-mute">2023 - 2024</div>
                        <div class="font-bold text-white mt-1">Dasar Web</div>
                        <div class="text-xs text-text-dim mt-1 leading-relaxed">HTML, CSS &amp; Logika Dasar</div>
                    </div>

                    <div class="relative z-10">
                        <div class="w-4 h-4 rounded-full bg-bg-main border-2 border-accent-cyan mb-4 shadow-[0_0_12px_#00FFD5]"></div>
                        <div class="font-mono text-xs text-accent-cyan">Saat Ini</div>
                        <div class="font-bold text-white mt-1">Modern Web Stack</div>
                        <div class="text-xs text-text-dim mt-1 leading-relaxed">PHP, Laravel, MySQL, TypeScript, React</div>
                    </div>

                    <div class="relative z-10">
                        <div class="w-4 h-4 rounded-full bg-bg-main border-2 border-bg-border mb-4"></div>
                        <div class="font-mono text-xs text-text-mute">Masa Depan</div>
                        <div class="font-bold text-text-dim mt-1">Eksplorasi Lanjutan</div>
                        <div class="text-xs text-text-mute mt-1 leading-relaxed">React, JS Ecosystem, Security</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
