@props(['config'])

<div id="floating-music-player" class="fixed bottom-6 left-6 z-[999] select-none pointer-events-auto transform translate-y-20 opacity-0 transition-all duration-500">
    <div class="glassmorphism p-3 rounded-full border border-white/50 shadow-xl flex items-center gap-3.5 hover:shadow-[0_10px_25px_rgba(255,183,197,0.35)] hover:scale-105 transition-all duration-300">
        <!-- Vinyl Record Disk -->
        <div class="relative w-12 h-12 rounded-full bg-neutral-900 shadow-md border-2 border-white flex items-center justify-center overflow-hidden">
            <!-- Vinyl groove styling lines -->
            <div class="absolute inset-1 border border-neutral-700/40 rounded-full"></div>
            <div class="absolute inset-2 border border-neutral-700/60 rounded-full"></div>
            
            <!-- Vinyl record center sticker -->
            <div class="relative z-10 w-4 h-4 rounded-full bg-pink-400 border border-white/35 flex items-center justify-center">
                <div class="w-1.5 h-1.5 rounded-full bg-white"></div>
            </div>
            
            <!-- Rotating vinyl disc image cover fallback -->
            <div id="vinyl-disc" class="absolute inset-0 bg-gradient-to-tr from-pink-400/40 to-romantic-gold/50 rounded-full opacity-60"></div>
        </div>

        <!-- Track info text -->
        <div class="pr-3 flex flex-col justify-center">
            <span class="font-sans text-[9px] font-extrabold uppercase text-pink-500 tracking-wider">Now Playing</span>
            <span class="font-cute text-xs font-bold text-pink-950/80 max-w-[130px] truncate">Beautiful Dream 🌸</span>
            
            <!-- Wave animations visualizer -->
            <div id="audio-visualizer" class="flex gap-0.5 mt-1 items-end h-3">
                <div class="w-0.5 bg-pink-400 rounded-full h-1"></div>
                <div class="w-0.5 bg-pink-400 rounded-full h-1"></div>
                <div class="w-0.5 bg-pink-400 rounded-full h-1"></div>
                <div class="w-0.5 bg-pink-400 rounded-full h-1"></div>
                <div class="w-0.5 bg-pink-400 rounded-full h-1"></div>
            </div>
        </div>

        <!-- Play/Pause toggle -->
        <button id="btn-toggle-music" class="w-9 h-9 rounded-full bg-gradient-to-tr from-romantic-pink-dark to-rose-400 text-white flex items-center justify-center shadow-md hover:scale-105 active:scale-95 transition-all border-none focus:outline-none" aria-label="Toggle Background Music">
            <!-- Play icon -->
            <svg id="icon-play" class="w-4 h-4 translate-x-[1px]" fill="currentColor" viewBox="0 0 24 24">
                <path d="M8 5v14l11-7z"/>
            </svg>
            <!-- Pause icon (hidden initially) -->
            <svg id="icon-pause" class="w-4 h-4 hidden" fill="currentColor" viewBox="0 0 24 24">
                <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
            </svg>
        </button>
    </div>

    <!-- Hidden HTML5 Audio Element (Direct src for Safari & Mobile compatibility) -->
    <audio id="romantic-audio" src="{{ $config['music_url'] }}" loop preload="auto">
        Your browser does not support the audio element.
    </audio>
</div>
