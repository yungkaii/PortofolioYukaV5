<!-- 01. ABOUT SECTION (Same Layout, Refined Typographic & Metadata Polish) -->
<section id="about" class="scroll-mt-4 lg:scroll-mt-0 py-20 sm:py-24 lg:py-32 px-6 sm:px-8 lg:px-12 xl:px-20 border-b border-bg-border">
    <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-10 sm:gap-12 lg:gap-16">
        <div class="relative">
            <div class="sticky top-32">
                <span class="reveal font-mono text-accent-cyan text-sm mb-4 block">01 &mdash; ABOUT</span>
                <h2 class="reveal font-display text-3xl sm:text-4xl md:text-5xl font-bold leading-tight mb-6 text-white">
                    BUILDING FOR <br>THE WEB, ONE <br>PROBLEM AT A TIME.
                </h2>
                <div class="hidden lg:block absolute -left-20 top-40 text-[200px] font-display font-bold text-bg-border opacity-20 pointer-events-none select-none" aria-hidden="true">
                    01
                </div>
            </div>
        </div>

        <div class="reveal flex flex-col gap-8 text-text-dim font-sans text-lg leading-relaxed">
            <p>
                Saya membangun website bukan hanya sekadar untuk tampil rapi, tetapi juga untuk berfungsi dengan efisien. Saat ini berstatus sebagai Student Developer, saya memfokuskan diri pada pengembangan website responsif yang solid di backend dan mulus di frontend.
            </p>
            <p>
                Dengan ekosistem <span class="text-white font-medium">Laravel</span>, <span class="text-white font-medium">TypeScript</span>, dan <span class="text-white font-medium">Tailwind CSS</span> sebagai alat utama saya, saya memastikan setiap baris kode ditulis dengan tujuan spesifik: skalabilitas, kecepatan, dan user experience yang nyaman.
            </p>

            <dl class="grid grid-cols-2 sm:grid-cols-3 gap-y-7 gap-x-6 mt-6 pt-8 border-t border-bg-border font-mono text-xs uppercase">
                <div>
                    <dt class="text-text-mute mb-2">LOCATION</dt>
                    <dd class="text-white">Bogor, Indonesia</dd>
                </div>
                <div>
                    <dt class="text-text-mute mb-2">FOCUS</dt>
                    <dd class="text-white">Fullstack Web Dev</dd>
                </div>
                <div>
                    <dt class="text-text-mute mb-2">EXPERIENCE</dt>
                    <dd class="text-white">Student Developer</dd>
                </div>
                <div>
                    <dt class="text-text-mute mb-2">SHIPPED</dt>
                    <dd class="text-accent-cyan">{{ count($projects) }} Proyek</dd>
                </div>
                <div>
                    <dt class="text-text-mute mb-2">LOCAL TIME</dt>
                    <dd data-bogor-clock class="text-white">--:-- WIB</dd>
                </div>
                <div>
                    <dt class="text-text-mute mb-2">CURRENTLY</dt>
                    <dd class="text-white">Learning &amp; Building</dd>
                </div>
            </dl>
        </div>
    </div>
</section>
