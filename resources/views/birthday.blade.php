<x-layouts.app>
    <!-- 1. Cinematic Opening Loading Screen -->
    <x-cinematic-loader :config="$config" />

    <!-- Main Surprise Content (Loaded initially hidden, revealed smoothly after loader entry) -->
    <div id="app-content" class="opacity-0 hidden w-full">
        <!-- 2. Fullscreen Parallax Hero Banner -->
        <x-hero-section :config="$config" />

        <!-- 3. Interactive envelope Love Letter -->
        <x-love-letter :config="$config" />

        <!-- 3.5 Love Journey vertical scrapbook timeline -->
        <x-love-journey :config="$config" />

        <!-- 4. Pinterest Scrapbook Polaroid Gallery -->
        <x-memory-gallery :config="$config" />

        <!-- 5. Interactive reasons explaining why she is loved -->
        <x-reasons-cards :config="$config" />

        <!-- 6. Catch My Love falling-hearts mini game -->
        <x-mini-game />

        <!-- 6.5 Romantic Couple Chemistry Quiz Gatekeeper -->
        <x-couple-quiz :config="$config" />

        <!-- Gated Locked sections (Reveals dynamically after Quiz Victory!) -->
        <div id="gated-surprise-container" class="opacity-15 blur-md pointer-events-none select-none h-0 overflow-hidden transition-all duration-[1500ms] ease-out">
            <!-- 7. Dynamic Anniversary counting-up timer -->
            <x-countdown-timer :config="$config" />

            <!-- 7.5 Unfolding 3D Gift Box Reveal -->
            <x-gift-box :config="$config" />

            <!-- 8. Deep Starry Night Final climax emotional section -->
            <x-final-section :config="$config" />
        </div>
    </div>

    <!-- 9. Floating vintage Vinyl Music Player -->
    <x-music-player :config="$config" />

    <!-- 10. Hidden Easter Egg "Princess" Letter Modal -->
    <div id="easter-egg-modal" class="fixed inset-0 z-[10005] hidden items-center justify-center bg-black/85 backdrop-blur-xl opacity-0 transition-opacity duration-700 p-4">
        <!-- Close overlay trigger -->
        <div id="easter-egg-overlay" class="absolute inset-0 cursor-pointer"></div>
        
        <!-- Cursive glowing modal content -->
        <div class="relative z-10 w-full max-w-xl glassmorphism rounded-[32px] border border-white/20 p-8 md:p-10 text-center shadow-[0_0_50px_rgba(255,183,197,0.3)] bg-gradient-to-br from-pink-900/40 to-black/60 flex flex-col items-center">
            <!-- Sparkles/Floating decor inside modal -->
            <div class="absolute -top-12 -left-6 text-4xl animate-bounce">👑</div>
            <div class="absolute -bottom-10 -right-6 text-4xl animate-pulse">💖</div>
            
            <div class="w-14 h-14 rounded-full bg-pink-500/25 border border-pink-400/30 flex items-center justify-center text-2xl animate-spin-slow mb-6">
                ✨
            </div>
            
            <span class="font-sans text-[10px] font-extrabold uppercase text-pink-300 tracking-[0.25em] mb-4">You found the Secret Crown Scroll</span>
            
            <h2 class="font-romantic text-3xl md:text-4xl text-white filter drop-shadow-[0_0_12px_rgba(255,182,193,0.5)] mb-6 leading-tight">
                Surat Rahasia Tuan Putri 👑💌
            </h2>
            
            <div class="max-h-[50vh] overflow-y-auto w-full px-4 pr-6 select-text text-left font-cute text-sm md:text-base text-pink-100/90 leading-relaxed space-y-4 whitespace-pre-wrap select-none pointer-events-auto">
                {!! nl2br(e($config['easter_egg_letter'])) !!}
            </div>
            
            <button id="btn-close-easter-egg" class="mt-8 px-8 py-3 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 text-white font-cute text-sm font-bold rounded-full shadow-lg transition-all active:scale-95 cursor-pointer pointer-events-auto">
                Tutup Surat Rahasia 🎀
            </button>
        </div>
    </div>
</x-layouts.app>
