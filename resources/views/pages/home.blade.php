@extends('layouts.app')

@section('content')

<!-- 00. HERO SECTION -->
<section id="home" class="min-h-screen relative flex items-center pt-20 lg:pt-0 px-6 lg:px-20 overflow-hidden">
    <!-- Subtle glow behind hero (GPU Layer) -->
    <div class="absolute top-1/2 left-1/4 -translate-y-1/2 w-[500px] h-[500px] bg-accent-cyan/5 rounded-full blur-[120px] pointer-events-none gpu-layer"></div>

    <div class="w-full max-w-7xl mx-auto grid lg:grid-cols-12 gap-12 items-center relative z-10">
        
        <!-- Left: Typography -->
        <div class="lg:col-span-7 flex flex-col gap-6">
            <div class="reveal font-mono text-sm tracking-[0.2em] text-text-dim uppercase flex items-center gap-4">
                <span class="w-8 h-[1px] bg-accent-cyan"></span>
                Hello, I'm Yukafii
            </div>
            
            <h1 class="reveal reveal-delay-1 font-display text-5xl md:text-7xl lg:text-8xl font-bold leading-[1.05] tracking-tight text-white">
                I BUILD <br>
                <span class="text-accent-cyan relative inline-block">
                    DIGITAL
                    <span class="absolute bottom-1 left-0 w-full h-[0.1em] bg-accent-cyan/30"></span>
                </span> <br>
                EXPERIENCES.
            </h1>
            
            <p class="reveal reveal-delay-2 text-text-dim text-lg md:text-xl font-light max-w-lg leading-relaxed">
                Web Developer & Creative Technologist based in Bogor. Focused on solving problems through clean code and intuitive design.
            </p>
            
            <div class="reveal reveal-delay-2 mt-4 flex flex-wrap gap-4 font-mono text-sm">
                <a href="#work" class="interactable group relative px-8 py-4 bg-white text-bg-main font-bold flex items-center gap-3 overflow-hidden">
                    <span class="relative z-10 group-hover:translate-x-1 transition-transform">VIEW MY WORK</span>
                    <i data-lucide="arrow-right" class="relative z-10 w-4 h-4 group-hover:translate-x-2 transition-transform"></i>
                    <div class="absolute inset-0 bg-accent-cyan transform scale-x-0 origin-left group-hover:scale-x-100 transition-transform duration-300 ease-out"></div>
                </a>
                
                <a href="#contact" class="interactable px-8 py-4 border border-bg-border text-text-main hover:border-accent-cyan hover:text-accent-cyan transition-colors flex items-center gap-3">
                    CONTACT ME
                </a>
            </div>
        </div>

        <!-- Right: Developer Interactive Terminal -->
        <div class="reveal lg:col-span-5 hidden md:block">
            <div class="bg-bg-card rounded-lg border border-bg-border shadow-2xl overflow-hidden transform rotate-2 hover:rotate-0 transition-transform duration-500 interactable gpu-layer">
                <div class="bg-bg-alt px-4 py-3 flex items-center gap-2 border-b border-bg-border">
                    <div class="w-3 h-3 rounded-full bg-[#FF5F56]"></div>
                    <div class="w-3 h-3 rounded-full bg-[#FFBD2E]"></div>
                    <div class="w-3 h-3 rounded-full bg-[#27C93F]"></div>
                    <span class="ml-4 font-mono text-[10px] text-text-mute">yukafii@dev-env:~</span>
                </div>
                <div class="p-6 font-mono text-sm text-text-dim leading-relaxed h-[300px] flex flex-col justify-end relative">
                    <div class="absolute left-0 top-6 bottom-6 w-8 border-r border-bg-border flex flex-col text-right pr-2 text-text-mute/30 text-xs">
                        <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span>
                    </div>
                    <div class="pl-6" id="terminal-text">
                        <span class="text-accent-purple">const</span> <span class="text-white">developer</span> = {<br>
                        &nbsp;&nbsp;name: <span class="text-accent-cyan">"Yukafii"</span>,<br>
                        &nbsp;&nbsp;role: <span class="text-accent-cyan">"Student Developer"</span>,<br>
                        &nbsp;&nbsp;location: <span class="text-accent-cyan">"Bogor, ID"</span>,<br>
                        &nbsp;&nbsp;core_stack: [<span class="text-accent-cyan">"PHP"</span>, <span class="text-accent-cyan">"Laravel"</span>, <span class="text-accent-cyan">"Tailwind"</span>]<br>
                        };<br><br>
                        <span class="text-text-mute">> system.ready()</span><br>
                        <span class="text-white">> init_portfolio() </span><span class="typing-cursor"></span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- MARQUEE SECTION -->
<div class="marquee-container group relative flex w-full cursor-default overflow-hidden border-y border-bg-border bg-bg-main py-5">
    <div class="marquee-track">
        
        <!-- GRUP 1 -->
        <div class="flex min-w-max items-center justify-around gap-8 px-4">
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

        <!-- GRUP 2 (Duplikat) -->
        <div class="flex min-w-max items-center justify-around gap-8 px-4">
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

        <!-- GRUP 3 (Duplikat untuk layar Ultra-wide/4K agar tidak kosong) -->
        <div class="flex min-w-max items-center justify-around gap-8 px-4">
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

        <!-- GRUP 4 (Duplikat penutup Seamless Loop) -->
        <div class="flex min-w-max items-center justify-around gap-8 px-4">
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

    </div>
</div>

<!-- 01. ABOUT SECTION -->
<section id="about" class="py-32 px-6 lg:px-20 border-b border-bg-border">
    <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-16">
        <div class="relative">
            <div class="sticky top-32">
                <span class="reveal font-mono text-accent-cyan text-sm mb-4 block">01 &mdash; ABOUT</span>
                <h2 class="reveal font-display text-4xl md:text-5xl font-bold leading-tight mb-6">
                    BUILDING FOR <br>THE WEB, ONE <br>PROBLEM AT A TIME.
                </h2>
                <div class="hidden lg:block absolute -left-20 top-40 text-[200px] font-display font-bold text-bg-border opacity-20 pointer-events-none select-none">
                    01
                </div>
            </div>
        </div>

        <div class="reveal flex flex-col gap-8 text-text-dim font-sans text-lg leading-relaxed">
            <p>
                Saya membangun website bukan hanya sekadar untuk tampil rapi, tetapi juga untuk berfungsi dengan efisien. Saat ini berstatus sebagai Student Developer, saya memfokuskan diri pada pengembangan website responsif yang solid di backend dan mulus di frontend.
            </p>
            <p>
                Dengan ekosistem <span class="text-white">Laravel</span> dan <span class="text-white">Tailwind CSS</span> sebagai alat utama saya, saya memastikan setiap baris kode ditulis dengan tujuan spesifik: skalabilitas dan user experience.
            </p>
            
            <div class="grid grid-cols-2 gap-y-8 gap-x-4 mt-8 pt-8 border-t border-bg-border font-mono text-xs uppercase">
                <div>
                    <span class="text-text-mute block mb-2">LOCATION</span>
                    <span class="text-white">Bogor, Indonesia</span>
                </div>
                <div>
                    <span class="text-text-mute block mb-2">FOCUS</span>
                    <span class="text-white">Fullstack Web Dev</span>
                </div>
                <div>
                    <span class="text-text-mute block mb-2">EXPERIENCE</span>
                    <span class="text-white">Student Developer</span>
                </div>
                <div>
                    <span class="text-text-mute block mb-2">CURRENTLY</span>
                    <span class="text-white">Learning & Building</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 02. SELECTED WORK (PORTFOLIO) -->
<section id="work" class="py-32 px-6 lg:px-20 border-b border-bg-border bg-bg-alt">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-end justify-between mb-20">
            <div>
                <span class="reveal font-mono text-accent-cyan text-sm mb-4 block">02 &mdash; SELECTED WORK</span>
                <h2 class="reveal font-display text-4xl md:text-5xl font-bold">PROYEK UTAMA</h2>
            </div>
            <a href="#" class="reveal hidden md:flex items-center gap-2 font-mono text-sm text-text-dim hover:text-white transition-colors">
                VIEW ALL PROJECTS <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
            </a>
        </div>

<!-- Large Project Showcase 1 -->
<div class="reveal group relative block mb-32 view-project interactable">
    <!-- Wrap seluruh konten dalam <a> agar bisa diklik menuju URL project -->
    <a href="https://smpbinakaryakreatif.my.id" target="_blank" rel="noopener noreferrer" class="flex flex-col lg:flex-row gap-8 items-center cursor-pointer">
        
        <!-- Bagian Gambar -->
        <div class="w-full lg:w-2/3 aspect-[4/3] bg-bg-card border border-bg-border overflow-hidden relative gpu-layer">
            <div class="absolute inset-0 bg-accent-cyan/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10"></div>
            
            <!-- Ganti fake UI dengan Image asli -->
            <img src="images/smp-bina-karya.jpg" 
                 alt="SMP Bina Karya Kreatif" 
                 class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
        </div>
        
        <!-- Bagian Teks -->
        <div class="w-full lg:w-1/3 flex flex-col gap-4 relative z-20 lg:-ml-12 lg:bg-bg-main lg:p-8 lg:border lg:border-bg-border">
            <span class="font-mono text-xs text-text-mute">01 / WEBSITE SEKOLAH</span>
            
            <h3 class="font-display text-2xl lg:text-3xl font-bold group-hover:text-accent-cyan transition-colors">
                SMP Bina Karya Kreatif
            </h3>
            
            <p class="text-text-dim text-sm leading-relaxed">
                Website resmi SMP Bina Karya Kreatif yang dirancang modern, informatif, dan mudah diakses.
            </p>
            
            <!-- Tech Stack -->
            <div class="flex flex-wrap gap-2 mt-2 font-mono text-[10px]">
                <span class="px-2 py-1 border border-bg-border text-text-dim">PHP</span>
                <span class="px-2 py-1 border border-bg-border text-text-dim">MySQL</span>
                <span class="px-2 py-1 border border-bg-border text-text-dim">JavaScript</span>
            </div>
        </div>
    </a>
</div>


<!-- 03. STACK & CAPABILITIES (BENTO GRID) -->
<section id="stack" class="py-32 px-6 lg:px-20 border-b border-bg-border">
    <div class="max-w-7xl mx-auto">
        <span class="reveal font-mono text-accent-cyan text-sm mb-4 block">03 &mdash; TECH STACK</span>
        <h2 class="reveal font-display text-4xl md:text-5xl font-bold mb-16">ALAT & TEKNOLOGI</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            
            <div class="reveal md:col-span-2 bg-bg-card border border-bg-border p-8 hover:border-text-dim transition-colors relative overflow-hidden group interactable">
                <div class="absolute top-0 right-0 w-32 h-32 bg-[#FF2D20]/10 rounded-full blur-[50px] group-hover:bg-[#FF2D20]/20 transition-all pointer-events-none gpu-layer"></div>
                <div class="relative z-10 flex flex-col h-full justify-between">
                    <div>
                        <i data-lucide="server" class="w-8 h-8 text-white mb-6"></i>
                        <h3 class="font-display text-2xl font-bold mb-2">Backend & Architecture</h3>
                        <p class="text-text-dim text-sm max-w-md">Membangun arsitektur yang solid, aman, dan scalable. Pengelolaan database relasional dan pembuatan sistem CMS.</p>
                    </div>
                    <div class="flex gap-4 mt-8 font-mono text-xs">
                        <span class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-[#FF2D20] rounded-full"></span> Laravel</span>
                        <span class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-[#777BB4] rounded-full"></span> PHP</span>
                        <span class="flex items-center gap-2"><span class="w-1.5 h-1.5 bg-[#4479A1] rounded-full"></span> MySQL</span>
                    </div>
                </div>
            </div>

            <div class="reveal bg-bg-card border border-bg-border p-8 hover:border-accent-cyan transition-colors group interactable">
                <i data-lucide="layout" class="w-8 h-8 text-accent-cyan mb-6"></i>
                <h3 class="font-display text-xl font-bold mb-2">Frontend</h3>
                <p class="text-text-dim text-sm mb-8">Membuat antarmuka responsif yang bekerja sempurna di seluruh perangkat.</p>
                <div class="flex flex-col gap-2 font-mono text-xs">
                    <div class="flex justify-between items-center border-b border-bg-border pb-2"><span>Tailwind CSS</span> <span class="text-text-mute">PRIMARY</span></div>
                    <div class="flex justify-between items-center border-b border-bg-border pb-2"><span>JavaScript</span> <span class="text-text-mute">FAMILIAR</span></div>
                    <div class="flex justify-between items-center pt-1"><span>HTML/CSS</span> <span class="text-text-mute">PRIMARY</span></div>
                </div>
            </div>

            <div class="reveal md:col-span-3 bg-bg-alt border border-bg-border p-8 mt-4">
                <h3 class="font-mono text-xs text-text-mute mb-8">LEARNING JOURNEY</h3>
                <div class="flex flex-col md:flex-row justify-between gap-8 md:gap-4 relative">
                    <div class="hidden md:block absolute top-2 left-0 w-full h-[1px] bg-bg-border"></div>
                    
                    <div class="relative z-10">
                        <div class="w-4 h-4 rounded-full bg-bg-main border-2 border-text-dim mb-4 mx-auto md:mx-0"></div>
                        <div class="font-mono text-xs text-text-mute">2023 - 2024</div>
                        <div class="font-bold text-white mt-1">Dasar Web</div>
                        <div class="text-xs text-text-dim mt-1">HTML, CSS & Logika Dasar</div>
                    </div>
                    
                    <div class="relative z-10">
                        <div class="w-4 h-4 rounded-full bg-bg-main border-2 border-accent-cyan mb-4 mx-auto md:mx-0 shadow-[0_0_10px_#00FFD5]"></div>
                        <div class="font-mono text-xs text-accent-cyan">Saat Ini</div>
                        <div class="font-bold text-white mt-1">Framework & Sistem</div>
                        <div class="text-xs text-text-dim mt-1">PHP, Laravel, Tailwind CSS</div>
                    </div>
                    
                    <div class="relative z-10">
                        <div class="w-4 h-4 rounded-full bg-bg-main border-2 border-bg-border mb-4 mx-auto md:mx-0"></div>
                        <div class="font-mono text-xs text-text-mute">Masa Depan</div>
                        <div class="font-bold text-text-dim mt-1">Eksplorasi Lanjutan</div>
                        <div class="text-xs text-text-mute mt-1">React, JS Ecosystem, Security</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 04. CONTACT SECTION -->
<section id="contact" class="py-32 px-6 lg:px-20 relative">
    <div class="max-w-4xl mx-auto text-center mb-16">
        <span class="reveal font-mono text-accent-cyan text-sm mb-4 block">04 &mdash; CONTACT</span>
        <h2 class="reveal font-display text-5xl md:text-7xl font-bold mb-6">
            LET'S BUILD <br>SOMETHING USEFUL.
        </h2>
        <p class="reveal text-text-dim text-lg">Punya ide, proyek, atau sekadar ingin menyapa? <br class="hidden md:block">Pintu inbox saya selalu terbuka.</p>
    </div>

    <div class="max-w-2xl mx-auto">
        <form class="reveal flex flex-col gap-6 font-mono text-sm" onsubmit="event.preventDefault();">
            <div class="grid md:grid-cols-2 gap-6">
                <div class="relative group">
                    <input type="text" id="name" placeholder=" " class="interactable peer w-full bg-transparent border-b border-bg-border py-4 px-0 text-white focus:outline-none focus:border-accent-cyan transition-colors" required>
                    <label for="name" class="absolute left-0 top-4 text-text-mute transition-all peer-focus:-top-4 peer-focus:text-xs peer-focus:text-accent-cyan peer-valid:-top-4 peer-valid:text-xs">/ NAME</label>
                </div>
                <div class="relative group">
                    <input type="email" id="email" placeholder=" " class="interactable peer w-full bg-transparent border-b border-bg-border py-4 px-0 text-white focus:outline-none focus:border-accent-cyan transition-colors" required>
                    <label for="email" class="absolute left-0 top-4 text-text-mute transition-all peer-focus:-top-4 peer-focus:text-xs peer-focus:text-accent-cyan peer-valid:-top-4 peer-valid:text-xs">/ EMAIL</label>
                </div>
            </div>
            
            <div class="relative group mt-4">
                <textarea id="message" rows="4" placeholder=" " class="interactable peer w-full bg-transparent border-b border-bg-border py-4 px-0 text-white focus:outline-none focus:border-accent-cyan transition-colors resize-none" required></textarea>
                <label for="message" class="absolute left-0 top-4 text-text-mute transition-all peer-focus:-top-4 peer-focus:text-xs peer-focus:text-accent-cyan peer-valid:-top-4 peer-valid:text-xs">/ MESSAGE</label>
            </div>
            
            <button type="submit" class="interactable group mt-8 relative w-full md:w-auto md:self-end bg-white text-bg-main font-bold py-4 px-12 overflow-hidden">
                <span class="relative z-10 flex items-center justify-center gap-2">
                    SEND MESSAGE <i data-lucide="send" class="w-4 h-4 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                </span>
                <div class="absolute inset-0 bg-accent-cyan transform scale-y-0 origin-bottom group-hover:scale-y-100 transition-transform duration-300 ease-out"></div>
            </button>
        </form>
    </div>
</section>

@endsection