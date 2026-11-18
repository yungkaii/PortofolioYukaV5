<!-- 04. CONTACT SECTION (Original Minimalist Style + Quick Topic Starters + Character Counter + Working AJAX) -->
<section id="contact" class="scroll-mt-4 lg:scroll-mt-0 py-20 sm:py-24 lg:py-32 px-6 sm:px-8 lg:px-12 xl:px-20 relative">
    <div class="max-w-4xl mx-auto text-center mb-14">
        <span class="reveal font-mono text-accent-cyan text-sm mb-4 block">04 &mdash; CONTACT</span>
        <h2 class="reveal font-display text-4xl sm:text-5xl md:text-7xl font-bold mb-6 text-white">
            LET'S BUILD <br>SOMETHING USEFUL.
        </h2>
        <p class="reveal text-text-dim text-lg">Punya ide, proyek, atau sekadar ingin menyapa? <br class="hidden md:block">Pintu inbox saya selalu terbuka.</p>
    </div>

    <div class="max-w-2xl mx-auto">
        <!-- Quick Topic Starters -->
        <div class="reveal mb-10 flex flex-wrap items-center justify-center gap-2 font-mono text-xs">
            <span class="text-text-mute mr-1">Topik cepat:</span>
            <button
                type="button"
                data-topic-template="Halo Yukafii, saya tertarik membuat website profil / sekolah. Bisakah kita diskusikan kebutuhan dan estimasinya?"
                aria-pressed="false"
                class="topic-pill interactable px-3 py-1.5 rounded border border-bg-border bg-bg-card text-text-dim hover:border-accent-cyan hover:text-white transition-colors cursor-pointer"
            >
                Website / Profil
            </button>
            <button
                type="button"
                data-topic-template="Halo Yukafii, saya punya ide web app / dashboard (Laravel atau React/TypeScript) yang ingin didiskusikan."
                aria-pressed="false"
                class="topic-pill interactable px-3 py-1.5 rounded border border-bg-border bg-bg-card text-text-dim hover:border-accent-cyan hover:text-white transition-colors cursor-pointer"
            >
                Web App / Dashboard
            </button>
            <button
                type="button"
                data-topic-template="Halo Yukafii, saya ingin mengajak kolaborasi proyek atau sekadar berdiskusi seputar web development."
                aria-pressed="false"
                class="topic-pill interactable px-3 py-1.5 rounded border border-bg-border bg-bg-card text-text-dim hover:border-accent-cyan hover:text-white transition-colors cursor-pointer"
            >
                Kolaborasi
            </button>
        </div>

        @if (session('success'))
            <div class="mb-8 p-4 border border-accent-cyan bg-bg-card font-mono text-xs text-accent-cyan" role="status">
                {{ session('success') }}
            </div>
        @endif

        <div id="contact-form-status" class="hidden mb-8 p-4 border bg-bg-card font-mono text-xs" role="status" aria-live="polite"></div>

        <form id="contact-form" action="{{ route('kontak.kirim') }}" method="POST" novalidate class="reveal flex flex-col gap-6 font-mono text-sm">
            @csrf

            <div class="grid md:grid-cols-2 gap-6">
                <div class="relative group">
                    <input
                        type="text"
                        id="contact-nama"
                        name="nama"
                        value="{{ old('nama') }}"
                        placeholder=" "
                        class="interactable peer w-full bg-transparent border-b border-bg-border py-4 px-0 text-white focus:outline-none focus:border-accent-cyan transition-colors"
                        required
                    >
                    <label for="contact-nama" class="absolute left-0 top-4 text-text-mute transition-all peer-focus:-top-4 peer-focus:text-xs peer-focus:text-accent-cyan peer-[:not(:placeholder-shown)]:-top-4 peer-[:not(:placeholder-shown)]:text-xs">/ NAME</label>
                    <p id="error-nama" class="{{ $errors->has('nama') ? '' : 'hidden' }} mt-2 text-xs text-red-400">{{ $errors->first('nama') }}</p>
                </div>

                <div class="relative group">
                    <input
                        type="email"
                        id="contact-email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder=" "
                        class="interactable peer w-full bg-transparent border-b border-bg-border py-4 px-0 text-white focus:outline-none focus:border-accent-cyan transition-colors"
                        required
                    >
                    <label for="contact-email" class="absolute left-0 top-4 text-text-mute transition-all peer-focus:-top-4 peer-focus:text-xs peer-focus:text-accent-cyan peer-[:not(:placeholder-shown)]:-top-4 peer-[:not(:placeholder-shown)]:text-xs">/ EMAIL</label>
                    <p id="error-email" class="{{ $errors->has('email') ? '' : 'hidden' }} mt-2 text-xs text-red-400">{{ $errors->first('email') }}</p>
                </div>
            </div>

            <div class="relative group mt-4">
                <textarea
                    id="contact-pesan"
                    name="pesan"
                    rows="4"
                    maxlength="2000"
                    placeholder=" "
                    class="interactable peer w-full bg-transparent border-b border-bg-border py-4 px-0 text-white focus:outline-none focus:border-accent-cyan transition-colors resize-none"
                    required
                >{{ old('pesan') }}</textarea>
                <label for="contact-pesan" class="absolute left-0 top-4 text-text-mute transition-all peer-focus:-top-4 peer-focus:text-xs peer-focus:text-accent-cyan peer-[:not(:placeholder-shown)]:-top-4 peer-[:not(:placeholder-shown)]:text-xs">/ MESSAGE</label>
                <div class="mt-2 flex items-center justify-between gap-4">
                    <p id="error-pesan" class="{{ $errors->has('pesan') ? '' : 'hidden' }} text-xs text-red-400">{{ $errors->first('pesan') }}</p>
                    <span id="pesan-counter" class="ml-auto text-[11px] text-text-mute tabular-nums">0 / 2000</span>
                </div>
            </div>

            <button
                id="contact-submit-btn"
                type="submit"
                class="interactable magnetic-btn group mt-6 relative w-full md:w-auto md:self-end bg-white text-bg-main font-bold py-4 px-12 overflow-hidden disabled:opacity-60 cursor-pointer"
            >
                <span class="relative z-10 flex items-center justify-center gap-2">
                    <span id="contact-submit-label">SEND MESSAGE</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="m22 2-7 20-4-9-9-4Z"></path>
                        <path d="M22 2 11 13"></path>
                    </svg>
                </span>
                <div class="absolute inset-0 bg-accent-cyan transform scale-y-0 origin-bottom group-hover:scale-y-100 transition-transform duration-300 ease-out"></div>
            </button>
        </form>
    </div>
</section>
