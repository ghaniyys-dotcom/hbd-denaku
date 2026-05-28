@props(['config'])

<section id="final-section" class="relative min-h-screen py-24 px-6 bg-night-gradient overflow-hidden flex flex-col items-center justify-center select-none">
    <!-- Starry & Meteor sky canvas -->
    <canvas id="final-stars-canvas" class="absolute inset-0 w-full h-full opacity-70"></canvas>

    <!-- Glowing ambient spots -->
    <div class="absolute w-[400px] h-[400px] bg-purple-900/20 rounded-full blur-[140px] top-1/4 left-1/4 pointer-events-none"></div>
    <div class="absolute w-[400px] h-[400px] bg-rose-950/20 rounded-full blur-[140px] bottom-1/4 right-1/4 pointer-events-none"></div>

    <div class="relative z-10 text-center max-w-2xl px-4 flex flex-col items-center justify-center">
        <!-- Floating angel emoji or cute icon -->
        <div class="w-16 h-16 rounded-full bg-white/5 backdrop-blur-md shadow-[0_0_15px_rgba(255,255,255,0.05)] border border-white/10 flex items-center justify-center text-3xl animate-bounce mb-8 pointer-events-auto">
            👼
        </div>

        <span class="font-sans text-xs md:text-sm font-bold tracking-[0.3em] uppercase text-romantic-pink/70 mb-4 select-none">The Climax of My Heart</span>
        
        <!-- Big heartfelt text -->
        <h2 id="final-emotion-title" class="font-romantic text-4xl md:text-6xl text-white filter drop-shadow-[0_0_10px_rgba(255,255,255,0.3)] leading-snug">
            Thank you for existing in my world.
        </h2>
        
        <p class="mt-6 font-cute text-sm md:text-base text-romantic-pink-light/60 max-w-lg leading-relaxed mb-12">
            Kamu membuat setiap hariku berarti, mewarnai setiap anganku, dan melengkapi semua doaku. I love you, now and always.
        </p>

        <!-- Final Grand Action Button -->
        <div class="pointer-events-auto">
            <button id="btn-final-surprise" class="relative group px-10 py-5 bg-gradient-to-r from-rose-500 via-pink-500 to-amber-400 text-white font-cute text-lg md:text-xl font-bold rounded-full shadow-[0_8px_30px_rgba(244,63,94,0.5)] hover:shadow-[0_15px_45px_rgba(244,63,94,0.7)] transition-all duration-300 hover:scale-105 active:scale-95 focus:outline-none flex items-center gap-3">
                <span>Click me one last time</span>
                <span class="animate-pulse">❤️</span>
                
                <!-- Glitter hover Sparks -->
                <div class="absolute -top-1.5 -left-1.5 w-3.5 h-3.5 bg-white rounded-full opacity-0 group-hover:opacity-100 group-hover:animate-ping transition-all"></div>
                <div class="absolute -bottom-1.5 -right-1.5 w-3.5 h-3.5 bg-white rounded-full opacity-0 group-hover:opacity-100 group-hover:animate-ping transition-all" style="animation-delay: 0.5s;"></div>
            </button>
        </div>
    </div>

    <!-- GRAND CELEBRATION MODAL OVERLAY (Triggers full screen) -->
    <div id="celebration-overlay" class="fixed inset-0 z-[10001] hidden items-center justify-center bg-black/90 backdrop-blur-lg opacity-0 transition-opacity duration-700 p-4">
        <!-- Confetti viewport canvas inside the overlay -->
        <canvas id="celebration-confetti" class="absolute inset-0 w-full h-full pointer-events-none"></canvas>

        <!-- Glowing Crescent Moon in top-right backdrop -->
        <div class="absolute top-[8%] right-[8%] text-5xl filter drop-shadow-[0_0_20px_rgba(254,240,138,0.65)] select-none opacity-40 animate-pulse pointer-events-none z-0">
            🌙
        </div>

        <div class="relative z-10 text-center max-w-xl flex flex-col items-center justify-center select-none p-6">
            <!-- Premium CSS Birthday Cake Container -->
            <div id="celebration-cake-container" class="relative cursor-pointer select-none pointer-events-auto group mb-8 w-44 h-44 flex flex-col items-center justify-end">
                <!-- Glowing Candle Aura -->
                <div id="cake-glow" class="absolute w-28 h-28 bg-orange-400/25 rounded-full blur-xl animate-pulse-glow z-0 top-[15%]"></div>
                
                <!-- Puff of smoke emoji (initially hidden) -->
                <div id="cake-smoke" class="absolute top-[-10%] left-[50%] -translate-x-1/2 -translate-y-1/2 text-3xl opacity-0 pointer-events-none transform scale-50 transition-all duration-500 z-30">
                    💨
                </div>

                <!-- Bouncing Custom Cake Body -->
                <div id="celebration-cake" class="relative z-10 w-32 h-28 flex flex-col items-center justify-end animate-bounce duration-[2000ms] origin-bottom">
                    <!-- Bouncing Candle Flame in perfect sync inside the cake! -->
                    <div id="cake-flame" class="absolute top-[-12px] left-[50%] -translate-x-1/2 text-2xl filter drop-shadow-[0_0_10px_#ff9f43] select-none hover:scale-125 transition-transform animate-pulse cursor-pointer z-20">
                        🔥
                    </div>

                    <!-- Candle stick -->
                    <div class="w-2.5 h-10 bg-gradient-to-t from-red-400 to-white rounded-t-sm shadow-sm relative -bottom-[2px] z-10">
                        <!-- Striping -->
                        <div class="absolute inset-0 bg-transparent [background:repeating-linear-gradient(45deg,#ff4d6d,#ff4d6d_2px,#fff_2px,#fff_4px)]"></div>
                    </div>
                    
                    <!-- Cake Top Layer (Pink frosting) -->
                    <div class="w-24 h-8 bg-gradient-to-r from-pink-400 to-rose-300 border border-pink-300 rounded-t-lg shadow-inner z-8 relative -bottom-[1px] flex items-center justify-around px-2">
                        <!-- Cream drips / toppings -->
                        <div class="w-2 h-2 bg-white rounded-full"></div>
                        <div class="w-2 h-2 bg-white rounded-full"></div>
                        <div class="w-2 h-2 bg-white rounded-full"></div>
                    </div>
                    
                    <!-- Cake Base Layer (Vanilla creamy white) -->
                    <div class="w-28 h-10 bg-gradient-to-r from-amber-50 to-orange-100 border border-orange-200 rounded-t-md shadow-md z-6 flex items-end justify-between px-3">
                        <!-- Cream dripping decoration -->
                        <div class="w-4 h-3 bg-pink-400 rounded-b-full"></div>
                        <div class="w-4 h-2.5 bg-pink-400 rounded-b-full"></div>
                        <div class="w-4 h-3.5 bg-pink-400 rounded-b-full"></div>
                        <div class="w-4 h-2 bg-pink-400 rounded-b-full"></div>
                    </div>
                    
                    <!-- Golden Plate -->
                    <div class="w-32 h-2.5 bg-gradient-to-r from-amber-300 to-yellow-400 border border-amber-400 rounded-full shadow-sm z-5"></div>
                </div>
            </div>

            <!-- Big Glowing Banner -->
            <h1 id="celebration-banner-title" class="font-romantic text-6xl md:text-8xl text-transparent bg-clip-text bg-gradient-to-r from-pink-400 via-rose-300 to-amber-300 filter drop-shadow-[0_0_30px_rgba(255,110,130,0.8)] select-none leading-none">
                Happy Birthday
            </h1>
            
            <h2 id="celebration-banner-name" class="font-romantic text-5xl md:text-7xl text-white filter drop-shadow-[0_0_20px_rgba(255,255,255,0.7)] mt-3">
                My Love, {{ $config['partner_name'] }}! ❤️
            </h2>

            <!-- Cute floating message -->
            <p id="celebration-message" class="mt-6 font-cute text-sm md:text-base text-pink-200/80 leading-relaxed max-w-md">
                Semoga duniaku selalu dipenuhi oleh senyum manismu. Selamat merayakan hari kelahiranmu, sayang! Tiup lilinnya dan buat permohonan terindahmu ya! 🕯️✨
            </p>

            <!-- Wish upon a star input card -->
            <div id="wish-board-card" class="w-full max-w-sm mt-6 bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/15 flex flex-col items-center justify-center shadow-inner pointer-events-auto transition-all duration-500 opacity-0 transform translate-y-6">
                <span class="font-sans text-[9px] font-extrabold uppercase text-pink-300 tracking-[0.2em] mb-2 select-none">Make a wish upon a star 🏮✨</span>
                <div class="w-full flex gap-2">
                    <input id="wish-input" type="text" placeholder="Tulis harapan ulang tahunmu disini... 💫" class="flex-grow px-4 py-2.5 rounded-full bg-white/90 border border-pink-200 text-pink-950 placeholder-pink-800/40 text-xs md:text-sm focus:outline-none focus:ring-2 focus:ring-pink-300 transition-all font-cute">
                    <button id="btn-send-wish" class="px-5 py-2.5 bg-gradient-to-r from-amber-400 to-orange-400 hover:from-amber-500 hover:to-orange-500 text-white font-cute text-xs md:text-sm font-bold rounded-full shadow-md transition-all active:scale-95 cursor-pointer">
                        Kirim 🚀
                    </button>
                </div>
            </div>

            <!-- Reset surprise button -->
            <button id="btn-reset-surprise" class="mt-8 px-6 py-2 border border-white/20 hover:border-white/50 text-white/50 hover:text-white rounded-full font-sans text-xs tracking-widest uppercase transition-all bg-white/5 backdrop-blur-sm pointer-events-auto">
                Rewind the Love ⏪
            </button>
        </div>
    </div>
</section>
