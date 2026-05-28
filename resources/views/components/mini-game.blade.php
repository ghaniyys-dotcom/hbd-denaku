<section id="game-section" class="relative py-24 px-6 bg-romantic-pink-light overflow-hidden flex flex-col items-center">
    <!-- Parallax items -->
    <div class="absolute top-[20%] right-[8%] text-2xl opacity-20 pointer-events-none animate-float-slow">🎮</div>
    <div class="absolute bottom-[20%] left-[10%] text-2xl opacity-20 pointer-events-none animate-float-fast">💖</div>

    <div class="relative z-10 text-center mb-12 max-w-lg mx-auto select-none">
        <span class="font-sans text-xs font-bold tracking-[0.25em] text-pink-500/80 uppercase">Interactive Playtime</span>
        <h2 class="font-romantic text-4xl md:text-5xl text-pink-600 mt-2 filter drop-shadow-sm">
            Catch My Love! 🎮
        </h2>
        <p class="mt-3 font-cute text-sm text-pink-700/50">
            Tangkap hati-hati manis yang berjatuhan menggunakan keranjang pink kamu! Kumpulkan 10 hati untuk membuka kejutan selanjutnya.
        </p>
    </div>

    <!-- The Game Frame (Glassmorphic Container) -->
    <div class="relative z-10 max-w-lg w-full aspect-[4/3] glassmorphism rounded-3xl border border-white/40 shadow-2xl p-4 flex flex-col overflow-hidden pointer-events-auto select-none">
        <!-- Live HUD header -->
        <div class="flex justify-between items-center border-b border-pink-100 pb-3 mb-3 font-cute">
            <div class="flex items-center gap-1.5 bg-white/60 px-3 py-1.5 rounded-full border border-pink-100/35">
                <span class="text-pink-500 animate-pulse">❤️</span>
                <span class="text-xs font-bold text-pink-700">Score: <span id="game-score">0</span> / 10</span>
            </div>
            
            <div class="text-[10px] text-pink-500/60 uppercase tracking-widest font-bold">
                Level 1: Sweet Hearts
            </div>
        </div>

        <!-- Inner Game Canvas box -->
        <div class="flex-grow bg-white/40 border border-pink-100/20 rounded-2xl overflow-hidden relative min-h-[220px]">
            <!-- Canvas viewport -->
            <canvas id="game-canvas" class="absolute inset-0 w-full h-full block cursor-none"></canvas>

            <!-- Screen: Start Game Overlay -->
            <div id="game-screen-start" class="absolute inset-0 z-10 flex flex-col items-center justify-center bg-pink-900/10 backdrop-blur-sm p-6 text-center transition-opacity duration-300">
                <div class="w-16 h-16 rounded-full bg-white/90 shadow-md flex items-center justify-center text-3xl animate-bounce mb-4">
                    🧺
                </div>
                <h4 class="font-cute text-lg font-bold text-pink-800">Heart Catcher Game</h4>
                <p class="mt-2 font-sans text-xs text-pink-900/70 max-w-xs leading-relaxed">
                    Geser keranjang pink ke kiri/kanan menggunakan mouse atau jarimu untuk menangkap hati yang berjatuhan!
                </p>
                <button id="btn-start-game" class="mt-6 px-6 py-2.5 bg-gradient-to-r from-pink-500 to-rose-500 text-white rounded-full font-cute text-sm font-semibold shadow-md hover:shadow-lg hover:scale-105 active:scale-95 transition-all">
                    Start Catching 🚀
                </button>
            </div>

            <!-- Screen: Win/Congratulations Overlay -->
            <div id="game-screen-win" class="absolute inset-0 z-10 hidden flex flex-col items-center justify-center bg-white/90 backdrop-blur-sm p-6 text-center transition-all duration-500 transform translate-y-full opacity-0">
                <div class="w-20 h-20 bg-rose-100 rounded-full flex items-center justify-center text-4xl shadow-md animate-pulse mb-5">
                    💝
                </div>
                <h4 class="font-romantic text-3xl text-rose-600">You Caught My Heart!</h4>
                <p class="mt-2 font-cute text-sm text-pink-700/80 max-w-xs">
                    CONGRATS, YOU UNLOCKED MORE LOVE ❤️
                </p>
                <div class="mt-6 flex flex-col items-center gap-2">
                    <span class="font-sans text-[10px] text-pink-500 font-bold uppercase tracking-[0.2em] animate-pulse">Scroll down to see what's unlocked!</span>
                    <div class="w-5 h-8 border border-pink-400 rounded-full flex justify-center p-1 shadow-sm mt-1">
                        <div class="w-1 h-1.5 bg-pink-500 rounded-full animate-bounce"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
