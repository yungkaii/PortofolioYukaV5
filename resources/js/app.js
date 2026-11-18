document.addEventListener('DOMContentLoaded', () => {
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const isFinePointer = window.matchMedia('(pointer: fine)').matches;

    initLoader(prefersReducedMotion);
    initBogorClock();
    initSmoothNavLinks();
    initRevealObserver(prefersReducedMotion);
    initScrollProgressAndNav();
    initCustomCursor(prefersReducedMotion, isFinePointer);
    initSpotlightCards(prefersReducedMotion, isFinePointer);
    initMagneticButtons(prefersReducedMotion, isFinePointer);

    const archiveApi = initProjectArchive();
    initInteractiveTerminal(archiveApi);
    initContactForm();
});

/* ==========================================================================
   1. Loading Screen (Snappy first visit, click-to-skip, instant in-session)
   ========================================================================== */
function triggerHeroAnimations() {
    document
        .querySelectorAll('#home .reveal, #home .reveal-up, #home .reveal-left, #home .reveal-right, #home .reveal-scale, #home .reveal-fade')
        .forEach((el) => el.classList.add('is-visible'));
}

function initLoader(prefersReducedMotion) {
    const loader = document.getElementById('loader');
    const counter = document.getElementById('load-counter');
    const bar = document.getElementById('load-bar');

    let seenThisSession = false;
    try {
        seenThisSession = sessionStorage.getItem('yukafii-booted') === '1';
    } catch {
        // ignore storage errors
    }

    if (!loader || prefersReducedMotion || seenThisSession) {
        loader?.remove();
        triggerHeroAnimations();
        return;
    }

    let finished = false;
    let count = 0;

    const finish = () => {
        if (finished) return;
        finished = true;
        window.clearInterval(interval);
        try {
            sessionStorage.setItem('yukafii-booted', '1');
        } catch {
            // ignore
        }
        loader.classList.add('loader-hide');
        window.setTimeout(() => {
            loader.remove();
            triggerHeroAnimations();
        }, 620);
    };

    loader.addEventListener('click', finish, { once: true });

    const interval = window.setInterval(() => {
        count += Math.floor(Math.random() * 22) + 12;
        if (count >= 100) {
            count = 100;
            if (counter) counter.textContent = '100%';
            if (bar) bar.style.width = '100%';
            window.setTimeout(finish, 180);
            return;
        }
        if (counter) counter.textContent = `${count}%`;
        if (bar) bar.style.width = `${count}%`;
    }, 35);
}

/* ==========================================================================
   2. Live Bogor Clock (WIB / UTC+7)
   ========================================================================== */
function initBogorClock() {
    const targets = document.querySelectorAll('[data-bogor-clock]');
    if (!targets.length) return;

    const formatter = new Intl.DateTimeFormat('id-ID', {
        timeZone: 'Asia/Jakarta',
        hour: '2-digit',
        minute: '2-digit',
        hour12: false,
    });

    const update = () => {
        const now = formatter.format(new Date()).replace('.', ':');
        targets.forEach((el) => {
            el.textContent = `${now} WIB`;
        });
    };

    update();
    window.setInterval(update, 30000);
}

/* ==========================================================================
   3. Smooth Navigation Click API & Back to Top
   ========================================================================== */
function initSmoothNavLinks() {
    document.querySelectorAll('.nav-link-click').forEach((anchor) => {
        anchor.addEventListener('click', (e) => {
            const targetId = anchor.getAttribute('href');
            if (!targetId || targetId === '#' || !targetId.startsWith('#')) return;
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                targetElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    const backToTop = document.getElementById('back-to-top');
    backToTop?.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}

/* ==========================================================================
   4. One-Shot Reveal Observer
   ========================================================================== */
function initRevealObserver(prefersReducedMotion) {
    const elements = document.querySelectorAll(
        '.reveal, .reveal-up, .reveal-left, .reveal-right, .reveal-scale, .reveal-fade'
    );
    if (!elements.length) return;

    if (prefersReducedMotion || !('IntersectionObserver' in window)) {
        elements.forEach((el) => el.classList.add('is-visible'));
        return;
    }

    const observer = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    obs.unobserve(entry.target);
                }
            });
        },
        { root: null, rootMargin: '0px 0px -8% 0px', threshold: 0.05 }
    );

    elements.forEach((el) => observer.observe(el));
}

/* ==========================================================================
   5. Scroll Progress, Percentage Readout, Active Nav & Back-to-Top Visibility
   ========================================================================== */
function initScrollProgressAndNav() {
    const progressBar = document.querySelector('.scroll-progress');
    const percentLabel = document.getElementById('scroll-percent');
    const backToTop = document.getElementById('back-to-top');
    const navLinks = document.querySelectorAll('.nav-highlight');

    let cachedDocHeight = 0;
    let sectionOffsets = [];
    let isScrollTicking = false;

    const updateLayoutCache = () => {
        cachedDocHeight = document.documentElement.scrollHeight - window.innerHeight;
        sectionOffsets = Array.from(document.querySelectorAll('section[id]')).map((sec) => ({
            id: sec.getAttribute('id'),
            top: sec.offsetTop,
        }));
    };

    const renderScroll = () => {
        const scrollY = window.scrollY;
        const ratio = cachedDocHeight > 0 ? Math.min(Math.max(scrollY / cachedDocHeight, 0), 1) : 0;

        if (progressBar) {
            progressBar.style.transform = `scaleY(${ratio}) translateZ(0)`;
        }

        if (percentLabel) {
            const pct = Math.round(ratio * 100);
            percentLabel.textContent = `${String(pct).padStart(2, '0')}%`;
        }

        if (backToTop) {
            backToTop.classList.toggle('is-shown', scrollY > 520);
        }

        let current = '';
        for (let i = 0; i < sectionOffsets.length; i++) {
            if (scrollY >= sectionOffsets[i].top - 300) {
                current = sectionOffsets[i].id;
            }
        }

        navLinks.forEach((link) => {
            const href = link.getAttribute('href') || '';
            const active = current && href === `#${current}`;
            link.classList.toggle('text-accent-cyan', active);
            link.classList.toggle('text-text-dim', !active);
        });

        isScrollTicking = false;
    };

    window.addEventListener('load', () => {
        updateLayoutCache();
        renderScroll();
    });
    window.addEventListener('resize', updateLayoutCache, { passive: true });
    updateLayoutCache();
    renderScroll();

    window.addEventListener(
        'scroll',
        () => {
            if (!isScrollTicking) {
                window.requestAnimationFrame(renderScroll);
                isScrollTicking = true;
            }
        },
        { passive: true }
    );
}

/* ==========================================================================
   6. Custom Cursor (Dot + Ring)
   ========================================================================== */
function initCustomCursor(prefersReducedMotion, isFinePointer) {
    const dot = document.querySelector('.cursor-dot');
    const ring = document.querySelector('.cursor-ring');
    if (prefersReducedMotion || !isFinePointer || !dot || !ring) return;

    let mouseX = -100;
    let mouseY = -100;
    let ringX = -100;
    let ringY = -100;
    let isCursorTicking = false;

    window.addEventListener(
        'mousemove',
        (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
            if (!isCursorTicking) {
                window.requestAnimationFrame(() => {
                    dot.style.transform = `translate3d(${mouseX}px, ${mouseY}px, 0) translate(-50%, -50%)`;
                    isCursorTicking = false;
                });
                isCursorTicking = true;
            }
        },
        { passive: true }
    );

    const animateRing = () => {
        ringX += (mouseX - ringX) * 0.2;
        ringY += (mouseY - ringY) * 0.2;
        ring.style.transform = `translate3d(${ringX}px, ${ringY}px, 0) translate(-50%, -50%)`;
        window.requestAnimationFrame(animateRing);
    };
    window.requestAnimationFrame(animateRing);

    document.addEventListener('mouseover', (e) => {
        const hit = e.target.closest('a, button, input, textarea, .interactable');
        ring.classList.toggle('is-hover', Boolean(hit));
    });
}

/* ==========================================================================
   7. Tactile Cursor-Reactive Spotlight on Cards
   ========================================================================== */
function initSpotlightCards(prefersReducedMotion, isFinePointer) {
    if (prefersReducedMotion || !isFinePointer) return;

    document.querySelectorAll('.spotlight-card').forEach((card) => {
        card.addEventListener(
            'mousemove',
            (e) => {
                const rect = card.getBoundingClientRect();
                card.style.setProperty('--spot-x', `${e.clientX - rect.left}px`);
                card.style.setProperty('--spot-y', `${e.clientY - rect.top}px`);
            },
            { passive: true }
        );
    });
}

/* ==========================================================================
   8. Subtle Magnetic CTA Micro-Pull (<= 4px)
   ========================================================================== */
function initMagneticButtons(prefersReducedMotion, isFinePointer) {
    if (prefersReducedMotion || !isFinePointer) return;

    document.querySelectorAll('.magnetic-btn').forEach((btn) => {
        btn.addEventListener('mousemove', (e) => {
            const rect = btn.getBoundingClientRect();
            const relX = (e.clientX - rect.left) / rect.width - 0.5;
            const relY = (e.clientY - rect.top) / rect.height - 0.5;
            btn.style.transform = `translate3d(${(relX * 7).toFixed(1)}px, ${(relY * 5).toFixed(1)}px, 0)`;
        });

        btn.addEventListener('mouseleave', () => {
            btn.style.transform = '';
        });
    });
}

/* ==========================================================================
   9. Interactive Developer Terminal (History, Tab Autocomplete, Filter Link)
   ========================================================================== */
function initInteractiveTerminal(archiveApi) {
    const output = document.getElementById('terminal-output');
    const form = document.getElementById('terminal-form');
    const input = document.getElementById('terminal-input');
    const chips = document.querySelectorAll('[data-terminal-cmd]');
    const projectsData = getProjectsData();

    if (!output || !form || !input) return;

    const knownCommands = ['help', 'whoami', 'stack', 'projects', 'ls', 'open', 'filter', 'bogor', 'contact', 'clear'];
    const commandHistory = [];
    let historyCursor = -1;

    const appendEntry = (command, lines, isError = false) => {
        const block = document.createElement('div');
        block.className = 'space-y-1';

        const cmdLine = document.createElement('div');
        cmdLine.className = 'flex items-center gap-2 text-xs';
        cmdLine.innerHTML = `<span class="text-accent-cyan font-medium">$</span><span class="text-white">${escapeHtml(command)}</span>`;
        block.appendChild(cmdLine);

        lines.forEach((line) => {
            const row = document.createElement('div');
            row.className = isError
                ? 'pl-4 text-xs text-red-400 leading-relaxed'
                : 'pl-4 text-xs text-text-dim leading-relaxed';
            row.textContent = line;
            block.appendChild(row);
        });

        output.appendChild(block);
        output.scrollTop = output.scrollHeight;
    };

    const runCommand = (raw) => {
        const cleaned = raw.trim();
        if (!cleaned) return;

        commandHistory.push(cleaned);
        historyCursor = commandHistory.length;

        const [cmdRaw, ...rest] = cleaned.split(/\s+/);
        const cmd = cmdRaw.toLowerCase();
        const arg = rest.join(' ').toLowerCase();

        switch (cmd) {
            case 'help':
                appendEntry(cleaned, [
                    'Perintah tersedia (tekan Tab untuk autocomplete, ↑/↓ untuk riwayat):',
                    'whoami           — profil singkat Yukafii',
                    'stack            — teknologi utama yang dipakai',
                    'projects         — daftar proyek (16 karya)',
                    'filter <kat>     — filter arsip (all, webapp, ai, website, game)',
                    'open <nama>      — buka proyek (mis. open gymtrack)',
                    'bogor            — waktu lokal & status',
                    'contact          — menuju form kontak',
                    'clear            — bersihkan terminal',
                ]);
                break;

            case 'whoami':
                appendEntry(cleaned, [
                    'Yukafii — Student Fullstack Web Developer',
                    'Lokasi : Bogor, Indonesia (WIB / UTC+7)',
                    'Fokus  : Backend Laravel/PHP & Frontend TypeScript/React',
                    'GitHub : github.com/yungkaii',
                ]);
                break;

            case 'stack':
                appendEntry(cleaned, [
                    'Backend  : PHP, Laravel, MySQL, Node.js, Supabase, Firebase',
                    'Frontend : TypeScript, React, Next.js, Tailwind CSS, TanStack, Vite',
                ]);
                break;

            case 'projects':
            case 'ls':
                appendEntry(cleaned, [
                    `Total ${projectsData.length} proyek tercatat. Ketik "open <nama>" untuk membuka:`,
                    ...projectsData.slice(0, 8).map((p) => `  ${p.number}  ${p.title} (${p.type})`),
                    `  ... dan ${Math.max(projectsData.length - 8, 0)} lainnya di #work`,
                ]);
                break;

            case 'bogor':
            case 'date': {
                const clock = document.querySelector('[data-bogor-clock]')?.textContent || 'WIB';
                appendEntry(cleaned, [
                    `Bogor, Jawa Barat, ID — ${clock}`,
                    'Status: Terbuka untuk kolaborasi & proyek web.',
                ]);
                break;
            }

            case 'filter': {
                const aliases = {
                    all: 'all',
                    semua: 'all',
                    webapp: 'webapp',
                    app: 'webapp',
                    dashboard: 'webapp',
                    ai: 'ai-tools',
                    'ai-tools': 'ai-tools',
                    tools: 'ai-tools',
                    website: 'website',
                    web: 'website',
                    game: 'game',
                    games: 'game',
                };
                const targetCat = aliases[arg];
                if (!targetCat) {
                    appendEntry(cleaned, ['Kategori tersedia: all, webapp, ai, website, game'], true);
                    break;
                }
                archiveApi?.filterByCategory(targetCat, true);
                appendEntry(cleaned, [`Menyaring proyek kategori "${targetCat}" dan menggulir ke #work...`]);
                break;
            }

            case 'contact':
                appendEntry(cleaned, ['Mengarahkan ke bagian kontak...']);
                document.getElementById('contact')?.scrollIntoView({ behavior: 'smooth' });
                break;

            case 'open': {
                if (!arg) {
                    appendEntry(cleaned, ['Contoh: open gymtrack atau open temanruang'], true);
                    break;
                }
                const match = projectsData.find(
                    (p) =>
                        p.title.toLowerCase().includes(arg) ||
                        p.slug.toLowerCase().includes(arg) ||
                        p.number === arg
                );
                if (!match) {
                    appendEntry(cleaned, [`Proyek "${arg}" tidak ditemukan. Ketik "projects" untuk melihat daftar.`], true);
                    break;
                }
                appendEntry(cleaned, [`Membuka ${match.title} (${match.url})...`]);
                window.open(match.url, '_blank', 'noopener,noreferrer');
                break;
            }

            case 'clear':
                output.innerHTML = '';
                break;

            default:
                appendEntry(cleaned, [`Perintah tidak dikenal: "${cmd}". Ketik "help" untuk daftar perintah.`], true);
        }
    };

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        runCommand(input.value);
        input.value = '';
    });

    input.addEventListener('keydown', (e) => {
        // Command History Up / Down
        if (e.key === 'ArrowUp') {
            if (!commandHistory.length) return;
            e.preventDefault();
            historyCursor = Math.max(0, historyCursor - 1);
            input.value = commandHistory[historyCursor] || '';
            return;
        }
        if (e.key === 'ArrowDown') {
            if (!commandHistory.length) return;
            e.preventDefault();
            historyCursor = Math.min(commandHistory.length, historyCursor + 1);
            input.value = commandHistory[historyCursor] || '';
            return;
        }

        // Tab Autocomplete
        if (e.key === 'Tab') {
            const val = input.value.trim();
            if (!val) return;
            e.preventDefault();
            const parts = val.split(/\s+/);
            if (parts.length === 1) {
                const hit = knownCommands.find((c) => c.startsWith(parts[0].toLowerCase()));
                if (hit) input.value = hit === 'open' || hit === 'filter' ? `${hit} ` : hit;
            } else if (parts[0].toLowerCase() === 'open') {
                const query = parts.slice(1).join(' ').toLowerCase();
                const hit = projectsData.find(
                    (p) => p.slug.startsWith(query) || p.title.toLowerCase().startsWith(query)
                );
                if (hit) input.value = `open ${hit.slug}`;
            }
        }
    });

    chips.forEach((chip) => {
        chip.addEventListener('click', () => {
            const cmd = chip.getAttribute('data-terminal-cmd') || '';
            runCommand(cmd);
            input.focus();
        });
    });
}

/* ==========================================================================
   10. Project Archive (Filter, Search, Stack Click, Grid/Indeks, Prev/Next Modal)
   ========================================================================== */
function initProjectArchive() {
    const projectsData = getProjectsData();
    const projectsMap = new Map(projectsData.map((p) => [p.slug, p]));

    const filterBtns = Array.from(document.querySelectorAll('[data-filter-category]'));
    const searchInput = document.getElementById('project-search');
    const searchClearBtn = document.getElementById('search-clear-btn');
    const clearSearchBtn = document.getElementById('clear-project-filters');
    const countLabel = document.getElementById('archive-result-count');
    const emptyState = document.getElementById('archive-empty-state');

    const gridContainer = document.getElementById('archive-grid-view');
    const indexContainer = document.getElementById('archive-index-view');
    const viewButtons = Array.from(document.querySelectorAll('[data-view-mode]'));

    const gridCards = Array.from(document.querySelectorAll('[data-project-card]'));
    const indexRows = Array.from(document.querySelectorAll('[data-project-row]'));

    const previewImg = document.getElementById('index-preview-img');
    const previewTitle = document.getElementById('index-preview-title');
    const previewType = document.getElementById('index-preview-type');
    const previewSummary = document.getElementById('index-preview-summary');

    let activeCategory = 'all';
    let searchQuery = '';
    let activeView = 'grid';
    let visibleSlugs = projectsData.map((p) => p.slug);

    const updateIndexPreview = (slug) => {
        const project = projectsMap.get(slug);
        if (!project || !previewImg || !previewTitle || !previewType || !previewSummary) return;
        previewImg.src = project.image_url;
        previewImg.alt = project.alt;
        previewTitle.textContent = project.title;
        previewType.textContent = `${project.number} / ${project.type}`;
        previewSummary.textContent = project.summary;
    };

    const applyFilters = () => {
        const query = searchQuery.trim().toLowerCase();
        visibleSlugs = [];

        if (searchClearBtn) {
            searchClearBtn.classList.toggle('hidden', query.length === 0);
        }

        const matchesItem = (el) => {
            const cat = el.getAttribute('data-category') || '';
            const haystack = (el.getAttribute('data-search') || '').toLowerCase();
            const catMatch = activeCategory === 'all' || cat === activeCategory;
            const queryMatch = !query || haystack.includes(query);
            return catMatch && queryMatch;
        };

        gridCards.forEach((card) => {
            const visible = matchesItem(card);
            card.classList.toggle('hidden', !visible);
            if (visible) {
                const slug = card.getAttribute('data-slug');
                if (slug) visibleSlugs.push(slug);
            }
        });

        indexRows.forEach((row) => {
            const visible = matchesItem(row);
            row.classList.toggle('hidden', !visible);
        });

        if (countLabel) {
            countLabel.textContent = `Menampilkan ${visibleSlugs.length} dari ${projectsData.length} proyek`;
        }

        if (emptyState) {
            emptyState.classList.toggle('hidden', visibleSlugs.length > 0);
        }

        if (visibleSlugs[0]) {
            updateIndexPreview(visibleSlugs[0]);
        }
    };

    const filterByCategory = (category, scrollToSection = false) => {
        activeCategory = category || 'all';
        filterBtns.forEach((b) =>
            b.setAttribute('aria-pressed', String(b.getAttribute('data-filter-category') === activeCategory))
        );
        applyFilters();
        if (scrollToSection) {
            document.getElementById('work')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    };

    const filterByStack = (tech, scrollToSection = false) => {
        activeCategory = 'all';
        searchQuery = tech;
        if (searchInput) searchInput.value = tech;
        filterBtns.forEach((b) =>
            b.setAttribute('aria-pressed', String(b.getAttribute('data-filter-category') === 'all'))
        );
        applyFilters();
        if (scrollToSection) {
            document.getElementById('work')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    };

    const setViewMode = (mode) => {
        activeView = mode === 'index' ? 'index' : 'grid';
        if (gridContainer && indexContainer) {
            gridContainer.classList.toggle('hidden', activeView !== 'grid');
            indexContainer.classList.toggle('hidden', activeView !== 'index');
        }
        viewButtons.forEach((btn) => {
            btn.setAttribute('aria-pressed', String(btn.getAttribute('data-view-mode') === activeView));
        });
    };

    filterBtns.forEach((btn) => {
        btn.addEventListener('click', () => {
            filterByCategory(btn.getAttribute('data-filter-category') || 'all');
        });
    });

    // Clickable Tech Stack tags (in both Project Cards and Tech Stack Bento)
    document.querySelectorAll('[data-stack-filter]').forEach((btn) => {
        btn.addEventListener('click', () => {
            const tech = btn.getAttribute('data-stack-filter') || '';
            const shouldScroll = btn.getAttribute('data-scroll-to-work') === 'true';
            filterByStack(tech, shouldScroll);
        });
    });

    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            searchQuery = e.target.value;
            applyFilters();
        });

        document.addEventListener('keydown', (e) => {
            if (
                e.key === '/' &&
                !e.ctrlKey &&
                !e.metaKey &&
                !e.altKey &&
                !['INPUT', 'TEXTAREA', 'SELECT'].includes(document.activeElement?.tagName || '')
            ) {
                e.preventDefault();
                searchInput.focus();
                searchInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });
    }

    searchClearBtn?.addEventListener('click', () => {
        searchQuery = '';
        if (searchInput) {
            searchInput.value = '';
            searchInput.focus();
        }
        applyFilters();
    });

    clearSearchBtn?.addEventListener('click', () => {
        activeCategory = 'all';
        searchQuery = '';
        if (searchInput) searchInput.value = '';
        filterBtns.forEach((b) =>
            b.setAttribute('aria-pressed', String(b.getAttribute('data-filter-category') === 'all'))
        );
        applyFilters();
    });

    viewButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
            setViewMode(btn.getAttribute('data-view-mode'));
        });
    });

    indexRows.forEach((row) => {
        const slug = row.getAttribute('data-slug');
        if (!slug) return;
        row.addEventListener('mouseenter', () => updateIndexPreview(slug));
        row.addEventListener('focusin', () => updateIndexPreview(slug));
    });

    // Quick Preview Modal with Prev / Next Navigation
    const modal = document.getElementById('project-detail-modal');
    const modalClose = document.getElementById('modal-close-btn');
    const modalPrev = document.getElementById('modal-prev-btn');
    const modalNext = document.getElementById('modal-next-btn');
    const modalImg = document.getElementById('modal-project-img');
    const modalMeta = document.getElementById('modal-project-meta');
    const modalPosition = document.getElementById('modal-project-position');
    const modalTitle = document.getElementById('modal-project-title');
    const modalSummary = document.getElementById('modal-project-summary');
    const modalStack = document.getElementById('modal-project-stack');
    const modalLink = document.getElementById('modal-project-link');
    const modalLinkLabel = document.getElementById('modal-project-link-label');

    let lastFocusedTrigger = null;
    let currentModalSlug = null;

    const getNavPool = () => (visibleSlugs.length ? visibleSlugs : projectsData.map((p) => p.slug));

    const renderModalProject = (slug) => {
        const project = projectsMap.get(slug);
        if (!project) return;
        currentModalSlug = slug;

        const pool = getNavPool();
        const idx = pool.indexOf(slug);
        if (modalPosition) {
            modalPosition.textContent = idx >= 0 ? `${idx + 1} / ${pool.length}` : `${project.number} / ${projectsData.length}`;
        }

        if (modalImg) {
            modalImg.src = project.image_url;
            modalImg.alt = project.alt;
        }
        if (modalMeta) modalMeta.textContent = `${project.number} / ${project.type}`;
        if (modalTitle) modalTitle.textContent = project.title;
        if (modalSummary) modalSummary.textContent = project.summary;
        if (modalStack) {
            modalStack.innerHTML = '';
            project.stack.forEach((tech) => {
                const badge = document.createElement('span');
                badge.className = 'px-2.5 py-1 border border-bg-border bg-bg-alt font-mono text-xs text-text-dim';
                badge.textContent = tech;
                modalStack.appendChild(badge);
            });
        }
        if (modalLink) modalLink.href = project.url;
        if (modalLinkLabel) modalLinkLabel.textContent = project.cta;
    };

    const stepModal = (delta) => {
        const pool = getNavPool();
        if (!pool.length || !currentModalSlug) return;
        const currentIdx = Math.max(0, pool.indexOf(currentModalSlug));
        const nextIdx = (currentIdx + delta + pool.length) % pool.length;
        renderModalProject(pool[nextIdx]);
    };

    const openProjectModal = (slug, trigger) => {
        if (!modal || !projectsMap.has(slug)) return;
        lastFocusedTrigger = trigger || document.activeElement;
        renderModalProject(slug);

        if (typeof modal.showModal === 'function') {
            if (!modal.open) modal.showModal();
        } else {
            modal.setAttribute('open', 'open');
        }
        modalClose?.focus();
    };

    const closeProjectModal = () => {
        if (!modal) return;
        if (typeof modal.close === 'function' && modal.open) {
            modal.close();
        } else {
            modal.removeAttribute('open');
        }
        if (lastFocusedTrigger && typeof lastFocusedTrigger.focus === 'function') {
            lastFocusedTrigger.focus();
        }
    };

    document.querySelectorAll('[data-open-project]').forEach((btn) => {
        btn.addEventListener('click', () => {
            const slug = btn.getAttribute('data-open-project');
            if (slug) openProjectModal(slug, btn);
        });
    });

    modalClose?.addEventListener('click', closeProjectModal);
    modalPrev?.addEventListener('click', () => stepModal(-1));
    modalNext?.addEventListener('click', () => stepModal(1));

    modal?.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            e.preventDefault();
            stepModal(-1);
        } else if (e.key === 'ArrowRight') {
            e.preventDefault();
            stepModal(1);
        }
    });

    modal?.addEventListener('click', (e) => {
        const rect = modal.getBoundingClientRect();
        const inside =
            e.clientX >= rect.left &&
            e.clientX <= rect.right &&
            e.clientY >= rect.top &&
            e.clientY <= rect.bottom;
        if (!inside) closeProjectModal();
    });

    modal?.addEventListener('close', () => {
        if (lastFocusedTrigger && typeof lastFocusedTrigger.focus === 'function') {
            lastFocusedTrigger.focus();
        }
    });

    applyFilters();
    setViewMode('grid');

    return { filterByCategory, filterByStack };
}

/* ==========================================================================
   11. Contact Form (Quick Topic Pills, Character Counter, Working Laravel AJAX)
   ========================================================================== */
function initContactForm() {
    const form = document.getElementById('contact-form');
    if (!form) return;

    const submitBtn = document.getElementById('contact-submit-btn');
    const submitLabel = document.getElementById('contact-submit-label');
    const statusBox = document.getElementById('contact-form-status');
    const messageInput = document.getElementById('contact-pesan');
    const counterEl = document.getElementById('pesan-counter');
    const topicButtons = Array.from(document.querySelectorAll('[data-topic-template]'));
    const fields = ['nama', 'email', 'pesan'];

    const updateCounter = () => {
        if (!messageInput || !counterEl) return;
        counterEl.textContent = `${messageInput.value.length} / 2000`;
    };

    messageInput?.addEventListener('input', updateCounter);
    updateCounter();

    topicButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
            const template = btn.getAttribute('data-topic-template') || '';
            topicButtons.forEach((b) => b.setAttribute('aria-pressed', String(b === btn)));
            if (messageInput) {
                messageInput.value = template;
                updateCounter();
                messageInput.focus();
            }
        });
    });

    const clearFieldErrors = () => {
        fields.forEach((name) => {
            const input = form.querySelector(`[name="${name}"]`);
            const errEl = document.getElementById(`error-${name}`);
            if (input) {
                input.removeAttribute('aria-invalid');
                input.classList.remove('border-red-400');
            }
            if (errEl) {
                errEl.textContent = '';
                errEl.classList.add('hidden');
            }
        });
    };

    const setFieldError = (name, message) => {
        const input = form.querySelector(`[name="${name}"]`);
        const errEl = document.getElementById(`error-${name}`);
        if (input) {
            input.setAttribute('aria-invalid', 'true');
            input.classList.add('border-red-400');
        }
        if (errEl) {
            errEl.textContent = message;
            errEl.classList.remove('hidden');
        }
    };

    const showStatus = (type, message) => {
        if (!statusBox) return;
        statusBox.classList.remove('hidden', 'border-accent-cyan', 'text-accent-cyan', 'border-red-400', 'text-red-400');
        if (type === 'success') {
            statusBox.classList.add('border-accent-cyan', 'text-accent-cyan');
        } else {
            statusBox.classList.add('border-red-400', 'text-red-400');
        }
        statusBox.textContent = message;
    };

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        clearFieldErrors();
        statusBox?.classList.add('hidden');

        const formData = new FormData(form);
        const nama = String(formData.get('nama') || '').trim();
        const email = String(formData.get('email') || '').trim();
        const pesan = String(formData.get('pesan') || '').trim();

        let hasError = false;
        if (nama.length < 2) {
            setFieldError('nama', 'Nama wajib diisi (minimal 2 karakter).');
            hasError = true;
        }
        if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            setFieldError('email', 'Masukkan alamat email yang valid.');
            hasError = true;
        }
        if (pesan.length < 10) {
            setFieldError('pesan', 'Tulis pesan minimal 10 karakter agar konteksnya jelas.');
            hasError = true;
        }
        if (hasError) return;

        if (submitBtn) submitBtn.disabled = true;
        if (submitLabel) submitLabel.textContent = 'SENDING...';

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    Accept: 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
                body: formData,
            });

            const payload = await response.json().catch(() => ({}));

            if (response.ok) {
                showStatus('success', payload.message || 'Pesan Anda berhasil dikirim!');
                form.reset();
                updateCounter();
                topicButtons.forEach((b) => b.setAttribute('aria-pressed', 'false'));
            } else if (response.status === 422 && payload.errors) {
                Object.entries(payload.errors).forEach(([field, messages]) => {
                    if (Array.isArray(messages) && messages[0]) {
                        setFieldError(field, messages[0]);
                    }
                });
                showStatus('error', 'Periksa kembali kolom yang masih belum sesuai.');
            } else {
                showStatus('error', 'Terjadi kendala saat mengirim pesan. Coba lagi sebentar lagi.');
            }
        } catch {
            showStatus('error', 'Koneksi terputus. Pastikan jaringan Anda aktif lalu coba lagi.');
        } finally {
            if (submitBtn) submitBtn.disabled = false;
            if (submitLabel) submitLabel.textContent = 'SEND MESSAGE';
        }
    });
}

/* ==========================================================================
   Helpers
   ========================================================================== */
function getProjectsData() {
    const scriptEl = document.getElementById('portfolio-projects-data');
    if (!scriptEl) return [];
    try {
        return JSON.parse(scriptEl.textContent || '[]');
    } catch {
        return [];
    }
}

function escapeHtml(text) {
    return text
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#39;');
}
