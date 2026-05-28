@props(['config'])

<div id="cinematic-loader" class="fixed inset-0 z-[10000] flex flex-col items-center justify-center bg-night-gradient select-none">
    <!-- Starry background canvas for loader -->
    <canvas id="loader-stars" class="absolute inset-0 w-full h-full opacity-60"></canvas>

    <!-- Glowing blurred ambient background -->
    <div class="absolute w-[300px] h-[300px] bg-romantic-pink/20 rounded-full blur-[120px] top-1/4 left-1/4 animate-pulse-glow"></div>
    <div class="absolute w-[350px] h-[350px] bg-romantic-gold/15 rounded-full blur-[130px] bottom-1/4 right-1/4 animate-pulse-glow" style="animation-delay: 1.5s;"></div>

    <!-- Interactive contents -->
    <div class="relative z-10 text-center px-6 max-w-2xl flex flex-col items-center justify-center min-h-[300px]">
        <!-- Typing subtitle -->
        <p id="loader-subtitle" class="font-sans text-sm md:text-base tracking-[0.2em] text-romantic-pink-light/70 uppercase mb-6 h-6"></p>

        <!-- Glowing main name -->
        <h1 id="loader-name" class="font-romantic text-6xl md:text-8xl text-transparent bg-clip-text bg-gradient-to-r from-romantic-pink via-white to-romantic-gold opacity-0 filter drop-shadow-[0_0_20px_rgba(255,183,197,0.6)] select-none">
            {{ $config['partner_name'] }}
        </h1>

        <!-- Entrance Ribbon Button -->
        <div id="loader-action" class="mt-12 opacity-0 transform translate-y-6">
            <button id="btn-open-surprise" class="relative group px-8 py-4 bg-gradient-to-r from-romantic-pink-dark via-pink-400 to-romantic-gold text-white font-cute text-base md:text-lg font-semibold rounded-full shadow-[0_6px_25px_rgba(255,94,126,0.4)] hover:shadow-[0_10px_35px_rgba(255,94,126,0.6)] transition-all duration-300 hover:scale-105 active:scale-95 focus:outline-none flex items-center gap-2">
                <span>Open Your Birthday Surprise</span>
                <span class="animate-bounce">🎀</span>
                
                <!-- Glitter hover sparks -->
                <div class="absolute -top-1 -left-1 w-3 h-3 bg-white rounded-full opacity-0 group-hover:opacity-100 group-hover:animate-ping transition-all"></div>
                <div class="absolute -bottom-1 -right-1 w-3 h-3 bg-white rounded-full opacity-0 group-hover:opacity-100 group-hover:animate-ping transition-all" style="animation-delay: 0.5s;"></div>
            </button>
            
            <p class="mt-4 font-sans text-xs tracking-wider text-romantic-pink-light/50 flex items-center justify-center gap-1.5 animate-pulse">
                <span>🎧</span> Recommended to turn on music
            </p>
        </div>
    </div>

    <!-- Dynamic countdown skip button (hidden Easter egg or developer rescue) -->
    <div id="loader-skip" class="absolute bottom-6 right-6 z-20 text-romantic-pink-light/30 text-xs hover:text-romantic-pink-light/70 transition-colors pointer-events-auto">
        <button id="btn-skip-intro" class="px-3 py-1.5 border border-white/10 rounded-full hover:bg-white/5 transition-all">Skip Intro ✨</button>
    </div>

    <!-- ============================================ -->
    <!-- CURTAIN PANELS (inside loader, on top of everything) -->
    <!-- ============================================ -->
    <!-- Left curtain -->
    <div id="curtain-left" class="absolute inset-y-0 left-0 w-1/2 z-[10001]" style="background: linear-gradient(90deg, #4a1942 0%, #6b2737 30%, #8b3a4a 60%, #a0522d22 100%); transform: translateX(0); will-change: transform;">
        <div class="absolute inset-0 opacity-20" style="background-image: repeating-linear-gradient(90deg, transparent, transparent 30px, rgba(255,255,255,0.04) 30px, rgba(255,255,255,0.04) 31px);"></div>
        <div class="absolute right-0 top-0 bottom-0 w-[60px] bg-gradient-to-l from-pink-500/15 to-transparent"></div>
        <!-- Curtain tie/ribbon -->
        <div class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-1/2 z-[10002]">
            <div class="w-10 h-20 bg-gradient-to-b from-amber-400 via-amber-500 to-amber-600 rounded-full shadow-lg flex items-center justify-center">
                <div class="w-6 h-6 rounded-full border-2 border-amber-300/50 flex items-center justify-center">
                    <span class="text-xs">🎀</span>
                </div>
            </div>
        </div>
        <!-- Bottom curtain fold effect -->
        <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-pink-900/40 to-transparent"></div>
    </div>
    <!-- Right curtain -->
    <div id="curtain-right" class="absolute inset-y-0 right-0 w-1/2 z-[10001]" style="background: linear-gradient(270deg, #4a1942 0%, #6b2737 30%, #8b3a4a 60%, #a0522d22 100%); transform: translateX(0); will-change: transform;">
        <div class="absolute inset-0 opacity-20" style="background-image: repeating-linear-gradient(90deg, transparent, transparent 30px, rgba(255,255,255,0.04) 30px, rgba(255,255,255,0.04) 31px);"></div>
        <div class="absolute left-0 top-0 bottom-0 w-[60px] bg-gradient-to-r from-pink-500/15 to-transparent"></div>
        <!-- Curtain tie/ribbon -->
        <div class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-1/2 z-[10002]">
            <div class="w-10 h-20 bg-gradient-to-b from-amber-400 via-amber-500 to-amber-600 rounded-full shadow-lg flex items-center justify-center">
                <div class="w-6 h-6 rounded-full border-2 border-amber-300/50 flex items-center justify-center">
                    <span class="text-xs">🎀</span>
                </div>
            </div>
        </div>
        <!-- Bottom curtain fold effect -->
        <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-pink-900/40 to-transparent"></div>
    </div>
    <!-- Center sparkle burst (visible when curtain opens) -->
    <div id="curtain-sparkles" class="absolute inset-0 flex items-center justify-center z-[10003] opacity-0 pointer-events-none">
        <div class="relative w-full h-full">
            <span class="absolute top-[40%] left-[45%] text-4xl animate-ping">✨</span>
            <span class="absolute top-[35%] left-[55%] text-3xl animate-ping" style="animation-delay: 0.15s;">💫</span>
            <span class="absolute top-[50%] left-[42%] text-3xl animate-ping" style="animation-delay: 0.3s;">💖</span>
            <span class="absolute top-[45%] left-[58%] text-2xl animate-ping" style="animation-delay: 0.45s;">🌟</span>
            <span class="absolute top-[55%] left-[50%] text-2xl animate-ping" style="animation-delay: 0.1s;">💕</span>
            <span class="absolute top-[38%] left-[50%] text-3xl animate-ping" style="animation-delay: 0.6s;">⭐</span>
        </div>
    </div>
</div>
