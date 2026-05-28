<x-layouts.app>
    <!-- 1. Cinematic Opening Loading Screen -->
    <x-cinematic-loader :config="$config" />

    <!-- Floating Romantic Background Elements (all pages) -->
    <div id="romantic-bg-elements" class="fixed inset-0 pointer-events-none z-[1] overflow-hidden">
        <!-- Soft gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-pink-50/[0.03] via-transparent to-rose-50/[0.02]"></div>
        
        <!-- Floating hearts - subtle, slow -->
        <div class="absolute top-[5%] left-[3%] text-pink-300/10 animate-float-slow" style="animation-duration: 12s; font-size: 24px;">💕</div>
        <div class="absolute top-[15%] right-[5%] text-rose-300/10 animate-float-fast" style="animation-duration: 10s; animation-delay: 2s; font-size: 20px;">💗</div>
        <div class="absolute top-[30%] left-[8%] text-pink-200/8 animate-float-slow" style="animation-duration: 14s; animation-delay: 4s; font-size: 18px;">✨</div>
        <div class="absolute top-[50%] right-[3%] text-rose-200/8 animate-float-fast" style="animation-duration: 11s; animation-delay: 1s; font-size: 22px;">🌸</div>
        <div class="absolute top-[70%] left-[5%] text-pink-300/10 animate-float-slow" style="animation-duration: 13s; animation-delay: 3s; font-size: 16px;">💖</div>
        <div class="absolute top-[85%] right-[8%] text-rose-300/8 animate-float-fast" style="animation-duration: 15s; animation-delay: 5s; font-size: 20px;">🌷</div>
        <div class="absolute top-[40%] left-[95%] text-pink-200/6 animate-float-slow" style="animation-duration: 16s; animation-delay: 7s; font-size: 14px;">⭐</div>
        <div class="absolute top-[60%] left-[2%] text-rose-200/6 animate-float-fast" style="animation-duration: 9s; animation-delay: 6s; font-size: 16px;">🩷</div>
        <div class="absolute top-[25%] left-[50%] text-pink-200/5 animate-float-slow" style="animation-duration: 18s; animation-delay: 8s; font-size: 20px;">💫</div>
        <div class="absolute top-[90%] left-[30%] text-rose-200/6 animate-float-fast" style="animation-duration: 12s; animation-delay: 2.5s; font-size: 18px;">🎀</div>
        <div class="absolute top-[10%] left-[70%] text-pink-300/8 animate-float-slow" style="animation-duration: 14s; animation-delay: 4.5s; font-size: 16px;">💕</div>
        
        <!-- Glowing orbs - very subtle -->
        <div class="absolute top-[20%] left-[15%] w-[400px] h-[400px] bg-pink-200/[0.04] rounded-full blur-[120px] animate-pulse" style="animation-duration: 8s;"></div>
        <div class="absolute top-[60%] right-[10%] w-[350px] h-[350px] bg-rose-200/[0.04] rounded-full blur-[100px] animate-pulse" style="animation-duration: 10s; animation-delay: 3s;"></div>
        <div class="absolute top-[80%] left-[40%] w-[300px] h-[300px] bg-fuchsia-200/[0.03] rounded-full blur-[80px] animate-pulse" style="animation-duration: 12s; animation-delay: 5s;"></div>
    </div>

    <!-- Main Surprise Content (Loaded initially hidden, revealed smoothly after loader entry) -->
    <div id="app-content" class="opacity-0 hidden w-full relative z-[2]">
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
