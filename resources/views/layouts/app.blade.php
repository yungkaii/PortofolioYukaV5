<!DOCTYPE html>
<!-- SCROLL BEHAVIOR AUTO: Native scroll tetap murni, smooth scroll hanya via JS untuk navigasi -->
<html lang="en" style="scroll-behavior: auto !important;" class="bg-[#0A0A0A]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yukafii | Creative Web Developer</title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=Space+Grotesk:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        bg: { main: '#0A0A0A', alt: '#101010', card: '#151515', border: '#1C1C1C' },
                        accent: { cyan: '#00FFD5', purple: '#7C3AED' },
                        text: { main: '#FFFFFF', dim: '#B5B5B5', mute: '#777777' }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Space Grotesk', 'sans-serif'],
                        mono: ['ui-monospace', 'SFMono-Regular', 'Menlo', 'Monaco', 'Consolas', 'monospace'],
                    }
                }
            }
        }
    </script>

    <style>
        /* ==========================================
           VISUAL & LAYOUT (TIDAK ADA YANG DIUBAH)
           ========================================== */
        body { background-color: #0A0A0A; color: #FFFFFF; overflow-x: hidden; }
        ::selection { background: #00FFD5; color: #0A0A0A; }
        .gpu-layer { will-change: transform, opacity; transform: translateZ(0); backface-visibility: hidden; }
        .bg-grid { background-size: 50px 50px; background-image: linear-gradient(to right, rgba(28, 28, 28, 0.5) 1px, transparent 1px), linear-gradient(to bottom, rgba(28, 28, 28, 0.5) 1px, transparent 1px); mask-image: radial-gradient(circle at center, black 40%, transparent 100%); will-change: transform; transform: translateZ(0); contain: strict; }
        
        @media (pointer: fine) {
            body { cursor: none; }
            .cursor-dot, .cursor-ring { position: fixed; top: 0; left: 0; pointer-events: none; z-index: 9999; border-radius: 50%; will-change: transform; transform: translate3d(-50%, -50%, 0); }
            .cursor-dot { width: 6px; height: 6px; background-color: #00FFD5; transition: opacity 0.2s ease, background-color 0.2s ease; }
            .cursor-ring { width: 32px; height: 32px; border: 1px solid rgba(255,255,255,0.2); transition: width 0.2s ease, height 0.2s ease, border-color 0.2s ease, background-color 0.2s ease; }
            .hover-active ~ .cursor-ring { width: 50px; height: 50px; border-color: #00FFD5; background: rgba(0,255,213,0.05); }
        }
        
        .scroll-progress { transform-origin: top; transform: scaleY(0) translateZ(0); will-change: transform; }
        #loader { transition: transform 0.8s cubic-bezier(0.85, 0, 0.15, 1); will-change: transform; }
        .loader-hide { transform: translate3d(0, -100%, 0); }

       /* Pastikan base class memiliki transition agar saat .is-visible dihapus, ia kembali ke state semula dengan smooth */
.reveal, 
.reveal-up, .reveal-left, .reveal-right, .reveal-scale, .reveal-fade {
    opacity: 0;
    will-change: opacity, transform;
    transition: opacity 700ms cubic-bezier(0.22, 1, 0.36, 1), 
                transform 700ms cubic-bezier(0.22, 1, 0.36, 1);
}

/* State saat muncul */
.is-visible {
    opacity: 1 !important;
    transform: translate3d(0, 0, 0) scale(1) !important;
}

/* Pastikan semua variasi memiliki base state yang benar saat .is-visible tidak ada */
.reveal-up { transform: translateY(40px); }
.reveal-left { transform: translateX(-40px); }
.reveal-right { transform: translateX(40px); }
.reveal-scale { transform: scale(0.96); }
.reveal-fade { transform: translateY(0); }

        /* Stagger Delays (Elegan & Ringan) */
        .delay-75 { transition-delay: 75ms; }
        .delay-150 { transition-delay: 150ms; }
        .delay-225 { transition-delay: 225ms; }
        .delay-300 { transition-delay: 300ms; }
        .delay-400 { transition-delay: 400ms; }

        /* Optimasi Mobile: Hapus blur agar FPS tidak drop, percepat sedikit timing */
        @media (max-width: 768px) {
            .reveal-up, .reveal-left, .reveal-right, .reveal-scale, .reveal-fade {
                filter: none !important; 
                transition: opacity 600ms ease-out, transform 600ms ease-out;
            }
        }

        /* Base Reveal Class */
.reveal {
    opacity: 0;
    transform: translateY(40px);
    transition: opacity 700ms cubic-bezier(0.22, 1, 0.36, 1), 
                transform 700ms cubic-bezier(0.22, 1, 0.36, 1);
    will-change: opacity, transform; /* Optimalisasi GPU */
}

/* State saat muncul */
.reveal.is-visible {
    opacity: 1;
    transform: translateY(0);
}

/* Stagger Delay Classes */
.reveal-delay-100 { transition-delay: 100ms; }
.reveal-delay-200 { transition-delay: 200ms; }
.reveal-delay-300 { transition-delay: 300ms; }
.reveal-delay-400 { transition-delay: 400ms; }

/* INFINITE MARQUEE ANIMATION */
.marquee-track {
    display: flex;
    width: max-content;
    /* Durasi 30s memastikan animasi terasa premium, tidak terlalu cepat/lambat */
    animation: scrollMarquee 30s linear infinite;
    will-change: transform; /* Memberitahu GPU untuk mengoptimalkan layer ini */
}

/* Optional: Pause animasi saat di-hover (Sesuai permintaan) */
.marquee-container:hover .marquee-track {
    animation-play-state: paused;
}

@keyframes scrollMarquee {
    0% {
        transform: translateX(0);
    }
    100% {
        /* Menggeser tepat -50% dari total lebar. Karena kita menggunakan 4 grup duplikat, ini akan menciptakan loop yang 100% seamless tanpa patah */
        transform: translateX(-50%);
    }
}


    </style>
</head>
<body class="antialiased font-sans selection:bg-accent-cyan selection:text-bg-main">

    <!-- Loading Screen -->
    <div id="loader" class="fixed inset-0 z-[10000] bg-bg-main flex flex-col items-center justify-center">
        <div class="font-display text-4xl md:text-6xl font-bold tracking-tighter">YUKAFII.DEV</div>
        <div class="mt-4 font-mono text-sm text-text-dim flex items-center gap-2">
            SYSTEM BOOT <span id="load-counter" class="text-accent-cyan w-8 text-right">0%</span>
        </div>
        <div class="w-48 h-[1px] bg-bg-border mt-4 relative overflow-hidden">
            <div id="load-bar" class="absolute top-0 left-0 h-full bg-accent-cyan w-0 transition-all duration-100"></div>
        </div>
    </div>

    <!-- Custom Cursor -->
    <div class="cursor-dot hidden md:block"></div>
    <div class="cursor-ring hidden md:block"></div>

    <!-- Background -->
    <div class="fixed inset-0 z-[-1] bg-grid opacity-30 pointer-events-none"></div>

    <div class="flex">
        <!-- SIDEBAR -->
        <aside class="hidden lg:flex w-[100px] xl:w-[120px] fixed h-screen border-r border-bg-border bg-bg-main/80 backdrop-blur-xl flex-col items-center justify-between py-8 z-50 gpu-layer">
            <a href="#home" class="nav-link-click font-display font-bold text-2xl group relative interactable">Y.</a>
            <div class="h-32 w-[1px] bg-bg-border relative">
                <div class="scroll-progress absolute top-0 left-0 w-full h-full bg-accent-cyan"></div>
            </div>
            <nav class="flex flex-col gap-8 text-[10px] font-mono tracking-widest text-text-dim">
                <a href="#about" class="nav-link-click nav-highlight interactable hover:text-accent-cyan transition-colors" style="writing-mode: vertical-rl; transform: rotate(180deg);">01 ABOUT</a>
                <a href="#work" class="nav-link-click nav-highlight interactable hover:text-accent-cyan transition-colors" style="writing-mode: vertical-rl; transform: rotate(180deg);">02 WORK</a>
                <a href="#stack" class="nav-link-click nav-highlight interactable hover:text-accent-cyan transition-colors" style="writing-mode: vertical-rl; transform: rotate(180deg);">03 STACK</a>
                <a href="#contact" class="nav-link-click nav-highlight interactable hover:text-accent-cyan transition-colors" style="writing-mode: vertical-rl; transform: rotate(180deg);">04 CONTACT</a>
            </nav>
            <div class="flex flex-col items-center gap-4">
                <div class="w-2 h-2 rounded-full bg-accent-cyan shadow-[0_0_10px_#00FFD5] animate-pulse interactable"></div>
            </div>
        </aside>

        <!-- HEADER MOBILE -->
        <header class="lg:hidden fixed top-0 w-full border-b border-bg-border bg-bg-main/80 backdrop-blur-xl z-50 flex justify-between items-center p-4 md:p-6 gpu-layer">
            <a href="#home" class="nav-link-click font-display font-bold text-xl">YUKAFII.</a>
        </header>

        <!-- MAIN CONTENT AREA -->
        <main class="w-full lg:ml-[100px] xl:ml-[120px]">
            @yield('content')
            <footer class="border-t border-bg-border bg-bg-alt py-12 px-6 lg:px-20 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-accent-cyan/5 rounded-full blur-[100px] pointer-events-none gpu-layer"></div>
                <div class="max-w-6xl mx-auto reveal-up">
                    <h3 class="font-display text-2xl font-bold mb-2">YUKAFII.DEV</h3>
                </div>
            </footer>
        </main>
    </div>

    <!-- SCRIPT ENGINE (TIDAK MENGGANGGU NATIVE WHEEL SCROLL) -->
    <script>
        lucide.createIcons();

        // 1. Loading Screen
        document.addEventListener('DOMContentLoaded', () => {
            let count = 0;
            const counter = document.getElementById('load-counter');
            const bar = document.getElementById('load-bar');
            const interval = setInterval(() => {
                count += Math.floor(Math.random() * 15) + 5;
                if(count >= 100) {
                    count = 100;
                    clearInterval(interval);
                    setTimeout(() => {
                        const loader = document.getElementById('loader');
                        if (loader) { 
                            loader.classList.add('loader-hide'); 
                            setTimeout(() => {
                                loader.remove();
                                triggerHeroAnimations(); // Pemicu animasi Hero instan
                            }, 800); 
                        }
                    }, 400);
                }
                if (counter) counter.innerText = count + '%';
                if (bar) bar.style.width = count + '%';
            }, 50);
        });

        // 2. TAHAP 1: Smooth Navigation Click API (Native)
        document.querySelectorAll('.nav-link-click').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const targetId = this.getAttribute('href');
                if(!targetId || targetId === '#') return;
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    e.preventDefault(); // Mencegah lompatan instan, HANYA untuk event klik ini
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // 3. TAHAP 2 & 4 & 5: Intersection Observer (Animasi 1x jalan lalu unobserve)
        const observerOptions = {
            root: null,
            rootMargin: '0px 0px -12% 0px', // Animasi memicu saat elemen masuk 12% dari bawah layar
            threshold: 0
        };

        const revealObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target); // Lepaskan beban memori setelah animasi selesai
                }
            });
        }, observerOptions);

        // Pasang observer ke semua elemen dengan class animasi
        document.querySelectorAll('.reveal-up, .reveal-left, .reveal-right, .reveal-scale, .reveal-fade').forEach(el => {
            revealObserver.observe(el);
        });

        // TAHAP 7: Fungsi khusus untuk memicu Hero masuk tanpa harus di-scroll (dipanggil saat loader selesai)
        function triggerHeroAnimations() {
            const heroElements = document.querySelectorAll('#home .reveal-up, #home .reveal-left, #home .reveal-right, #home .reveal-scale, #home .reveal-fade');
            heroElements.forEach(el => {
                el.classList.add('is-visible');
                revealObserver.unobserve(el);
            });
        }

        // 4. Scroll Progress & Nav Highlight pasif (rAF throttling = Tidak bikin berat)
        const progressBar = document.querySelector('.scroll-progress');
        const navLinks = document.querySelectorAll('.nav-highlight');
        let cachedDocHeight = 0;
        let sectionOffsets = [];
        let isScrollTicking = false;

        function updateLayoutCache() {
            cachedDocHeight = document.body.scrollHeight - window.innerHeight;
            sectionOffsets = Array.from(document.querySelectorAll('section')).map(sec => ({
                id: sec.getAttribute('id'), top: sec.offsetTop
            }));
        }
        window.addEventListener('load', updateLayoutCache);
        window.addEventListener('resize', updateLayoutCache, { passive: true });

        window.addEventListener('scroll', () => {
            if (!isScrollTicking) {
                requestAnimationFrame(() => {
                    const scrollY = window.scrollY;
                    
                    // Update Progress Bar
                    if (progressBar && cachedDocHeight > 0) {
                        progressBar.style.transform = `scaleY(${Math.min(scrollY / cachedDocHeight, 1)}) translateZ(0)`;
                    }
                    
                    // Update Active Nav Link
                    let current = '';
                    for (let i = 0; i < sectionOffsets.length; i++) {
                        if (scrollY >= sectionOffsets[i].top - 300) current = sectionOffsets[i].id;
                    }
                    navLinks.forEach(link => {
                        if (link.getAttribute('href').includes(current)) {
                            link.classList.add('text-accent-cyan'); link.classList.remove('text-text-dim');
                        } else {
                            link.classList.remove('text-accent-cyan'); link.classList.add('text-text-dim');
                        }
                    });
                    
                    isScrollTicking = false;
                });
                isScrollTicking = true;
            }
        }, { passive: true });

        // 5. Custom Cursor (Tetap dipertahankan, ringan dengan rAF)
        const dot = document.querySelector('.cursor-dot');
        const ring = document.querySelector('.cursor-ring');
        if (window.matchMedia("(pointer: fine)").matches && dot && ring) {
            let mouseX = -100, mouseY = -100, ringX = -100, ringY = -100;
            let isCursorTicking = false;
            window.addEventListener('mousemove', (e) => {
                mouseX = e.clientX; mouseY = e.clientY;
                if (!isCursorTicking) {
                    requestAnimationFrame(() => {
                        dot.style.transform = `translate3d(${mouseX}px, ${mouseY}px, 0) translate(-50%, -50%)`;
                        isCursorTicking = false;
                    });
                    isCursorTicking = true;
                }
            }, { passive: true });

            function animateRing() {
                ringX += (mouseX - ringX) * 0.2; ringY += (mouseY - ringY) * 0.2;
                ring.style.transform = `translate3d(${ringX}px, ${ringY}px, 0) translate(-50%, -50%)`;
                requestAnimationFrame(animateRing);
            }
            requestAnimationFrame(animateRing);
        }

        document.addEventListener('DOMContentLoaded', () => {
    // Threshold 0.15 (15%) memberikan jeda yang cukup agar tidak flickering
    const observerOptions = {
        root: null,
        rootMargin: '0px 0px -15% 0px', 
        threshold: 0.15
    };

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Saat elemen masuk viewport: Tampilkan
                entry.target.classList.add('is-visible');
            } else {
                // Saat elemen KELUAR viewport: Reset ke posisi awal (Invisible)
                // Karena kita TIDAK memanggil unobserve, observer akan terus memantau elemen ini
                entry.target.classList.remove('is-visible');
            }
        });
    }, observerOptions);

    // Seleksi semua elemen dengan variasi class
    const targets = document.querySelectorAll('.reveal, .reveal-up, .reveal-left, .reveal-right, .reveal-scale, .reveal-fade');
    targets.forEach(el => {
        revealObserver.observe(el);
    });
});

    </script>
</body>
</html>