<!-- 02. WORK SECTION — Unified "Eksplorasi Semua 16 Karya" (Spotlight, Clickable Stack Tags, Prev/Next Modal) -->
<section id="work" class="scroll-mt-4 lg:scroll-mt-0 py-20 sm:py-24 lg:py-32 px-6 sm:px-8 lg:px-12 xl:px-20 border-b border-bg-border bg-bg-alt">
    <div class="max-w-7xl mx-auto">

        <!-- Section Header + Search & Grid/Indeks Switcher -->
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-8">
            <div>
                <span class="reveal font-mono text-accent-cyan text-sm mb-3 block">02 &mdash; ARSIP PROYEK</span>
                <h2 class="reveal font-display text-3xl sm:text-4xl md:text-5xl font-bold text-white">
                    Eksplorasi Semua {{ count($projects) }} Karya
                </h2>
            </div>

            <div class="reveal flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                <div class="relative">
                    <label for="project-search" class="sr-only">Cari proyek atau teknologi</label>
                    <svg class="w-4 h-4 text-text-mute absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                    <input
                        id="project-search"
                        type="text"
                        placeholder="Cari nama atau stack (tekan /)..."
                        class="interactable w-full sm:w-68 pl-9 pr-8 py-2 rounded-md border border-bg-border bg-bg-card text-sm text-white placeholder:text-text-mute focus:border-accent-cyan focus:outline-none transition-colors"
                    >
                    <button
                        id="search-clear-btn"
                        type="button"
                        aria-label="Hapus pencarian"
                        class="hidden interactable absolute right-2 top-1/2 -translate-y-1/2 w-5 h-5 rounded text-text-mute hover:text-white flex items-center justify-center cursor-pointer"
                    >
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M18 6 6 18M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="inline-flex rounded-md border border-bg-border bg-bg-card p-1 self-start sm:self-auto" role="group" aria-label="Pilih tampilan daftar proyek">
                    <button
                        type="button"
                        data-view-mode="grid"
                        aria-pressed="true"
                        class="view-toggle interactable inline-flex items-center gap-1.5 px-3 py-1.5 rounded text-xs font-mono text-text-dim hover:text-white transition-colors cursor-pointer"
                    >
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <rect width="7" height="7" x="3" y="3" rx="1"></rect>
                            <rect width="7" height="7" x="14" y="3" rx="1"></rect>
                            <rect width="7" height="7" x="14" y="14" rx="1"></rect>
                            <rect width="7" height="7" x="3" y="14" rx="1"></rect>
                        </svg>
                        <span>Grid</span>
                    </button>
                    <button
                        type="button"
                        data-view-mode="index"
                        aria-pressed="false"
                        class="view-toggle interactable inline-flex items-center gap-1.5 px-3 py-1.5 rounded text-xs font-mono text-text-dim hover:text-white transition-colors cursor-pointer"
                    >
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <line x1="8" x2="21" y1="6" y2="6"></line>
                            <line x1="8" x2="21" y1="12" y2="12"></line>
                            <line x1="8" x2="21" y1="18" y2="18"></line>
                            <line x1="3" x2="3.01" y1="6" y2="6"></line>
                            <line x1="3" x2="3.01" y1="12" y2="12"></line>
                            <line x1="3" x2="3.01" y1="18" y2="18"></line>
                        </svg>
                        <span>Indeks</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Category Filter Bar -->
        <div class="reveal flex flex-wrap items-center justify-between gap-4 mb-10">
            <div class="flex flex-wrap gap-2" role="group" aria-label="Filter kategori proyek">
                @foreach ($categories as $category)
                    <button
                        type="button"
                        data-filter-category="{{ $category['key'] }}"
                        aria-pressed="{{ $category['key'] === 'all' ? 'true' : 'false' }}"
                        class="filter-tab interactable px-3 py-1.5 rounded-md border border-bg-border bg-bg-card text-xs font-mono text-text-dim hover:border-accent-cyan hover:text-white transition-colors duration-150 cursor-pointer"
                    >
                        {{ $category['label'] }}
                        <span class="opacity-70 ml-1">({{ $categoryCounts[$category['key']] ?? 0 }})</span>
                    </button>
                @endforeach
            </div>

            <p id="archive-result-count" class="font-mono text-xs text-text-mute" aria-live="polite">
                Menampilkan {{ count($projects) }} dari {{ count($projects) }} proyek
            </p>
        </div>

        <!-- GRID VIEW -->
        <div id="archive-grid-view" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach ($projects as $project)
                @php
                    $searchBlob = strtolower($project['title'].' '.$project['type'].' '.$project['summary'].' '.implode(' ', $project['stack']));
                @endphp
                <article
                    data-project-card
                    data-slug="{{ $project['slug'] }}"
                    data-category="{{ $project['category'] }}"
                    data-search="{{ $searchBlob }}"
                    class="spotlight-card group rounded-lg border border-bg-border bg-bg-card overflow-hidden hover:border-accent-cyan/60 transition-colors duration-200 flex flex-col"
                >
                    <button
                        type="button"
                        data-open-project="{{ $project['slug'] }}"
                        aria-label="Lihat detail {{ $project['title'] }}"
                        class="interactable block w-full aspect-[16/10] bg-bg-main overflow-hidden text-left cursor-pointer relative border-b border-bg-border"
                    >
                        <div class="absolute inset-0 bg-gradient-to-t from-bg-main/70 via-transparent to-transparent opacity-40 group-hover:opacity-20 transition-opacity duration-300 z-10 pointer-events-none"></div>
                        <img
                            src="{{ asset($project['image']) }}"
                            alt="{{ $project['alt'] }}"
                            loading="{{ $loop->index < 3 ? 'eager' : 'lazy' }}"
                            class="w-full h-full object-cover transform group-hover:scale-[1.04] transition-transform duration-500 ease-out"
                        >
                        <span class="absolute top-2.5 left-2.5 z-20 px-2 py-0.5 rounded bg-bg-main/90 border border-bg-border font-mono text-[10px] text-accent-cyan">
                            {{ $project['number'] }}
                        </span>
                        <span class="absolute top-2.5 right-2.5 z-20 inline-flex items-center gap-1.5 px-2 py-0.5 rounded bg-bg-main/90 border border-bg-border font-mono text-[10px] text-text-dim">
                            @if ($project['is_github'])
                                <span class="w-1.5 h-1.5 rounded-full bg-text-dim" aria-hidden="true"></span>
                                <span>REPO</span>
                            @else
                                <span class="w-1.5 h-1.5 rounded-full bg-accent-cyan" aria-hidden="true"></span>
                                <span>LIVE</span>
                            @endif
                        </span>
                    </button>

                    <div class="p-5 flex flex-col justify-between gap-4 flex-1">
                        <div class="space-y-2">
                            <span class="font-mono text-[11px] text-text-mute uppercase tracking-wide block">{{ $project['type'] }}</span>
                            <h3 class="font-display text-lg font-bold text-white group-hover:text-accent-cyan transition-colors leading-snug">
                                {{ $project['title'] }}
                            </h3>
                            <p class="text-sm text-text-dim leading-relaxed line-clamp-2">
                                {{ $project['summary'] }}
                            </p>
                        </div>

                        <div class="space-y-3.5">
                            <div class="flex flex-wrap gap-1.5">
                                @foreach ($project['stack'] as $tech)
                                    <button
                                        type="button"
                                        data-stack-filter="{{ $tech }}"
                                        title="Filter proyek dengan {{ $tech }}"
                                        class="interactable px-2 py-0.5 border border-bg-border bg-bg-alt hover:border-accent-cyan hover:text-accent-cyan font-mono text-[10px] text-text-dim transition-colors cursor-pointer"
                                    >{{ $tech }}</button>
                                @endforeach
                            </div>

                            <div class="pt-3 border-t border-bg-border flex items-center justify-between gap-3 text-xs font-mono">
                                <a
                                    href="{{ $project['url'] }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="interactable inline-flex items-center gap-1 text-accent-cyan hover:text-white font-medium transition-colors"
                                >
                                    <span>{{ $project['cta'] }}</span>
                                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M7 17 17 7M7 7h10v10"></path>
                                    </svg>
                                </a>

                                <button
                                    type="button"
                                    data-open-project="{{ $project['slug'] }}"
                                    class="interactable inline-flex items-center gap-1 text-text-mute hover:text-white transition-colors cursor-pointer"
                                >
                                    <span>Pratinjau</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- INDEX LIST VIEW (with Desktop Live Preview) -->
        <div id="archive-index-view" class="hidden grid lg:grid-cols-12 gap-8 items-start">
            <div class="lg:col-span-8 rounded-lg border border-bg-border bg-bg-card overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-bg-border bg-bg-main font-mono text-[11px] uppercase text-text-mute">
                                <th scope="col" class="py-3 pl-4 pr-2 font-medium w-12">No</th>
                                <th scope="col" class="py-3 px-3 font-medium">Proyek</th>
                                <th scope="col" class="py-3 px-3 font-medium hidden sm:table-cell">Kategori</th>
                                <th scope="col" class="py-3 px-3 font-medium hidden md:table-cell">Stack</th>
                                <th scope="col" class="py-3 pl-2 pr-4 font-medium text-right">Tautan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-bg-border text-sm">
                            @foreach ($projects as $project)
                                @php
                                    $searchBlob = strtolower($project['title'].' '.$project['type'].' '.$project['summary'].' '.implode(' ', $project['stack']));
                                @endphp
                                <tr
                                    data-project-row
                                    data-slug="{{ $project['slug'] }}"
                                    data-category="{{ $project['category'] }}"
                                    data-search="{{ $searchBlob }}"
                                    class="hover:bg-bg-main/70 transition-colors duration-150"
                                >
                                    <td class="py-3.5 pl-4 pr-2 font-mono text-xs text-text-mute align-middle">{{ $project['number'] }}</td>
                                    <td class="py-3.5 px-3 align-middle">
                                        <button
                                            type="button"
                                            data-open-project="{{ $project['slug'] }}"
                                            class="interactable font-display font-bold text-white hover:text-accent-cyan transition-colors text-left cursor-pointer"
                                        >
                                            {{ $project['title'] }}
                                        </button>
                                        <div class="sm:hidden font-mono text-[11px] text-text-mute mt-0.5">{{ $project['type'] }}</div>
                                    </td>
                                    <td class="py-3.5 px-3 font-mono text-xs text-text-dim hidden sm:table-cell align-middle">{{ $project['type'] }}</td>
                                    <td class="py-3.5 px-3 hidden md:table-cell align-middle">
                                        <span class="font-mono text-xs text-text-mute">{{ implode(' · ', $project['stack']) }}</span>
                                    </td>
                                    <td class="py-3.5 pl-2 pr-4 text-right align-middle whitespace-nowrap">
                                        <a
                                            href="{{ $project['url'] }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="interactable inline-flex items-center gap-1 font-mono text-xs text-accent-cyan hover:text-white transition-colors"
                                        >
                                            <span>{{ $project['is_github'] ? 'GitHub' : 'Buka' }}</span>
                                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="M7 17 17 7M7 7h10v10"></path>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Sticky Desktop Hover Preview Card -->
            <aside class="hidden lg:block lg:col-span-4 sticky top-12 rounded-lg border border-bg-border bg-bg-card overflow-hidden">
                <div class="aspect-[16/10] bg-bg-main overflow-hidden border-b border-bg-border">
                    <img
                        id="index-preview-img"
                        src="{{ asset($projects[0]['image']) }}"
                        alt="{{ $projects[0]['alt'] }}"
                        class="w-full h-full object-cover transition-opacity duration-150"
                    >
                </div>
                <div class="p-5 space-y-2.5">
                    <span id="index-preview-type" class="font-mono text-xs text-accent-cyan block">
                        {{ $projects[0]['number'] }} / {{ $projects[0]['type'] }}
                    </span>
                    <h3 id="index-preview-title" class="font-display text-xl font-bold text-white">
                        {{ $projects[0]['title'] }}
                    </h3>
                    <p id="index-preview-summary" class="text-sm text-text-dim leading-relaxed">
                        {{ $projects[0]['summary'] }}
                    </p>
                    <p class="pt-2 font-mono text-[11px] text-text-mute">
                        Arahkan kursor ke baris tabel untuk pratinjau cepat.
                    </p>
                </div>
            </aside>
        </div>

        <!-- Empty State -->
        <div id="archive-empty-state" class="hidden rounded-lg border border-bg-border bg-bg-card p-10 text-center space-y-3" role="status">
            <p class="font-display text-lg font-bold text-white">Tidak ada proyek yang cocok</p>
            <p class="text-sm text-text-dim">Coba gunakan kata kunci lain seperti Laravel, Supabase, TypeScript, atau reset filter.</p>
            <button
                id="clear-project-filters"
                type="button"
                class="interactable mt-2 inline-flex items-center px-4 py-2 rounded-md border border-bg-border bg-bg-alt hover:border-accent-cyan text-xs font-mono text-white transition-colors cursor-pointer"
            >
                Reset Filter &amp; Pencarian
            </button>
        </div>
    </div>

    <!-- Accessible Native <dialog> Quick-Preview Modal with Prev / Next Navigation -->
    <dialog id="project-detail-modal" class="project-modal rounded-lg overflow-hidden shadow-2xl" aria-labelledby="modal-project-title">
        <div class="flex flex-col max-h-[calc(100dvh-2.5rem)]">
            <div class="px-5 py-3.5 border-b border-bg-border bg-bg-alt flex items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <span id="modal-project-meta" class="font-mono text-xs text-accent-cyan">01 / PROJECT</span>
                    <span id="modal-project-position" class="font-mono text-[11px] text-text-mute">1 / 16</span>
                </div>

                <div class="flex items-center gap-1.5">
                    <button
                        id="modal-prev-btn"
                        type="button"
                        aria-label="Proyek sebelumnya"
                        title="Sebelumnya (Panah Kiri)"
                        class="interactable inline-flex items-center justify-center w-8 h-8 rounded border border-bg-border bg-bg-card text-text-dim hover:text-white hover:border-accent-cyan transition-colors cursor-pointer"
                    >
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="m15 18-6-6 6-6"></path>
                        </svg>
                    </button>
                    <button
                        id="modal-next-btn"
                        type="button"
                        aria-label="Proyek berikutnya"
                        title="Berikutnya (Panah Kanan)"
                        class="interactable inline-flex items-center justify-center w-8 h-8 rounded border border-bg-border bg-bg-card text-text-dim hover:text-white hover:border-accent-cyan transition-colors cursor-pointer"
                    >
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </button>
                    <button
                        id="modal-close-btn"
                        type="button"
                        aria-label="Tutup jendela detail proyek"
                        class="interactable ml-1 inline-flex items-center justify-center w-8 h-8 rounded border border-bg-border bg-bg-card text-text-dim hover:text-white hover:border-accent-cyan transition-colors cursor-pointer"
                    >
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M18 6 6 18M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="overflow-y-auto">
                <div class="bg-bg-main aspect-[16/9] border-b border-bg-border overflow-hidden">
                    <img id="modal-project-img" src="" alt="" class="w-full h-full object-cover">
                </div>

                <div class="p-6 sm:p-7 space-y-5">
                    <h3 id="modal-project-title" class="font-display text-2xl sm:text-3xl font-bold text-white"></h3>
                    <p id="modal-project-summary" class="text-sm sm:text-base text-text-dim leading-relaxed max-w-prose"></p>

                    <div id="modal-project-stack" class="flex flex-wrap gap-2"></div>

                    <div class="pt-4 border-t border-bg-border flex flex-wrap items-center justify-between gap-4">
                        <a
                            id="modal-project-link"
                            href="#"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="interactable inline-flex items-center gap-2 px-5 py-2.5 bg-accent-cyan hover:bg-white text-bg-main font-mono font-bold text-xs uppercase transition-colors"
                        >
                            <span id="modal-project-link-label">Buka Proyek</span>
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M7 17 17 7M7 7h10v10"></path>
                            </svg>
                        </a>
                        <span class="font-mono text-[11px] text-text-mute">Gunakan &larr; &rarr; untuk navigasi &middot; Esc untuk tutup</span>
                    </div>
                </div>
            </div>
        </div>
    </dialog>
</section>
